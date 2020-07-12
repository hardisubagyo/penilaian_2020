<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DaftarNilai extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(! $this->session->userdata('email')){
			$this->session->set_flashdata('error','Silahakn login terlebih dahulu ! ');
			redirect('Login');
		}
	}

	
	public function index()
	{
		$data = array(
			"kelas" => $this->db->query("SELECT distinct(kelas) FROM tm_siswa")->result()
		);

		$this->load->view('header');
		$this->load->view('daftarnilai/index', $data);
		$this->load->view('footer');
	}

	public function LihatNilai($id)
	{
		$data['matpel'] = $this->db->query("
									SELECT 
										*
									FROM tm_mata_pelajaran
								")->result();

		$this->load->view('header');
		$this->load->view('daftarnilai/lihatnilai', $data);
		$this->load->view('footer');
	}

	public function LihatDetailNilai($kelas,$matpel)
	{
		$data = array(
			"tanggal" => $this->db->query("
									SELECT 
										distinct(tr_nilai.tanggal)
									FROM tr_nilai
									JOIN tm_siswa ON tm_siswa.id_siswa = tr_nilai.id_siswa
									WHERE tr_nilai.id_mata_pelajaran = '$matpel'
									AND tm_siswa.kelas = '$kelas'
								")->result(),
			"matpel" => $this->db->query("SELECT nama from tm_mata_pelajaran where id_mata_pelajaran = '$matpel'")->row()
		);
		
		$this->load->view('header');
		$this->load->view('daftarnilai/lihatdetailnilai', $data);
		$this->load->view('footer');
	}

	public function Lihat($kelas,$matpel,$tgl)
	{
		$data = array(
			"nilai" => $this->db->query("
							SELECT
								tr_nilai.id_nilai,
								tr_nilai.nilai,
								tm_siswa.nama as namasiswa
							FROM tr_nilai
							JOIN tm_siswa ON tm_siswa.id_siswa = tr_nilai.id_siswa
							JOIN tm_mata_pelajaran ON tm_mata_pelajaran.id_mata_pelajaran = tr_nilai.id_mata_pelajaran
							WHERE tm_siswa.kelas = '$kelas'
							AND tr_nilai.id_mata_pelajaran = '$matpel'
							AND tr_nilai.tanggal = '$tgl'
							ORDER BY tm_siswa.nama ASC
						")->result(),
			"matpel" => $this->db->query("SELECT nama from tm_mata_pelajaran where id_mata_pelajaran = '$matpel'")->row()
		);

		/*echo json_encode($data);*/

		$this->load->view('header');
		$this->load->view('daftarnilai/lihat', $data);
		$this->load->view('footer');
	}

	public function Edit($kelas,$matpel,$tgl)
	{
		$data = array(
			"nilai" => $this->db->query("
							SELECT
								tr_nilai.id_nilai,
								tr_nilai.nilai,
								tm_siswa.nama as namasiswa
							FROM tr_nilai
							JOIN tm_siswa ON tm_siswa.id_siswa = tr_nilai.id_siswa
							JOIN tm_mata_pelajaran ON tm_mata_pelajaran.id_mata_pelajaran = tr_nilai.id_mata_pelajaran
							WHERE tm_siswa.kelas = '$kelas'
							AND tr_nilai.id_mata_pelajaran = '$matpel'
							AND tr_nilai.tanggal = '$tgl'
							ORDER BY tm_siswa.nama ASC
						")->result(),
			"matpel" => $this->db->query("SELECT nama from tm_mata_pelajaran where id_mata_pelajaran = '$matpel'")->row()
		);

		/*echo json_encode($data);*/

		$this->load->view('header');
		$this->load->view('daftarnilai/edit', $data);
		$this->load->view('footer');
	}
	
}

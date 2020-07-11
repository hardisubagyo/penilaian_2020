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
		$data['tanggalnilai'] = $this->db->query("
									SELECT 
										distinct(tanggal)
									FROM tr_nilai
									JOIN tm_siswa ON tm_siswa.id_siswa = tr_nilai.id_siswa
									WHERE tm_siswa.kelas = '$id'
								")->result();

		$this->load->view('header');
		$this->load->view('daftarnilai/lihatnilai', $data);
		$this->load->view('footer');
	}

	public function LihatDetailNilai($kelas,$tanggal)
	{
		$data = array(
			"siswa" => $this->db->query("SELECT * FROM tm_siswa WHERE kelas = '$kelas'")->result(),
			"matpel" => $this->db->query("SELECT * FROM tm_mata_pelajaran")->result(),
			"nilai" => $this->db->query("
									SELECT 
										tr_nilai.id_nilai,
										tm_siswa.id_siswa,
										tm_siswa.nama as namasiswa,
										tm_mata_pelajaran.id_mata_pelajaran,
										tm_mata_pelajaran.nama as namapelajaran,
										tr_nilai.nilai
									FROM tr_nilai
									JOIN tm_siswa ON tm_siswa.id_siswa = tr_nilai.id_siswa
									JOIN tm_mata_pelajaran ON tm_mata_pelajaran.id_mata_pelajaran = tr_nilai.id_mata_pelajaran
									WHERE tr_nilai.tanggal = '$tanggal'
									AND tm_siswa.kelas = '$kelas'
								")->result()
		);
		
		$this->load->view('header');
		$this->load->view('daftarnilai/lihatdetailnilai', $data);
		$this->load->view('footer');
	}
	
}

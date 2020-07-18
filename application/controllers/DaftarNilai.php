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

	public function LihatKeseluruhanNilai($kelas)
	{
		$data = array(
			"siswa" => $this->db->query("SELECT * FROM tm_siswa where kelas = '$kelas'")->result(),
			"matpel" => $this->db->query("SELECT id_mata_pelajaran,nama from tm_mata_pelajaran ORDER BY nama ASC")->result(),
			"kelas" => $kelas
		);

		$this->load->view('header');
		$this->load->view('daftarnilai/lihatkeseluruhannilai', $data);
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

	public function LihatDetailNilaiSikap($kelas)
	{
		$data = array(
			"tanggal" => $this->db->query("
									SELECT 
										distinct(tr_nilai_sikap.tanggal)
									FROM tr_nilai_sikap
									JOIN tm_siswa ON tm_siswa.id_siswa = tr_nilai_sikap.id_siswa
									WHERE tm_siswa.kelas = '$kelas'
								")->result()
		);
		
		$this->load->view('header');
		$this->load->view('daftarnilai/lihatdetailnilaisikap', $data);
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

	public function LihatSikap($kelas,$tgl)
	{
		$data = array(
			"nilai" => $this->db->query("
							SELECT
								tr_nilai_sikap.id_nilai,
								tr_nilai_sikap.nilai,
								tr_nilai_sikap.keterangan,
								tm_siswa.nama as namasiswa
							FROM tr_nilai_sikap
							JOIN tm_siswa ON tm_siswa.id_siswa = tr_nilai_sikap.id_siswa
							WHERE tm_siswa.kelas = '$kelas'
							AND tr_nilai_sikap.tanggal = '$tgl'
							ORDER BY tm_siswa.nama ASC
						")->result()
		);

		$this->load->view('header');
		$this->load->view('daftarnilai/lihatsikap', $data);
		$this->load->view('footer');
	}

	public function Edit($kelas,$matpel,$tgl)
	{
		$data = array(
			"nilai" => $this->db->query("
							SELECT
								tr_nilai.id_nilai,
								tr_nilai.nilai,
								tm_siswa.nama as namasiswa,
								tm_siswa.id_siswa
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

	public function EditSikap($kelas,$tgl)
	{
		$data = array(
			"nilai" => $this->db->query("
							SELECT
								tr_nilai_sikap.id_nilai,
								tr_nilai_sikap.nilai,
								tr_nilai_sikap.keterangan,
								tm_siswa.nama as namasiswa,
								tm_siswa.id_siswa
							FROM tr_nilai_sikap
							JOIN tm_siswa ON tm_siswa.id_siswa = tr_nilai_sikap.id_siswa
							WHERE tm_siswa.kelas = '$kelas'
							AND tr_nilai_sikap.tanggal = '$tgl'
							ORDER BY tm_siswa.nama ASC
						")->result()
		);

		/*echo json_encode($data);*/

		$this->load->view('header');
		$this->load->view('daftarnilai/editsikap', $data);
		$this->load->view('footer');
	}

	public function ubah(){
		$kelas = $this->input->post('kelas');
		$matpel = $this->input->post('matpel');
		$tanggal = $this->input->post('tanggal');

		$getnilai = $this->db->query("
			SELECT
				tr_nilai.id_nilai
			FROM tr_nilai
			JOIN tm_siswa ON tm_siswa.id_siswa = tr_nilai.id_siswa
			JOIN tm_mata_pelajaran ON tm_mata_pelajaran.id_mata_pelajaran = tr_nilai.id_mata_pelajaran
			WHERE tm_siswa.kelas = '$kelas'
			AND tr_nilai.id_mata_pelajaran = '$matpel'
			AND tr_nilai.tanggal = '$tanggal'
		")->result();

		foreach($getnilai as $get){
			$this->db->query("DELETE FROM tr_nilai WHERE id_nilai = '$get->id_nilai'");
		}

		$siswa = $this->db->query("SELECT * FROM tm_siswa WHERE kelas = '$kelas'")->result();

		foreach($siswa as $item) {
			$data = array(
				"id_siswa" => $this->input->post("siswa".$item->id_siswa),
				"id_mata_pelajaran" => $matpel,
				"nilai" => $this->input->post("nilai".$item->id_siswa),
				"tanggal" => $tanggal
			);

			$insert = $this->M_model->insert('tr_nilai',$data);
		}

		$this->session->set_flashdata('success', 'Berhasil diinput');
		redirect(site_url('DaftarNilai/LihatDetailNilai/'.$kelas.'/'.$matpel));
	}

	public function ubahsikap(){
		$kelas = $this->input->post('kelas');
		$tanggal = $this->input->post('tanggal');

		$getnilai = $this->db->query("
			SELECT
				tr_nilai_sikap.id_nilai
			FROM tr_nilai_sikap
			JOIN tm_siswa ON tm_siswa.id_siswa = tr_nilai_sikap.id_siswa
			WHERE tm_siswa.kelas = '$kelas'
			AND tr_nilai_sikap.tanggal = '$tanggal'
		")->result();

		foreach($getnilai as $get){
			$this->db->query("DELETE FROM tr_nilai_sikap WHERE id_nilai = '$get->id_nilai'");
		}

		$siswa = $this->db->query("SELECT * FROM tm_siswa WHERE kelas = '$kelas'")->result();

		foreach($siswa as $item) {
			$data = array(
				"id_siswa" => $this->input->post("siswa".$item->id_siswa),
				"keterangan" => $this->input->post("keterangan".$item->id_siswa),
				"nilai" => $this->input->post("nilai".$item->id_siswa),
				"tanggal" => $tanggal
			);

			$insert = $this->M_model->insert('tr_nilai_sikap',$data);
		}

		$this->session->set_flashdata('success', 'Berhasil diinput');
		redirect(site_url('DaftarNilai/LihatDetailNilaiSikap/'.$kelas));
	}

	public function Hapus($kelas,$matpel,$tanggal){
		$getnilai = $this->db->query("
			SELECT
				tr_nilai.id_nilai
			FROM tr_nilai
			JOIN tm_siswa ON tm_siswa.id_siswa = tr_nilai.id_siswa
			JOIN tm_mata_pelajaran ON tm_mata_pelajaran.id_mata_pelajaran = tr_nilai.id_mata_pelajaran
			WHERE tm_siswa.kelas = '$kelas'
			AND tr_nilai.id_mata_pelajaran = '$matpel'
			AND tr_nilai.tanggal = '$tanggal'
		")->result();

		foreach($getnilai as $get){
			$this->db->query("DELETE FROM tr_nilai WHERE id_nilai = '$get->id_nilai'");
		}

		$this->session->set_flashdata('success', 'Berhasil dihapus');
		redirect(site_url('DaftarNilai/LihatDetailNilai/'.$kelas.'/'.$matpel));
	}

	public function HapusSikap($kelas,$tanggal){
		$getnilai = $this->db->query("
			SELECT
				tr_nilai_sikap.id_nilai
			FROM tr_nilai_sikap
			JOIN tm_siswa ON tm_siswa.id_siswa = tr_nilai_sikap.id_siswa
			WHERE tm_siswa.kelas = '$kelas'
			AND tr_nilai_sikap.tanggal = '$tanggal'
		")->result();

		foreach($getnilai as $get){
			$this->db->query("DELETE FROM tr_nilai_sikap WHERE id_nilai = '$get->id_nilai'");
		}

		$this->session->set_flashdata('success', 'Berhasil dihapus');
		redirect(site_url('DaftarNilai/LihatDetailNilaiSikap/'.$kelas));
	}
	
}

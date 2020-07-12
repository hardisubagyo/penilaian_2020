<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {

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
		$this->load->view('penilaian/index', $data);
		$this->load->view('footer');
	}

	public function InputNilai($id)
	{
		$data = array(
			"matpel" => $this->db->query("SELECT * FROM tm_mata_pelajaran")->result()
		);

		$this->load->view('header');
		$this->load->view('penilaian/inputnilai', $data);
		$this->load->view('footer');
	}

	public function InsertNilai($kelas,$matpel){
		$data = array(
			"siswa" => $this->db->query("SELECT * FROM tm_siswa WHERE kelas = '$kelas'")->result(),
			"matapelajaran" => $this->db->query("SELECT * FROM tm_mata_pelajaran WHERE id_mata_pelajaran = '$matpel'")->row(),
			"matpel" => $matpel,
			"kelas" => $kelas
		);

		$this->load->view('header');
		$this->load->view('penilaian/insertnilai', $data);
		$this->load->view('footer');

	}

	public function SimpanNilai()
	{
		$kelas = $this->input->post('kelas');
		$tgl = $this->input->post('tanggal');
		$matpel = $this->input->post('matpel');
		
		$siswa = $this->db->query("SELECT * FROM tm_siswa WHERE kelas = '$kelas'")->result();

		foreach($siswa as $item) {
			$data = array(
				"id_siswa" => $this->input->post("siswa".$item->id_siswa),
				"id_mata_pelajaran" => $matpel,
				"nilai" => $this->input->post("nilai".$item->id_siswa),
				"tanggal" => $tgl
			);

			$insert = $this->M_model->insert('tr_nilai',$data);
		}

		$this->session->set_flashdata('success', 'Berhasil diinput');
		redirect(site_url('Penilaian/InputNilai/'.$kelas));

	}

	
}

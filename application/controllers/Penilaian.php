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
			"siswa" => $this->db->query("SELECT * FROM tm_siswa WHERE kelas = '$id'")->result(),
			"matpel" => $this->db->query("SELECT * FROM tm_mata_pelajaran")->result()
		);

		$this->load->view('header');
		$this->load->view('penilaian/inputnilai', $data);
		$this->load->view('footer');
	}

	public function SimpanNilai()
	{
		$kelas = $this->input->post('kelas');
		$tgl = $this->input->post('tanggal');
		$siswa = $this->db->query("SELECT * FROM tm_siswa WHERE kelas = '$kelas'")->result();
		$matpel = $this->db->query("SELECT * FROM tm_mata_pelajaran")->result();

		foreach($siswa as $item) {
			foreach($matpel as $items) {
				$data = array(
					"id_siswa" => $this->input->post("siswa".$item->id_siswa),
					"id_mata_pelajaran" => $items->id_mata_pelajaran,
					"nilai" => $this->input->post("input-".$item->id_siswa."-".$items->id_mata_pelajaran),
					"tanggal" => $tgl
				);

				$insert = $this->M_model->insert('tr_nilai',$data);
			}
		}

		$this->session->set_flashdata('success', 'Berhasil diinput');
		redirect(site_url('Penilaian'));

	}

	
}

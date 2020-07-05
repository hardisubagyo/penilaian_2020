<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MataPelajaran extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(! $this->session->userdata('email')){
			$this->session->set_flashdata('error','Silahakn login terlebih dahulu ! ');
			redirect('Login');
		}
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data = array(
			"matpel" => $this->M_model->read('tm_mata_pelajaran')->result()
		);

		$this->load->view('header');
		$this->load->view('matapelajaran/index',$data);
		$this->load->view('footer');
	}

	public function Add(){
		$this->load->view('header');
		$this->load->view('matapelajaran/add');
		$this->load->view('footer');
	}

	public function simpan()
	{
		$data = array(
			"nama" => $this->input->post('nama')
		);

		$insert = $this->M_model->insert('tm_mata_pelajaran',$data);

		if($insert == 1){
			$this->session->set_flashdata('success', 'Berhasil diinput');
			redirect(site_url('MataPelajaran'));
		}else{
			$this->session->set_flashdata('failed', 'Gagal diinput');
			redirect(site_url('MataPelajaran'));
		}
	}

	public function Edit($id){
		$where = array('id_mata_pelajaran' => $id);

		$data = array(
			"data" => $this->M_model->read('tm_mata_pelajaran',$where)->row()
		);

		$this->load->view('header');
		$this->load->view('matapelajaran/edit', $data);
		$this->load->view('footer');
	}

	public function rubah()
	{
		$data = array(
			"nama" => $this->input->post('nama')
		);

		$where = array('id_mata_pelajaran' => $this->input->post('id_mata_pelajaran'));
		$update = $this->M_model->update('tm_mata_pelajaran',$data, $where);

		if($update == 1){
			$this->session->set_flashdata('success', 'Berhasil diubah');
			redirect(site_url('MataPelajaran'));
		}else{
			$this->session->set_flashdata('failed', 'Gagal diubah');
			redirect(site_url('MataPelajaran'));
		}
	}

	public function Delete($id)
	{
		$where = array('id_mata_pelajaran' => $id);
		$this->M_model->delete('tm_mata_pelajaran', $where);
		$this->session->set_flashdata('success', 'Berhasil dihapus');
		redirect(site_url('MataPelajaran'));
	}
}

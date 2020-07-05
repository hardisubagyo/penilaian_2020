<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slide extends CI_Controller {

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
			"slide" => $this->M_model->read('tm_slide')->result()
		);

		$this->load->view('header');
		$this->load->view('slide/index',$data);
		$this->load->view('footer');
	}

	public function Add(){
		$this->load->view('header');
		$this->load->view('slide/add');
		$this->load->view('footer');
	}

	public function simpan()
	{

		$nama = $_FILES['nama']['name'];
		if($nama != ''){
			$namagambar = str_replace(' ', '-', date('ymdhis').'-'.$nama);
			$config['upload_path'] = './assets/foto/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['max_size'] = '4096';
			$config['file_name'] = $namagambar;
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			$this->upload->do_upload('nama');
			$upload_gambar = $this->upload->data();
			$finalgambar = $upload_gambar['file_name'];
		}else{
			$namagambar = '';
		}

		$data = array(
			"nama" => $namagambar
		);

		$insert = $this->M_model->insert('tm_slide',$data);

		if($insert == 1){
			$this->session->set_flashdata('success', 'Berhasil diinput');
			redirect(site_url('Slide'));
		}else{
			$this->session->set_flashdata('failed', 'Gagal diinput');
			redirect(site_url('Slide'));
		}
	}

	public function Edit($id){
		$where = array('id_slide' => $id);

		$data = array(
			"data" => $this->M_model->read('tm_slide',$where)->row()
		);

		$this->load->view('header');
		$this->load->view('slide/edit', $data);
		$this->load->view('footer');
	}

	public function rubah()
	{
		$nama = $_FILES['nama']['name'];
		if($nama != ''){
			$namagambar = str_replace(' ', '-', date('ymdhis').'-'.$nama);
			$config['upload_path'] = './assets/foto/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['max_size'] = '4096';
			$config['file_name'] = $namagambar;
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			$this->upload->do_upload('nama');
			$upload_gambar = $this->upload->data();
			$finalgambar = $upload_gambar['file_name'];

			$data = array(
				"nama" => $namagambar
			);	
		}
		

		$where = array('id_slide' => $this->input->post('id_slide'));
		$update = $this->M_model->update('tm_slide',$data, $where);

		if($update == 1){
			$this->session->set_flashdata('success', 'Berhasil diubah');
			redirect(site_url('Slide'));
		}else{
			$this->session->set_flashdata('failed', 'Gagal diubah');
			redirect(site_url('Slide'));
		}
	}

	public function Delete($id)
	{
		$where = array('id_slide' => $id);
		$this->M_model->delete('tm_slide', $where);
		$this->session->set_flashdata('success', 'Berhasil dihapus');
		redirect(site_url('Slide'));
	}
}

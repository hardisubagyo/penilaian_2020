<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

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
			"siswa" => $this->M_model->read('tm_siswa')->result()
		);

		$this->load->view('header');
		$this->load->view('siswa/index',$data);
		$this->load->view('footer');
	}

	public function Add(){
		$this->load->view('header');
		$this->load->view('siswa/add');
		$this->load->view('footer');
	}

	public function simpan()
	{
		$data = array(
			"nama" => $this->input->post('nama'),
			"nomor" => $this->input->post('nomor'),
			"nrp" => $this->input->post('nrp'),
			"asal_satuan" => $this->input->post('asal_satuan'),
			"nsl_panjang" => $this->input->post('nsl_panjang'),
			"nsl_pendek" => $this->input->post('nsl_pendek'),
			"kelas" => $this->input->post('kelas')
		);

		$insert = $this->M_model->insert('tm_siswa',$data);

		if($insert == 1){
			$this->session->set_flashdata('success', 'Berhasil diinput');
			redirect(site_url('Siswa'));
		}else{
			$this->session->set_flashdata('failed', 'Gagal diinput');
			redirect(site_url('Siswa'));
		}
	}

	public function Edit($id){
		$where = array('id_siswa' => $id);

		$data = array(
			"data" => $this->M_model->read('tm_siswa',$where)->row()
		);

		$this->load->view('header');
		$this->load->view('siswa/edit', $data);
		$this->load->view('footer');
	}

	public function rubah()
	{
		$data = array(
			"nama" => $this->input->post('nama'),
			"nomor" => $this->input->post('nomor'),
			"nrp" => $this->input->post('nrp'),
			"asal_satuan" => $this->input->post('asal_satuan'),
			"nsl_panjang" => $this->input->post('nsl_panjang'),
			"nsl_pendek" => $this->input->post('nsl_pendek'),
			"kelas" => $this->input->post('kelas')
		);

		$where = array('id_siswa' => $this->input->post('id_siswa'));
		$update = $this->M_model->update('tm_siswa',$data, $where);

		if($update == 1){
			$this->session->set_flashdata('success', 'Berhasil diubah');
			redirect(site_url('Siswa'));
		}else{
			$this->session->set_flashdata('failed', 'Gagal diubah');
			redirect(site_url('Siswa'));
		}
	}

	public function Delete($id)
	{
		$where = array('id_siswa' => $id);
		$this->M_model->delete('tm_siswa', $where);
		$this->session->set_flashdata('success', 'Berhasil dihapus');
		redirect(site_url('Siswa'));
	}
}

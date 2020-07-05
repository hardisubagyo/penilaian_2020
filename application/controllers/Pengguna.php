<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

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
			"data" => $this->M_model->read('tm_pengguna')->result()
		);

		$this->load->view('header');
		$this->load->view('pengguna/index', $data);
		$this->load->view('footer');
	}

	public function Add()
	{
		$data = array();
		
		$this->load->view('header');
		$this->load->view('pengguna/add', $data);
		$this->load->view('footer');
	}

	public function Simpan(){
		if($this->input->post('password') != $this->input->post('repassword')){
			$this->session->set_flashdata('failed', 'Password tidak sama');
			redirect(site_url('Pengguna'));
		}else{
			$data = array(
				"nama" => $this->input->post('nama'),
				"email" => $this->input->post('email'),
				"alamat" => $this->input->post('alamat'),
				"telp" => $this->input->post('telp'),
				"password" => md5($this->input->post('password'))
			);

			$insert = $this->M_model->insert('tm_pengguna',$data);

			if($insert == 1){
				$this->session->set_flashdata('success', 'Berhasil diinput');
				redirect(site_url('Pengguna'));
			}else{
				$this->session->set_flashdata('failed', 'Gagal diinput');
				redirect(site_url('Pengguna'));
			}
		}
	}

	public function Edit($id){

		$where = array('id_pengguna' => $id);

		$data = array(
			"data" => $this->M_model->read('tm_pengguna',$where)->row()
		);

		$this->load->view('header',$data);
		$this->load->view('pengguna/edit',$data);
		$this->load->view('footer');

	}

	public function Rubah(){

		if($this->input->post('password') != ''){
			if($this->input->post('password') != $this->input->post('repassword')){
				$this->session->set_flashdata('failed', 'Password tidak sama');
				redirect(site_url('Pengguna'));
			}else{
				$data = array(
					"nama" => $this->input->post('nama'),
					"email" => $this->input->post('email'),
					"alamat" => $this->input->post('alamat'),
					"telp" => $this->input->post('telp'),
					"password" => md5($this->input->post('password'))
				);

				$where = array('id_pengguna' => $this->input->post('id_pengguna'));
				$update = $this->M_model->update('tm_pengguna',$data, $where);

				if($update == 1){
					$this->session->set_flashdata('success', 'Berhasil diubah');
					redirect(site_url('Pengguna'));
				}else{
					$this->session->set_flashdata('failed', 'Gagal diubah');
					redirect(site_url('Pengguna'));
				}
			}
		}else{
			$data = array(
				"nama" => $this->input->post('nama'),
				"email" => $this->input->post('email'),
				"alamat" => $this->input->post('alamat'),
				"telp" => $this->input->post('telp')
			);

			$where = array('id_pengguna' => $this->input->post('id_pengguna'));
			$update = $this->M_model->update('tm_pengguna',$data, $where);

			if($update == 1){
				$this->session->set_flashdata('success', 'Berhasil diubah');
				redirect(site_url('Pengguna'));
			}else{
				$this->session->set_flashdata('failed', 'Gagal diubah');
				redirect(site_url('Pengguna'));
			}
		}
	}

	public function Delete($id){
		$where = array('id_pengguna' => $id);
		$this->M_model->delete('tm_pengguna', $where);
		$this->session->set_flashdata('success', 'Berhasil dihapus');
		redirect(site_url('Pengguna'));
	}
}

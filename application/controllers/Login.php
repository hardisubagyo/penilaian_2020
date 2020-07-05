<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}

	public function Cek(){
		$where = array(
			"email" => $this->input->post("email"),
			"password" => md5($this->input->post("password"))
		);

		$query = $this->M_model->read('tm_pengguna',$where)->row();

		if($query){
			$data = array(
				"email" => $query->email,
				"nama" => $query->nama,
				"logged_in" => true
			);
			$this->session->set_userdata($data);
			$logged_in = $this->session->userdata('logged_in');
			redirect(site_url());
		}else{
			$this->session->set_flashdata('error', 'Username / Password salah ! ');
			redirect(site_url('Login'));
		}
	}

	public function Keluar(){
		$this->session->sess_destroy();
		redirect(site_url());
	}
}

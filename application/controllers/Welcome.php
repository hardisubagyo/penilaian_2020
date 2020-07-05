<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
			"slide" => $this->M_model->read('tm_slide')->result(),
			"max" => $this->db->query('SELECT MAX(id_slide) AS maxid FROM tm_slide')->row()
		);

		$this->load->view('header');
		$this->load->view('welcome_message',$data);
		$this->load->view('footer');
	}
}

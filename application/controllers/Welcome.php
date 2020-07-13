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
			"max" => $this->db->query('SELECT MAX(id_slide) AS maxid FROM tm_slide')->row(),
			"kopassus" => $this->db->query('SELECT COUNT(*) as total FROM tm_siswa WHERE asal_satuan = "Kopassus"')->row(),
			"nonkopassus" => $this->db->query('SELECT COUNT(*) as total FROM tm_siswa WHERE asal_satuan = "Non Kopassus"')->row(),
			"nilai" => $this->db->query("SELECT SUM(tr_nilai.nilai) AS nilai, tm_siswa.nama FROM tr_nilai JOIN tm_siswa ON tm_siswa.id_siswa = tr_nilai.id_siswa GROUP BY tr_nilai.id_siswa ORDER BY nilai DESC LIMIT 10")->result()
		);

		$this->load->view('header');
		$this->load->view('welcome_message',$data);
		$this->load->view('footer');
	}
}

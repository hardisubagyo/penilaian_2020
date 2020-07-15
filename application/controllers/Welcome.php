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
			"nilai" => $this->db->query("SELECT nama, SUM(total) as total FROM ( SELECT tm_siswa.nama, SUM(tr_nilai.nilai) as total FROM tm_siswa JOIN tr_nilai ON tr_nilai.id_siswa = tm_siswa.id_siswa GROUP BY tm_siswa.id_siswa UNION SELECT tm_siswa.nama, SUM(tr_nilai_sikap.nilai) as total FROM tm_siswa JOIN tr_nilai_sikap ON tr_nilai_sikap.id_siswa = tm_siswa.id_siswa GROUP BY tm_siswa.id_siswa ) temp GROUP BY nama ORDER BY total desc LIMIT 10")->result(),
			"kkm" => $this->db->query("SELECT nama, AVG(total) as total FROM ( SELECT tm_siswa.nama, SUM(tr_nilai.nilai) as total FROM tm_siswa JOIN tr_nilai ON tr_nilai.id_siswa = tm_siswa.id_siswa GROUP BY tm_siswa.id_siswa UNION SELECT tm_siswa.nama, SUM(tr_nilai_sikap.nilai) as total FROM tm_siswa JOIN tr_nilai_sikap ON tr_nilai_sikap.id_siswa = tm_siswa.id_siswa GROUP BY tm_siswa.id_siswa ) temp GROUP BY nama ORDER BY nama asc LIMIT 10")->result()
		);

		$this->load->view('header');
		$this->load->view('welcome_message',$data);
		$this->load->view('footer');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan extends CI_Controller {

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
			"pemasukan" => $this->M_model->read('tr_pemasukan')->result(),
			"pengeluaran" => $this->M_model->read('tr_pengeluaran')->result()
		);

		$this->load->view('header');
		$this->load->view('keuangan/index', $data);
		$this->load->view('footer');
	}

	public function Pemasukan()
	{
		$this->load->view('header');
		$this->load->view('keuangan/pemasukan');
		$this->load->view('footer');	
	}

	public function simpanPemasukan()
	{
		$data = array(
			'tanggal' => $this->input->post('tanggal'),
			'keterangan' => $this->input->post('keterangan'),
			'nominal' => str_replace(".", "", $this->input->post('nominal'))
		);

		$insert = $this->M_model->insert('tr_pemasukan',$data);

		if($insert == 1){
			$this->session->set_flashdata('success', 'Berhasil diinput');
			redirect(site_url('Keuangan'));
		}else{
			$this->session->set_flashdata('failed', 'Gagal diinput');
			redirect(site_url('Keuangan'));
		}
	}

	public function EditPemasukan($id)
	{
		$where = array('id_pemasukan' => $id);

		$data = array(
			"data" => $this->M_model->read('tr_pemasukan',$where)->row()
		);

		$this->load->view('header');
		$this->load->view('keuangan/pemasukanedit', $data);
		$this->load->view('footer');
	}

	public function rubahPemasukan()
	{
		$data = array(
			'tanggal' => $this->input->post('tanggal'),
			'keterangan' => $this->input->post('keterangan'),
			'nominal' => str_replace(".", "", $this->input->post('nominal'))
		);

		$where = array('id_pemasukan' => $this->input->post('id_pemasukan'));
		$update = $this->M_model->update('tr_pemasukan',$data, $where);

		if($update == 1){
			$this->session->set_flashdata('success', 'Berhasil diubah');
			redirect(site_url('Keuangan'));
		}else{
			$this->session->set_flashdata('failed', 'Gagal diubah');
			redirect(site_url('Keuangan'));
		}
	}

	public function DeletePemasukan($id)
	{
		$where = array('id_pemasukan' => $id);
		$this->M_model->delete('tr_pemasukan', $where);
		$this->session->set_flashdata('success', 'Berhasil dihapus');
		redirect(site_url('Keuangan'));
	}

	public function Pengeluaran()
	{
		$this->load->view('header');
		$this->load->view('keuangan/pengeluaran');
		$this->load->view('footer');
	}

	public function simpanPengeluaran()
	{
		$data = array(
			'tanggal' => $this->input->post('tanggal'),
			'keterangan' => $this->input->post('keterangan'),
			'nominal' => str_replace(".", "", $this->input->post('nominal'))
		);

		$struk = $_FILES['struk']['name'];
		if($struk != ''){
			$namagambar = str_replace(' ', '-', date('ymdhis').'-'.$struk);
			$config['upload_path'] = './assets/struk/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['max_size'] = '4096';
			$config['file_name'] = $namagambar;
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			$this->upload->do_upload('struk');
			$upload_gambar = $this->upload->data();
			$finalgambar = $upload_gambar['file_name'];
			$data['struk'] = $namagambar;
		}

		$insert = $this->M_model->insert('tr_pengeluaran',$data);

		if($insert == 1){
			$this->session->set_flashdata('success', 'Berhasil diinput');
			redirect(site_url('Keuangan'));
		}else{
			$this->session->set_flashdata('failed', 'Gagal diinput');
			redirect(site_url('Keuangan'));
		}
	}

	public function EditPengeluaran($id)
	{
		$where = array('id_pengeluaran' => $id);

		$data = array(
			"data" => $this->M_model->read('tr_pengeluaran',$where)->row()
		);

		$this->load->view('header');
		$this->load->view('keuangan/pengeluaranedit', $data);
		$this->load->view('footer');
	}

	public function rubahPengeluaran()
	{
		$data = array(
			'tanggal' => $this->input->post('tanggal'),
			'keterangan' => $this->input->post('keterangan'),
			'nominal' => str_replace(".", "", $this->input->post('nominal'))
		);

		$struk = $_FILES['struk']['name'];
		if($struk != ''){
			$namagambar = str_replace(' ', '-', date('ymdhis').'-'.$struk);
			$config['upload_path'] = './assets/struk/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['max_size'] = '4096';
			$config['file_name'] = $namagambar;
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			$this->upload->do_upload('struk');
			$upload_gambar = $this->upload->data();
			$finalgambar = $upload_gambar['file_name'];
			$data['struk'] = $namagambar;
		}

		$where = array('id_pengeluaran' => $this->input->post('id_pengeluaran'));
		$update = $this->M_model->update('tr_pengeluaran',$data, $where);

		if($update == 1){
			$this->session->set_flashdata('success', 'Berhasil diubah');
			redirect(site_url('Keuangan'));
		}else{
			$this->session->set_flashdata('failed', 'Gagal diubah');
			redirect(site_url('Keuangan'));
		}
	}

	public function DeletePengeluaran($id)
	{
		$where = array('id_pengeluaran' => $id);
		$this->M_model->delete('tr_pengeluaran', $where);
		$this->session->set_flashdata('success', 'Berhasil dihapus');
		redirect(site_url('Keuangan'));
	}
}

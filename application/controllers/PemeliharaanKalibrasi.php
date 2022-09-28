<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PemeliharaanKalibrasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('All_model');
		$this->load->model('M_PemeliharaanKalibrasi');
		if ($this->All_model->isNotLogin()) redirect(site_url(''));
		$this->load->helper('url');
	}

	public function index()
	{
		$data["role"] = $this->All_model->getAllRole();
		$data["pemeliharaan"] = $this->M_PemeliharaanKalibrasi->getAllPemeliharaan();
		$this->load->view("dashboard/pemeliharaankalibrasi", $data);
	}

	// Get Save User
	public function save_pemeliharaan()
	{
		$data = array(
			'nama_alat'	      	    => $this->input->post('nama_alat'),
			'merk_alat'	 		    => $this->input->post('merk_alat'),
			'tipe_alat'     		=> $this->input->post('tipe_alat'),
			'noseri_alat'	        => $this->input->post('noseri_alat')
		);
		$this->M_PemeliharaanKalibrasi->simpandatapemeliharaan($data);
		$this->session->set_flashdata('notif', 'Data berhasil disimpan');
		redirect(base_url('pemeliharaankalibrasis'));
	}

	// Edit User
	public function edit_pemeliharaan($id)
	{
		// $data["role"] = $this->All_model->getAllRole();
		$data["alat_kalibrasi"] = $this->M_PemeliharaanKalibrasi->getID($id);
		$this->load->view("component/_editAlatKalibrasi", $data);
	}

	// Update User
	public function update_pemeliharaan()
	{
		$id = array(
			'id_alat' => $this->input->post('id_alat')
		);

		$data = array(
			'nama_alat'	      	    => $this->input->post('nama_alat'),
			'merk_alat'	 		    => $this->input->post('merk_alat'),
			'tipe_alat'     		=> $this->input->post('tipe_alat'),
			'noseri_alat'	        => $this->input->post('noseri_alat'),
			'lokasi_alat'	 	    => $this->input->post('lokasi_alat'),
			'tglpengadaan_alat'	    => $this->input->post('tglpengadaan_alat')
		);
		$this->M_PemeliharaanKalibrasi->updatedataalatkalibrasi($data, $id);
		$this->session->set_flashdata('notif', 'Data berhasil diupdate');
		redirect(base_url('pemeliharaankalibrasis'));
	}

	// Delete User akun
	public function delete_pemeliharaan($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->M_PemeliharaanKalibrasi->del_pemeliharaan($id)) {
			$this->session->set_flashdata('notif', 'Data berhasil dihapus');
			redirect(base_url('pemeliharaankalibrasis'));
		}
	}
}

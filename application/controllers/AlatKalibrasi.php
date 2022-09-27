<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AlatKalibrasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('All_model');
		$this->load->model('M_AlatKalibrasi');
		if ($this->All_model->isNotLogin()) redirect(site_url(''));
		$this->load->helper('url');
	}

	public function index()
	{
		$data["role"] = $this->All_model->getAllRole();
		$data["alat_kalibrasi"] = $this->M_AlatKalibrasi->getAllKalbirasi();
		$this->load->view("dashboard/alat_kalibrasi", $data);
	}

	// Get Save User
	public function save_alatkalibrasi()
	{
		$data = array(
			'nama_alat'	      	    => $this->input->post('nama_alat'),
			'merk_alat'	 		    => $this->input->post('merk_alat'),
			'tipe_alat'     		=> $this->input->post('tipe_alat'),
			'noseri_alat'	        => $this->input->post('noseri_alat'),
			'lokasi_alat'	 	    => $this->input->post('lokasi_alat'),
			'tglpengadaan_alat'	    => $this->input->post('tglpengadaan_alat')
		);
		$this->M_AlatKalibrasi->simpandatakalbirasi($data);
		$this->session->set_flashdata('notif', 'Data berhasil disimpan');
		redirect(base_url('alatKalibrasis'));
	}

	// Edit User
	public function edit_alatkalibrasi($id)
	{
		// $data["role"] = $this->All_model->getAllRole();
		$data["alat_kalibrasi"] = $this->M_AlatKalibrasi->getID($id);
		$this->load->view("component/_editAlatKalibrasi", $data);
	}

	// Update User
	public function update_alatkalibrasi()
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
		$this->M_AlatKalibrasi->updatedataalatkalibrasi($data, $id);
		$this->session->set_flashdata('notif', 'Data berhasil diupdate');
		redirect(base_url('alatKalibrasis'));
	}

	// Delete User akun
	public function delete_alatkalibrasi($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->M_AlatKalibrasi->del_alatkalibrasi($id)) {
			$this->session->set_flashdata('notif', 'Data berhasil dihapus');
			redirect(base_url('alatKalibrasis'));
		}
	}
}

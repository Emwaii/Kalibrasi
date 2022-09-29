<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Qrcode extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('All_model');
		$this->load->model('M_Qrcode');
		$this->load->model('M_Kalibrasi');
		if ($this->All_model->isNotLogin()) redirect(site_url(''));
		$this->load->helper('url');
	}

	public function index()
	{
		$data["role"] = $this->All_model->getAllRole();
		$data["qr"] = $this->M_Qrcode->getAlldata();
		$this->load->view("dashboard/qrcode", $data);
	}


	// Get Save User
	public function simpan_Qrcode()
	{
		$data = $this->input->post('text');
		$qr = $this->generate_qrcode($data);
		
		$this->M_Qrcode->simpanDataQr($qr);
		$this->session->set_flashdata('notif', 'Data berhasil disimpan');
		redirect(base_url('qrcode'));
	}

	// Edit User
	public function edit_alatkalibrasi($id)
	{
		// $data["role"] = $this->All_model->getAllRole();
		$data["kalibrasi"] = $this->M_Kalibrasi->getID($id);
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
		$this->M_Kalibrasi->updatedataalatkalibrasi($data, $id);
		$this->session->set_flashdata('notif', 'Data berhasil diupdate');
		redirect(base_url('kalibrasis'));
	}

	// Delete User akun
	public function delete_alatkalibrasi($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->M_Kalibrasi->del_alatkalibrasi($id)) {
			$this->session->set_flashdata('notif', 'Data berhasil dihapus');
			redirect(base_url('kalibrasis'));
		}
	}

	public function generate_qrcode($data)
	{
        /* Load QR Code Library */
        $this->load->library('ciqrcode');
        
        /* Data */
        $hex_data   = bin2hex($data);
        $save_name  = $hex_data.'.png';

        /* QR Code File Directory Initialize */
        $dir = 'upload/qrcode/';
        if (!file_exists($dir)) {
            mkdir($dir, 0775, true);
        }
        /* QR Configuration  */
        $config['cacheable']    = true;
        $config['imagedir']     = $dir;
        $config['quality']      = true;
        $config['size']         = '1024';
        $config['black']        = array(255,255,255);
        $config['white']        = array(255,255,255);
        $this->ciqrcode->initialize($config);
  
        /* QR Data  */
        $params['data']     = $data;
        $params['level']    = 'H';
        $params['size']     = 10;
        $params['savename'] = FCPATH.$config['imagedir']. $save_name;
        
        $this->ciqrcode->generate($params);

        /* Return Data */
        $return = array(
            'text' => $data,
            'file'    => $dir. $save_name
        );
        return $return;
    }
}

<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Qrcode extends CI_Model
{
    private $_table = "tes_qrcode";

    public function getAlldata()
    {
        return $this->db->get($this->_table)->result();
    }

    public function simpanDataQr($qr)
    {
        $this->db->insert($this->_table, $qr);
        return TRUE;
    }
    
    public function getID($id)
    {
        return $this->db->get_where($this->_table, ['id' => $id])->row();
    }

}

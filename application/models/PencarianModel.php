<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PencarianModel extends CI_Model {

    private $nama;
    private $fasilitas;

	public function set($jenis, $isi)
	{
		$this->$jenis    = $isi;
    }
    
    public function get()
    {
        $this->db->like('nama', $this->nama);
        return $this->db->get('tempat')->result_array();
    }
}

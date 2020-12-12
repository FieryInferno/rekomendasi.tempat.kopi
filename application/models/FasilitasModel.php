<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FasilitasModel extends CI_Model {

	public function set($jenis, $isi)
	{
		$this->$jenis    = $isi;
    }
    
    public function get()
    {
        return $this->db->get('fasilitas')->result_array();
    }
}

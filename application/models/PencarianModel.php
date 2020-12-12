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
        if ($this->nama) {
            $this->db->like('nama', $this->nama);
            $dataTempat = $this->db->get('tempat')->result_array();
        } else {
            $dataTempat = [];
        }
        if ($this->fasilitas) {
            $this->db->select('tempat.*');
            $this->db->join('tempat', 'fasilitasTempat.tempat = tempat.idTempat');
            $dataFasilitas  = $this->db->get_where('fasilitasTempat', [
                'fasilitas' => $this->fasilitas
            ])->result_array();
        } else {
            $dataFasilitas  = [];
        }
        return array_map("unserialize", array_unique(array_map("serialize", array_merge($dataTempat, $dataFasilitas))));
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TempatModel extends CI_Model {

    private $idTempat;

	public function set($jenis, $isi)
	{
		$this->$jenis    = $isi;
    }
    
    public function get()
    {
        $this->db->where('idTempat', $this->idTempat);
        $data   = $this->db->get('tempat')->row_array();
        $this->db->select('fasilitas.nama as namaFasilitas');
        $this->db->join('fasilitas', 'fasilitasTempat.fasilitas = fasilitas.idFasilitas');
        $data['fasilitas']  = $this->db->get_where('fasilitasTempat', [
            'tempat'    => $this->idTempat
        ])->result_array();
        return $data;
    }
}

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
            $dataTempat = $this->db->get('tempat_ngopi')->result_array();
            $dataTempat = $this->hitungRating($dataTempat);
        } else {
            $dataTempat = [];
        }
        if ($this->fasilitas) {
            $this->db->select('tempat_ngopi.*');
            $this->db->join('tempat_ngopi', 'fasilitasTempat.tempat = tempat_ngopi.id_tempat_ngopi');
            $dataFasilitas  = $this->db->get_where('fasilitasTempat', [
                'fasilitas' => $this->fasilitas
            ])->result_array();
            $dataFasilitas  = $this->hitungRating($dataFasilitas);
        } else {
            $dataFasilitas  = [];
        }
        $data   = array_map("unserialize", array_unique(array_map("serialize", array_merge($dataTempat, $dataFasilitas))));
        usort($data, [$this, 'ratingCompare']);
        return $data;
    }
	
	function ratingCompare($a, $b)
	{
        $t1 = $a['rating'];
		$t2 = $b['rating'];
		return $t2 > $t1;
	}   

    private function hitungRating($data)
    {
        for ($i=0; $i < count($data); $i++) { 
            $key        = $data[$i];
            $rating     = $this->db->get_where('rating', [
                'id_tempat_ngopi'   => $key['id_tempat_ngopi']
            ])->result_array();
            $totalRating    = 0;
            foreach ($rating as $key) {
                $totalRating    += (integer) $key['rating'];
            }
            $jumlah = count($rating);
            if (count($rating) == 0) $jumlah = 1;
            $data[$i]['rating'] = $totalRating/$jumlah;
        }
        return $data;
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TempatModel extends CI_Model {

    private $idTempat;
    private $harga;
    private $nama;
    private $alamat;
    private $fasillitas;
    private $oldFoto;

	public function set($jenis, $isi)
	{
		$this->$jenis    = $isi;
    }
    
    public function get()
    {
        if ($this->idTempat) {
            $this->db->where('id_tempat_ngopi', $this->idTempat);
        }
        if ($this->idTempat) {
            $data   = $this->db->get('tempat_ngopi')->row_array();
            $this->db->select('fasilitas.nama as namaFasilitas');
            $this->db->join('fasilitas', 'fasilitasTempat.fasilitas = fasilitas.idFasilitas');
            $data['fasilitas']  = $this->db->get_where('fasilitasTempat', [
                'tempat'    => $this->idTempat
            ])->result_array();
            $rating = $this->db->get_where('rating', [
                'id_tempat_ngopi'   => $data['id_tempat_ngopi']
            ])->result_array();
            $totalRating    = 0;
            foreach ($rating as $key) {
                $totalRating    += (integer) $key['rating'];
            }
            $data['rating'] = $totalRating/count($rating);
        } else {
            $data   = $this->db->get('tempat_ngopi')->result_array();
            for ($i=0; $i < count($data); $i++) { 
                $key    = $data[$i];
                $this->db->select('fasilitas.nama as namaFasilitas');
                $this->db->join('fasilitas', 'fasilitasTempat.fasilitas = fasilitas.idFasilitas');
                $data[$i]['fasilitas']  = $this->db->get_where('fasilitasTempat', [
                    'tempat'    => $key['id_tempat_ngopi']
                ])->result_array();
                $rating = $this->db->get_where('rating', [
                    'id_tempat_ngopi'   => $key['id_tempat_ngopi']
                ])->result_array();
                $totalRating    = 0;
                foreach ($rating as $key) {
                    $totalRating    += (integer) $key['rating'];
                }
                $data[$i]['rating'] = $totalRating/count($rating);
            }
        }
        return $data;
    }

    public function edit()
    {
        if (!empty($_FILES['foto']['name'])) {
            $foto   = $this->upload();
            $path   = 'assets/images/' . $this->oldFoto;
            unlink($path);
        } else {
            $foto   = $this->oldFoto;
        }
        $this->db->where('id_tempat_ngopi', $this->idTempat);
        $data   = $this->db->update('tempat_ngopi', [
            'nama'      => $this->nama,
            'alamat'    => $this->alamat,
            'foto'      => $foto
        ]);
        $this->db->where('tempat', $this->idTempat);
        $this->db->delete('fasilitasTempat');
        foreach ($this->fasilitas as $key) {
            $this->db->insert('fasilitasTempat', [
                'tempat'    => $this->idTempat,
                'fasilitas' => $key
            ]);
        }
        return $data;
    }

    public function upload()
    {
        $config['upload_path']      = './assets/images/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = 2000;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            return '';
        } else {
            return $this->upload->data('file_name');
        }
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RatingModel extends CI_Model {

    private $idUser;
    private $idTempatNgopi;

    public function set($jenis, $isi)
    {
        $this->$jenis   = $isi;
    }
    
    public function get()
    {
        $data   = $this->db->get_where('rating', [
            'id_user'           => $this->idUser,
            'id_tempat_ngopi'   => $this->idTempatNgopi
        ])->result_array();
        if ($data) {
            $rating = 0;
            foreach ($data as $key) {
                $rating += (int) $key['rating'];
            }
            return $rating;
        } else {
            return FALSE;
        }
    }

    public function getByUser()
    {
        return $this->db->get_where('rating', [
            'id_user'   => $this->idUser
        ])->row_array();
    }
}

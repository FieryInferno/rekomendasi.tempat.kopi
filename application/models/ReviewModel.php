<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReviewModel extends CI_Model {

    private $judul;
    private $review;
    private $tanggalPergi;
    private $harga;
    private $idTempat;
    private $rating;

	public function set($jenis, $isi)
	{
		$this->$jenis    = $isi;
    }
    
    public function insert()
    {
        $idReview   = uniqid('review_');
        $data   = $this->db->insert('review', [
            'id_review'         => $idReview,
            'id_tempat_ngopi'   => $this->idTempat,
            'tgl_pergi'         => $this->tanggalPergi,
            'judul'             => $this->judul,
            'review_pengguna'   => $this->review,
            'harga'             => $this->harga,
            'foto'              => $idImage
        ]);
        $this->db->insert('rating', [
            'id_user'           => $this->session->idUser,
            'id_tempat_ngopi'   => $this->idTempat,
            'id_review'         => $idReview,
            'rating'            => $this->rating
        ]);
        $config['upload_path']      = './assets/images/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = 2000;
        $this->load->library('upload', $config);
        for ($i=0; $i < count($_FILES['foto']); $i++) { 
            if (!empty($_FILES['foto']['name'][$i])) {
                $_FILES['file']['name']     = $_FILES['foto']['name'][$i];
				$_FILES['file']['type']     = $_FILES['foto']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['foto']['tmp_name'][$i];
				$_FILES['file']['error']    = $_FILES['foto']['error'][$i];
				$_FILES['file']['size']     = $_FILES['foto']['size'][$i];
                $foto       = $this->upload();
                $idImage    = uniqid('image_');
                $this->db->insert('image', [
                    'id_image'          => $idImage,
                    'id_tempat_ngopi'   => $this->idTempat,
                    'foto'              => $foto,
                    'id_review'         => '1'
                ]);
            } else {
                $idImage    = NULL;
            }
        }
        return $data;
    }

    public function upload()
    {
        if (!$this->upload->do_upload('file')) {
            return '';
        } else {
            return $this->upload->data('file_name');
        }
    }

    public function get()
    {
        $this->db->select('review.judul, rating.rating, review.review_pengguna, review.id_review');
        $this->db->join('rating', 'review.id_review = rating.id_review');
        $data   = $this->db->get_where('review', [
            'review.id_tempat_ngopi'   => $this->idTempat
        ])->result_array();
        for ($i=0; $i < count($data); $i++) { 
            $key                = $data[$i];
            $data[$i]['foto']   = $this->db->get_where('image', [
                'id_review' => $key['id_review']
            ])->result_array();
        }
        return $data;
    }
}

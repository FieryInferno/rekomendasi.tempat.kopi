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
        if (!empty($_FILES['foto']['name'])) {
            $foto       = $this->upload();
            $idImage    = uniqid('image_');
            $this->db->insert('image', [
                'id_image'          => $idImage,
                'id_tempat_ngopi'   => $this->idTempat,
                'foto'              => $foto
            ]);
        } else {
            $idImage    = NULL;
        }
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

    public function get()
    {
        $this->db->select('image.foto, review.judul, rating.rating, review.review_pengguna');
        $this->db->join('image', 'review.foto = image.id_image', 'left');
        $this->db->join('rating', 'review.id_review = rating.id_review');
        return $this->db->get_where('review', [
            'review.id_tempat_ngopi'   => $this->idTempat
        ])->result_array();
    }
}

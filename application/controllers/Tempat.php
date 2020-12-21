<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tempat extends CI_Controller {

    private $judul;
    private $review;
    private $tanggalPergi;
    private $harga;
    private $rating;
    
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->level) {
            redirect('login');
        }
        $this->judul        = $this->input->post('judul');
        $this->review       = $this->input->post('review');
        $this->tanggalPergi = $this->input->post('tanggalPergi');
        $this->harga        = $this->input->post('harga');
        $this->rating       = $this->input->post('rating');
    }

	public function detail($idTempat)
	{
        $this->TempatModel->set('idTempat', $idTempat);
        $data = $this->TempatModel->get();
        $data['title']  = 'Detail Tempat Ngopi';
        $this->parser->parse('user/detail', $data);
    }

    public function review($idTempat)
    {
        $this->ReviewModel->set('idTempat', $idTempat);
        if ($this->input->post()) {
            $this->validation();
            if ($this->form_validation->run()) {
                $this->ReviewModel->set('idTempat', $idTempat);
                $this->ReviewModel->set('judul', $this->judul);
                $this->ReviewModel->set('review', $this->review);
                $this->ReviewModel->set('tanggalPergi', $this->tanggalPergi);
                $this->ReviewModel->set('harga', $this->harga);
                $this->ReviewModel->set('rating', $this->rating);
                $data   = $this->ReviewModel->insert();
                if ($data) {
                    $this->session->set_flashdata('pesan',
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Sukses!</strong> Review berhasil disubmit
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    ');
                } else {
                    $this->session->set_flashdata('pesan',
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Gagal!</strong> Review gagal disubmit
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    ');
                }
                redirect('review/' . $idTempat);
            } else {
                $this->session->set_flashdata('pesan', '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Gagal!</strong> ' . validation_errors() . '
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                ');
            }
        }
        $this->TempatModel->set('idTempat', $idTempat);
        $data               = $this->TempatModel->get();
        $data['title']      = 'Review Tempat Ngopi';
        $data['fasilitas']  = $this->FasilitasModel->get();
        $data['review']     = $this->ReviewModel->get();
        $this->parser->parse('user/review', $data);
    }

    public function validation()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
		$this->form_validation->set_rules('review', 'Review', 'required|trim');
		$this->form_validation->set_rules('tanggalPergi', 'Tanggal Pergi', 'required');
		$this->form_validation->set_rules('harga', 'Harga Per Orang', 'required');
    }

    public function edit($idTempat)
    {
        $this->TempatModel->set('idTempat', $idTempat);
        $data                   = $this->TempatModel->get();
        $data['title']          = 'Edit Tempat Ngopi';
        $data['fasilitas']      = $this->FasilitasModel->get();
        // print_r($data);die();
        $this->parser->parse('admin/edit_tempat', $data);
    }
}

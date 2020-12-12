<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pencarian extends CI_Controller {

    private $nama;
    private $fasilitas;
    
    public function __construct()
    {
        parent::__construct();
        if ($this->session->level) {
            if ($this->session->level !== 'user') {
                redirect(base_url());
            }
        } else {
            redirect('login');
        }
        $this->nama         = $this->input->get('nama');
        $this->fasilitas    = $this->input->get('fasilitas');
    }

	public function index()
	{
        if ($this->input->get()) {
            $this->PencarianModel->set('nama', $this->nama);
            $this->PencarianModel->set('fasilitas', $this->fasilitas);
            $data   = $this->PencarianModel->get();
            if ($data) {
                $data['pencarian']  = $data;
                $data['title']      = 'Pencarian Tempat Ngopi';
                $this->parser->parse('user/pencarian', $data);
            } else {
                $data['pencarian']  = null;
                $data['title']      = 'Pencarian Tempat Ngopi';
                $this->parser->parse('user/pencarian', $data);
            }
        } else {
            $data['pencarian']  = null;
            $data['title']      = 'Pencarian Tempat Ngopi';
            $this->parser->parse('user/pencarian', $data);
        }
    }
}

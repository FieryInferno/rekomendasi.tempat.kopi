<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        if ($this->session->level) {
            if ($this->session->level !== 'admin') {
                redirect(base_url());
            }
        } else {
            redirect('login');
        }
    }

	public function index()
	{
        $data['title']          = 'Rekomendasi Tempat Ngopi';
        $data['tempatNgopi']    = $this->TempatModel->get();
        $data['fasilitas']      = $this->FasilitasModel->get();
        // print_r($data['tempatNgopi']);die();
        $this->parser->parse('admin/admin', $data);
    }
}

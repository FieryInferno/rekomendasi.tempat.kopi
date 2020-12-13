<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tempat extends CI_Controller {
    
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
    }

	public function detail($idTempat)
	{
        $this->TempatModel->set('idTempat', $idTempat);
        $data = $this->TempatModel->get();
        $data['title']  = 'Detail Tempat Ngopi';
        $this->parser->parse('user/detail', $data);
    }
}

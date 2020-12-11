<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
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

	public function index()
	{
        $data['title']  = 'Rekomendasi Tempat Ngopi';
		$this->load->view('user/user', $data);
	}
}

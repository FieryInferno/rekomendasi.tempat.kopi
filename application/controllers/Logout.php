<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->level) {
            redirect('login');
        }
        $this->username = $this->input->post('username');
        $this->password = $this->input->post('pass');
    }
    
	public function index()
	{
        $this->session->sess_destroy();
        redirect('login');
    }
}

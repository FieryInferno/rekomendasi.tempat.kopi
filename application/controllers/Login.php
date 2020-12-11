<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public $username;
    private $password;

    public function __construct()
    {
        parent::__construct();
        if ($this->session->level) {
            switch ($this->session->level) {
                case 'admin':
                    redirect('admin');
                    break;
                case 'user':
                    redirect('user');
                    break;
                
                default:
                    # code...
                    break;
            }
        }
        $this->username = $this->input->post('username');
        $this->password = $this->input->post('pass');
    }
    
	public function index()
	{
        if ($this->username && $this->password) {
            $this->validation();
            if ($this->form_validation->run()) {
                $this->LoginModel->set('username', $this->username);
                $this->LoginModel->set('password', $this->password);
                $data   = $this->LoginModel->get();
                if ($data) {
                    $this->session->set_userdata([
                        'username'  => $data['username'],
                        'level'     => $data['level']
                    ]);
                    switch ($data['level']) {
                        case 'admin':
                            redirect('admin');
                            break;
                        case 'user':
                            redirect('user');
                            break;
                        default:
                            # code...
                            break;
                    }
                } else {
                    $this->session->set_flashdata('pesan',
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Gagal!</strong> Username atau Password Salah.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    ');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('pesan', '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Gagal!</strong> ' . validation_errors() . '
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                ');
                redirect('login');
            }
        } else {
            $this->load->view('login');
        }
    }
    
    public function validation()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('pass', 'password', 'required|trim');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}

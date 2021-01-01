<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    private $username;
    private $password;
    private $emailUser;
    private $token;

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
        $this->username     = $this->input->post('username');
        $this->password     = $this->input->post('pass');
        $this->emailUser    = $this->input->post('email');
        $this->token        = $this->input->post('token');
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
                        'level'     => $data['level'],
                        'idUser'    => $data['id_user']
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

    public function lupaPassword()
    {
        if ($this->input->post()) {
            $this->UserModel->set('emailUser', $this->emailUser);
            $data   = $this->UserModel->getByEmail();
            if ($data) {
                $config = [
                    'mailtype'      => 'html',
                    'charset'       => 'utf-8',
                    'protocol'      => 'smtp',
                    'smtp_host'     => 'smtp.gmail.com',
                    'smtp_user'     => 'fieryinferno33@gmail.com',  // Email gmail
                    'smtp_pass'     => 'NaonWeAh00',  // Password gmail
                    'smtp_crypto'   => 'ssl',
                    'smtp_port'     => 465,
                    'crlf'          => "\r\n",
                    'newline'       => "\r\n"
                ];
                $this->email->initialize($config);
                $this->email->from('fieryinferno33@gmail.com', 'Rekomendasi Tempat Ngopi');
                $this->email->to($data['email']);
                $this->email->subject('Reset Password');
                $token  = md5(uniqid());
                $this->email->message(base_url() . 'ganti_password?token=' . $token);
                $result = $this->email->send();
                if ($result) {
                    $this->db->where('id_user', $data['id_user']);
                    $this->db->update('users', [
                        'token' => $token
                    ]);
                    $this->session->set_flashdata('pesan',
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Sukses!</strong> Email berhasil dikirim
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    ');
                }
            } else {
                $this->session->set_flashdata('pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Gagal!</strong> email tidak terdaftar.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                ');
            }
            redirect('lupaPassword');
        }
        $data['title']  = 'Lupa Password';
        $this->parser->parse('lupaPassword', $data);
    }

    public function gantiPassword()
    {
        if ($this->password) {
            $this->validationGantiPassword();
            if ($this->form_validation->run()) {
                $this->db->where('token', $this->token);
                $this->db->update('users', [
                    'password'  => password_hash($this->password, PASSWORD_DEFAULT),
                    'token'     => NULL
                ]);
                $this->session->set_flashdata('pesan', '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Sukses!</strong> Password berhasil diganti
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                ');
                redirect('login');
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
        $data['title']  = 'Ganti Password';
        $data['token']  = $this->input->get('token');
        $this->parser->parse('gantiPassword', $data);
    }

    public function validationGantiPassword()
    {
		$this->form_validation->set_rules('pass', 'Password', 'required');
		$this->form_validation->set_rules('konfirmasiPassword', 'Konfirmasi Password', 'required|matches[pass]');
    }
}

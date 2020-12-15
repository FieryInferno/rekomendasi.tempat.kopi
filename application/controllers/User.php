<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    private $username;
    private $nama;
    private $password;
    private $jenisKelamin;
    private $pekerjaan;
    private $tanggalLahir;
    private $emailUser;
    
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
        $this->username     = $this->input->post('username');
        $this->nama         = $this->input->post('nama');
        $this->password     = $this->input->post('password');
        $this->jenisKelamin = $this->input->post('jenisKelamin');
        $this->pekerjaan    = $this->input->post('pekerjaan');
        $this->tanggalLahir = $this->input->post('tanggalLahir');
        $this->email        = $this->input->post('email');
    }

	public function index()
	{
        $data['title']          = 'Rekomendasi Tempat Ngopi';
        $data['tempatNgopi']    = $this->TempatModel->get();
        $this->parser->parse('user/user', $data);
    }
    
    public function editProfile()
    {
        if ($this->input->post()) {
            $this->validation();
            if ($this->form_validation->run()) {
                $this->UserModel->set('username', $this->username);
                $this->UserModel->set('nama', $this->nama);
                $this->UserModel->set('password', $this->password);
                $this->UserModel->set('jenisKelamin', $this->jenisKelamin);
                $this->UserModel->set('pekerjaan', $this->pekerjaan);
                $this->UserModel->set('tanggalLahir', $this->tanggalLahir);
                $this->UserModel->set('email', $this->email);
                $data   = $this->UserModel->edit();
                if ($data) {
                    $this->session->set_flashdata('pesan',
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Sukses!</strong> Data Berhasil Diedit.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    ');
                    redirect('editProfile');
                } else {
                    $this->session->set_flashdata('pesan',
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Gagal!</strong> Proses Edit Gagal.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    ');
                    $this->parser->parse('user/editProfile', $data);
                }
            } else {
                $this->UserModel->set('idUser', $this->session->idUser);
                $data           = $this->UserModel->get();
                $data['title']  = 'Edit Profile';
                $this->session->set_flashdata('pesan', '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Gagal!</strong> ' . validation_errors() . '
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                ');
                $this->parser->parse('user/editProfile', $data);
            }
        } else {
            $this->UserModel->set('idUser', $this->session->idUser);
            $data           = $this->UserModel->get();
            $data['title']  = 'Edit Profile';
            $this->parser->parse('user/editProfile', $data);
        }
    }
    
    public function validation()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('jenisKelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
		$this->form_validation->set_rules('tanggalLahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    }
}

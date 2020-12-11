<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

    private $username;
    private $nama;
    private $password;
    private $jenisKelamin;
    private $pekerjaan;
    private $tanggalLahir;
    private $email;

    public function __construct()
    {
        parent::__construct();
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
        if ($this->input->post()) {
            $this->validation();
            if ($this->form_validation->run()) {
                $this->DaftarModel->set('username', $this->input->post('username'));
                $this->DaftarModel->set('nama', $this->nama);
                $this->DaftarModel->set('password', $this->password);
                $this->DaftarModel->set('jenisKelamin', $this->jenisKelamin);
                $this->DaftarModel->set('pekerjaan', $this->pekerjaan);
                $this->DaftarModel->set('tanggalLahir', $this->tanggalLahir);
                $this->DaftarModel->set('email', $this->email);
                $data   = $this->DaftarModel->daftar();
                if ($data) {
                    $this->session->set_flashdata('pesan',
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Sukses!</strong> Daftar Berhasil.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    ');
                    redirect('login');
                } else {
                    $this->session->set_flashdata('pesan',
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Gagal!</strong> Proses Daftar Gagal.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    ');
                    redirect('daftar');
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
                $this->load->view('daftar');
            }
        } else {
            $this->load->view('daftar');
        }
    }
    
    public function validation()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('konfirmasiPassword', 'Konfirmasi Password', 'required|matches[password]');
		$this->form_validation->set_rules('jenisKelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
		$this->form_validation->set_rules('tanggalLahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    }
}

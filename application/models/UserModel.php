<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    private $idUser;

	public function set($jenis, $isi)
	{
		$this->$jenis    = $isi;
    }
    
    public function get()
    {
        return $this->db->get_where('users', [
            'idUser'  => $this->idUser
        ])->row_array();
    }

    public function edit()
    {
        $foto   = $this->upload();
        $this->db->where('idUser', $this->session->idUser);
        return $this->db->update('users', [
            'username'      => $this->username,
            'nama'          => $this->nama,
            'password'      => password_hash($this->password, PASSWORD_DEFAULT),
            'jenisKelamin'  => $this->jenisKelamin,
            'pekerjaan'     => $this->pekerjaan,
            'tanggalLahir'  => $this->tanggalLahir,
            'email'         => $this->email,
            'level'         => 'user',
            'foto'          => $foto
        ]);
    }

    public function upload()
    {
        $config['upload_path']      = './assets/images/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = 2000;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            return '';
        } else {
            return $this->upload->data('file_name');
        }
    }
}

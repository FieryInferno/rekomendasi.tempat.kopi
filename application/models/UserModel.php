<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    private $idUser;
    private $emailUser;

	public function set($jenis, $isi)
	{
		$this->$jenis    = $isi;
    }
    
    public function get()
    {
        return $this->db->get_where('users', [
            'id_user'  => $this->idUser
        ])->row_array();
    }

    public function edit()
    {
        if (!empty($_FILES['foto']['name'])) {
            $foto   = $this->upload();
            $path   = 'assets/images/' . $this->input->post('gambarLama');
            unlink($path);
        } else {
            $foto   = $this->input->post('gambarLama');
        }
        $data   = [
            'username'      => $this->username,
            'nama'          => $this->nama,
            'jenisKelamin'  => $this->jenisKelamin,
            'pekerjaan'     => $this->pekerjaan,
            'tanggalLahir'  => $this->tanggalLahir,
            'email'         => $this->emailUser,
            'level'         => 'user',
            'foto'          => $foto
        ];
        if ($this->password) {
            $data['password']   = password_hash($this->password, PASSWORD_DEFAULT);
        }
        $this->db->where('id_user', $this->session->idUser);
        return $this->db->update('users', $data);
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

    public function getByEmail()
    {
        return $this->db->get_where('users', [
            'email' => $this->emailUser
        ])->row_array();
    }
}

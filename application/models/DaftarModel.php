<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DaftarModel extends CI_Model {

    private $username;
    private $nama;
    private $password;
    private $jenisKelamin;
    private $pekerjaan;
    private $tanggalLahir;
    private $email;

	public function set($jenis, $isi)
	{
		$this->$jenis    = $isi;
    }
    
    public function daftar()
    {
        return $this->db->insert('users', [
            'username'      => $this->username,
            'nama'          => $this->nama,
            'password'      => password_hash($this->password, PASSWORD_DEFAULT),
            'jenisKelamin'  => $this->jenisKelamin,
            'pekerjaan'     => $this->pekerjaan,
            'tanggalLahir'  => $this->tanggalLahir,
            'email'         => $this->email,
            'level'         => 'user'
        ]);
    }
}

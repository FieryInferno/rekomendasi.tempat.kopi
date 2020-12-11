<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {

    private $username;
    private $password;

	public function set($jenis, $isi)
	{
		$this->$jenis    = $isi;
    }
    
    public function get()
    {
        $data   = $this->db->get_where('users', [
            'username'  => $this->username
        ])->row_array();
        if ($data) {
            if (password_verify($this->password, $data['password'])) {
                return $data;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }
}

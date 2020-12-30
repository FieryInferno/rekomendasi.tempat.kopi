<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pencarian extends CI_Controller {

    private $nama;
    private $fasilitas;
    
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->level) {
            redirect('login');
        }
        $this->nama         = $this->input->get('nama');
        $this->fasilitas    = $this->input->get('fasilitas');
    }

	public function index()
	{
        if ($this->input->get()) {
            $config['base_url']         = base_url() . 'pencarian/index';
            $config['per_page']         = 6;
            $from                       = $this->uri->segment(3);
            $this->PencarianModel->set('nama', $this->nama);
            $this->PencarianModel->set('fasilitas', $this->fasilitas);
            $data                       = $this->PencarianModel->get();
            $config['total_rows']       = count($data);
            $config['first_link']       = 'First';
            $config['last_link']        = 'Last';
            $config['next_link']        = 'Next';
            $config['prev_link']        = 'Prev';
            $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
            $config['full_tag_close']   = '</ul></nav></div>';
            $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
            $config['num_tag_close']    = '</span></li>';
            $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
            $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
            $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
            $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['prev_tagl_close']  = '</span>Next</li>';
            $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
            $config['first_tagl_close'] = '</span></li>';
            $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['last_tagl_close']  = '</span></li>';
            $config['reuse_query_string'] = TRUE;
            $this->pagination->initialize($config);
            if ($data) {
                $data['pencarian']      = array_slice($data, $from, $config['per_page']);
            } else {
                $data['pencarian']  = null;
            }
        } else {
            $data['pencarian']  = null;
        }
        $data['title']      = 'Pencarian Tempat Ngopi';
        $data['fasilitas']  = $this->FasilitasModel->get();
        $this->parser->parse('user/pencarian', $data);
    }
}

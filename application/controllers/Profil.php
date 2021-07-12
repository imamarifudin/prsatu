<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        if ($this->session->userdata('email')) {
            if ($this->session->userdata('role_id') == 1) {
                redirect('admin');
            } else {
                redirect('user');
            }
        }

        $datacontent['url'] = 'profil';
		$datacontent['title'] = '';
		$data['content'] = $this->load->view('profilView', $datacontent, TRUE);
		$data['title'] = 'Profil PDAM Tirta Patriot  | GIS PBB';
		$this->load->view('layouts/website/html', $data);
    }
}

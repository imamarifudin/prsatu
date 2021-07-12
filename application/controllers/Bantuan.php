<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bantuan extends CI_Controller
{

    
    public function index()
    {
        if ($this->session->userdata('email')) {
            if ($this->session->userdata('role_id') == 1) {
                redirect('admin');
            } else {
                redirect('user');
            }
        }
        // $data['title'] = 'Bantuan Terhadap Penggunaan Peta | GIS PBB';
        // $this->load->view('layouts/admin/auth_header', $data);
        // $this->load->view('bantuanView');
        // $this->load->view('layouts/admin/auth_footer');
        // $this->load->helper('url'); // Load URL Helper for base_url() 
    
        $datacontent['url'] = 'bantuan';
		$datacontent['title'] = '';
		$data['content'] = $this->load->view('bantuanView', $datacontent, TRUE);
		$data['title'] = 'Bantuan Terhadap Penggunaan Peta | GIS PBB';
		$this->load->view('layouts/website/html', $data);
    }
}

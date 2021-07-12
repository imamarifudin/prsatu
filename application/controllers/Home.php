<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('AirModel');
        $this->load->model('KecamatanModel');
		$this->load->model('DesaModel');
		$this->load->model('BlokModel');
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

        $datacontent['url'] = 'home';
        $datacontent['title'] = '';
        $data['content'] = $this->load->view('homeView', $datacontent, TRUE);
        $data['js'] = $this->load->view('peta/js/mapHomeJs', $datacontent, TRUE);
        $data['title'] = 'GIS PBB';
        $this->load->view('layouts/website/html', $data);
    }
	
	public function DesaPeta()
    {
        if ($this->session->userdata('email')) {
            if ($this->session->userdata('role_id') == 1) {
                redirect('admin');
            } else {
                redirect('user');
            }
        }

        $datacontent['url'] = 'desakel';
        $datacontent['title'] = '';
        $data['content'] = $this->load->view('homeView', $datacontent, TRUE);
        $data['js'] = $this->load->view('peta/js/mapDesaJs', $datacontent, TRUE);
        $data['title'] = 'GIS PBB';
		$data['data']		= $this->DesaModel->getbyid($this->input->get('iddesa'))->result();
        $this->load->view('layouts/website/html', $data);
    }
	public function BlokBng()
    {
        if ($this->session->userdata('email')) {
            if ($this->session->userdata('role_id') == 1) {
                redirect('admin');
            } else {
                redirect('user');
            }
        }

        $datacontent['url'] = 'blokbng';
        $datacontent['title'] = '';
        $data['content'] = $this->load->view('homeView', $datacontent, TRUE);
        $data['js'] = $this->load->view('peta/js/mapBlokBngJs', $datacontent, TRUE);
        $data['title'] = 'GIS PBB';
		$data['data']		= $this->BlokModel->getbyid($this->input->get('id_blok'))->result();
        $this->load->view('layouts/website/html', $data);
    }
	public function Bng()
    {
        if ($this->session->userdata('email')) {
            if ($this->session->userdata('role_id') == 1) {
                redirect('admin');
            } else {
                redirect('user');
            }
        }

        $datacontent['url'] = 'bng';
        $datacontent['title'] = '';
        $data['content'] = $this->load->view('homeView', $datacontent, TRUE);
        $data['js'] = $this->load->view('peta/js/mapBng', $datacontent, TRUE);
        $data['title'] = 'GIS PBB';
		$data['data']		= $this->BlokModel->getbyid($this->input->get('id_blok'))->result();
        $this->load->view('layouts/website/html', $data);
    }
	
}

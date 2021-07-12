<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peta extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('AirModel');
		$this->load->model('KecamatanModel');
	}

	public function index()
	{
		$datacontent['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$datacontent['url'] = 'air';
		$datacontent['title'] = 'Peta';
		// $datacontent['datatable']=$this->Model->get();
		$data['content'] = $this->load->view('peta/mapView', $datacontent, TRUE);
		$data['js'] = $this->load->view('peta/js/mapJs', $datacontent, TRUE);
		$data['title'] = 'Halaman Peta | GIS PBB';
		$this->load->view('layouts/admin/html', $data);
	}
}

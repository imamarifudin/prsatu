<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blok extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('BlokModel', 'Model');
	}

	public function index()
	{
		$datacontent['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$datacontent['url'] = 'blok';
		$datacontent['title'] = 'Data Blok';
		$datacontent['datatable'] = $this->Model->get();
		$data['content'] = $this->load->view('blok/tableView', $datacontent, TRUE);
		$data['title'] = 'Halaman Data Blok | GIS PBB';
		$this->load->view('layouts/admin/html', $data);
	}
	public function form($parameter = '', $id = '')
	{
		$datacontent['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$datacontent['url'] = 'blok';
		$datacontent['parameter'] = $parameter;
		$datacontent['id'] = $id;
		$datacontent['title'] = 'Form Blok';
		$data['content'] = $this->load->view('blok/formView', $datacontent, TRUE);
		$data['title'] = 'Halaman Form Blok | GIS PBB';
		$this->load->view('layouts/admin/html', $data);
	}
	public function simpan()
	{
		if ($this->input->post()) {
			$data = [
				'kd_blok' => $this->input->post('kd_blok'),
				'nm_blok' => $this->input->post('nm_blok'),
				'warna_blok' => $this->input->post('warna_blok'),
			];
			// upload
			if ($_FILES['geojson_blok']['name'] != '') {
				$upload = upload('geojson_blok', 'geojson', 'geojson');
				if ($upload['info'] == true) {
					$data['geojson_blok'] = $upload['upload_data']['file_name'];
				} elseif ($upload['info'] == false) {
					$info = '<div class="alert alert-danger alert-dismissible">
	            		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            		<h4><i class="icon fa fa-ban"></i> Error!</h4> ' . $upload['message'] . ' </div>';
					$this->session->set_flashdata('info', $info);
					redirect('blok');
					exit();
				}
			}
			// upload
			if ($_POST['parameter'] == "tambah") {
				$this->Model->insert($data);
			} else {
				$this->Model->update($data, ['id_blok' => $this->input->post('id_blok')]);
			}
		}
		redirect('blok');
	}

	public function hapus($id = '')
	{
		// hapus file di dalam folder
		$this->db->where('id_blok', $id);
		$get = $this->Model->get()->row();
		$geojson_blok = $get->geojson_blok;
		unlink('assets/unggah/geojson/' . $geojson_blok);
		// end hapus file di dalam folder
		$this->Model->delete(["id_blok" => $id]);
		redirect('blok');
	}
}

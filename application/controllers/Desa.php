<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Desa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('DesaModel', 'Model');
	}

	public function index()
	{
		$datacontent['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$datacontent['url'] = 'desa';
		$datacontent['title'] = 'Data Desa';
		$datacontent['datatable'] = $this->Model->get();
		$data['content'] = $this->load->view('desa/tableView', $datacontent, TRUE);
		$data['title'] = 'Halaman Data Desa | GIS PBB';
		$this->load->view('layouts/admin/html', $data);
	}
	public function form($parameter = '', $id = '')
	{
		$datacontent['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$datacontent['url'] = 'desa';
		$datacontent['parameter'] = $parameter;
		$datacontent['id'] = $id;
		$datacontent['title'] = 'Form Desa';
		$data['content'] = $this->load->view('desa/formView', $datacontent, TRUE);
		$data['title'] = 'Halaman Form Desa | GIS PBB';
		$this->load->view('layouts/admin/html', $data);
	}
	public function simpan()
	{
		if ($this->input->post()) {
			$data = [
				'kd_desa' => $this->input->post('kd_desa'),
				'nm_desa' => $this->input->post('nm_desa'),
				'warna_desa' => $this->input->post('warna_desa'),
			];
			// upload
			if ($_FILES['geojson_desa']['name'] != '') {
				$upload = upload('geojson_desa', 'geojson', 'geojson');
				if ($upload['info'] == true) {
					$data['geojson_desa'] = $upload['upload_data']['file_name'];
				} elseif ($upload['info'] == false) {
					$info = '<div class="alert alert-danger alert-dismissible">
	            		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            		<h4><i class="icon fa fa-ban"></i> Error!</h4> ' . $upload['message'] . ' </div>';
					$this->session->set_flashdata('info', $info);
					redirect('desa');
					exit();
				}
			}
			// upload
			if ($_POST['parameter'] == "tambah") {
				$this->Model->insert($data);
			} else {
				$this->Model->update($data, ['id_desa' => $this->input->post('id_desa')]);
			}
		}
		redirect('desa');
	}

	public function hapus($id = '')
	{
		// hapus file di dalam folder
		$this->db->where('id_desa', $id);
		$get = $this->Model->get()->row();
		$geojson_desa = $get->geojson_desa;
		unlink('assets/unggah/geojson/' . $geojson_desa);
		// end hapus file di dalam folder
		$this->Model->delete(["id_desa" => $id]);
		redirect('desa');
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bangunan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('BangunanModel', 'Model');
	}

	public function index()
	{
		$datacontent['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$datacontent['url'] = 'bangunan';
		$datacontent['title'] = 'Data Bangunan';
		$datacontent['datatable'] = $this->Model->get();
		$data['content'] = $this->load->view('bangunan/tableView', $datacontent, TRUE);
		
		$data['title'] = 'Halaman Data Bangunan | GIS PBB';
		$this->load->view('layouts/admin/html', $data);
	}
	public function form($parameter = '', $id = '')
	{
		$datacontent['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$datacontent['url'] = 'bangunan';
		$datacontent['parameter'] = $parameter;
		$datacontent['id'] = $id;
		$datacontent['title'] = 'Form Bangunan';
		$data['content'] = $this->load->view('bangunan/formView', $datacontent, TRUE);
		$data['title'] = 'Halaman Form Bangunan | GIS PBB';
		$this->load->view('layouts/admin/html', $data);
	}
	public function simpan()
	{
		if ($this->input->post()) {
			$data = [
				'kd_bangunan' => $this->input->post('kd_bangunan'),
				'nm_bangunan' => $this->input->post('nm_bangunan'),
				'warna_bangunan' => $this->input->post('warna_bangunan'),
			];
			// upload
			if ($_FILES['geojson_bangunan']['name'] != '') {
				$upload = upload('geojson_bangunan', 'geojson', 'geojson');
				if ($upload['info'] == true) {
					$data['geojson_bangunan'] = $upload['upload_data']['file_name'];
				} elseif ($upload['info'] == false) {
					$info = '<div class="alert alert-danger alert-dismissible">
	            		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            		<h4><i class="icon fa fa-ban"></i> Error!</h4> ' . $upload['message'] . ' </div>';
					$this->session->set_flashdata('info', $info);
					redirect('bangunan');
					exit();
				}
			}
			// upload
			if ($_POST['parameter'] == "tambah") {
				$this->Model->insert($data);
			} else {
				$this->Model->update($data, ['id_bangunan' => $this->input->post('id_bangunan')]);
			}
		}
		redirect('bangunan');
	}

	public function hapus($id = '')
	{
		// hapus file di dalam folder
		$this->db->where('id_bangunan', $id);
		$get = $this->Model->get()->row();
		$geojson_bangunan = $get->geojson_bangunan;
		unlink('assets/unggah/geojson/' . $geojson_bangunan);
		// end hapus file di dalam folder
		$this->Model->delete(["id_bangunan" => $id]);
		redirect('bangunan');
	}
}

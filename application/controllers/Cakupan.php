<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cakupan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('CakupanModel', 'Model');
	}

	public function index()
	{
		$datacontent['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$datacontent['url'] = 'cakupan';
		$datacontent['title'] = 'Data Cakupan';
		$datacontent['datatable'] = $this->Model->get();
		$data['content'] = $this->load->view('cakupan/tableView', $datacontent, TRUE);
		$data['title'] = 'Halaman Data Cakupan | GIS PBB';
		$this->load->view('layouts/admin/html', $data);
	}
	public function form($parameter = '', $id = '')
	{
		$datacontent['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$datacontent['url'] = 'cakupan';
		$datacontent['parameter'] = $parameter;
		$datacontent['id'] = $id;
		$datacontent['title'] = 'Form Cakupan';
		$data['content'] = $this->load->view('cakupan/formView', $datacontent, TRUE);
		$data['title'] = 'Halaman Form Cakupan | GIS PBB';
		$this->load->view('layouts/admin/html', $data);
	}
	public function simpan()
	{
		if ($this->input->post()) {
			$data = [
				'kd_cakupan' => $this->input->post('kd_cakupan'),
				'nm_cakupan' => $this->input->post('nm_cakupan'),
				'warna_cakupan' => $this->input->post('warna_cakupan'),
			];
			// upload
			if ($_FILES['geojson_cakupan']['name'] != '') {
				$upload = upload('geojson_cakupan', 'geojson', 'geojson');
				if ($upload['info'] == true) {
					$data['geojson_cakupan'] = $upload['upload_data']['file_name'];
				} elseif ($upload['info'] == false) {
					$info = '<div class="alert alert-danger alert-dismissible">
	            		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            		<h4><i class="icon fa fa-ban"></i> Error!</h4> ' . $upload['message'] . ' </div>';
					$this->session->set_flashdata('info', $info);
					redirect('cakupan');
					exit();
				}
			}
			// upload
			if ($_POST['parameter'] == "tambah") {
				$this->Model->insert($data);
			} else {
				$this->Model->update($data, ['id_cakupan' => $this->input->post('id_cakupan')]);
			}
		}
		redirect('cakupan');
	}

	public function hapus($id = '')
	{
		// hapus file di dalam folder
		$this->db->where('id_cakupan', $id);
		$get = $this->Model->get()->row();
		$geojson_cakupan = $get->geojson_cakupan;
		unlink('assets/unggah/geojson/' . $geojson_cakupan);
		// end hapus file di dalam folder
		$this->Model->delete(["id_cakupan" => $id]);
		redirect('cakupan');
	}
}

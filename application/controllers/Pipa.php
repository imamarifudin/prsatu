<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pipa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('PipaModel', 'Model');
	}

	public function index()
	{
		$datacontent['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$datacontent['url'] = 'pipa';
		$datacontent['title'] = 'Data Pipa';
		$datacontent['datatable'] = $this->Model->get();
		$data['content'] = $this->load->view('pipa/tableView', $datacontent, TRUE);
		$data['title'] = 'Halaman Data Pipa | GIS PBB';
		$this->load->view('layouts/admin/html', $data);
	}
	public function form($parameter = '', $id = '')
	{
		$datacontent['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$datacontent['url'] = 'pipa';
		$datacontent['parameter'] = $parameter;
		$datacontent['id'] = $id;
		$datacontent['title'] = 'Form Pipa';
		$data['content'] = $this->load->view('pipa/formView', $datacontent, TRUE);
		$data['title'] = 'Halaman Form Pipa | GIS PBB';
		$this->load->view('layouts/admin/html', $data);
	}
	public function simpan()
	{
		if ($this->input->post()) {
			$data = [
				'kd_pipa' => $this->input->post('kd_pipa'),
				'dia_pipa' => $this->input->post('dia_pipa'),
				'warna_pipa' => $this->input->post('warna_pipa'),
			];
			// upload
			if ($_FILES['geojson_pipa']['name'] != '') {
				$upload = upload('geojson_pipa', 'geojson', 'geojson');
				if ($upload['info'] == true) {
					$data['geojson_pipa'] = $upload['upload_data']['file_name'];
				} elseif ($upload['info'] == false) {
					$info = '<div class="alert alert-danger alert-dismissible">
	            		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            		<h4><i class="icon fa fa-ban"></i> Error!</h4> ' . $upload['message'] . ' </div>';
					$this->session->set_flashdata('info', $info);
					redirect('pipa');
					exit();
				}
			}
			// upload
			if ($_POST['parameter'] == "tambah") {
				$this->Model->insert($data);
			} else {
				$this->Model->update($data, ['id_pipa' => $this->input->post('id_pipa')]);
			}
		}
		redirect('pipa');
	}

	public function hapus($id = '')
	{
		// hapus file di dalam folder
		$this->db->where('id_pipa', $id);
		$get = $this->Model->get()->row();
		$geojson_pipa = $get->geojson_pipa;
		unlink('assets/unggah/geojson/' . $geojson_pipa);
		// end hapus file di dalam folder
		$this->Model->delete(["id_pipa" => $id]);
		redirect('pipa');
	}
}

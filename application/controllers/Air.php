<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Air extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('AirModel', 'Model');
		$this->load->model('KecamatanModel');
	}

	public function index()
	{
		$datacontent['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$datacontent['url'] = 'air';
		$datacontent['title'] = 'Data Titik Air';
		$datacontent['datatable'] = $this->Model->get();
		$data['content'] = $this->load->view('air/tableView', $datacontent, TRUE);
		$data['title'] = 'Halaman Data Titik Air | GIS PBB';
		$this->load->view('layouts/admin/html', $data);
	}
	public function form($parameter = '', $id = '')
	{
		$datacontent['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$datacontent['url'] = 'air';
		$datacontent['parameter'] = $parameter;
		$datacontent['id'] = $id;
		$datacontent['title'] = 'Form Titik Air';
		$data['content'] = $this->load->view('air/formView', $datacontent, TRUE);
		$data['js'] = $this->load->view('air/js/formJs', $datacontent, TRUE);
		$data['title'] = 'Halaman Form Titik Air | GIS PBB';
		$this->load->view('layouts/admin/html', $data);
	}
	public function simpan()
	{
		if ($this->input->post()) {
			$data = [
				'id_kecamatan' => $this->input->post('id_kecamatan'),
				'keterangan' => $this->input->post('keterangan'),
				'lokasi' => $this->input->post('lokasi'),
				'lat' => $this->input->post('lat'),
				'lng' => $this->input->post('lng'),
				'tanggal' => $this->input->post('tanggal'),
			];
			// upload
			if ($_FILES['marker']['name'] != '') {
				$upload = upload('marker', 'marker', 'image');
				if ($upload['info'] == true) {
					$data['marker'] = $upload['upload_data']['file_name'];
				} elseif ($upload['info'] == false) {
					$info = '<div class="alert alert-danger alert-dismissible">
	            		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            		<h4><i class="icon fa fa-ban"></i> Error!</h4> ' . $upload['message'] . ' </div>';
					$this->session->set_flashdata('info', $info);
					redirect('air');
					exit();
				}
			}
			// upload
			if ($_POST['parameter'] == "tambah") {
				$this->Model->insert($data);
			} else {
				$this->Model->update($data, ['id_air' => $this->input->post('id_air')]);
			}
		}
		redirect('air');
	}


	public function hapus($id = '')
	{
		// hapus file di dalam folder
		$this->db->where('id_air', $id);
		$get = $this->Model->get()->row();
		$geojson_air = $get->geojson_air;
		unlink('assets/unggah/geojson/' . $geojson_air);
		// end hapus file di dalam folder
		$this->Model->delete(["id_air" => $id]);
		redirect('air');
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DesaModel extends CI_Model
{
	function get()
	{
		$data = $this->db->get('tbl_desa');
		return $data;
	}
	function getbyid($key)
	{
		$this->db->where('LEFT(kd_desa,7)', $key);
		$data = $this->db->get('tbl_desa');
		return $data;
	}
	function insert($data = array())
	{
		$this->db->insert('tbl_desa', $data);
		$info = '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="fa fa-check"></i> Sukses! </h4> 
		Data Sukses di Tambah
		</div>';
		$this->session->set_flashdata('info', $info);
	}
	function update($data = array(), $where = array())
	{
		foreach ($where as $key => $value) {
			$this->db->where($key, $value);
		}
		$this->db->update('tbl_desa', $data);
		$info = '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="fa fa-check"></i> Sukses! </h4> 
		Data Sukses di Ubah
		</div>';
		$this->session->set_flashdata('info', $info);
	}
	function delete($where = array())
	{
		foreach ($where as $key => $value) {
			$this->db->where($key, $value);
		}
		$this->db->delete('tbl_desa');
		$info = '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="fa fa-check"></i> Sukses! </h4> 
		Data Sukses di Hapus
		</div>';
		$this->session->set_flashdata('info', $info);
	}
}

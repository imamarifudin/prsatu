<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AirModel extends CI_Model
{
	function get()
	{
		$data = $this->db->select('*')
			->from('tbl_air a')
			->join('tbl_kecamatan b', 'a.id_kecamatan=b.id_kecamatan', 'LEFT')
			->get();
		return $data;
	}
	function insert($data = array())
	{
		$this->db->insert('tbl_air', $data);
		$info = '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="fa fa-check"></i> Sukses! </h4> 
		Data Sukses di Tambah
		</div>';
		$this->session->set_flashdata('info', $info);
	}
	function insert_batch($data = array())
	{
		$this->db->insert_batch('tbl_air', $data);
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
		$this->db->update('tbl_air', $data);
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
		$this->db->delete('tbl_air');
		$info = '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="fa fa-check"></i> Sukses! </h4> 
		Data Sukses di Hapus
		</div>';
		$this->session->set_flashdata('info', $info);
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('KecamatanModel');
		$this->load->model('DesaModel');
		$this->load->model('BlokModel');
		$this->load->model('PipaModel');
		$this->load->model('CakupanModel');
		$this->load->model('BangunanModel');
		$this->load->model('AirModel');
	}

	public function data($jenis = 'kecamatan', $type1 = 'poly', $type2 = 'poly', $type3 = 'line', $type = 'marker', $type4 = 'poly', $type5 = 'poly', $type6 = 'poly', $type7 = 'poly', $type8 = 'poly', $type9 = 'poly')
	{
		header('Content-Type: application/json');
		$response = [];
		if ($jenis == 'kecamatan') {
			$getKecamatan = $this->KecamatanModel->get();
			foreach ($getKecamatan->result() as $row) {
				$data = null;
				$data['id_kecamatan'] = $row->id_kecamatan;
				$data['kd_kecamatan'] = $row->kd_kecamatan;
				$data['geojson_kecamatan'] = $row->geojson_kecamatan;
				$data['warna_kecamatan'] = $row->warna_kecamatan;
				$data['nm_kecamatan'] = $row->nm_kecamatan;
				$response[] = $data;
			}
			echo "var dataKecamatan=" . json_encode($response, JSON_PRETTY_PRINT);
		/*}elseif ($jenis == 'desa') {
			if ($type4 == 'poly') {
				$getDesa = $this->DesaModel->get();
				foreach ($getDesa->result() as $row) {
					$data = null;
					$data['id_desa'] = $row->id_desa;
					$data['kd_desa'] = $row->kd_desa;
					$data['geojson_desa'] = $row->geojson_desa;
					$data['warna_desa'] = $row->warna_desa;
					$data['nm_desa'] = $row->nm_desa;
					$response[] = $data;
				}
				echo "var dataDesa=" . json_encode($response, JSON_PRETTY_PRINT);
			}*/
		}elseif ($jenis == 'desakel') {
			if ($type6 == 'poly') {
				$kd_desa = $this->input->get('id');
				$getDesaid = $this->DesaModel->getbyid($kd_desa);
				foreach ($getDesaid->result() as $row) {
					
					$data = null;
					$data['id_desa'] = $row->id_desa;
					$data['kd_desa'] = $row->kd_desa;
					$data['geojson_desa'] = $row->geojson_desa;
					$data['warna_desa'] = $row->warna_desa;
					$data['nm_desa'] = $row->nm_desa;
					$response[] = $data;
					
				}
				echo "var dataDesa=" . json_encode($response, JSON_PRETTY_PRINT);
			}
		}elseif ($jenis == 'blok') {
			if ($type5 == 'poly') {
				$getBlok = $this->BlokModel->get();
				foreach ($getBlok->result() as $row) {
					$data = null;
					$data['id_blok'] = $row->id_blok;
					$data['kd_blok'] = $row->kd_blok;
					$data['geojson_blok'] = $row->geojson_blok;
					$data['warna_blok'] = $row->warna_blok;
					$data['nm_blok'] = $row->nm_blok;
					$response[] = $data;
				}
				echo "var dataBlok=" . json_encode($response, JSON_PRETTY_PRINT);
			}
		} elseif ($jenis == 'blk') {
			if ($type9 == 'poly') {
				$kd_blok = $this->input->get('id');
				$getBlok = $this->BlokModel->getbyid($kd_blok);
				foreach ($getBlok->result() as $row) {
					$data = null;
					$data['id_blok'] = $row->id_blok;
					$data['kd_blok'] = $row->kd_blok;
					$data['geojson_blok'] = $row->geojson_blok;
					$data['warna_blok'] = $row->warna_blok;
					$data['nm_blok'] = $row->nm_blok;
					$response[] = $data;
				}
				echo "var dataBlok=" . json_encode($response, JSON_PRETTY_PRINT);
			}
		} elseif ($jenis == 'cakupan') {
			if ($type1 == 'poly') {
				$getCakupan = $this->CakupanModel->get();
				foreach ($getCakupan->result() as $row) {
					$data = null;
					$data['id_cakupan'] = $row->id_cakupan;
					$data['kd_cakupan'] = $row->kd_cakupan;
					$data['geojson_cakupan'] = $row->geojson_cakupan;
					$data['warna_cakupan'] = $row->warna_cakupan;
					$data['nm_cakupan'] = $row->nm_cakupan;
					$response[] = $data;
				}
				echo "var dataCakupan=" . json_encode($response, JSON_PRETTY_PRINT);
			}
		} elseif ($jenis == 'bangunan') {
			if ($type2 == 'poly') {
				$getBangunan = $this->BangunanModel->get();
				foreach ($getBangunan->result() as $row) {
					$data = null;
					$data['id_bangunan'] = $row->id_bangunan;
					$data['kd_bangunan'] = $row->kd_bangunan;
					$data['geojson_bangunan'] = $row->geojson_bangunan;
					$data['warna_bangunan'] = $row->warna_bangunan;
					$data['nm_bangunan'] = $row->nm_bangunan;
					$response[] = $data;
				}
				echo "var dataBangunan=" . json_encode($response, JSON_PRETTY_PRINT);
			}
		}  elseif ($jenis == 'bng') {
			if ($type8 == 'poly') {
				$kd_bangunan = $this->input->get('id');
				$getBangunan = $this->BangunanModel->getbyid($kd_bangunan);
				foreach ($getBangunan->result() as $row) {
					$data = null;
					$data['id_bangunan'] = $row->id_bangunan;
					$data['kd_bangunan'] = $row->kd_bangunan;
					$data['geojson_bangunan'] = $row->geojson_bangunan;
					$data['warna_bangunan'] = $row->warna_bangunan;
					$data['nm_bangunan'] = $row->nm_bangunan;
					$response[] = $data;
				}
				echo "var dataBangunan=" . json_encode($response, JSON_PRETTY_PRINT);
			}
		} elseif ($jenis == 'pipa') {
			if ($type3 == 'line') {
				$getPipa = $this->PipaModel->get();
				foreach ($getPipa->result() as $row) {
					$data = null;
					$data['id_pipa'] = $row->id_pipa;
					$data['kd_pipa'] = $row->kd_pipa;
					$data['geojson_pipa'] = $row->geojson_pipa;
					$data['warna_pipa'] = $row->warna_pipa;
					$data['dia_pipa'] = $row->dia_pipa;
					$response[] = $data;
				}
				echo "var dataPipa=" . json_encode($response, JSON_PRETTY_PRINT);
			}
		} elseif ($jenis == 'air') {
			if ($type == 'marker') {
				$getAir = $this->AirModel->get();
				foreach ($getAir->result() as $row) {
					$data = null;
					$data['type'] = "Feature";
					$data['properties'] = [
						"name" => $row->lokasi,
						"lokasi" => $row->lokasi . ' Kec. ' . $row->nm_kecamatan,
						"keterangan" => $row->keterangan,
						"tanggal" => $row->tanggal,
						"icon" => ($row->marker == '') ? assets('icons/marker.png') : assets('unggah/marker/' . $row->marker),
						"popUp" => "Lokasi : " . $row->lokasi . ", Kec. " . $row->nm_kecamatan . "<br>Keterangan : " . $row->keterangan . "<br>Tanggal : " . $row->tanggal
					];
					$data['geometry'] = [
						"type" => "Point",
						"coordinates" => [$row->lng, $row->lat]
					];

					$response[] = $data;
				}
				echo "var airPoint=" . json_encode($response, JSON_PRETTY_PRINT);
			}
		}
	}
}

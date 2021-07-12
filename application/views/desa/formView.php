<?php
$id_desa = "";
$kd_desa = "";
$nm_desa = "";
$geojson_desa = "";
$warna_desa = "";
if ($parameter == 'ubah' && $id != '') {
	$this->db->where('id_desa', $id);
	$row = $this->Model->get()->row_array();
	extract($row);
}
?>
<?= content_open('Form Desa') ?>
<form method="post" action="<?= site_url($url . '/simpan') ?>" enctype="multipart/form-data">
	<?= input_hidden('parameter', $parameter) ?>
	<?= input_hidden('id_desa', $id_desa) ?>
	<div class="form-group">
		<label>Kode Desa</label>
		<div class="row">
			<div class="col-md-4">
				<?= input_text('kd_desa', $kd_desa) ?>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label>Nama Desa</label>
		<div class="row">
			<div class="col-md-6">
				<?= input_text('nm_desa', $nm_desa) ?>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label>GeoJSON</label>
		<div class="row">
			<div class="col-md-4">
				<?= input_file('geojson_desa', $geojson_desa) ?>
				<?php if ($parameter == 'ubah') : ?>
					<small class="text-success">Biarkan kosong jika tidak ingin diubah</small>
				<?php endif ?>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label>Warna</label>
		<div class="row">
			<div class="col-md-3">
				<?= input_color('warna_desa', $warna_desa) ?>
			</div>
		</div>
	</div>
	<div class="form-group">
		<button type="submit" name="simpan" value="true" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
		<a href="<?= site_url($url) ?>" class="btn btn-danger"><i class="fa fa-reply"></i> Kembali</a>
	</div>
</form>
<?= content_close() ?>
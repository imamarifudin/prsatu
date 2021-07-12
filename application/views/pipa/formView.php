<?php
$id_pipa = "";
$kd_pipa = "";
$dia_pipa = "";
$geojson_pipa = "";
$warna_pipa = "";
if ($parameter == 'ubah' && $id != '') {
	$this->db->where('id_pipa', $id);
	$row = $this->Model->get()->row_array();
	extract($row);
}
?>
<?= content_open('Form Pipa') ?>
<form method="post" action="<?= site_url($url . '/simpan') ?>" enctype="multipart/form-data">
	<?= input_hidden('parameter', $parameter) ?>
	<?= input_hidden('id_pipa', $id_pipa) ?>
	<div class="form-group">
		<label>Kode Pipa</label>
		<div class="row">
			<div class="col-md-4">
				<?= input_text('kd_pipa', $kd_pipa) ?>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label>Diameter Pipa</label>
		<div class="row">
			<div class="col-md-6">
				<?= input_text('dia_pipa', $dia_pipa) ?>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label>GeoJSON</label>
		<div class="row">
			<div class="col-md-4">
				<?= input_file('geojson_pipa', $geojson_pipa) ?>
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
				<?= input_color('warna_pipa', $warna_pipa) ?>
			</div>
		</div>
	</div>
	<div class="form-group">
		<button type="submit" name="simpan" value="true" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
		<a href="<?= site_url($url) ?>" class="btn btn-danger"><i class="fa fa-reply"></i> Kembali</a>
	</div>
</form>
<?= content_close() ?>
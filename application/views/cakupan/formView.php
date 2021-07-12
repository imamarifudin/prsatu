<?php
$id_cakupan = "";
$kd_cakupan = "";
$nm_cakupan = "";
$geojson_cakupan = "";
$warna_cakupan = "";
if ($parameter == 'ubah' && $id != '') {
	$this->db->where('id_cakupan', $id);
	$row = $this->Model->get()->row_array();
	extract($row);
}
?>
<?= content_open('Form Cakupan') ?>
<form method="post" action="<?= site_url($url . '/simpan') ?>" enctype="multipart/form-data">
	<?= input_hidden('parameter', $parameter) ?>
	<?= input_hidden('id_cakupan', $id_cakupan) ?>
	<div class="form-group">
		<label>Kode Cakupan</label>
		<div class="row">
			<div class="col-md-4">
				<?= input_text('kd_cakupan', $kd_cakupan) ?>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label>Nama Cakupan</label>
		<div class="row">
			<div class="col-md-6">
				<?= input_text('nm_cakupan', $nm_cakupan) ?>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label>GeoJSON</label>
		<div class="row">
			<div class="col-md-4">
				<?= input_file('geojson_cakupan', $geojson_cakupan) ?>
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
				<?= input_color('warna_cakupan', $warna_cakupan) ?>
			</div>
		</div>
	</div>
	<div class="form-group">
		<button type="submit" name="simpan" value="true" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
		<a href="<?= site_url($url) ?>" class="btn btn-danger"><i class="fa fa-reply"></i> Kembali</a>
	</div>
</form>
<?= content_close() ?>
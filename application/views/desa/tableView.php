<?= content_open($title) ?>
<div class="mx-0" style="width: 200px;">
	<a href="<?= site_url($url . '/form/tambah') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
</div>
<hr>
<?= $this->session->flashdata('info') ?>

<table id="datatable" class="table table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<th>No</th>
			<th>Kode</th>
			<th>Desa</th>
			<th>GeoJSON</th>
			<th>Warna</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no = 1;
		foreach ($datatable->result() as $row) {
		?>
			<tr>
				<td><?= $no ?></td>
				<td><?= $row->kd_desa ?></td>
				<td><?= $row->nm_desa ?></td>
				<td><a href="<?= assets('unggah/geojson/' . $row->geojson_desa) ?>" target="_BLANK"><?= $row->geojson_desa ?></a></td>
				<td style="background: <?= $row->warna_desa ?>"></td>
				<td>
					<a href="<?= site_url($url . '/form/ubah/' . $row->id_desa) ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
					<a href="<?= site_url($url . '/hapus/' . $row->id_desa) ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus data ini ?')"><i class="fa fa-trash"></i></a>
				</td>
			</tr>
		<?php
			$no++;
		}
		?>
	</tbody>
</table>
<?= content_close() ?>
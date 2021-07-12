<?= content_open($title) ?>
<div class="mx-0" style="width: 200px;">
	<a href="<?= site_url($url . '/form/tambah') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
</div>
<?= $this->session->flashdata('info') ?>
<hr>

<table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<th>No</th>
			<th>Lokasi</th>
			<th>Kecamatan</th>
			<th>Keterangan</th>
			<th>Lat</th>
			<th>Lng</th>
			<th>Tanggal</th>
			<th>Marker</th>
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
				<td><?= $row->lokasi ?></td>
				<td><?= $row->nm_kecamatan ?></td>
				<td><?= $row->keterangan ?></td>
				<td><?= $row->lat ?></td>
				<td><?= $row->lng ?></td>
				<td><?= $row->tanggal ?></td>
				<td class="text-center"><?= ($row->marker == '' ? '-' : '<img src="' . assets('unggah/marker/' . $row->marker) . '" width="40px">') ?></td>
				<td>
					<a href="<?= site_url($url . '/form/ubah/' . $row->id_air) ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
					<a href="<?= site_url($url . '/hapus/' . $row->id_air) ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus data ini ?')"><i class="fa fa-trash"></i></a>
				</td>
			</tr>
		<?php
			$no++;
		}
		?>
	</tbody>
</table>
<?= content_close() ?>
<?= content_open($title) ?>
<?= $this->session->flashdata('message') ?>
<table id="datatable" class="table table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Image</th>
			<th>Role</th>
			<th>Active</th>
			<th>Date Created</th>
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
				<td><?= $row->name ?></td>
				<td><?= $row->email ?></td>
				<td><?= $row->image ?></td>
				<td><?= $row->role_id ?></td>
				<td><?= $row->is_active ?></td>
				<td><?= $row->date_created ?></td>
				<td>
					<a href="<?= base_url('admin/hapusUser/' . $row->id) ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus data ini ?')"><i class="fa fa-trash"></i></a>
				</td>
			</tr>
		<?php
			$no++;
		}
		?>
	</tbody>
</table>
<?= content_close() ?>
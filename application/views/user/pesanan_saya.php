<div class="container-fluid">
	<?php
	$querySeller = "SELECT pemesanan.*, users.nama_bisnis
	FROM pemesanan JOIN users
	ON pemesanan.id_seller = users.id
	WHERE pemesanan.id_seller = users.id
	AND pemesanan.id_user = $user[id]";
	$seller = $this->db->query($querySeller)->result_array();

	$queryUser = "SELECT pemesanan.*, jasa.nama, users.name
	FROM pemesanan 
	JOIN jasa ON pemesanan.id_jasa = jasa.id
	JOIN users ON pemesanan.id_user = users.id
	WHERE pemesanan.id_user = $user[id]
	ORDER BY id DESC";
	$quser = $this->db->query($queryUser)->result_array();
	?>
	<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

	<div class="row">
		<div class="col-lg">

			<?php if (validation_errors()) : ?>
				<div class="alert alert-danger" role="alert">
					<?= validation_errors(); ?>
				</div>
			<?php endif; ?>

			<?= $this->session->flashdata('message'); ?>

			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">ID Pesanan</th>
						<th scope="col">Nama Pesanan</th>
						<th scope="col">Nama Pemesan</th>
						<th scope="col">Nama EO</th>
						<th scope="col">Tanggal Pesan</th>
						<th scope="col">Tanggal Acara</th>
						<th scope="col">Status</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($quser as $row) : ?>
						<tr>
							<th scope="row"><?= $i++; ?></th>
							<td><?= $row['id']; ?></td>
							<td><?= $row['nama']; ?></td>
							<td><?= $row['name']; ?></td>
							<td><?= $seller[0]['nama_bisnis']; ?></td>
							<td><?= $row['tgl_order']; ?></td>
							<td><?= $row['tgl_acara']; ?></td>
							<td><?= $row['status']; ?></td>
							<td>
								<a href="" class="badge badge-success">edit</a>
								<a href="" class="badge badge-danger">delete</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

</div>

<!-- Modal -->
<div class="modal fade" id="addNewSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="addNewSubMenuModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addNewSubMenuModal">Add New Sub Menu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('menu/submenu'); ?>" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="title" name="title" placeholder="Sub Menu title">
					</div>
					<div class="form-group">
						<select class="form-control" name="menu_id" id="menu_id">
							<option value="">Select Menu</option>
							<?php foreach ($menu as $row) : ?>
								<option value="<?= $row['id']; ?>"><?= $row['menu']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="url" name="url" placeholder="Sub Menu Url">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="icon" name="icon" placeholder="Sub Menu Icon">
					</div>
					<div class="form-group">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
							<label class="form-check-label" for="is_active">
								Active?
							</label>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Add</button>
				</div>

			</form>

		</div>
	</div>
</div>

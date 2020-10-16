<div class="container-fluid">

	<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

	<div class="row">
		<div class="col-lg">

			<?php if (validation_errors()) : ?>
				<div class="alert alert-danger" role="alert">
					<?= validation_errors(); ?>
				</div>
			<?php endif; ?>

			<?= $this->session->flashdata('message'); ?>

			<a href="" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#addNewSubMenuModal">
				Add New Sub Menu
			</a>

			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">ID Pesanan</th>
						<th scope="col">Nama Pesanan</th>
						<th scope="col">Nama Pemesan</th>
						<th scope="col">Tanggal Pesan</th>
						<th scope="col">Tanggal Acara</th>
						<th scope="col">Status</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($pesanan as $row) : ?>
						<tr>
							<th scope="row"><?= $i++; ?></th>
							<td><?= $row['id']; ?></td>
							<td><?= $row['id_user']; ?></td>
							<td><?= $row['id_jasa']; ?></td>
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

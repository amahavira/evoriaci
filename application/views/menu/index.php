<div class="container-fluid">

	<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

	<div class="row">
		<div class="col-lg-6">

			<?= form_error('menu', '
                    <div class="alert alert-danger" role="alert">
                        ', '
                    </div>
                    '); ?>

			<?= $this->session->flashdata('message'); ?>

			<a href="" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#addNewMenuModal">Add New Menu</a>

			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Menu</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($menu as $row) : ?>
						<tr>
							<th scope="row"><?= $i++; ?></th>
							<td><?= $row['menu']; ?></td>
							<td>
								<a data-toggle="modal" data-target="#editMenuModal<?= $row['id']; ?>" href="" class="badge badge-success">edit</a>
								<a href="<?= base_url(); ?>menu/hapusMenu/<?= $row['id'] ?>" class="badge badge-danger">delete</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

</div>

<!-- Modal -->
<div class="modal fade" id="addNewMenuModal" tabindex="-1" role="dialog" aria-labelledby="addNewMenuModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addNewMenuModal">Add New Menu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('menu'); ?>" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="menu" name="menu" placeholder="Menu Name">
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

<?php $no = 0;
foreach ($menu as $row) : $no++; ?>
	<div class="modal fade" id="editMenuModal<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editMenuModal" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editMenuModal">Edit Menu</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('menu/editMenu'); ?>" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<input value="<?= $row['id']; ?>" type="text" class="form-control" id="id" name="id" hidden>
							<input value="<?= $row['menu']; ?>" type="text" class="form-control" id="menu" name="menu" placeholder="Menu Name">
							<?= form_error('menu', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Edit</button>
					</div>

				</form>

			</div>
		</div>
	</div>
<?php endforeach; ?>

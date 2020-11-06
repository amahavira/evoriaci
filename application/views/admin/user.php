<div class="container-fluid">

	<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

	<div class="row">
		<div class="col-lg-12">

			<?= $this->session->flashdata('message'); ?>

			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Email</th>
						<th scope="col">Nama</th>
						<th scope="col">Role</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($pengguna as $row) : ?>
						<tr>
							<th scope="row"><?= $i++; ?></th>
							<td><?= $row['email']; ?></td>
							<td><?= $row['name']; ?></td>
							<td>
								<?php if ($row['role_id'] == 0) {
									echo "Belum Diaktivasi";
								}; ?>
								<?php if ($row['role_id'] == 1) {
									echo "Admin";
								}; ?>
								<?php if ($row['role_id'] == 2) {
									echo "Customer";
								}; ?>
								<?php if ($row['role_id'] == 4) {
									echo "Seller/EO";
								}; ?>
							</td>
							<td>
								<a data-toggle="modal" data-target="#detailUsModal<?= $row['id']; ?>" href="" class="badge badge-success">detail</a>
								<a href="<?= base_url(); ?>admin/hapusUser/<?= $row['id'] ?>" class="badge badge-danger">delete</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

</div>

<!-- Modal -->
<?php $no = 0;
foreach ($pengguna as $row) : $no++; ?>
	<div class="modal fade" id="detailUsModal<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailUsModal" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editUsModal">Detail Pengguna</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="name"><strong>Nama</strong></label>
						<input value="<?= $row['name']; ?>" class="form-control" disabled>
					</div>
					<div class="form-group">
						<label><strong>Email</strong></label>
						<input value="<?= $row['email']; ?>" class="form-control" disabled>
					</div>
					<div class="form-group">
						<label><strong>Nomor Telepon</strong></label>
						<input value="<?= $row['nohp']; ?>" class="form-control" disabled>
					</div>
					<div class="form-group">
						<label><strong>Alamat</strong></label>
						<input value="<?= $row['alamat']; ?>" class="form-control" disabled>
					</div>
					<div class="form-group">
						<label><strong>Role</strong></label>
						<?php if ($row['role_id'] == 0) : ?>
							<input value="Belum Diaktivasi" class="form-control" disabled>
						<?php endif; ?>
						<?php if ($row['role_id'] == 1) : ?>
							<input value="Admin" class="form-control" disabled>
						<?php endif; ?>
						<?php if ($row['role_id'] == 2) : ?>
							<input value="Customer" class="form-control" disabled>
						<?php endif; ?>
						<?php if ($row['role_id'] == 4) : ?>
							<input value="Seller/EO" class="form-control" disabled>
						<?php endif; ?>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>

			</div>
		</div>
	</div>
<?php endforeach; ?>

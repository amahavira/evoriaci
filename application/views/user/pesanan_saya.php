<div class="container">
	<?php
	// $querySeller = "SELECT pemesanan.*, users.nama_bisnis
	// FROM pemesanan JOIN users
	// ON pemesanan.id_seller = users.id
	// WHERE pemesanan.id_seller = users.id
	// AND pemesanan.id_user = $user[id]";
	// $seller = $this->db->query($querySeller)->result_array();

	$queryUser = "SELECT pemesanan.*, jasa.nama, users.name
	FROM pemesanan 
	JOIN jasa ON pemesanan.id_jasa = jasa.id
	JOIN users ON pemesanan.id_user = users.id
	WHERE pemesanan.id_user = $user[id]
	ORDER BY status ASC";
	$quser = $this->db->query($queryUser)->result_array();
	?>
	<!-- <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1> -->
	<br>

	<h4>Menunggu Konfirmasi</h4>
	<br>
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
						<th scope="col">Tanggal Pesan</th>
						<th scope="col">Tanggal Acara</th>
						<th scope="col">Status</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($quser as $row) : ?>
						<?php if ($row['status'] == 0) : ?>
							<tr>
								<th scope="row"><?= $i++; ?></th>
								<td><?= $row['id']; ?></td>
								<td><?= $row['nama']; ?></td>
								<td><?= $row['tgl_order']; ?></td>
								<td><?= $row['tgl_acara']; ?></td>
								<td><?php if ($row['status'] == 0) {
										echo "Menunggu Konfirmasi";
									}; ?>
									<?php if ($row['status'] == 1) {
										echo "Menunggu Pembayaran";
									}; ?>
									<?php if ($row['status'] == 2) {
										echo "Menunggu Konfirmasi Pembayaran";
									}; ?>
									<?php if ($row['status'] == 3) {
										echo "Pesanan Diproses";
									}; ?>
									<?php if ($row['status'] == 4) {
										echo "Menunggu Konfirmasi Selesai";
									}; ?>
									<?php if ($row['status'] == 5) {
										echo "Pesanan Selesai";
									}; ?>
									<?php if ($row['status'] == 6) {
										echo "Pesanan Dibatalkan";
									}; ?></td>
								<td>
									<?php if ($row['status'] == 0) : ?>
										<?= form_open_multipart('user/batal_user'); ?>
										<input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id']; ?>">
										<input type="hidden" class="form-control" name="status" id="status" value="6">
										<button type="submit" class="badge badge-danger" style="margin-right: 5px;">Batalkan</button>
										</form>
									<?php endif; ?>
									<?php if ($row['status'] == 1) : ?>
										<a href="<?= base_url(); ?>user/payment/<?= $row['id'] ?>" class="badge badge-success" style="margin-right: 5px;">Lakukan Pembayaran</a>
									<?php endif; ?>
									<?php if ($row['status'] == 4) : ?>
										<?= form_open_multipart('user/konfirmasi_selesai_user'); ?>
										<input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id']; ?>">
										<input type="hidden" class="form-control" name="status" id="status" value="5">
										<button type="submit" class="badge badge-success" style="margin-right: 5px;">Selesai</button>
										</form>
									<?php endif; ?>
								</td>
							</tr>
						<?php endif; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

	<hr>
	<br>

	<h4>Menunggu Pembayaran</h4>
	<br>
	<div class="row">
		<div class="col-lg">
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">ID Pesanan</th>
						<th scope="col">Nama Pesanan</th>
						<th scope="col">Tanggal Pesan</th>
						<th scope="col">Tanggal Acara</th>
						<th scope="col">Status</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($quser as $row) : ?>
						<?php if ($row['status'] == 1 || $row['status'] == 2) : ?>
							<tr>
								<th scope="row"><?= $i++; ?></th>
								<td><?= $row['id']; ?></td>
								<td><?= $row['nama']; ?></td>
								<td><?= $row['tgl_order']; ?></td>
								<td><?= $row['tgl_acara']; ?></td>
								<td><?php if ($row['status'] == 0) {
										echo "Menunggu Konfirmasi";
									}; ?>
									<?php if ($row['status'] == 1) {
										echo "Menunggu Pembayaran";
									}; ?>
									<?php if ($row['status'] == 2) {
										echo "Menunggu Konfirmasi Pembayaran";
									}; ?>
									<?php if ($row['status'] == 3) {
										echo "Pesanan Diproses";
									}; ?>
									<?php if ($row['status'] == 4) {
										echo "Menunggu Konfirmasi Selesai";
									}; ?>
									<?php if ($row['status'] == 5) {
										echo "Pesanan Selesai";
									}; ?>
									<?php if ($row['status'] == 6) {
										echo "Pesanan Dibatalkan";
									}; ?></td>
								<td>
									<?php if ($row['status'] == 0) : ?>
										<?= form_open_multipart('user/batal_user'); ?>
										<input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id']; ?>">
										<input type="hidden" class="form-control" name="status" id="status" value="6">
										<button type="submit" class="badge badge-danger" style="margin-right: 5px;">Batalkan</button>
										</form>
									<?php endif; ?>
									<?php if ($row['status'] == 1) : ?>
										<a href="<?= base_url(); ?>user/payment/<?= $row['id'] ?>" class="badge badge-success" style="margin-right: 5px;">Lakukan Pembayaran</a>
									<?php endif; ?>
									<?php if ($row['status'] == 4) : ?>
										<?= form_open_multipart('user/konfirmasi_selesai_user'); ?>
										<input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id']; ?>">
										<input type="hidden" class="form-control" name="status" id="status" value="5">
										<button type="submit" class="badge badge-success" style="margin-right: 5px;">Selesai</button>
										</form>
									<?php endif; ?>
								</td>
							</tr>
						<?php endif; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

	<hr>
	<br>

	<h4>Pesanan Diproses</h4>
	<br>
	<div class="row">
		<div class="col-lg">
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">ID Pesanan</th>
						<th scope="col">Nama Pesanan</th>
						<th scope="col">Tanggal Pesan</th>
						<th scope="col">Tanggal Acara</th>
						<th scope="col">Status</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($quser as $row) : ?>
						<?php if ($row['status'] == 3 || $row['status'] == 4) : ?>
							<tr>
								<th scope="row"><?= $i++; ?></th>
								<td><?= $row['id']; ?></td>
								<td><?= $row['nama']; ?></td>
								<td><?= $row['tgl_order']; ?></td>
								<td><?= $row['tgl_acara']; ?></td>
								<td><?php if ($row['status'] == 0) {
										echo "Menunggu Konfirmasi";
									}; ?>
									<?php if ($row['status'] == 1) {
										echo "Menunggu Pembayaran";
									}; ?>
									<?php if ($row['status'] == 2) {
										echo "Menunggu Konfirmasi Pembayaran";
									}; ?>
									<?php if ($row['status'] == 3) {
										echo "Pesanan Diproses";
									}; ?>
									<?php if ($row['status'] == 4) {
										echo "Menunggu Konfirmasi Selesai";
									}; ?>
									<?php if ($row['status'] == 5) {
										echo "Pesanan Selesai";
									}; ?>
									<?php if ($row['status'] == 6) {
										echo "Pesanan Dibatalkan";
									}; ?></td>
								<td>
									<?php if ($row['status'] == 0) : ?>
										<?= form_open_multipart('user/batal_user'); ?>
										<input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id']; ?>">
										<input type="hidden" class="form-control" name="status" id="status" value="6">
										<button type="submit" class="badge badge-danger" style="margin-right: 5px;">Batalkan</button>
										</form>
									<?php endif; ?>
									<?php if ($row['status'] == 1) : ?>
										<a href="<?= base_url(); ?>user/payment/<?= $row['id'] ?>" class="badge badge-success" style="margin-right: 5px;">Lakukan Pembayaran</a>
									<?php endif; ?>
									<?php if ($row['status'] == 4) : ?>
										<?= form_open_multipart('user/konfirmasi_selesai_user'); ?>
										<input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id']; ?>">
										<input type="hidden" class="form-control" name="status" id="status" value="5">
										<button type="submit" class="badge badge-success" style="margin-right: 5px;">Selesai</button>
										</form>
									<?php endif; ?>
								</td>
							</tr>
						<?php endif; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

	<hr>
	<br>

	<h4>Pesanan Selesai</h4>
	<br>
	<div class="row">
		<div class="col-lg">

			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">ID Pesanan</th>
						<th scope="col">Nama Pesanan</th>
						<th scope="col">Tanggal Pesan</th>
						<th scope="col">Tanggal Acara</th>
						<th scope="col">Status</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($quser as $row) : ?>
						<?php if ($row['status'] == 5) : ?>
							<tr>
								<th scope="row"><?= $i++; ?></th>
								<td><?= $row['id']; ?></td>
								<td><?= $row['nama']; ?></td>
								<td><?= $row['tgl_order']; ?></td>
								<td><?= $row['tgl_acara']; ?></td>
								<td><?php if ($row['status'] == 0) {
										echo "Menunggu Konfirmasi";
									}; ?>
									<?php if ($row['status'] == 1) {
										echo "Menunggu Pembayaran";
									}; ?>
									<?php if ($row['status'] == 2) {
										echo "Menunggu Konfirmasi Pembayaran";
									}; ?>
									<?php if ($row['status'] == 3) {
										echo "Pesanan Diproses";
									}; ?>
									<?php if ($row['status'] == 4) {
										echo "Menunggu Konfirmasi Selesai";
									}; ?>
									<?php if ($row['status'] == 5) {
										echo "Pesanan Selesai";
									}; ?>
									<?php if ($row['status'] == 6) {
										echo "Pesanan Dibatalkan";
									}; ?></td>
								<td>
									<?php if ($row['status'] == 0) : ?>
										<?= form_open_multipart('user/batal_user'); ?>
										<input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id']; ?>">
										<input type="hidden" class="form-control" name="status" id="status" value="6">
										<button type="submit" class="badge badge-danger" style="margin-right: 5px;">Batalkan</button>
										</form>
									<?php endif; ?>
									<?php if ($row['status'] == 1) : ?>
										<a href="<?= base_url(); ?>user/payment/<?= $row['id'] ?>" class="badge badge-success" style="margin-right: 5px;">Lakukan Pembayaran</a>
									<?php endif; ?>
									<?php if ($row['status'] == 4) : ?>
										<?= form_open_multipart('user/konfirmasi_selesai_user'); ?>
										<input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id']; ?>">
										<input type="hidden" class="form-control" name="status" id="status" value="5">
										<button type="submit" class="badge badge-success" style="margin-right: 5px;">Selesai</button>
										</form>
									<?php endif; ?>
									<?php if ($row['status'] == 5 && $row['rating'] <= 0) : ?>
										<a data-toggle="modal" data-target="#ratingModal<?= $row['id']; ?>" href="" class="badge badge-warning">Beri Rating</a>
									<?php endif; ?>
								</td>
							</tr>
						<?php endif; ?>

						<!-- Modal -->
						<div class="modal fade" id="ratingModal<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="ratingModal" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="ratingModal">Beri Rating</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<?= form_open_multipart('user/rating'); ?>
									<input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id']; ?>">
									<div class="modal-body">
										<div class="form-group">
											<label for="rating"><strong>Berikan Skor Rating Pelayanan</strong></label>
											<select class="form-control" name="rating" id="rating" required>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
											</select>
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

					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

	<hr>
	<br>

	<h4>Pesanan Dibatalkan</h4>
	<br>
	<div class="row">
		<div class="col-lg">

			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">ID Pesanan</th>
						<th scope="col">Nama Pesanan</th>
						<th scope="col">Tanggal Pesan</th>
						<th scope="col">Tanggal Acara</th>
						<th scope="col">Status</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($quser as $row) : ?>
						<?php if ($row['status'] == 6) : ?>
							<tr>
								<th scope="row"><?= $i++; ?></th>
								<td><?= $row['id']; ?></td>
								<td><?= $row['nama']; ?></td>
								<td><?= $row['tgl_order']; ?></td>
								<td><?= $row['tgl_acara']; ?></td>
								<td><?php if ($row['status'] == 0) {
										echo "Menunggu Konfirmasi";
									}; ?>
									<?php if ($row['status'] == 1) {
										echo "Menunggu Pembayaran";
									}; ?>
									<?php if ($row['status'] == 2) {
										echo "Menunggu Konfirmasi Pembayaran";
									}; ?>
									<?php if ($row['status'] == 3) {
										echo "Pesanan Diproses";
									}; ?>
									<?php if ($row['status'] == 4) {
										echo "Menunggu Konfirmasi Selesai";
									}; ?>
									<?php if ($row['status'] == 5) {
										echo "Pesanan Selesai";
									}; ?>
									<?php if ($row['status'] == 6) {
										echo "Pesanan Dibatalkan";
									}; ?></td>
								<td>
									<?php if ($row['status'] == 0) : ?>
										<?= form_open_multipart('user/batal_user'); ?>
										<input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id']; ?>">
										<input type="hidden" class="form-control" name="status" id="status" value="6">
										<button type="submit" class="badge badge-danger" style="margin-right: 5px;">Batalkan</button>
										</form>
									<?php endif; ?>
									<?php if ($row['status'] == 1) : ?>
										<a href="<?= base_url(); ?>user/payment/<?= $row['id'] ?>" class="badge badge-success" style="margin-right: 5px;">Lakukan Pembayaran</a>
									<?php endif; ?>
									<?php if ($row['status'] == 4) : ?>
										<?= form_open_multipart('user/konfirmasi_selesai_user'); ?>
										<input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id']; ?>">
										<input type="hidden" class="form-control" name="status" id="status" value="5">
										<button type="submit" class="badge badge-success" style="margin-right: 5px;">Selesai</button>
										</form>
									<?php endif; ?>
								</td>
							</tr>
						<?php endif; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

	<hr>
	<br>

</div>

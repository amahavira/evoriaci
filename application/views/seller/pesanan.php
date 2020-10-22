<div class="container">
	<?php
	$queryUser = "SELECT pemesanan.*, jasa.nama, users.name, users.nohp
	FROM pemesanan 
	JOIN jasa ON pemesanan.id_jasa = jasa.id
	JOIN users ON pemesanan.id_user = users.id
	WHERE pemesanan.id_seller = $user[id]
	ORDER BY id ASC";
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
						<th scope="col">Nama Pemesan</th>
						<th scope="col">Tanggal Pesan</th>
						<th scope="col">Tanggal Acara</th>
						<th scope="col">Nomor Telepon Pemesan</th>
						<th scope="col">Status</th>
						<th scope="col">Bukti Pembayaran</th>
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
								<td><?= $row['name']; ?></td>
								<td><?= $row['tgl_order']; ?></td>
								<td><?= $row['tgl_acara']; ?></td>
								<td><?= $row['nohp']; ?></td>
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
									<?php if ($row['status'] >= 2) : ?>
										<a target="_blank" href="<?= base_url() ?>assets/bukti/<?= $row['bukti_bayar']; ?>">
											<img src="<?= base_url('assets/bukti/') . $row['bukti_bayar']; ?>" class="img-thumbnail" width="160" height="160"></img>
										</a>
									<?php endif; ?>
								</td>
								<td>
									<?php if ($row['status'] == 0) : ?>
										<?= form_open_multipart('user/konfirmasi'); ?>
										<input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id']; ?>">
										<input type="hidden" class="form-control" name="status" id="status" value="1">
										<button type="submit" class="badge badge-primary" style="margin-right: 5px;">Konfirmasi</button>
										</form>
										<?= form_open_multipart('user/batal_seller'); ?>
										<input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id']; ?>">
										<input type="hidden" class="form-control" name="status" id="status" value="6">
										<button type="submit" class="badge badge-danger" style="margin-left: 5px;">Batalkan</button>
										</form>
									<?php endif; ?>
									<?php if ($row['status'] == 2) : ?>
										<?= form_open_multipart('user/konfirmasi_bayar'); ?>
										<input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id']; ?>">
										<input type="hidden" class="form-control" name="status" id="status" value="3">
										<button type="submit" class="badge badge-success" style="margin-right: 5px;">Konfirmasi</button>
										</form>
										<?= form_open_multipart('user/batal_seller'); ?>
										<input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id']; ?>">
										<input type="hidden" class="form-control" name="status" id="status" value="6">
										<button type="submit" class="badge badge-danger" style="margin-left: 5px;">Batalkan</button>
										</form>
									<?php endif; ?>
									<?php if ($row['status'] == 3) : ?>
										<?= form_open_multipart('user/konfirmasi_selesai_seller'); ?>
										<input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id']; ?>">
										<input type="hidden" class="form-control" name="status" id="status" value="4">
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
						<th scope="col">Nama Pemesan</th>
						<th scope="col">Tanggal Pesan</th>
						<th scope="col">Tanggal Acara</th>
						<th scope="col">Nomor Telepon Pemesan</th>
						<th scope="col">Status</th>
						<th scope="col">Bukti Pembayaran</th>
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
								<td><?= $row['name']; ?></td>
								<td><?= $row['tgl_order']; ?></td>
								<td><?= $row['tgl_acara']; ?></td>
								<td><?= $row['nohp']; ?></td>
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
									<?php if ($row['status'] >= 2) : ?>
										<a target="_blank" href="<?= base_url() ?>assets/bukti/<?= $row['bukti_bayar']; ?>">
											<img src="<?= base_url('assets/bukti/') . $row['bukti_bayar']; ?>" class="img-thumbnail" width="160" height="160"></img>
										</a>
									<?php endif; ?>
								</td>
								<td>
									<?php if ($row['status'] == 0) : ?>
										<?= form_open_multipart('user/konfirmasi'); ?>
										<input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id']; ?>">
										<input type="hidden" class="form-control" name="status" id="status" value="1">
										<button type="submit" class="badge badge-primary" style="margin-right: 5px;">Konfirmasi</button>
										</form>
										<?= form_open_multipart('user/batal_seller'); ?>
										<input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id']; ?>">
										<input type="hidden" class="form-control" name="status" id="status" value="6">
										<button type="submit" class="badge badge-danger" style="margin-left: 5px;">Batalkan</button>
										</form>
									<?php endif; ?>
									<?php if ($row['status'] == 2) : ?>
										<?= form_open_multipart('user/konfirmasi_bayar'); ?>
										<input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id']; ?>">
										<input type="hidden" class="form-control" name="status" id="status" value="3">
										<button type="submit" class="badge badge-success" style="margin-right: 5px;">Konfirmasi</button>
										</form>
										<?= form_open_multipart('user/batal_seller'); ?>
										<input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id']; ?>">
										<input type="hidden" class="form-control" name="status" id="status" value="6">
										<button type="submit" class="badge badge-danger" style="margin-left: 5px;">Batalkan</button>
										</form>
									<?php endif; ?>
									<?php if ($row['status'] == 3) : ?>
										<?= form_open_multipart('user/konfirmasi_selesai_seller'); ?>
										<input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id']; ?>">
										<input type="hidden" class="form-control" name="status" id="status" value="4">
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
						<th scope="col">Nama Pemesan</th>
						<th scope="col">Tanggal Pesan</th>
						<th scope="col">Tanggal Acara</th>
						<th scope="col">Nomor Telepon Pemesan</th>
						<th scope="col">Status</th>
						<th scope="col">Bukti Pembayaran</th>
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
								<td><?= $row['name']; ?></td>
								<td><?= $row['tgl_order']; ?></td>
								<td><?= $row['tgl_acara']; ?></td>
								<td><?= $row['nohp']; ?></td>
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
									<?php if ($row['status'] >= 2) : ?>
										<a target="_blank" href="<?= base_url() ?>assets/bukti/<?= $row['bukti_bayar']; ?>">
											<img src="<?= base_url('assets/bukti/') . $row['bukti_bayar']; ?>" class="img-thumbnail" width="160" height="160"></img>
										</a>
									<?php endif; ?>
								</td>
								<td>
									<?php if ($row['status'] == 0) : ?>
										<?= form_open_multipart('user/konfirmasi'); ?>
										<input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id']; ?>">
										<input type="hidden" class="form-control" name="status" id="status" value="1">
										<button type="submit" class="badge badge-primary" style="margin-right: 5px;">Konfirmasi</button>
										</form>
										<?= form_open_multipart('user/batal_seller'); ?>
										<input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id']; ?>">
										<input type="hidden" class="form-control" name="status" id="status" value="6">
										<button type="submit" class="badge badge-danger" style="margin-left: 5px;">Batalkan</button>
										</form>
									<?php endif; ?>
									<?php if ($row['status'] == 2) : ?>
										<?= form_open_multipart('user/konfirmasi_bayar'); ?>
										<input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id']; ?>">
										<input type="hidden" class="form-control" name="status" id="status" value="3">
										<button type="submit" class="badge badge-success" style="margin-right: 5px;">Konfirmasi</button>
										</form>
										<?= form_open_multipart('user/batal_seller'); ?>
										<input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id']; ?>">
										<input type="hidden" class="form-control" name="status" id="status" value="6">
										<button type="submit" class="badge badge-danger" style="margin-left: 5px;">Batalkan</button>
										</form>
									<?php endif; ?>
									<?php if ($row['status'] == 3) : ?>
										<?= form_open_multipart('user/konfirmasi_selesai_seller'); ?>
										<input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id']; ?>">
										<input type="hidden" class="form-control" name="status" id="status" value="4">
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
						<th scope="col">Nama Pemesan</th>
						<th scope="col">Tanggal Pesan</th>
						<th scope="col">Tanggal Acara</th>
						<th scope="col">Nomor Telepon Pemesan</th>
						<th scope="col">Status</th>
						<th scope="col">Bukti Pembayaran</th>
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
								<td><?= $row['name']; ?></td>
								<td><?= $row['tgl_order']; ?></td>
								<td><?= $row['tgl_acara']; ?></td>
								<td><?= $row['nohp']; ?></td>
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
									<?php if ($row['status'] >= 2) : ?>
										<a target="_blank" href="<?= base_url() ?>assets/bukti/<?= $row['bukti_bayar']; ?>">
											<img src="<?= base_url('assets/bukti/') . $row['bukti_bayar']; ?>" class="img-thumbnail" width="160" height="160"></img>
										</a>
									<?php endif; ?>
								</td>
								<td>
									<?php if ($row['status'] == 0) : ?>
										<?= form_open_multipart('user/konfirmasi'); ?>
										<input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id']; ?>">
										<input type="hidden" class="form-control" name="status" id="status" value="1">
										<button type="submit" class="badge badge-primary" style="margin-right: 5px;">Konfirmasi</button>
										</form>
										<?= form_open_multipart('user/batal_seller'); ?>
										<input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id']; ?>">
										<input type="hidden" class="form-control" name="status" id="status" value="6">
										<button type="submit" class="badge badge-danger" style="margin-left: 5px;">Batalkan</button>
										</form>
									<?php endif; ?>
									<?php if ($row['status'] == 2) : ?>
										<?= form_open_multipart('user/konfirmasi_bayar'); ?>
										<input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id']; ?>">
										<input type="hidden" class="form-control" name="status" id="status" value="3">
										<button type="submit" class="badge badge-success" style="margin-right: 5px;">Konfirmasi</button>
										</form>
										<?= form_open_multipart('user/batal_seller'); ?>
										<input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id']; ?>">
										<input type="hidden" class="form-control" name="status" id="status" value="6">
										<button type="submit" class="badge badge-danger" style="margin-left: 5px;">Batalkan</button>
										</form>
									<?php endif; ?>
									<?php if ($row['status'] == 3) : ?>
										<?= form_open_multipart('user/konfirmasi_selesai_seller'); ?>
										<input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id']; ?>">
										<input type="hidden" class="form-control" name="status" id="status" value="4">
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
						<th scope="col">Nama Pemesan</th>
						<th scope="col">Tanggal Pesan</th>
						<th scope="col">Tanggal Acara</th>
						<th scope="col">Nomor Telepon Pemesan</th>
						<th scope="col">Status</th>
						<th scope="col">Bukti Pembayaran</th>
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
								<td><?= $row['name']; ?></td>
								<td><?= $row['tgl_order']; ?></td>
								<td><?= $row['tgl_acara']; ?></td>
								<td><?= $row['nohp']; ?></td>
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
									<?php if ($row['status'] != 6) : ?>
										<a target="_blank" href="<?= base_url() ?>assets/bukti/<?= $row['bukti_bayar']; ?>">
											<img src="<?= base_url('assets/bukti/') . $row['bukti_bayar']; ?>" class="img-thumbnail" width="160" height="160"></img>
										</a>
									<?php endif; ?>
								</td>
								<td>
									<?php if ($row['status'] == 0) : ?>
										<?= form_open_multipart('user/konfirmasi'); ?>
										<input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id']; ?>">
										<input type="hidden" class="form-control" name="status" id="status" value="1">
										<button type="submit" class="badge badge-primary" style="margin-right: 5px;">Konfirmasi</button>
										</form>
										<?= form_open_multipart('user/batal_seller'); ?>
										<input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id']; ?>">
										<input type="hidden" class="form-control" name="status" id="status" value="6">
										<button type="submit" class="badge badge-danger" style="margin-left: 5px;">Batalkan</button>
										</form>
									<?php endif; ?>
									<?php if ($row['status'] == 2) : ?>
										<?= form_open_multipart('user/konfirmasi_bayar'); ?>
										<input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id']; ?>">
										<input type="hidden" class="form-control" name="status" id="status" value="3">
										<button type="submit" class="badge badge-success" style="margin-right: 5px;">Konfirmasi</button>
										</form>
										<?= form_open_multipart('user/batal_seller'); ?>
										<input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id']; ?>">
										<input type="hidden" class="form-control" name="status" id="status" value="6">
										<button type="submit" class="badge badge-danger" style="margin-left: 5px;">Batalkan</button>
										</form>
									<?php endif; ?>
									<?php if ($row['status'] == 3) : ?>
										<?= form_open_multipart('user/konfirmasi_selesai_seller'); ?>
										<input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id']; ?>">
										<input type="hidden" class="form-control" name="status" id="status" value="4">
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

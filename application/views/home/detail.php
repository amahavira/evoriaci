<script src="https://kit.fontawesome.com/be4d5ec7e7.js" crossorigin="anonymous"></script>

<?php
$id_jasa = $tampilj->id;
$queryJasa = "SELECT jasa.*, users.*
FROM jasa JOIN users
ON jasa.id_seller = users.id
WHERE jasa.id = $id_jasa";
$jasa = $this->db->query($queryJasa)->result_array();
?>
<div class="container">
	<div class="row justify-content-md-center">
		<div class="card mb-3" style=" border-radius: 10px; width: 100%">
			<div class="row no-gutters" style="margin: 10px">
				<div class="col-md-3">
					<img src="<?= base_url('assets/img/jasa/') . $tampilj->gambar; ?>" class="card-img" alt="Responsive image" style="height: 150px; width: auto; border-radius: 5%; margin-left: 10%;">
				</div>
				<div class="col-md-9">
					<div class="card-body">
						<h4 class="card-title font-weight-bold" style="color: #7E4A9E"><?= $tampilj->nama ?></h4>
						<!--  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
						<p class="card-text pb-3"><small class="text-muted">By <?= $jasa[0]['nama_bisnis']; ?></small></p>
						<i class="fas fa-map-marker-alt" style="color: red"></i>
						<span style="font-size: 13px"> <?= $tampilj->lokasi ?></span>

					</div>
				</div>
			</div>
		</div>
	</div>
	<hr>
</div>

<div class="container" style="padding-top:30px; background-image: url(<?php echo base_url('assets/gambar/bg/fs.png') ?>); border-radius: 10px">
	<div class="row">
		<div class="col-lg-8">
			<div class="card" style="border-radius: 10px">
				<div class="card-body">
					<h5 style="padding-bottom: 10px; padding-top: 10px; font-weight: bold;">Deskripsi :</h5>
					<hr>
					<p style="text-align: justify;">
						<?= $this->typography->auto_typography($tampilj->deskripsi); ?>
					</p>
					<hr>
					<h5 style="padding-bottom: 10px; padding-top: 10px; font-weight: bold;">Lokasi :</h5>
					<hr>
					<?= $tampilj->lokasi ?>
					<hr>
					<h5 style="padding-bottom: 10px; padding-top: 10px; font-weight: bold;"><i class="fas fa-info-circle"></i> Syarat dan Ketentuan :</h5>
					<hr>
					<p style="text-align: justify;">
						<?= $this->typography->auto_typography($tampilj->syarat); ?>
					</p>
					<hr>
				</div>
			</div>
		</div>

		<div class="col-lg-4">
			<div class="card fixed" style="border-radius: 10px">
				<div class="card-header bg-light text-dark px-3" style="border-radius: 10px 10px 0px 0px">
					<i style="color:#fdc502 " class="fas fa-award"></i> <span class="font-weight-bold"> Rincian Biaya </span>
				</div>
				<div class="card-body">
					<table class="table">
						<tr>
							<td><?= $tampilj->nama ?></td>
							<td><span class="text-right"><b>Rp <?= number_format($jasa[0]['harga'], 0, ',', '.'); ?>,-</b></span></td>
						</tr>
						<tr>
							<td>Biaya Layanan (0,05%)</td>
							<?php
							$biaya = ($jasa[0]['harga'] * 0.0005);
							?>
							<td><span class="text-right"><b>Rp <?= number_format($biaya, 0, ',', '.'); ?>,-</b></span></td>
						</tr>
						<tr>
							<td>
								<b>
									Total Bayar
								</b>
							</td>
							<?php
							$total = $biaya + $jasa[0]['harga'];
							?>
							<td><span class="text-right text-success"><b>Rp <?= number_format($total, 0, ',', '.'); ?>,-</b></span></td>
						</tr>
					</table>
					<hr>
					<!-- <a href="<?= base_url(); ?>user/payment/<?= $jasa[0]['id'] ?>" class="btn btn-outline-light btn-block" data-toggle="modal" data-target="#hub" style="background-color: #7E4A9E">Pesan</a> -->
					<!-- <button class="btn tmbl-ungu1 btn-block" data-toggle="modal" data-target="#hub">Hubungi EO</button> -->
					<button class="btn tmbl-ungu1 btn-block" data-toggle="modal" data-target="#pesan">Pesan Sekarang</button>
				</div>
			</div>
		</div>

		<!-- Modal Add Product-->
		<div class="modal fade" id="pesan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content" style="border-radius: 10px">
					<div class="modal-header text-light" style="background-color: #7E4A9E; border-radius: 10px 10px 0px 0px">
						<h4>Pilih Tanggal Acara</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<?= form_open_multipart('user/pesanan_saya'); ?>
						<div class="card fixed" style="border-radius: 10px">
							<div class="card-header bg-light text-dark px-3" style="border-radius: 10px 10px 0px 0px">
								<i style="color:#fdc502 " class="fas fa-award"></i> <span class="font-weight-bold"> Checkout </span>
							</div>
							<div class="card-body">
								<label><b>Tanggal Acara</b></label>
								<hr>
								<div class="form-group">
									<input type="hidden" class="form-control" name="id_jasa" id="id_jasa" value="<?= $id_jasa; ?>">
									<input type="hidden" class="form-control" name="id_seller" id="id_seller" value="<?= $jasa[0]['id_seller']; ?>">
									<input type="hidden" class="form-control" name="id_user" id="id_user" value="<?= $user['id']; ?>">
									<input type="date" class="form-control datepicker" name="tgl_acara" id="tgl_acara" required>
									<input type="hidden" class="form-control datepicker" name="tgl_order" id="tgl_order" value="<?= date('Y-m-d'); ?>">
									<input type="hidden" class="form-control" name="subtotal" id="subtotal" value="<?= $total ?>">
								</div>
								<hr>
								<label><b>Rincian Biaya</b></label>
								<table class="table">
									<tr>
										<td><?= $tampilj->nama ?></td>
										<td><span class="text-right"><b>Rp <?= number_format($jasa[0]['harga'], 0, ',', '.'); ?>,-</b></span></td>
									</tr>
									<tr>
										<td>Biaya Layanan (0,05%)</td>
										<td><span class="text-right"><b>Rp <?= number_format($biaya, 0, ',', '.'); ?>,-</b></span></td>
									</tr>
									<tr>
										<td>
											<b>
												Total Bayar
											</b>
										</td>
										<td><span class="text-right text-success"><b>Rp <?= number_format($total, 0, ',', '.'); ?>,-</b></span></td>
									</tr>
								</table>
								<i class="fas fa-info-circle"></i> Biaya Layanan Evoria<br>
								<p style="text-align: justify; font-size: 13px">
									Setiap pemesanan akan dikenai biaya layanan sebesar 0,05% dari harga
								</p>
								<hr>
								<div class="text-center">
									<button class="btn tmbl-ungu1" type="submit" style="margin: auto;">Pesan Sekarang</button>
								</div>
							</div>
						</div>
						</form>

					</div>
				</div>
			</div>
		</div>
		<!-- End Modal Add Product-->

	</div>
	<br>
</div>

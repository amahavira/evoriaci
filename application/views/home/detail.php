<script src="https://kit.fontawesome.com/be4d5ec7e7.js" crossorigin="anonymous"></script>

<?php
$id_jasa = $tampilj->id;
$queryJasa = "SELECT jasa.*, users.nama_bisnis, users.nohp
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
						<p class="card-text"><small class="text-muted">By <?= $jasa[0]['nama_bisnis']; ?></small></p>
						<i class="fas fa-map-marker-alt" style="color: red"></i>
						<span style="font-size: 13px"> <?= $tampilj->lokasi ?></span>

						<style type="text/css">
							.checked {
								color: orange;
							}
						</style>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>

						<div class="d-inline p-2" style="color: #7E4A9E; font-size: 10px">(49)</div>
						<button type="button" class="btn tmbl-ungu">Evoria Partner</button>

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
					<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63245.98363568584!2d110.33982534714258!3d-7.803163972832354!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5787bd5b6bc5%3A0x21723fd4d3684f71!2sYogyakarta%2C%20Kota%20Yogyakarta%2C%20Daerah%20Istimewa%20Yogyakarta!5e0!3m2!1sid!2sid!4v1585040748913!5m2!1sid!2sid" width="100%" height="200" frameborder="0" style="border:0;" allowfullscreen=""></iframe> -->
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
					<i style="color:#fdc502 " class="fas fa-award"></i> <span class="font-weight-bold"> Checkout </span>
					<h6></h6>
				</div>
				<div class="card-body">
					<label><b>Tanggal Acara</b></label>
					<hr>
					<div class="form-inline input-group">
						<input type="date" class="form-control datepicker" name="tgl_order" id="tgl_order" required>
					</div>
					<hr>
					<label><b>Rincian Biaya</b></label>
					<table class="table">
						<tr>
							<td><?= $tampilj->nama ?></td>
							<td><span class="text-right"><b>Rp <?= number_format($jasa[0]['harga'], 0, ',', '.'); ?>,-</b></span></td>
						</tr>
					</table>
					<hr>
					<!-- <a href="<?php echo base_url() ?>home/payment" class="btn btn-outline-light btn-block" style="background-color: #7E4A9E">Pesan</a> -->
					<a href="<?= base_url(); ?>user/payment/<?= $jasa[0]['id'] ?>" class="btn btn-outline-light btn-block" data-toggle="modal" data-target="#hub" style="background-color: #7E4A9E">Pesan</a>
				</div>
			</div>
		</div>

		<!-- Modal Add Product-->
		<div class="modal fade" id="hub" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content" style="border-radius: 10px">
					<div class="modal-header text-light" style="background-color: #7E4A9E; border-radius: 10px 10px 0px 0px">
						<h4>Diskusikan Dengan EO</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">

						<div class="form-group">
							<h4 style="text-align: center;">Silahkan Hubungi Nomor EO :</h4>
						</div>

						<div class="form-group">
							<h1 style="text-align: center;"><?= $jasa[0]['nohp']; ?></h1>
						</div>

					</div>
					<div class="modal-footer text-center">
						<a href="<?= base_url(); ?>user/payment/<?= $jasa[0]['id'] ?>" class="btn btn-outline-light" style="background-color: #7E4A9E; margin:auto;">OK</a>
					</div>
				</div>
			</div>
		</div>
		<!-- End Modal Add Product-->

	</div>
	<br>
</div>
</div>

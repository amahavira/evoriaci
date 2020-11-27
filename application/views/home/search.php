<br>
<div class="container">
	<div class="row">
		<div class="col-lg-12" style="text-align: center;">
			<h4 style="color: #7E4A9E;">Make Your Euforia Event With <span class="font-weight-bold">EVORIA</span></h4>
			<p style="color: #7E4A9E;">Cara cepat, mudah, dan murah mencari Event Organizer sesuai kebutuhan</p>
		</div>
	</div>
</div>
<br>

<!-- background-color: #7E4A9E; -->
<div class="container" style="padding-top:30px; border-radius: 10px; background-image: url(<?php echo base_url('assets/gambar/bg/fs.png') ?>)">
	<div class="container">
		<div class="row">


			<?php foreach ($jasa as $row) : ?>
				<div class="col-lg-3 col-sm-6 portfolio-item">
					<div class="card" style="border-radius: 10px">
						<img class="card-img-top" src="<?= base_url('assets/img/jasa/') . $row['gambar']; ?>" alt="" style="border-radius: 10px 10px 0px 0px">
						<div class="card-body">
							<i class="fas fa-map-marker-alt" style="color: red"></i>
							<span style="font-size: 13px"> <?= $row['lokasi']; ?></span>
							<hr style="margin-top:6px;margin-bottom: 6px">
							<a href="<?= base_url(); ?>user/detail/<?= $row['id'] ?>">
								<div class="card-img-overlay"></div>
								<h5 class="font-weight-bold" style="color: #7E4A9E; margin-bottom: 6px;"><?= $row['nama']; ?></h5>
							</a>
							<p style="font-size: 12px; margin-bottom: 10px;">By <?= $row['nama_bisnis']; ?>
							</p>
							<h6 style="color: #7E4A9E; font-weight: bold; margin-bottom: 10px">Rp. <?= number_format($row['harga'], 0, ',', '.'); ?>
							</h6>
							<div class="col-md-12" style="padding-left: 0px">
								<a href="<?= base_url(); ?>user/detail/<?= $row['id'] ?>" style="font-size: 10px" class="btn tmbl-ungu">Detail</a>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>

		</div>
	</div>
	<br>
</div>

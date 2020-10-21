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

		<!-- start comingsoon -->
		<h1 style="color: #7E4A9E;"><span class="font-weight-bold">FLASH DEAL</span></h1>
		<br>
		<p style="color: #7E4A9E;">Berakhir Dalam :</p>
		<br>

		<div class="cd100" style="width: 50%"></div>

		<script src="<?php echo base_url('assets/comingsoon_06/vendor/jquery/jquery-3.2.1.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/comingsoon_06/vendor/bootstrap/js/popper.js') ?>"></script>
		<script src="<?php echo base_url('assets/comingsoon_06/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/comingsoon_06/vendor/select2/select2.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/comingsoon_06/vendor/countdowntime/flipclock.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/comingsoon_06/vendor/countdowntime/moment.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/comingsoon_06/vendor/countdowntime/moment-timezone.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/comingsoon_06/vendor/countdowntime/moment-timezone-with-data.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/comingsoon_06/vendor/countdowntime/countdowntime.js') ?>"></script>
		<script>
			$('.cd100').countdown100({
				/*Set Endtime here*/
				/*Endtime must be > current time*/
				endtimeYear: 0,
				endtimeMonth: 0,
				endtimeDate: 0,
				endtimeHours: 1,
				endtimeMinutes: 0,
				endtimeSeconds: 0,
				timeZone: ""
				// ex:  timeZone: "America/New_York"
				//go to " http://momentjs.com/timezone/ " to get timezone
			});
		</script>
		<script src="<?php echo base_url('assets/comingsoon_06/vendor/tilt/tilt.jquery.min.js') ?>"></script>
		<script>
			$('.js-tilt').tilt({
				scale: 1.1
			})
		</script>
		<script src="<?php echo base_url('assets/comingsoon_06/js/main.js') ?>"></script>
		<!-- end comingsoon -->

		<!-- Query Jasa -->

		<?php
		$queryJasa = "SELECT `jasa`.*, `users`.`nama_bisnis`
		FROM `jasa` JOIN `users`
		ON `jasa`.`id_seller` = `users`.`id`
";
		$jasa = $this->db->query($queryJasa)->result_array();

		$querySeller = "SELECT * FROM users WHERE role_id = 4";
		$seller = $this->db->query($querySeller)->result_array();
		?>

		<div class="row">

			<?php foreach ($jasa as $row) : ?>
				<div class="col-lg-3 col-sm-6 portfolio-item">
					<div class="card" style="border-radius: 10px">
						<img class="card-img-top" src="<?= base_url('assets/img/jasa/') . $row['gambar']; ?>" alt="" style="border-radius: 10px 10px 0px 0px">
						<div class="card-body">
							<i class="fas fa-map-marker-alt" style="color: red"></i>
							<span style="font-size: 13px"> <?= $row['lokasi']; ?></span>
							<hr style="margin-top:6px;margin-bottom: 6px">
							<!-- <a href="<?php echo base_url() ?>home/detail"> -->
							<a href="<?= base_url(); ?>user/detail/<?= $row['id'] ?>">
								<div class="card-img-overlay"></div>
								<h5 class="font-weight-bold" style="color: #7E4A9E; margin-bottom: 6px;"><?= $row['nama']; ?></h5>
							</a>
							<p style="font-size: 12px; margin-bottom: 10px;">By <?= $row['nama_bisnis']; ?>
							</p>
							<h6 style="color: #7E4A9E; font-weight: bold; margin-bottom: 10px">Rp. <?= number_format($row['harga'], 0, ',', '.'); ?>
							</h6>
							<div class="col-md-12" style="padding-left: 0px">
								<style type="text/css">
									.checked {
										color: orange;
									}
								</style>
								<span class="fa fa-star checked"></span>
								<span class="checked" style="font-size: 12px; font-weight: bold;">5/5</span>

								<div class="d-inline p-2" style="color: #7E4A9E; font-size: 10px">(419)
								</div>
								<button type="button" style="font-size: 10px" class="btn tmbl-ungu">Evoria Partner</button>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>

		</div>

		<div style="text-align: center; color: #7E4A9E;">
			<div class="spinner-border" role="status"></div>
			<br>
			<i>Memuat Paket Lainnya....</i>
		</div>
	</div>
	<br>
</div>

<!-- Button -->
<div id="vendor"></div>
<div class="container text-center">
	<h4 style="padding-top: 30px; padding-bottom: 30px; color: #7E4A9E;">CHOOSE WHAT YOU NEED</h4>
	<!-- Standard button -->
	<button type="button" class="btn tmbl-ungu">Wedding</button>
	<button type="button" class="btn tmbl-ungu">Birthday Party</button>
	<button type="button" class="btn tmbl-ungu">Engagement</button>
	<button type="button" class="btn tmbl-ungu">Corporate Event</button>
	<button type="button" class="btn tmbl-ungu">Anniversary</button>
</div>
<br>

<div class="container" style="padding-top:30px; border-radius: 10px; background-image: url(<?php echo base_url('assets/gambar/bg/fs.png') ?>)">
	<div class="container">
		<div class="row">

			<?php foreach ($seller as $srow) : ?>
				<div class="col-lg-3 col-sm-6 portfolio-item">
					<div class="card" style="border-radius: 10px">

						<!-- Start slideshow -->

						<!-- <div id="demo" class="carousel slide" data-ride="carousel" style="transition-property: opacity">

							<ul class="carousel-indicators">
								<li data-target="#demo" data-slide-to="0" class="active"></li>
								<li data-target="#demo" data-slide-to="1"></li>
								<li data-target="#demo" data-slide-to="2"></li>
							</ul>

							<div class="carousel-inner" style="height: 170px">
								<div class="carousel-item active">
									<img class="card-img-top" src="<?php echo base_url('assets/gambar/event/1.jpg') ?>" alt="" style="border-radius: 10px 10px 0px 0px">
								</div>
								<div class="carousel-item">
									<img class="card-img-top" src="<?php echo base_url('assets/gambar/event/2.jpg') ?>" alt="" style="border-radius: 10px 10px 0px 0px">
								</div>
								<div class="carousel-item">
									<img class="card-img-top" src="<?php echo base_url('assets/gambar/event/3.jpg') ?>" alt="" style="border-radius: 10px 10px 0px 0px">
								</div>
							</div>

							<a class="carousel-control-prev" href="#demo" data-slide="prev">
								<span class="carousel-control-prev-icon"></span>
							</a>
							<a class="carousel-control-next" href="#demo" data-slide="next">
								<span class="carousel-control-next-icon"></span>
							</a>
						</div> -->

						<!-- end slideshow -->

						<img src="<?= base_url('assets/img/profile/') . $srow['image']; ?>" class="card-img-top" alt="Responsive image" style="border-radius: 10px 10px 0px 0px">
						<div class="card-body">
							<i class="fas fa-map-marker-alt" style="color: red"></i>
							<span style="font-size: 13px">Kota <?= $srow['kota']; ?></span>
							<hr style="margin-top:6px;margin-bottom: 6px">
							<!-- <a href="<?php echo base_url() ?>home/p_seller"> -->
							<div class="row">
								<div class="col-md-12" style="padding-left: auto">
									<a href="<?= base_url(); ?>user/p_seller/<?= $srow['id'] ?>">
										<h9 class="font-weight-bold pr-2" style="color: #7E4A9E"><?= $srow['nama_bisnis']; ?></h9>
									</a>
									<button type="button" style="font-size: 10px;" class="btn tmbl-ungu">Evoria Partner</button>
								</div>
							</div>
							<div class="col-md-12 pt-3" style="padding-left: 0px">
								<style type="text/css">
									.checked {
										color: orange;
									}
								</style>
								<!-- <span class="fa fa-star checked"></span>
								<div class="d-inline checked" style="font-size: 12px; font-weight: bold;"><?= $ratings  ?>/5</div>
								<div class="d-inline p-1" style="color: #7E4A9E; font-size: 12px">(<?= $pembagi  ?>)</div> -->
								<p class="card-text">Social Media :</p>
								<p class="card-text"><?= $srow['medsos'] ?></p>
							</div>
							<!-- <p style="font-size: 12px; margin-bottom: 5px;">
								Bidang Kategori :
							</p>
							<div class="col-md-12" style="padding-left: 0px">
								<span class="badge badge-info" style="border-radius: 40px; background-color: #7E4A9E; margin-bottom: 10px;">Wedding</span>
								<span class="badge badge-info" style="border-radius: 40px; background-color: #7E4A9E; margin-bottom: 10px;">Engagement</span>
								<span class="badge badge-info" style="border-radius: 40px; background-color: #7E4A9E; margin-bottom: 10px;">Anniversary</span>
							</div> -->
						</div>
					</div>
				</div>
			<?php endforeach; ?>

		</div>

		<div style="text-align: center; color: #7E4A9E;">
			<div class="spinner-border" role="status"></div>
			<br>
			<i>Memuat Paket Lainnya....</i>
		</div>
	</div>
	<br>
</div>

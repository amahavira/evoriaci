<br>
<div class="container">
	<div class="row">
		<div class="col-lg-12" style="text-align: center;">
			<h4 style="color: #7E4A9E;">Sesuaikan Kebutuhan Anda</h4>
		</div>
	</div>
</div>
<br>
<div class="container" style="padding-top:10px; padding-bottom: 10px; background-image: url(<?php echo base_url('assets/gambar/bg/fs.png') ?>); border-radius: 10px">
	<div class="container" style="height: auto;">
		<br>
		<?= form_open_multipart('user/filter'); ?>
		<div class="row justify-content-center">
			<div class="col-lg-5">
				<div class="form-group">
					<div class="form-group"><label for="kategori"><strong>Kategori Paket</strong></label>
						<select class="form-control" name="id_kategori" id="id_kategori" required>
							<option value="">Pilih Kategori</option>
							<?php foreach ($kategori_jasa as $row) : ?>
								<option value="<?= $row['id']; ?>"><?= $row['nama']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="form-group"><label for="kategori"><strong>Range Harga</strong></label>
					<?php
					$min = $this->db->query("SELECT MIN(harga) FROM jasa")->result_array();
					$max = $this->db->query("SELECT MAX(harga) FROM jasa")->result_array();
					?>

					<style>
						body {
							font-family: 'Karla', 'Arial', sans-serif;
							font-weight: 500;
							background: #fff;
						}

						p {
							padding: 0;
							margin: 0;
						}

						.wrapper {
							height: auto;
							display: flex;
							flex-direction: column;
							justify-content: center;
							align-items: center;
						}

						.filter-price {
							width: 100%;
							border: 0;
							padding: 0;
							margin: 0;
						}

						.price-title {
							position: relative;
							color: #fff;
							font-size: 14px;
							line-height: 1.2em;
							font-weight: 400;
							background: #d58e32;
							padding: 10px;
						}

						.price-container {
							display: flex;
							border: 1px solid #ccc;
							padding: 5px;
							width: auto;
						}

						.price-field {
							position: relative;
							width: 100%;
							height: 36px;
							box-sizing: border-box;
							padding-top: 15px;
							padding-left: 0px;
						}

						.price-field input[type=range] {
							position: absolute;
						}

						/* Reset style for input range */

						.price-field input[type=range] {
							width: 100%;
							height: 7px;
							border: 1px solid #000;
							outline: 0;
							box-sizing: border-box;
							border-radius: 5px;
							pointer-events: none;
							-webkit-appearance: none;
						}

						.price-field input[type=range]::-webkit-slider-thumb {
							-webkit-appearance: none;
						}

						.price-field input[type=range]:active,
						.price-field input[type=range]:focus {
							outline: 0;
						}

						.price-field input[type=range]::-ms-track {
							width: 188px;
							height: 2px;
							border: 0;
							outline: 0;
							box-sizing: border-box;
							border-radius: 5px;
							pointer-events: none;
							background: transparent;
							border-color: transparent;
							color: red;
							border-radius: 5px;
						}

						/* Style toddler input range */

						.price-field input[type=range]::-webkit-slider-thumb {
							/* WebKit/Blink */
							position: relative;
							-webkit-appearance: none;
							margin: 0;
							border: 0;
							outline: 0;
							border-radius: 50%;
							height: 10px;
							width: 10px;
							margin-top: -4px;
							background-color: #fff;
							cursor: pointer;
							cursor: pointer;
							pointer-events: all;
							z-index: 100;
						}

						.price-field input[type=range]::-moz-range-thumb {
							/* Firefox */
							position: relative;
							appearance: none;
							margin: 0;
							border: 0;
							outline: 0;
							border-radius: 50%;
							height: 10px;
							width: 10px;
							margin-top: -5px;
							background-color: #fff;
							cursor: pointer;
							cursor: pointer;
							pointer-events: all;
							z-index: 100;
						}

						.price-field input[type=range]::-ms-thumb {
							/* IE */
							position: relative;
							appearance: none;
							margin: 0;
							border: 0;
							outline: 0;
							border-radius: 50%;
							height: 10px;
							width: 10px;
							margin-top: -5px;
							background-color: #242424;
							cursor: pointer;
							cursor: pointer;
							pointer-events: all;
							z-index: 100;
						}

						/* Style track input range */

						.price-field input[type=range]::-webkit-slider-runnable-track {
							/* WebKit/Blink */
							width: 188px;
							height: 2px;
							cursor: pointer;
							background: #555;
							border-radius: 5px;
						}

						.price-field input[type=range]::-moz-range-track {
							/* Firefox */
							width: 188px;
							height: 2px;
							cursor: pointer;
							background: #242424;
							border-radius: 5px;
						}

						.price-field input[type=range]::-ms-track {
							/* IE */
							width: 188px;
							height: 2px;
							cursor: pointer;
							background: #242424;
							border-radius: 5px;
						}

						/* Style for input value block */

						.price-wrap {
							display: flex;
							color: #242424;
							font-size: 14px;
							line-height: 1.2em;
							font-weight: 400;
							margin-bottom: 0px;
						}

						.price-wrap-1,
						.price-wrap-2 {
							display: flex;
							margin-left: 0px;
						}

						.price-title {
							margin-right: 5px;
						}

						.price-wrap_line {
							margin: 6px 0px 5px 5px;
						}

						.price-wrap #one,
						.price-wrap #two {
							width: 100%;
							text-align: right;
							margin: 0;
							padding: 0;
							margin-right: 2px;
							background: 0;
							border: 0;
							outline: 0;
							color: #242424;
							font-family: 'Karla', 'Arial', sans-serif;
							font-size: 14px;
							line-height: 1.2em;
							font-weight: 400;
						}

						.price-wrap label {
							text-align: right;
							margin-top: 6px;
							padding-left: 5px;
						}

						/* Style for active state input */

						.price-field input[type=range]:hover::-webkit-slider-thumb {
							box-shadow: 0 0 0 0.5px #242424;
							transition-duration: 0.3s;
						}

						.price-field input[type=range]:active::-webkit-slider-thumb {
							box-shadow: 0 0 0 0.5px #242424;
							transition-duration: 0.3s;
						}
					</style>
					<div class="wrapper">
						<fieldset class="filter-price">
							<div class="price-field">
								<input type="range" min="<?= $min[0]["MIN(harga)"]; ?>" max="<?= $max[0]["MAX(harga)"]; ?>" value="<?= $min[0]["MIN(harga)"]; ?>" id="lower" name="lower">
								<input type="range" min="<?= $min[0]["MIN(harga)"]; ?>" max="<?= $max[0]["MAX(harga)"]; ?>" value="<?= $max[0]["MAX(harga)"]; ?>" id="upper" name="upper">
							</div>
							<div class="price-wrap">
								<div class="price-container">
									<div class="price-wrap-1">
										<label for="one">Rp. </label>
										<input id="one" style="width: 90px;">
									</div>
									<div class="price-wrap_line"> - </div>
									<div class="price-wrap-2">
										<label for="two">Rp. </label>
										<input id="two" style="width: 90px;">
									</div>
								</div>
							</div>
						</fieldset>
					</div>

					<script>
						var lowerSlider = document.querySelector('#lower');
						var upperSlider = document.querySelector('#upper');

						document.querySelector('#two').value = upperSlider.value;
						document.querySelector('#one').value = lowerSlider.value;

						var lowerVal = parseInt(lowerSlider.value);
						var upperVal = parseInt(upperSlider.value);

						upperSlider.oninput = function() {
							lowerVal = parseInt(lowerSlider.value);
							upperVal = parseInt(upperSlider.value);

							if (upperVal < lowerVal + 4) {
								lowerSlider.value = upperVal - 4;
								if (lowerVal == lowerSlider.min) {
									upperSlider.value = 4;
								}
							}
							document.querySelector('#two').value = this.value
						};

						lowerSlider.oninput = function() {
							lowerVal = parseInt(lowerSlider.value);
							upperVal = parseInt(upperSlider.value);
							if (lowerVal > upperVal - 4) {
								upperSlider.value = lowerVal + 4;
								if (upperVal == upperSlider.max) {
									lowerSlider.value = parseInt(upperSlider.max) - 4;
								}
							}
							document.querySelector('#one').value = this.value
						};
					</script>
				</div>
			</div>
			<div class="col-lg-2" style="margin: auto;">
				<div class="form-group">
					<button class="btn tmbl-ungu1" type="submit">Cari</button>
				</div>
			</div>
		</div>
		</form>
	</div>
</div>
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
	<?php foreach ($kategori_jasa as $krow) : ?>
		<button type="button" class="btn tmbl-ungu"><?= $krow['nama'] ?></button>
	<?php endforeach; ?>
</div>
<br>

<div class="container" style="padding-top:30px; border-radius: 10px; background-image: url(<?php echo base_url('assets/gambar/bg/fs.png') ?>)">
	<div class="container">
		<div class="row">

			<?php foreach ($seller as $srow) : ?>
				<div class="col-lg-3 col-sm-6 portfolio-item">
					<div class="card" style="border-radius: 10px">
						<img src="<?= base_url('assets/img/profile/') . $srow['image']; ?>" class="card-img-top" alt="" style="border-radius: 10px 10px 0px 0px">
						<div class="card-body">
							<i class="fas fa-map-marker-alt" style="color: red"></i>
							<span style="font-size: 13px">Kota <?= $srow['kota']; ?></span>
							<hr style="margin-top:6px;margin-bottom: 6px">
							<a href="<?= base_url(); ?>user/p_seller/<?= $srow['id'] ?>">
								<div class="card-img-overlay"></div>
								<h5 class="font-weight-bold" style="color: #7E4A9E; margin-bottom: 6px;"><?= $srow['nama_bisnis']; ?></h5>
							</a>
							<div class="col-md-12 pt-3" style="padding-left: 0px">
								<style type="text/css">
									.checked {
										color: orange;
									}
								</style>
								<p class="card-text">Social Media :</p>
								<p class="card-text"><?= $srow['medsos'] ?></p>
							</div>
							<div class="col-md-12 pt-3" style="padding-left: 0px">
								<button type="button" style="font-size: 10px;" class="btn tmbl-ungu">Evoria Partner</button>
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

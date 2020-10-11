<script src="https://kit.fontawesome.com/be4d5ec7e7.js" crossorigin="anonymous"></script>

<div class="container">
	<div class="row justify-content-md-center">
		<div class="card mb-3" style=" border-radius: 10px; width: 100%">
			<div class="row no-gutters" style="margin: 10px">
				<div class="col-md-3">
					<img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img" alt="Responsive image" style="height: 150px; width: 150px; border-radius: 50%; margin-left: 30%">
				</div>
				<div class="col-md-9">
					<div class="card-body">
						<div class="col-md-12">
							<h4 class="card-title font-weight-bold" style="color: #7E4A9E"><?= $user['nama_bisnis']; ?></h4>
						</div>
						<div class="col-md-12">
							<i class="fas fa-map-marker-alt" style="color: red"></i>
							<span style="font-size: 13px"><b> <?= $user['kota']; ?> </b></span>

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

							<div class="d-inline p-2" style="color: #7E4A9E; font-size: 10px">(1256)</div>
							<span class="btn tmbl-ungu">Evoria Partner</span>
							<a class="btn tmbl-ungu1" href="<?= base_url('user/data_bisnis'); ?>">Edit Profile Bisnis</a>
						</div>
						<div class="col-md-12">
							<span class="badge badge-info" style="border-radius: 40px; background-color: #7E4A9E; margin-bottom: 10px;">Wedding</span>
							<span class="badge badge-info" style="border-radius: 40px; background-color: #7E4A9E; margin-bottom: 10px;">Engagement</span>
							<span class="badge badge-info" style="border-radius: 40px; background-color: #7E4A9E; margin-bottom: 10px;">Anniversary</span>
						</div>
						<div class="col-md-12">
							<p class="card-text"><?= $user['alamat']; ?></p>
							<p class="card-text"><?= $user['tentang']; ?></p>
							<p class="card-text"><i style="color: blue;"><?= $user['nohp']; ?></i></p>
							<p class="card-text">Social Media :</p>
							<p class="card-text"><?= $user['medsos']; ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr>
</div>

<!-- Button -->
<div class="container text-center">
	<!-- Standard button -->
	<button type="button" class="btn tmbl-ungu"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Product</button>
	<button type="button" class="btn tmbl-ungu"><i class="fa fa-th" aria-hidden="true"></i> Project</button>
	<button type="button" class="btn tmbl-ungu"><i class="fa fa-question-circle-o" aria-hidden="true"></i> FaQ</button>
</div>
<br>

<!-- Query Jasa -->

<?php
// $id_seller = $this->session->userdata('id');
$id_seller = $user['id'];
$queryJasa = "SELECT * FROM jasa WHERE id_seller = $id_seller";

$jasa = $this->db->query($queryJasa)->result_array();
?>

<div class="container" style="padding-top:30px; border-radius: 10px; background-image: url(<?php echo base_url('assets/gambar/bg/fs.png') ?>)">
	<div class="container">
		<div class="row">

			<?php foreach ($jasa as $row) : ?>
				<div class="col-lg-3 col-sm-6 portfolio-item">
					<div class="card" style="border-radius: 10px">
						<img class="card-img-top" src="<?= base_url('assets/img/jasa/') . $row['gambar']; ?>" alt="" style="border-radius: 10px 10px 0px 0px">
						<div class="card-body">
							<i class="fas fa-map-marker-alt" style="color: red"></i>
							<span style="font-size: 13px"> <?= $row['lokasi']; ?> </span>
							<hr style="margin-top:6px;margin-bottom: 6px">
							<a href="<?php echo base_url() ?>user/detail">
								<div class="card-img-overlay"></div>
								<h5 class="font-weight-bold" style="color: #7E4A9E; margin-bottom: 6px;"><?= $row['nama']; ?></h5>
							</a>
							<p style="font-size: 12px; margin-bottom: 10px;">By <?= $user['nama_bisnis']; ?>
							</p>
							<h6 style="color: #7E4A9E; font-weight: bold; margin-bottom: 10px">Rp. <?= number_format($row['harga'], 0, ',', '.'); ?>
								<!-- <del style="font-size: 12px">Rp. 55.000.000</del> -->
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
			<div class="spinner-border" role="status"></div><br>
			<i>Memuat Paket Lainnya....</i>
		</div>
		<br>
	</div>
</div>

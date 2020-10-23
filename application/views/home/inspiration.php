<div class="py-5">
	<div class="container" style="padding-top:30px; border-radius: 10px; background-image: url(<?php echo base_url('assets/gambar/bg/fs.png') ?>)">
		<div class="container">
			<div class="row">
				<div class="text-center mx-auto col-md-8">
					<h1 class="mb-3" style="color: #7E4A9E">Inspirasi</h1>
					<p class="lead" style="color: #7E4A9E">I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world.</p>
				</div>
			</div>
			<br>
			<hr>
			<br>
			<div class="row">
				<?php foreach ($tampil as $row) : ?>
					<div class="col-lg-3 col-sm-6 portfolio-item">
						<div class="card" style="border-radius: 10px">
							<a target="_blank" href="<?= base_url() ?>assets/img/inspirasi/<?= $row['gambar']; ?>">
								<img src="<?= base_url('assets/img/inspirasi/') . $row['gambar']; ?>" class="card-img-top" alt="Responsive image" style="border-radius: 10px 10px 0px 0px">
							</a>
							<div class="card-body">
								<i class="fas fa-map-marker-alt" style="color: red"></i>
								<span style="font-size: 13px"><?= $row['alamat']; ?></span>
								<hr style="margin-top:6px;margin-bottom: 6px">
								<div class="row">
									<div class="col-md-12" style="padding-left: auto">
										<h5 class="font-weight-bold" style="color: #7E4A9E; margin-bottom: 6px;"><?= $row['nama']; ?></h5>
										<p style="font-size: 12px; margin-bottom: 10px;">By <?= $row['nama_bisnis']; ?>
										</p>
									</div>
								</div>
								<div class="col-md-12 pt-3" style="padding-left: 0px">
									<p class="card-text">Social Media :</p>
									<p class="card-text"><?= $row['medsos'] ?></p>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>

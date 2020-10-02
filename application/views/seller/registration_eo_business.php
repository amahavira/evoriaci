<div class="container">

	<!-- Outer Row -->
	<div class="row justify-content-center">

		<div class="col-lg-8">
			<br>
			<br>
			<div class="card o-hidden border-1 my-5">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg">
							<div class="p-5">
								<div class="text-center">
									<h4 style="color: #7E4A9E; text-align: left;">Data Tentang Bisnis Anda</h4>
									<br>
								</div>
								<?= $this->session->flashdata('message'); ?>
								<form class="seller" method="POST" action="<?= base_url('seller/registration_eo_business'); ?>">
									<div class="form-group">
										<h6 style="color: #7E4A9E; text-align: left;">Isikan Nama Bisnis Anda</h6>
										<input value="<?= set_value('nama'); ?>" type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Bisnis">
										<?= form_error('nama1', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<div class="form-group">
										<h6 style="color: #7E4A9E; text-align: left;">Tentang Bisnis Anda</h6>
										<textarea value="<?= set_value('tentang'); ?>" class="form-control form-control-user" id="tentang" name="tentang" placeholder="Ceritakan tentang bisnis Anda...">
                                                    <?= form_error('tentang', '<small class="text-danger pl-3">', '</small>'); ?></textarea>
									</div>
									<div class="form-group">
										<h6 style="color: #7E4A9E; text-align: left;">Alamat Bisnis Anda</h6>
										<textarea value="<?= set_value('alamat'); ?>" class="form-control form-control-user" id="alamat" name="alamat">
                                                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?></textarea>
									</div>
									<div class="form-group">
										<h6 style="color: #7E4A9E; text-align: left;">Kota</h6>
										<input value="<?= set_value('kota'); ?>" type="text" class="form-control form-control-user" id="kota" name="kota" placeholder="Kota">
										<?= form_error('kota', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<div class="form-group">
										<h6 style="color: #7E4A9E; text-align: left;">Media Sosial</h6>
										<textarea value="<?= set_value('sosial'); ?>" class="form-control form-control-user" id="sosial" name="sosial"></textarea>
									</div>
									<div class="form-group">
										<h6 style="color: #7E4A9E; text-align: left;">Unggah Dokumen NPWP</h6>
										<input value="<?= set_value('npwp'); ?>" type="file" class="form-control form-control-user" id="npwp" name="npwp">
										<?= form_error('npwp', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<div class="form-group">
										<h6 style="color: #7E4A9E; text-align: left;">Range Harga</h6>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
											<label class="form-check-label" for="exampleRadios1">
												Dibawah Rp. 10.000.000
											</label>
										</div>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
											<label class="form-check-label" for="exampleRadios2">
												Rp. 10.000.000 - Rp. 25.000.000
											</label>
										</div>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3">
											<label class="form-check-label" for="exampleRadios3">
												Diatas Rp. 25.000.000
											</label>
										</div>
										<!-- <input value="<?= set_value('kota'); ?>" type="text" class="form-control form-control-user" id="kota" name="kota" placeholder="Kota">
                                                            <?= form_error('kota', '<small class="text-danger pl-3">', '</small>'); ?> -->
									</div>
									<br>
									<div class="col-md-12">
										<button type="submit" class="btn tmbl1-ungu1">
											Daftar
										</button>
									</div>
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
</div>

<div class="container">

	<!-- Outer Row -->
	<div class="row justify-content-center">

		<div class="col-lg-12">
			<div class="card o-hidden border-1 my-5">
				<div class="card-body p-0">
					<br>
					<h3 style="color: #7E4A9E; text-align: center;">Daftar Akun Bisnis</h3>
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg">
							<div class="p-5">
								<!-- <?= $this->session->flashdata('message'); ?> -->
								<form class="user" method="POST" action="<?= base_url('auth/registration_eo'); ?>" enctype="multipart/form-data">
									<div class=" row">
										<div class="col-md-6">
											<div class="text-center">
												<h4 style="color: #7E4A9E; text-align: left;">Data Pribadi Pemilik Bisnis</h4>
												<br>
											</div>
											<div class="form-group">
												<h6 style="color: #7E4A9E; text-align: left;">Isikan Nama Lengkap Anda</h6>
												<input value="<?= set_value('name'); ?>" type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama Lengkap">
												<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
											<div class="form-group">
												<h6 style="color: #7E4A9E; text-align: left;">Nomor Telepon Bisnis</h6>
												<input value="<?= set_value('nohp'); ?>" type="number" class="form-control form-control-user" id="nohp" name="nohp" placeholder="Nomor Telepon">
												<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
											<div class="form-group">
												<h6 style="color: #7E4A9E; text-align: left;">Isikan Email Bisnis Anda</h6>
												<input value="<?= set_value('email'); ?>" type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan Email Anda">
												<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
											<h6 style="color: #7E4A9E; text-align: left;">Isikan Password Anda</h6>
											<div class="form-group row">
												<div class="col-sm-6 mb-3 mb-sm-0">
													<input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
													<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
												<div class="col-sm-6">
													<input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<div class="text-center">
												<h4 style="color: #7E4A9E; text-align: left;">Data Tentang Bisnis Anda</h4>
												<br>
											</div>
											<div class="form-group">
												<h6 style="color: #7E4A9E; text-align: left;">Isikan Nama Bisnis Anda</h6>
												<input value="<?= set_value('nama_bisnis'); ?>" type="text" class="form-control form-control-user" id="nama_bisnis" name="nama_bisnis" placeholder="Nama Bisnis">
												<?= form_error('nama_bisnis', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
											<div class="form-group">
												<h6 style="color: #7E4A9E; text-align: left;">Tentang Bisnis Anda</h6>
												<textarea value="<?= set_value('tentang'); ?>" class="form-control form-control-user" id="tentang" name="tentang" placeholder="Ceritakan tentang bisnis Anda..."><?= set_value('tentang'); ?></textarea>
												<?= form_error('tentang', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
											<div class="form-group">
												<h6 style="color: #7E4A9E; text-align: left;">Alamat Bisnis Anda</h6>
												<textarea value="<?= set_value('alamat'); ?>" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat bisnis Anda..."><?= set_value('alamat'); ?></textarea>
												<?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
											<div class="form-group">
												<h6 style="color: #7E4A9E; text-align: left;">Kota</h6>
												<input value="<?= set_value('kota'); ?>" type="text" class="form-control form-control-user" id="kota" name="kota" placeholder="Kota">
												<?= form_error('kota', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
											<div class="form-group">
												<h6 style="color: #7E4A9E; text-align: left;">Media Sosial</h6>
												<textarea value="<?= set_value('medsos'); ?>" class="form-control form-control-user" id="medsos" name="medsos" placeholder="Instagram : @instagrambisnis"><?= set_value('medsos'); ?></textarea>
												<?= form_error('medsos', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
											<div class="form-group">
												<h6 style="color: #7E4A9E; text-align: left;">Unggah Dokumen NPWP</h6>
												<div class="custom-file">
													<input type="file" class="custom-file-input" id="npwp" name="npwp" required>
													<label class="custom-file-label text-left" for="npwp">Pilih Dokumen PDF</label>
												</div>
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

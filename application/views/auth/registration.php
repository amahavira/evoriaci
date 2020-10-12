<div class="container">

	<div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
		<div class="card-body p-0">
			<!-- Nested Row within Card Body -->
			<div class="row">
				<div class="col-lg">
					<div class="p-5">
						<div class="text-center">
							<h1 class="h4 text-gray-900 mb-4" style="color: #7E4A9E;">Buatlah Akun Anda!</h1>
						</div>
						<form class="user" method="POST" action="<?= base_url('auth/registration'); ?>">
							<div class="form-group">
								<input value="<?= set_value('name'); ?>" type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama Lengkap">
								<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<input value="<?= set_value('email'); ?>" type="text" class="form-control form-control-user" id="email" name="email" placeholder="Alamat Email">
								<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<input value="<?= set_value('pekerjaan'); ?>" type="text" class="form-control form-control-user" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan">
								<?= form_error('pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<input value="<?= set_value('alamat'); ?>" type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat">
								<?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<input value="<?= set_value('nohp'); ?>" type="text" class="form-control form-control-user" id="nohp" name="nohp" placeholder="Nomor Telepon">
								<?= form_error('nohp', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
									<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
								<div class="col-sm-6">
									<input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
								</div>
							</div>
							<button type="submit" class="btn tmbl1-ungu1 btn-block">
								Daftarkan Akun
							</button>
						</form>
						<hr>
						<div class="text-center">
							<a class="small" href="<?= base_url('auth'); ?>">Sudah punya akun? Silahkan Login!</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

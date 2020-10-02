<div class="container">

	<!-- Outer Row -->
	<div class="row justify-content-center">

		<div class="col-lg-6">
			<br>
			<br>
			<div class="card o-hidden border-0 my-5">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg">
							<div class="p-5">
								<div class="text-center">
									<h4 style="color: #7E4A9E; text-align: left;">Sudah mempunyai akun?</h4>
									<h6 style="color: #7E4A9E; text-align: left;">Isikan email dan password Anda</h6>
									<br>
								</div>
								<?= $this->session->flashdata('message'); ?>
								<form class="user" method="POST" action="<?= base_url('auth'); ?>">
									<div class="form-group">
										<input value="<?= set_value('email'); ?>" type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address...">
										<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<div class="form-group">
										<input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
										<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<div class="text-left">
										<a class="small" href="<?= base_url('auth/forgotpassword'); ?>" style="color: #7E4A9E;">Forgot Password?</a>
									</div>
									<br>
									<button type="submit" style="font-size: 10px" class="btn tmbl1-ungu1">
										Login
									</button>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-6">
			<div class="card o-hidden border-0 my-5">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg">
							<div class="p-4">
								<form class="user" method="POST" action="<?= base_url('auth'); ?>">
									<div class="text-center">
										<h4 style="color: #7E4A9E; text-align: left;">Bergabunglah dengan EVORIA dan dapatkan akses ke</h4>
										<h2 style="color: #7E4A9E; text-align: left;">10 ribu Event Organizer terpercaya</h2>
										<br>
									</div>
									<a class="btn tmbl1-ungu1" href="<?= base_url('auth/registration'); ?>">Buat Akun</a>
								</form>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg">
							<div class="p-4">
								<form class="user" method="POST" action="<?= base_url('auth'); ?>">
									<div class="text-center">
										<h4 style="color: #7E4A9E; text-align: left;">Daftar sebagai Event Organizer</h4>
										<h2 style="color: #7E4A9E; text-align: left;">Gratis!</h2>
										<br>
									</div>
									<a class="btn tmbl1-ungu1" href="<?= base_url('auth/login_eo'); ?>">Daftar EO</a>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

</div>

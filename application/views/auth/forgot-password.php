<div class="container">

	<!-- Outer Row -->
	<div class="row justify-content-center">

		<div class="col-lg-7">

			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg">
							<div class="p-5">
								<div class="text-center">
									<h1 class="h4 mb-4" style="color: #7E4A9E;">Lupa Password</h1>
								</div>
								<?= $this->session->flashdata('message'); ?>
								<form class="user" method="POST" action="<?= base_url('auth/forgotpassword'); ?>">
									<div class="form-group">
										<input value="<?= set_value('email'); ?>" type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan Alamt Email...">
										<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<button type="submit" class="btn tmbl1-ungu1 btn-block">
										Reset Password
									</button>

								</form>
								<hr>
								<div class="text-center">
									<a class="small" href="<?= base_url('auth'); ?>">Kembali Ke Login</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

</div>

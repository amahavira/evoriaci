<div class="container">

	<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

	<div class="row">
		<div class="col-lg-6">
			<?= $this->session->flashdata('message'); ?>
			<form action="<?= base_url('user/changepassword'); ?>" method="POST">

				<div class="form-group">
					<label for="currentPassword">Password Saat Ini</label>
					<input type="password" class="form-control" id="currentPassword" name="currentPassword">
					<?= form_error('currentPassword', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>

				<div class="form-group">
					<label for="newPassword1">Password Saat Ini</label>
					<input type="password" class="form-control" id="newPassword1" name="newPassword1">
					<?= form_error('newPassword1', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>

				<div class="form-group">
					<label for="newPassword2">Ulangi Password</label>
					<input type="password" class="form-control" id="newPassword2" name="newPassword2">
					<?= form_error('newPassword2', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">
						Ubah Password
					</button>
				</div>

			</form>
		</div>
	</div>



</div>

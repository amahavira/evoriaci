<div class="container" style="padding-left:7px;padding-right:7px">
	<h3 class="text-dark mb-4">Profile EO/Seller</h3>
	<?= $this->session->flashdata('message'); ?>
	<?= form_open_multipart('user/edit'); ?>
	<div class="row mb-3">
		<div class="col-lg-4">
			<div class="card mb-3">
				<div class="form-group">
					<div class="card-body text-center shadow">
						<img class="rounded-circle mb-3 mt-4" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" width="160" height="160">
						<div class="mb-3">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="image" name="image">
								<label class="custom-file-label text-left" for="image">Pilih Foto</label>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="text-primary font-weight-bold m-0">Projects</h6>
				</div>
				<div class="card-body">
					<h4 class="small font-weight-bold">Server migration<span class="float-right">20%</span></h4>
					<div class="progress progress-sm mb-3">
						<div class="progress-bar bg-danger" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"><span class="sr-only">20%</span></div>
					</div>
					<h4 class="small font-weight-bold">Sales tracking<span class="float-right">40%</span></h4>
					<div class="progress progress-sm mb-3">
						<div class="progress-bar bg-warning" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"><span class="sr-only">40%</span></div>
					</div>
					<h4 class="small font-weight-bold">Customer Database<span class="float-right">60%</span></h4>
					<div class="progress progress-sm mb-3">
						<div class="progress-bar bg-primary" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"><span class="sr-only">60%</span></div>
					</div>
					<h4 class="small font-weight-bold">Payout Details<span class="float-right">80%</span></h4>
					<div class="progress progress-sm mb-3">
						<div class="progress-bar bg-info" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"><span class="sr-only">80%</span></div>
					</div>
					<h4 class="small font-weight-bold">Account setup<span class="float-right">Complete!</span></h4>
					<div class="progress progress-sm mb-3">
						<div class="progress-bar bg-success" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"><span class="sr-only">100%</span></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-8">
			<div class="row mb-3 d-none">
				<div class="col">
					<div class="card text-white bg-primary shadow">
						<div class="card-body">
							<div class="row mb-2">
								<div class="col">
									<p class="m-0">Peformance</p>
									<p class="m-0"><strong>65.2%</strong></p>
								</div>
								<div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
							</div>
							<p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="card text-white bg-success shadow">
						<div class="card-body">
							<div class="row mb-2">
								<div class="col">
									<p class="m-0">Peformance</p>
									<p class="m-0"><strong>65.2%</strong></p>
								</div>
								<div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
							</div>
							<p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="card shadow mb-3">
						<div class="card-header py-3">
							<p class="text-primary m-0 font-weight-bold">Data Pengguna</p>
						</div>
						<div class="card-body">
							<div class="form-row">
								<div class="col">
									<div class="form-group">
										<label for="email"><strong>Email</strong></label>
										<input value="<?= $user['email']; ?>" readonly type="email" class="form-control" type="text" placeholder="Email" id="email" name="email">
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<label for="name"><strong>Nama Lengkap</strong></label>
										<input value="<?= $user['name']; ?>" type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap">
										<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col">
									<div class="form-group">
										<label for="nohp"><strong>Nomor HP</strong></label>
										<input value="<?= $user['nohp']; ?>" type="text" class="form-control" id="nohp" name="nohp" placeholder="Nomor HP">
										<?= form_error('nohp', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<label for="pekerjaan"><strong>Pekerjaan</strong></label>
										<input value="<?= $user['pekerjaan']; ?>" type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan">
										<?= form_error('pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<button class="btn btn-primary btn-sm" type="submit">Update Profil</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</form>
</div>

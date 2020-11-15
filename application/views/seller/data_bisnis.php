<div class="container" style="padding-left:7px;padding-right:7px">
	<h3 class="text-dark mb-4">Profile Bisnis EO/Seller</h3>
	<?= $this->session->flashdata('message'); ?>
	<?= form_open_multipart('seller/data_bisnis'); ?>
	<div class="row mb-3">
		<div class="col-lg-4">
			<div class="card mb-3">
				<div class="form-group">
					<div class="card-body text-center shadow">
						<iframe src="<?= base_url('assets/dokumen/npwp/') . $user['npwp']; ?>" class="img-thumbnail" width="160" height="160"></iframe>
						<a target="_blank" href="<?= base_url() ?>assets/dokumen/npwp/<?= $user['npwp']; ?>">
							<p class="text-center pt-2">Lihat PDF</p>
						</a>
						<div class="mb-3">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="npwp" name="npwp">
								<label class="custom-file-label text-left" for="npwp">Pilih PDF</label>
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
							<input value="<?= $user['email']; ?>" readonly class="form-control" type="hidden" id="email" name="email">
							<div class="form-row">
								<div class="col">
									<div class="form-group">
										<label for="nama_bisnis"><strong>Nama Bisnis</strong></label>
										<input value="<?= $user['nama_bisnis']; ?>" type="text" class="form-control" id="nama_bisnis" name="nama_bisnis" placeholder="Nama Bisnis">
										<?= form_error('nama_bisnis', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<label for="tentang"><strong>Deskripsi Bisnis</strong></label>
										<textarea value="<?= $user['tentang']; ?>" class="form-control" id="tentang" name="tentang"><?= $user['tentang']; ?></textarea>
										<?= form_error('tentang', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col">
									<div class="form-group">
										<label for="alamat"><strong>Alamat Bisnis</strong></label>
										<textarea value="<?= $user['alamat']; ?>" class="form-control" id="alamat" name="alamat"><?= $user['alamat']; ?></textarea>
										<?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<label for="kota"><strong>Kota</strong></label>
										<input value="<?= $user['kota']; ?>" type="text" class="form-control" id="kota" name="kota" placeholder="Kota">
										<?= form_error('kota', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col">
									<div class="form-group">
										<label for="medsos"><strong>Media Sosial</strong></label>
										<textarea value="<?= $user['medsos']; ?>" class="form-control" id="medsos" name="medsos"><?= $user['medsos']; ?></textarea>
										<?= form_error('medsos', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<button class="btn btn-primary btn-sm" type="submit">Update Profil Bisnis</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</form>
</div>

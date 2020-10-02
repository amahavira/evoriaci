<div class="container">
	<div class="d-flex flex-column" id="content-wrapper">
		<div class="container" style="padding-left:7px;padding-right:7px">
			<div id="content">
				<div class="container-fluid">
					<h3 class="text-dark mb-4">Tambah Jasa</h3>
					<?= $this->session->flashdata('message'); ?>
					<form class="user" method="POST" action="<?= base_url('user/tambah_jasa'); ?>" enctype="multipart/form-data">
						<div class="row mb-3">
							<div class="col-lg-4">
								<div class="card mb-3">
									<div class="form-group">
										<div class="card-body text-center shadow">
											<img class="rounded-circle mb-3 mt-4" src="<?php echo base_url('assets/img/jasa/default_produk.png') ?>" width="160" height="160">
											<div class="mb-3">
												<div class="custom-file">
													<input type="file" class="custom-file-input" id="gambar" name="gambar" required>
													<label class="custom-file-label text-left" for="gambar">Pilih Foto</label>
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
												<p class="text-primary m-0 font-weight-bold">Data Paket</p>
											</div>
											<div class="card-body">
												<!-- <div class="form-row">
													<div class="col">
														<div class="form-group">
															<label for="id_seller"><strong>ID Seller</strong><br></label> -->
												<!-- <input value="<?= $user['id']; ?>" class="form-control" type="text" id="id_seller" name="id_seller" disabled> -->
												<input value="<?= set_value('id_seller' . $user['id']) . $user['id']; ?>" class="form-control" type="hidden" id="id_seller" name="id_seller">
												<!-- </div>
													</div>
												</div> -->
												<div class="form-row">
													<div class="col">
														<div class="form-group">
															<label for="nama"><strong>Nama Paket</strong></label>
															<input value="<?= set_value('nama'); ?>" class="form-control" type="text" placeholder="Contoh : Paket Pernikahan" id="nama" name="nama">
															<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
														</div>
													</div>
													<div class="col">
														<div class="form-group">
															<div class="form-group"><label for="kategori"><strong>Kategori Paket</strong></label>
																<select class="form-control" name="id_kategori" id="id_kategori" required>
																	<option value="">Pilih Kategori</option>
																	<?php foreach ($kategori_jasa as $row) : ?>
																		<option value="<?= $row['id']; ?>"><?= $row['nama']; ?></option>
																	<?php endforeach; ?>
																</select>
															</div>
														</div>
													</div>
												</div>
												<div class="form-row">
													<div class="col">
														<div class="form-group">
															<label for="lokasi"><strong>Lokasi Layanan</strong></label>
															<input <?= set_value('lokasi'); ?> class="form-control" type="text" placeholder="Lokasi Layanan" id="lokasi" name="lokasi"></div>
														<?= form_error('lokasi', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
													<div class="col">
														<div class="form-group">
															<label for="harga"><strong>Harga Paket</strong></label>
															<input <?= set_value('lokasi'); ?> class="form-control" type="text" placeholder="Harga Paket" id="harga" name="harga"></div>
														<?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>
												<div class="form-row">
													<div class="col">
														<div class="form-group"><label for="deskripsi"><strong>Deskripsi Isi Paket</strong><br></label><textarea class="form-control" rows="4" placeholder="Contoh : 1. Dekorasi, 2. Vendor Makanan, 3. MUA, dll" id="deskripsi" name="deskripsi"></textarea></div>
													</div>
												</div>
												<div class="form-row">
													<div class="col">
														<div class="form-group"><label for="syarat"><strong>Syarat & Ketentuan</strong><br></label><textarea class="form-control" rows="4" placeholder="Jelaskan syarat & ketentuan untuk paket jasa ini" name="syarat"></textarea></div>
													</div>
												</div>
												<div class="form-group"><button class="btn btn-primary btn-sm" type="submit">Tambah Jasa</button></div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

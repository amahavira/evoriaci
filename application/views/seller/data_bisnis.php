<div class="container">
	<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

	<div class="row">
		<div class="col-lg-8">
			<?= form_open_multipart('user/data_bisnis'); ?>

			<div class="form-group row">
				<label for="email" class="col-sm-2 col-form-label">Nama Bisnis Anda</label>
				<div class="col-sm-10">
					<input value="<?= $user['nama_bisnis']; ?>" type="text" class="form-control" id="nama_bisnis" name="nama_bisnis" placeholder="Nama Bisnis">
				</div>
			</div>

			<div class="form-group row">
				<label for="tentang" class="col-sm-2 col-form-label">Deskripsi Bisnis</label>
				<div class="col-sm-10">
					<textarea value="<?= $user['tentang']; ?>" class="form-control" id="tentang" name="tentang"><?= $user['tentang']; ?></textarea>
					<?= form_error('tentang', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="alamat" class="col-sm-2 col-form-label">Alamat Bisnis</label>
				<div class="col-sm-10">
					<textarea value="<?= $user['alamat']; ?>" class="form-control" id="alamat" name="alamat"><?= $user['alamat']; ?></textarea>
					<?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="kota" class="col-sm-2 col-form-label">Kota</label>
				<div class="col-sm-10">
					<input value="<?= $user['kota']; ?>" type="text" class="form-control" id="kota" name="Kota" placeholder="Kota">
				</div>
			</div>

			<div class="form-group row">
				<label for="medsos" class="col-sm-2 col-form-label">Media Sosial</label>
				<div class="col-sm-10">
					<textarea value="<?= $user['medsos']; ?>" class="form-control" id="medsos" name="medsos"><?= $user['medsos']; ?></textarea>
					<?= form_error('medsos', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
			</div>

			<div class="form-group row">
				<div class="col-sm-2">
					Dokumen NPWP
				</div>
				<div class="col-sm-10">
					<div class="row">
						<div class="col-sm-3">
							<iframe src="<?= base_url('assets/dokumen/npwp/') . $user['npwp']; ?>" class="img-thumbnail"></iframe>
							<a target="_blank" href="<?= base_url() ?>assets/dokumen/npwp/<?= $user['npwp']; ?>">
								<p class="text-center pt-2">Lihat PDF</p>
							</a>
						</div>
						<div class="col-sm-9">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="npwp" name="npwp">
								<label class="custom-file-label" for="npwp">Choose file</label>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group row justify-content-end">
				<div class="col-sm-10">
					<button type="submit" class="btn btn-primary">Edit</button>
				</div>
			</div>


			</form>

		</div>
	</div>

</div>

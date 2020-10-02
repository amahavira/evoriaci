<div class="form-row">
	<div class="col">
		<div class="form-group">
			<select class="form-control" name="id" id="id">
				<option value="">Pilih Kategori</option>
				<?php foreach ($kategori_jasa as $row) : ?>
					<option value="<?= $row['id']; ?>"><?= $row['nama']; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
</div>

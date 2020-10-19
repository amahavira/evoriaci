<?php
$id_pesanan = $tampilp->id;
$queryJasa = "SELECT jasa.*, users.*, pemesanan.*
FROM jasa 
JOIN users ON jasa.id_seller = users.id
JOIN pemesanan ON jasa.id = pemesanan.id_jasa
WHERE pemesanan.id = $id_pesanan";
$jasa = $this->db->query($queryJasa)->result_array();

$id_user = $user['id'];
$queryUser = "SELECT * FROM users WHERE id = $id_user";
$user = $this->db->query($queryUser)->result_array();
?>

<div class="container">
	<div class="modal-content" id="sukses" style="display: none; border-radius: 10px">
		<div class="modal-header text-light" style="background-color: #7E4A9E; border-radius: 10px 10px 0px 0px">
			<h4>INVOICE PEMESANAN</h4>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-lg-12">
					<label><b>Data Pemesan</b></label>
					<table class="table">
						<tr>
							<td> Nama </td>
							<td><span class="text-right"><?= $user[0]['name']; ?></span></td>
						</tr>
						<tr>
							<td> No HP </td>
							<td><span class="text-right"><?= $user[0]['nohp']; ?></span></td>
						</tr>
						<tr>
							<td> E-mail </td>
							<td><span class="text-right"><?= $user[0]['email']; ?></span></td>
						</tr>
					</table>
					<hr>
					<label><b>Rincian Biaya</b></label>
					<table class="table">
						<tr>
							<td> <?= $jasa[0]['nama'] ?> </td>
							<td><span class="text-right"><b>Rp <?= number_format($jasa[0]['harga'], 0, ',', '.'); ?>,-</b></span></td>
						</tr>
					</table>
					<hr>
					<label><b>Status Pembayaran</b></label>
					<hr>
					<label>LUNAS</label>
					<hr>
					<div class="container text-center">
						<?= form_open_multipart('user/pembayaran'); ?>
						<input type="hidden" class="form-control" name="id" id="id" value="<?= $jasa[0]['id']; ?>">
						<input type="hidden" class="form-control" name="status" id="status" value="2">
						<button type="submit" class="btn btn-outline-light" style="background-color: #7E4A9E; margin:auto;">OK</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

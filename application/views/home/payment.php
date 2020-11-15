<script src="https://kit.fontawesome.com/be4d5ec7e7.js" crossorigin="anonymous"></script>

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
	<div class="row justify-content-md-center">
		<div class="card mb-3" style=" border-radius: 10px; width: 100%">
			<div class="row no-gutters" style="margin: 10px">
				<div class="col-md-3">
					<img src="<?= base_url('assets/img/jasa/') . $jasa[0]['gambar']; ?>" class="card-img" alt="Responsive image" style="height: 150px; width: auto; border-radius: 5%; margin-left: 10%;">
				</div>
				<div class="col-md-9">
					<div class="card-body">
						<h4 class="card-title font-weight-bold" style="color: #7E4A9E"><?= $jasa[0]['nama'] ?></h4>
						<!--  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
						<p class="card-text pb-3"><small class="text-muted">By <?= $jasa[0]['nama_bisnis']; ?></small></p>
						<i class="fas fa-map-marker-alt" style="color: red"></i>
						<span style="font-size: 13px"> <?= $jasa[0]['lokasi'] ?></span>

					</div>
				</div>
			</div>
		</div>
	</div>
	<hr>
</div>


<div class="container" style="padding-top:30px; background-image: url(<?php echo base_url('assets/gambar/bg/fs.png') ?>); border-radius: 10px">
	<div class="row">
		<div class="col-lg-8">
			<div class="card" style="border-radius: 10px">
				<div class="card-body">

					<h5 style="padding-bottom: 10px; padding-top: 10px; font-weight: bold; text-align: center;">MEMORANDUM OF UNDERSTANDING (MOU)</h5>
					<p style="text-align: justify; margin: 10px">
						Yang bertanda tangan di bawah ini :
					</p>
					<br>
					<table class="table">
						<tr>
							<td> Nama </td>
							<td> : </td>
							<td><span class="text-right"><b><?= $jasa[0]['name']; ?></b></span></td>
						</tr>
						<tr>
							<td> Jabatan </td>
							<td> : </td>
							<td><span class="text-right"><b><?= $jasa[0]['pekerjaan']; ?> <?= $jasa[0]['nama_bisnis']; ?></b></span></td>
						</tr>
						<tr>
							<td> Alamat </td>
							<td> : </td>
							<td><span class="text-right"><b><?= $jasa[0]['alamat']; ?></b></span></td>
						</tr>
						<tr>
							<td colspan="12"> Yang mana selanjutnya akan disebut sebagai <b>Pihak Pertama</b> </td>
						</tr>

						<td><br></td>

						<tr>
							<td> Nama </td>
							<td> : </td>
							<td><span class="text-right"><b><?= $user[0]['name']; ?></b></span></td>
						</tr>
						<tr>
							<td> Jabatan </td>
							<td> : </td>
							<td><span class="text-right"><b><?= $user[0]['pekerjaan']; ?></b></span></td>
						</tr>
						<tr>
							<td> Alamat </td>
							<td> : </td>
							<td><span class="text-right"><b><?= $user[0]['alamat']; ?></b></span></td>
						</tr>
						<tr>
							<td colspan="12"> Yang mana selanjutnya akan disebut sebagai <b>Pihak Kedua</b> </td>
						</tr>
						<td></td>
					</table>

					<p style="text-align: justify; margin: 10px">
						Berdasarkan hal tersebut di atas maka kedua bgelah pihak bersepakat untuk mengadakan perjanjian kerjasama untuk waktu tertentu dengan syarat dan ketentuan sebagai berikut :
					</p>
					<p style="text-align: justify; margin: 10px">
						1. Pihak <b>Pertama</b> memberikan fasilitas acara yaitu :
					</p>
					<ul class="list-group">
						<li class="list-group-item"><?= $this->typography->auto_typography($jasa[0]['deskripsi']); ?></li>
					</ul>
					<hr>
					<p style="text-align: justify; margin: 10px">
						2. Pihak <b>Kedua</b> mentaati syarat dan ketentuan yaitu :
					</p>
					<ul class="list-group">
						<li class="list-group-item"><?= $this->typography->auto_typography($jasa[0]['syarat']); ?></li>
					</ul>
					<hr>
				</div>
			</div>
		</div>

		<div class="col-lg-4">
			<div class="card fixed" style="border-radius: 10px">
				<div class="card-header bg-light text-dark px-3" style="border-radius: 10px 10px 0px 0px">
					<i style="color:#fdc502 " class="fas fa-award"></i> <span class="font-weight-bold">Checkout</span>
					<h6></h6>
				</div>
				<div class="card-body">
					<label><b>Data Pemesan</b></label>
					<table class="table">
						<tr>
							<td> Nama: </td>
							<td><span class="text-right"><?= $user[0]['name']; ?></span></td>
						</tr>
						<tr>
							<td> No HP: </td>
							<td><span class="text-right"><?= $user[0]['nohp']; ?></span></td>
						</tr>
						<tr>
							<td> E-mail: </td>
							<td><span class="text-right"><?= $user[0]['email']; ?></span></td>
						</tr>
					</table>
					<hr>
					<label><b>Rincian Biaya</b></label>
					<table class="table">
						<tr>
							<td><?= $jasa[0]['nama'] ?></td>
							<td><span class="text-right"><b>Rp <?= number_format($jasa[0]['subtotal'], 0, ',', '.'); ?>,-</b></span></td>
						</tr>
					</table>
					<hr>
					<label><b>Metode Pembayaran</b></label>
					<div>
						<hr>
						<label>Pembayaran Instan :</label>
						<br>
						<center>
							<img src="<?php echo base_url('assets/gambar/pay/1.png') ?>" width="300px" height="auto">
						</center>
						<hr>
						<label>Tranfer Bank :</label>
						<br>
						<center>
							<img src="<?php echo base_url('assets/gambar/pay/2.png') ?>" width="300px" height="auto">
						</center>
						<hr>
						<label>Kartu Kredit/Debit :</label>
						<br>
						<center>
							<img src="<?php echo base_url('assets/gambar/pay/3.png') ?>" width="300px" height="auto">
						</center>
						<hr>
					</div>
					<button class="btn tmbl-ungu1 btn-block" data-toggle="modal" data-target=".bd-example-modal-lg">Pesan</button>
				</div>
			</div>
		</div>

		<!-- Large modal -->
		<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content" id="pay" style="border-radius: 10px">
					<div class="modal-header text-light" style="background-color: #7E4A9E; border-radius: 10px 10px 0px 0px">
						<td><?= $jasa[0]['nama'] ?> </td>
						<td><span class="text-right">
								<h4>Rp <?= number_format($jasa[0]['subtotal'], 0, ',', '.'); ?>,-</h4>
							</span></td>
					</div>
					<div class="modal-body">
						<img src="<?php echo base_url('assets/gambar/pay/bca.png') ?>" width="100px" height="auto">
						<p>No. Rekening:</p>
						<table class="table">
							<tr>
								<td>
									<h2 style="color: #336699">126 081262406367</h2>
								</td>
								<td><button class="btn btn-outline-dark btn-sm rounded-pill"><i class="fas fa-copy"></i> salin</button></td>
							</tr>
						</table>
						<p style="font-size: 14px">
							<span class="text-primary" style="font-size: 12px">Dicek dalam 10 menit</span>
						</p>
						<br>
						<div class="accordion" id="accordionExample">
							<div class="card">
								<div class="card-header" id="headingOne" style="padding:0px">
									<h2 class="mb-0">
										<button class="btn" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
											<b>Petunjuk Transfer melalui Mesin ATM</b>
										</button>
									</h2>
								</div>

								<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
									<div class="card-body">
										<p style="font-size: 14px">
											1. Masukkan kartu ATM ke tempat yang tersedia. <br>
											2. Selanjutnya, pilih bahasa yang ingin Anda gunakan. Untuk mempermudah prosesnya, Anda bisa memilih bahasa Indonesia. Tunggu sesaat hingga muncul tampilan menu baru. Setelah muncul, klik pilihan LANJUTKAN yang ada pada bagian pojok bawah layar. <br>
											3. Masukkan PIN ATM <br>
											4. Pilih Transaksi lainnya <br>
											5. Pilih transfer <br>
											6. Masukkan kode bank dan nomor rekening tujuan <br>
											7. Masukkan jumlah nominal uang <br>
											8. Masukkan nomor referensi. Jika tidak ada nomor referensi tertentu, Anda bisa lewati langkah ini. <br>
											9. Terakhir jangan lupa ambil Kartu ATM Anda <br>
										</p>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingTwo" style="padding:0px">
									<h2 class="mb-0">
										<button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
											<b>Petunjuk Transfer melalui Mobile Banking</b>
										</button>
									</h2>
								</div>
								<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
									<div class="card-body">
										<p style="font-size: 14px">
											1. Buka aplikasi dan login. <br>
											2. Untuk mengirim uang, tap menu Transfer. <br>
											3. Pada halaman baru, masukkan nomor rekening bank yang dituju. <br>
											4. Masukkan jumlah transfer yang akan dikirim. <br>
											5. Klik OK. Lalu, masukkan PIN Mobile Banking Anda / Password transaksi. Klik OK. <br>
											6. Unduh Bukti Transfer <br>
										</p>
									</div>
								</div>
							</div>
						</div>
						<br>
						<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
						<script>
							$(document).ready(function() {
								$("#tombol").click(function() {
									$("#pay").hide();
									$("#upload").show();
									$("#sukses").hide();
								});
							});
						</script>
						<div class="container text-center">
							<button class="btn tmbl-ungu1" id="tombol">
								Saya Sudah Bayar
							</button>
						</div>
					</div>
				</div>

				<!-- Modal Add Product-->
				<div class="modal-content" id="upload" style="display: none; border-radius: 10px">
					<div class="modal-header text-light" style="background-color: #7E4A9E; border-radius: 10px 10px 0px 0px">
						<h4>Upload Bukti Bayar</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<?= form_open_multipart('user/upload_bukti'); ?>
						<div class="card fixed" style="border-radius: 10px">
							<div class="card-body">
								<hr>
								<label><b>Rincian Biaya</b></label>
								<table class="table">
									<tr>
										<td><?= $jasa[0]['nama'] ?></td>
										<td><span class="text-right"><b>Rp <?= number_format($jasa[0]['subtotal'], 0, ',', '.'); ?>,-</b></span></td>
									</tr>
								</table>
								<hr>
								<div class="form-group">
									<input type="hidden" class="form-control" name="id" id="id" value="<?= $id_pesanan; ?>">
									<input type="hidden" class="form-control" name="status" id="status" value="2">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="bukti_bayar" name="bukti_bayar" required>
										<label class="custom-file-label text-left" for="bukti_bayar">Pilih Foto</label>
									</div>
								</div>
								<hr>
								<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
								<script>
									$(document).ready(function() {
										$("#tombol1").click(function() {
											$("#pay").hide();
											$("#upload").hide();
											$("#sukses").show();
										});
									});
								</script> -->
								<div class="text-center">
									<button class="btn tmbl-ungu1" type="submit">Upload Bukti Bayar</button>
								</div>
							</div>
						</div>
						</form>

					</div>
				</div>
				<!-- End Modal Add Product-->

				<!-- <div class="modal-content" id="sukses" style="display: none; border-radius: 10px">
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
				</div> -->
			</div>
		</div>

	</div>
	<br>
</div>

<script src="https://kit.fontawesome.com/be4d5ec7e7.js" crossorigin="anonymous"></script>

<?php
$id_jasa = $tampilp->id;
$queryJasa = "SELECT jasa.*, users.*
FROM jasa JOIN users
ON jasa.id_seller = users.id
WHERE jasa.id = $id_jasa";
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
					<img src="<?= base_url('assets/img/jasa/') . $tampilp->gambar; ?>" class="card-img" alt="Responsive image" style="height: 150px; width: auto; border-radius: 5%; margin-left: 10%;">
				</div>
				<div class="col-md-9">
					<div class="card-body">
						<h4 class="card-title font-weight-bold" style="color: #7E4A9E"><?= $tampilp->nama ?></h4>
						<!--  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
						<p class="card-text"><small class="text-muted">By <?= $jasa[0]['nama_bisnis']; ?></small></p>
						<i class="fas fa-map-marker-alt" style="color: red"></i>
						<span style="font-size: 13px"> <?= $tampilp->lokasi ?></span>

						<style type="text/css">
							.checked {
								color: orange;
							}
						</style>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>

						<div class="d-inline p-2" style="color: #7E4A9E; font-size: 10px">(49)</div>
						<button type="button" class="btn tmbl-ungu">Evoria Partner</button>

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
						1. Pihak I memberikan perlengkapan acara yaitu :
					</p>
					<ul class="list-group">
						<li class="list-group-item">Dekorasi Rumah</li>
						<li class="list-group-item">Dekorasi Resepsi</li>
						<li class="list-group-item">Catering</li>
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
							<td><?= $tampilp->nama ?></td>
							<td><span class="text-right"><b>Rp <?= number_format($jasa[0]['harga'], 0, ',', '.'); ?>,-</b></span></td>
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
					<button class="btn btn-outline-light btn-block" style="background-color: #7E4A9E" data-toggle="modal" data-target=".bd-example-modal-lg">Pesan</button>
				</div>
			</div>
		</div>

		<!-- Large modal -->
		<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content" id="pay" style="border-radius: 10px">
					<div class="modal-header text-light" style="background-color: #7E4A9E; border-radius: 10px 10px 0px 0px">
						<td>1 x Engagement Packaged </td>
						<td><span class="text-right">
								<h4>Rp 50.000.000,-</h4>
							</span></td>
					</div>
					<div class="modal-body">
						<img src="<?php echo base_url('assets/gambar/pay/bca.png') ?>" width="100px" height="auto">
						<p>No. Virtual Account:</p>
						<table class="table">
							<tr>
								<td>
									<h2 style="color: #336699">126 081262406367</h2>
								</td>
								<td><button class="btn btn-outline-dark btn-sm rounded-pill"><i class="fas fa-copy"></i> salin</button></td>
							</tr>
						</table>
						<p style="font-size: 14px">
							<span class="text-primary" style="font-size: 12px">Dicek otomatis dalam 10 menit</span> <br>
							Bayar pesanan ke Virtual Account di atas sebelum membuat pesanan kembali dengan Virtual Account agar nomor tetap sama. Hanya menerima transfer dari Bank BCA.</p>
						<div class="accordion" id="accordionExample">
							<div class="card">
								<div class="card-header" id="headingOne" style="padding:0px">
									<h2 class="mb-0">
										<button class="btn" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
											<b>Petunjuk Transfer melalui ATM</b>
										</button>
									</h2>
								</div>

								<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
									<div class="card-body">
										<p style="font-size: 14px">
											1. Lorem ipsum dolor > sit amet > consectetur <br>
											2. adipisicing elit, sed do eiusmod tempor <br>
											3. Tempor incididunt ut labore et dolore magna <br>
											4. Aliqua. Ut enim ad minim veniam,quis nostrud <br>
											5. Ullamco laboris nisi ut aliquip ex ea commodo <br>
										</p>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingTwo" style="padding:0px">
									<h2 class="mb-0">
										<button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
											<b>Petunjuk Transfer melalui BCA Mobile</b>
										</button>
									</h2>
								</div>
								<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
									<div class="card-body">
										Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingThree" style="padding:0px">
									<h2 class="mb-0">
										<button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
											<b>Petunjuk Transfer melalui KlikBCA</b>
										</button>
									</h2>
								</div>
								<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
									<div class="card-body">
										Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
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
									$("#sukses").show();
								});
							});
						</script>
						<div class="container text-center">
							<button class="btn btn-outline-light" id="tombol" style="background-color: #7E4A9E">
								Saya Sudah Bayar
							</button>
						</div>
					</div>
				</div>

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
										<td><span class="text-right"> Steven Paidi</span></td>
									</tr>
									<tr>
										<td> No HP </td>
										<td><span class="text-right">081234543234</span></td>
									</tr>
									<tr>
										<td> E-mail </td>
										<td><span class="text-right"> paidicuk@gmail.com</span></td>
									</tr>
								</table>
								<hr>
								<label><b>Rincian Biaya</b></label>
								<table class="table">
									<tr>
										<td> 1 x Engagement Packaged </td>
										<td><span class="text-right"><b>Rp 50.000.000,-</b></span></td>
									</tr>
								</table>
								<hr>
								<label><b>Status Pembayaran</b></label>
								<hr>
								<label>LUNAS</label>
								<hr>
								<div class="container text-center">
									<!-- <a href="<?php echo base_url() ?>home/index" class="btn btn-outline-light" style="background-color: #7E4A9E">Kembali</a> -->
									<a href="<?php echo base_url() ?>user/evoria" class="btn btn-outline-light" style="background-color: #7E4A9E">Kembali</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<br>
</div>

<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?php echo $judul; ?></title>
	<link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/gambar/logo/icon.png') ?>" rel="shortcut icon">
	<link href="<?php echo base_url('assets/css/modern-business.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/navbar-style1.css') ?>" rel="stylesheet">
	<link href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">

	<!-- Custom styles for this template-->
	<link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('assets/fonts/fontawesome-all.min.css') ?>">

	<style type="text/css">
		/*Body Styling */
		.tmbl {
			margin: 5px;
		}

		/* Boostrap Buttons Styling */

		.tmbl-ungu {
			font-family: Raleway-SemiBold;
			font-size: 13px;
			color: rgba(108, 88, 179, 0.75);
			letter-spacing: 1px;
			line-height: 15px;
			border: 2px solid rgba(108, 89, 179, 0.75);
			border-radius: 40px;
			background: transparent;
			transition: all 0.3s ease 0s;
		}

		.tmbl-ungu:hover {
			color: #FFF;
			background: rgba(108, 88, 179, 0.75);
			border: 2px solid rgba(108, 89, 179, 0.75);
		}

		.tmbl-ungu1 {
			font-family: Raleway-SemiBold;
			font-size: 13px;
			color: white;
			letter-spacing: 1px;
			line-height: 15px;
			border: 2px solid rgba(108, 89, 179, 0.75);
			border-radius: 40px;
			background-color: #7E4A9E;
			transition: all 0.3s ease 0s;
		}

		.tmbl-ungu1:hover {
			color: #FFF;
			background: rgba(108, 88, 179, 0.75);
			border: 2px solid rgba(108, 89, 179, 0.75);
		}
	</style>

	<script src="https://kit.fontawesome.com/be4d5ec7e7.js" crossorigin="anonymous"></script>

</head>

<body id="page-top">
	<div class="container" style="padding-left:7px;padding-right:7px">
		<nav class="navbar fixed-top navbar-expand-lg navbar-dark  fixed-top" style="background-color: white;">
			<div class="container">
				<a class="navbar-brand" href="<?php echo base_url() ?>"><img src="<?php echo base_url('assets/gambar/logo/evoria.png') ?>" width="100px" height="auto"></a>
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarResponsive">
					<div class="col-9">
						<!-- <div class="input-group">
							<input type="text" class="form-control" placeholder="Search">
						</div> -->
					</div>

					<ul class="navbar-nav ml-auto">

						<li class="nav-item btn-group">
							<a href="<?= base_url('auth'); ?>" class="btn btn-outline-light btn-sm" style="width: 100px; background-color: #7E4A9E;">Masuk</a>
						</li>

						<li class="nav-item btn-group">
							<a href="<?= base_url('auth/login_eo'); ?>" class="btn btn-outline-light btn-sm" style="width: 100px; background-color: #7E4A9E;">Daftar EO</a>
						</li>

					</ul>
				</div>
			</div>
		</nav>
		<div class="row align-items-center">
			<div class="col-lg-12">
				<nav class="navbar navbar-expand-lg navbar-light">

					<div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
						<ul class="navbar-nav">
							<li class="nav-item active">
								<a class="nav-link" style="color: #7E4A9E;" href="<?php echo base_url() ?>seller/halaman_bisnis">Dashboard</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" style="color: #7E4A9E;" href="<?php echo base_url() ?>seller/profile">Profile</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" style="color: #7E4A9E;" href="<?php echo base_url() ?>seller/edit_profile">Edit
									Profile</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" style="color: #7E4A9E;" href="<?php echo base_url() ?>seller/table">Table</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" style="color: #7E4A9E;" href="<?php echo base_url() ?>seller/login">Login</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" style="color: #7E4A9E;" href="<?php echo base_url() ?>seller/register">Register</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
		<hr>
	</div>

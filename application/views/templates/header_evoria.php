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
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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

	<!-- timer -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/comingsoon_06/vendor/animate/canimate.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/comingsoon_06/vendor/select2/select2.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/comingsoon_06/vendor/countdowntime/flipclock.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/comingsoon_06/css/cutil.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/comingsoon_06/css/cmain.css') ?>">

	<script src="https://kit.fontawesome.com/be4d5ec7e7.js" crossorigin="anonymous"></script>
</head>

<body id="page-top">
	<div class="container" style="padding-left:7px;padding-right:7px">
		<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-white topbar">
			<div class="container">
				<a class="navbar-brand" href="<?php echo base_url() ?>user/evoria"><img src="<?php echo base_url('assets/gambar/logo/evoria.png') ?>" width="100px" height="auto"></a>
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarResponsive">
					<div class="col-9">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search">
						</div>
					</div>
				</div>

				<!-- Topbar Navbar -->
				<ul class="navbar-nav ml-auto">

					<div class="topbar-divider d-none d-sm-block"></div>

					<!-- Nav Item - User Information -->
					<li class="nav-item dropdown no-arrow">
						<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="mr-2 d-none d-lg-inline text-gray-600 small">
								<?= $user['name']; ?>
							</span>
							<img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['image']; ?>">
						</a>
						<!-- Dropdown - User Information -->
						<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
							<a class="dropdown-item" href="<?php echo base_url() ?>user">
								<i class="fas fa-fw fa-user fa-sm mr-2 text-gray-400"></i>
								My Profile
							</a>
							<a class="dropdown-item" href="<?php echo base_url() ?>user/edit">
								<i class="fas fa-fw fa-user-edit fa-sm mr-2 text-gray-400"></i>
								Edit Profile
							</a>
							<a class="dropdown-item" href="<?php echo base_url() ?>user/changepassword">
								<i class="fas fa-fw fa-key fa-sm mr-2 text-gray-400"></i>
								Change Password
							</a>

							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
								<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
								Logout
							</a>
						</div>
					</li>

				</ul>
			</div>

		</nav>
		<!-- End of Topbar -->


		<div class="row align-items-center">
			<div class="col-lg-12">
				<nav class="navbar navbar-expand-lg navbar-light">
					<div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
						<ul class="navbar-nav">
							<?php
							$role_id = $this->session->userdata('role_id');
							$queryMenu = "SELECT `user_menu`.`id`, `menu`
									FROM `user_menu` JOIN `user_access_menu`
									ON `user_menu`.`id` = `user_access_menu`.`menu_id`
									WHERE `user_access_menu`.`role_id` = $role_id
									ORDER BY `user_access_menu`.`menu_id` ASC
									";

							$menu = $this->db->query($queryMenu)->result_array();
							?>

							<!-- Looping Menu -->
							<?php foreach ($menu as $row) : ?>

								<!-- Siapkan sub-menu sesuai Menu -->
								<?php
								$menu_id = $row['id'];
								$querySubMenu = "SELECT * FROM `user_sub_menu` 
										WHERE `menu_id` = $menu_id
										AND `is_active` = 1
										";

								$subMenu = $this->db->query($querySubMenu)->result_array();
								?>

								<?php foreach ($subMenu as $row) : ?>
									<?php if ($judul == $row['title']) : ?>

										<li class="nav-item active">
										<?php else : ?>
										<li class="nav-item">
										<?php endif; ?>
										<a class="nav-link pb-0" style="color: #7E4A9E;" href="<?= base_url($row['url']); ?>">
											<span><?= $row['title'] ?></span></a>
										</li>
									<?php endforeach; ?>

								<?php endforeach; ?>
						</ul>
					</div>
				</nav>
			</div>
		</div>
		<!-- </div> -->
		<!-- </div> -->
		<hr>
	</div>

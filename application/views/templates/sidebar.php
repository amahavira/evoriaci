<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-code"></i>
		</div>
		<div class="sidebar-brand-text mx-3">EVORIA</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Query Menu -->
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
		<div class="sidebar-heading">
			<?= $row['menu']; ?>
		</div>

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
				<a class="nav-link pb-0" href="<?= base_url($row['url']); ?>">
					<i class="<?= $row['icon'] ?>"></i>
					<span><?= $row['title'] ?></span></a>
				</li>
			<?php endforeach; ?>

			<!-- Divider -->
			<hr class="sidebar-divider mt-3">

		<?php endforeach; ?>

		<!-- Sidebar Toggler (Sidebar) -->
		<div class="text-center d-none d-md-inline">
			<button class="rounded-circle border-0" id="sidebarToggle"></button>
		</div>

</ul>
<!-- End of Sidebar -->

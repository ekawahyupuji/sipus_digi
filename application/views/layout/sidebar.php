<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

	<ul class="sidebar-nav" id="sidebar-nav">
		<!--Query menu-->
		<?php
		$role_id = $this->session->userdata('role_id');
		$queryMenu = "SELECT user_menu.id, menu
		FROM user_menu JOIN user_access_menu ON user_menu.id = user_access_menu.menu_id
		WHERE user_access_menu.role_id = $role_id order by user_access_menu.menu_id ASC ";

		$menu = $this->db->query($queryMenu)->result_array();

		?>

		<!--Looping Menu-->
		<?php foreach ($menu as $m) : ?>
			<li class="nav-heading"><?= $m['menu']; ?></li>

			<!--Siapkan SUB-MENU sesuai Menu-->
			<?php
			$menuId = $m['id'];
			$querySubMenu = "SELECT * 
			FROM user_sub_menu 
			JOIN user_menu ON user_sub_menu.menu_id = user_menu.id
			WHERE user_sub_menu.menu_id = $menuId
			AND user_sub_menu.is_active = 1";

			$subMenu = $this->db->query($querySubMenu)->result_array();
			?>
			<hr class="sidebar-divider">

			<?php foreach ($subMenu as $sm) : ?>
				<li class="nav-item active">
					<a class="nav-link collapsed" href="<?= base_url($sm['url']); ?>">
						<i class="<?= $sm['icon']; ?>"></i>
						<span><?= $sm['title']; ?></span>
					</a>
				</li><!-- End Dashboard Nav -->
			<?php endforeach; ?>

		<?php endforeach; ?>

		<li class="nav-item">
			<a class="nav-link collapsed" href="<?= base_url();?>auth/logout">
				<i class="bi bi-box-arrow-in-right"></i>
				<span>Logout</span>
			</a>
		</li><!-- End Login Page Nav -->
	</ul>

</aside><!-- End Sidebar-->

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
		<div class="sidebar-brand-icon">
			<i class="fas fa-cat"></i>
		</div>
		<div class="sidebar-brand-text mx-3 text-uppercase">PetShop</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Nav Item - Dashboard -->
	<li class="nav-item active">
		<a class="nav-link" href="<?= base_url("dashboard") ?>">
			<i class="fas fa-fw fa-chart-line"></i>
			<span>Dashboard</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		Menu
	</div>
	<?php if ($this->session->userdata("role_id") == 1) : ?>
		<li class="nav-item">
			<a href="<?= base_url("kelola-user") ?>" class="nav-link">
				<i class="fas fa-fw fa-users"></i>
				<span>Kelola User</span>
			</a>
		</li>
	<?php endif; ?>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
			<i class="fas fa-fw fa-shopping-bag"></i>
			<span>Kelola Produk</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?= base_url("kelola-kategori") ?>">Kelola Kategori</a>
				<a class="collapse-item" href="<?= base_url("kelola-produk") ?>">Kelola Item</a>
			</div>
		</div>
	</li>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
			<i class="fas fa-fw fa-cat"></i>
			<span>Kelola Grooming</span>
		</a>
		<div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?= base_url("paket-grooming") ?>">Kelola Tipe</a>
				<a class="collapse-item" href="<?= base_url("kelola-grooming") ?>">Kelola Grooming</a>
			</div>
		</div>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url(""); ?>">
			<i class="fas fa-fw fa-credit-card"></i>
			<span>Kelola Transaksi</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url(""); ?>">
			<i class="fas fa-fw fa-file"></i>
			<span>Laporan</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url("profile"); ?>">
			<i class="fas fa-fw fa-user"></i>
			<span>Profile Saya</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url("auth/logout"); ?>">
			<i class="fas fa-fw fa-sign-out-alt"></i>
			<span>Logout</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>

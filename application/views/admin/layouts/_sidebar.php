<div class="main-sidebar sidebar-style-2">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand">
			<a href="<?= base_url() ?>">Tegal Petshop</a>
		</div>
		<div class="sidebar-brand sidebar-brand-sm">
			<a href="<?= base_url() ?>">TP</a>
		</div>
		<ul class="sidebar-menu">
			<li class="menu-header">Dashboard</li>
			<li class="active">
				<a href="<?= base_url("dashboard") ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
			</li>
			<li class="menu-header">Main Menu</li>
			<li><a class="nav-link" href="<?= base_url("kelola-customer") ?>"><i class="fas fa-users"></i> <span>Kelola Customer</span></a></li>
			<li><a class="nav-link" href="<?= base_url("kelola-admin") ?>"><i class="fas fa-users"></i> <span>Kelola Admin & Staff</span></a></li>
			<li class="dropdown">
				<a href="#" class="nav-link has-dropdown"><i class="fas fa-shopping-bag"></i> <span>Kelola Items</span></a>
				<ul class="dropdown-menu">
					<li><a href="<?= base_url("kelola-kategori") ?>">Kelola Kategori</a></li>
					<li><a class="nav-link" href="<?= base_url("kelola-produk") ?>">Kelola Produk</a></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="nav-link has-dropdown"><i class="fas fa-cat"></i> <span>Kelola Grooming</span></a>
				<ul class="dropdown-menu">
					<li><a href="<?= base_url("paket-grooming") ?>">Kelola Paket</a></li>
					<li><a class="nav-link" href="utilities-invoice.html">Data Grooming</a></li>
				</ul>
			</li>
			<li><a class="nav-link" href="<?= base_url("kelola-admin") ?>"><i class="fas fa-credit-card"></i> <span>Kelola Transaksi</span></a></li>
			<li><a class="nav-link" href="<?= base_url("kelola-admin") ?>"><i class="fas fa-file"></i> <span>Laporan</span></a></li>
			<li><a class="nav-link" href="<?= base_url("admin/profile") ?>"><i class="fas fa-user-cog"></i> <span>Profile Saya</span></a></li>
			<li><a class="nav-link text-danger" href="<?= base_url("admin/logout") ?>"><i class="fas fa-sign-out-alt"></i> <span>Keluar</span></a></li>
		</ul>
	</aside>
</div>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top py-3">
	<div class="container">
		<a class="navbar-brand font-weight-bold" href="#">PetShop</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active align-self-center">
					<a class="nav-link" href="<?= base_url() ?>">Home</a>
				</li>
				<li class="nav-item align-self-center">
					<a class="nav-link" href="<?= base_url("produk") ?>">Produk</a>
				</li>
				<li class="nav-item align-self-center">
					<a href="<?= base_url("kategori") ?>" class="nav-link">Kategori</a>
				</li>
				<li class="nav-item align-self-center">
					<a class="nav-link" href="<?= base_url("pendaftaran-grooming") ?>">Grooming</a>
				</li>
				<li class="nav-item align-self-center">
					<a class="nav-link" href="<?= base_url("tentang-kami") ?>">Tentang</a>
				</li>
				<?php if ($this->session->userdata("email")) : ?>
					<li class="nav-item dropdown align-self-center">
						<a class="nav-link" href="details.html#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<img src="<?= base_url("assets/uploads/avatars/" . $user_session["avatar"]) ?>" alt="" class="rounded-circle mr-2 profile-picture" style="height: 35px; width: 35px;" />
							Hai, <?= $user_session["nickname"]; ?>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<?php if ($this->session->userdata("role_id") <= 2) : ?>
								<a class="dropdown-item" href="<?= base_url("dashboard") ?>">Dashboard</a>
							<?php endif; ?>
							<a class="dropdown-item" href="<?= base_url("home") ?>">Akun Saya</a>
							<a class="dropdown-item" href="dashboard-account.html">Settings</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item text-danger" href="<?= base_url("auth/logout") ?>">Logout</a>
						</div>
					</li>
				<?php else : ?>
					<div class="nav-item align-self-center">
						<a href="<?= base_url("login"); ?>" class="btn btn-warning px-4 text-white shadow text-uppercase">Login</a>
					</div>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</nav>

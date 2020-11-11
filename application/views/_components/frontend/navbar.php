<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
	<div class="container">
		<a class="navbar-brand" href="index.html">
			<img src="assets/frontend/images/logo.svg" alt="" />
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item align-self-center active">
					<a class="nav-link" href="<?= base_url() ?>">Home </a>
				</li>
				<li class="nav-item align-self-center">
					<a class="nav-link" href="<?= base_url("produk") ?>">Belanja</a>
				</li>
				<li class="nav-item align-self-center">
					<a class="nav-link" href="index.html#">Grooming</a>
				</li>
				<li class="nav-item align-self-center">
					<a class="nav-link" href="register.html">Tentang Kami</a>
				</li>
				<?php if ($this->session->userdata("email")) : ?>
					<li class="nav-item align-self-center dropdown">
						<a class="nav-link" href="details.html#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<img src="<?= base_url("assets/images/" . $user_session["avatar"]) ?>" alt="" class="rounded-circle mr-2 profile-picture" />
							Hai, <?= $user_session["nickname"]; ?>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<?php if ($this->session->userdata("role_id") <= 2) : ?>
								<a class="dropdown-item" href="<?= base_url("dashboard") ?>">Dashboard</a>
							<?php else : ?>
								<a class="dropdown-item" href="<?= base_url("home") ?>">Home</a>
							<?php endif; ?>
							<a class="dropdown-item" href="dashboard-account.html">Settings</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item text-danger" href="<?= base_url("auth/logout") ?>">Logout</a>
						</div>
					</li>
				<?php else : ?>
					<li class="nav-item align-self-center">
						<a class="btn btn-success nav-link px-4 text-white" href="<?= base_url("auth") ?>">Masuk</a>
					</li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</nav>

	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top shadow py-3">
		<div class="container">
			<a class="navbar-brand" href="#">
				<i class="fas fa-cat"></i>
				Petashop
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item align-self-center active">
						<a class="nav-link" href="#">Home</a>
					</li>
					<li class="nav-item align-self-center">
						<a class="nav-link" href="#">Produk</a>
					</li>
					<li class="nav-item align-self-center">
						<a class="nav-link" href="#">Kategori</a>
					</li>
					<li class="nav-item align-self-center">
						<a class="nav-link" href="#">Promo</a>
					</li>
					<li class="nav-item align-self-center">
						<a class="nav-link" href="#">Tentang</a>
					</li>
					<?php if ($this->session->userdata("email")) : ?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img class="img-profile rounded-circle" style="width: 35px; height: 35px; object-fit: cover; object-position: center;" src="<?= base_url("assets/images/" . $user["avatar"]); ?>">
								Hai, <?= $user["name"]; ?>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<?php if ($user["role_id"] == 3) : ?>
									<a class="dropdown-item" href="#">Home</a>
								<?php else : ?>
									<a class="dropdown-item" href="<?= base_url("dashboard"); ?>">Dashboard</a>
								<?php endif; ?>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item text-danger" href="<?= base_url("auth/logout"); ?>">Logout</a>
							</div>
						</li>
					<?php else : ?>
						<li class="nav-item">
							<a class="btn btn-warning text-white px-4 font-weight-bold" href="<?= base_url("auth"); ?>">Login</a>
						</li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</nav>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top py-3">
	<div class="container">
		<a class="navbar-brand font-weight-bold" href="#">PetShop</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="<?= base_url() ?>">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Produk</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Grooming</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Tentang</a>
				</li>
				<div class="nav-item">
					<a href="<?= base_url("login"); ?>" class="btn btn-warning px-4 text-white shadow text-uppercase">Login</a>
				</div>
			</ul>
		</div>
	</div>
</nav>

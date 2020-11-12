<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_components/frontend/head"); ?>

<body>
	<!-- Navigation -->
	<?php $this->load->view("_components/frontend/navbar"); ?>

	<!-- Page Content -->
	<!-- Page Content -->
	<div class="page-content page-details">
		<section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?= base_url("produk") ?>">Produk</a></li>
								<li class="breadcrumb-item active" aria-current="page">
									<?= $product["name"]; ?>
								</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</section>
		<section class="store-gallery py-5" id="gallery">
			<div class="container">
				<div class="row">
					<div class="col-lg-7" data-aos="zoom-in">
						<img src="<?= base_url("assets/uploads/items_images/" . $product["images"]) ?>" class="w-100 main-image" style="max-height: 500px; object-fit: cover; object-position: center;">
					</div>
					<div class="col-lg-5" data-aos="zoom-in">
						<h3><?= $product["name"] ?></h3>
						<div class="font-weight-bold">Harga : <span class="text-warning">IDR. <?= $product["price"] ?></span></div>
						<div class="font-weight-bold">Stock : <span class="text-warning"><?= $product["stock"]; ?></span> Qty</div>
						<div class="card">
							<div class="card-body">
								<p class="small text-muted"><?= $product["description"]; ?></p>
							</div>
						</div>
						<hr>
						<a class="btn btn-success nav-link px-4 text-white btn-block mb-3" href="cart.html">Tambahkan ke Keranjang</a>
						<a class="btn btn-light nav-link px-4 btn-block mb-3" href="cart.html">Kembali</a>
					</div>
				</div>
			</div>
		</section>

		<section class="similar-items py-5 bg-light">
			<div class="container">
				<h3 class="font-weight-bold">Item yang lain</h3>
				<p class="text-muted">Berikut beberapa item lain yang kami jual</p>
			</div>
		</section>

	</div>

	<?php $this->load->view("_components/frontend/footer"); ?>

	<?php $this->load->view("_components/frontend/scripts"); ?>
</body>

</html>

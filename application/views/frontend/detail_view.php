<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("customer/layouts/_head"); ?>

<body>

	<!-- Navigation -->
	<?php $this->load->view("customer/layouts/_navbar"); ?>
	<!-- Page Content -->
	<div class="container py-5">

		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url("produk") ?>">Produk</a></li>
				<li class="breadcrumb-item active" aria-current="page"><?= $product["name"] ?></li>
			</ol>
		</nav>

		<hr>

		<div class="row">
			<div class="col-sm-5">
				<figure class="figure">
					<img src="<?= base_url("assets/uploads/items/" . $product["images"]) ?>" class="figure-img shadow-sm img-fluid rounded" alt="...">
				</figure>
			</div>
			<div class="col-sm-5">
				<a href="" class="text-dark text-decoration-none">
					<h5 class="font-weight-bold"><?= $product["name"] ?></h5>
				</a>
				<p class="lead text-muted">IDR. <span class="text-warning font-weight-bold"><?= number_format($product["price"]) ?></span></p>
				<p class="text-muted">Stok : <?= $product["stock"] ?> Qty</p>
				<hr>
				<a href="" class="btn btn-warning btn-block text-white">Add to Cart</a>
				<a href="<?= base_url() ?>" class="btn btn-light btn-block text-muted">Kembali</a>
			</div>
		</div>
		<!-- <div class="row py-3 ml-0"> -->
		<h5 class="font-weight-bold">Deskripsi Produk</h5>
		<p class="text-muted"><?= $product["description"] ?></p>
		<!-- </div> -->
	</div> <!-- /.container -->

	<section class="categories-section bg-light py-5">
		<div class="container">
			<h3 class="font-weight-bold">Produk lain</h3>
			<p class="text-muted">Beberapa produk lain yang mungkin kamu cari</p>
			<hr>
			<div class="row">
				<?php foreach ($products as $product) : ?>
					<div class="col-sm-3">
						<a href="<?= base_url("produk/" . $product["slug"]) ?>">
							<figure class="figure">
								<img src="<?= base_url("assets/uploads/items/" . $product["images"]) ?>" class="figure-img img-fluid rounded" style="width: 100%; height: 180px; object-fit: cover; object-position: center;">
								<figcaption class="figure-caption text-center font-weight-bold"><?= $product["name"] ?></figcaption>
							</figure>
						</a>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="text-center">
				<a href="<?= base_url("produk") ?>">Lihat semua Produk</a>
			</div>

		</div>
	</section>

	<!-- Footer -->
	<?php $this->load->view("customer/layouts/_footer"); ?>

	<?php $this->load->view("customer/layouts/_scripts"); ?>

</body>

</html>
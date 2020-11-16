<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_components/frontend/head"); ?>

<body>

	<!-- Navigation -->
	<?php $this->load->view("_components/frontend/navbar"); ?>
	<!-- Page Content -->
	<div class="container py-5">

		<div class="row">
			<div class="col">
				<div class="title-page">
					<h3 class="font-weight-bold">Katalog Produk</h3>
					<p class="text-muted">Katalog produk yang kami jual</p>
				</div>
			</div>
			<div class="col align-self-center">
				<div class="input-group mb-3">
					<input type="text" class="form-control" placeholder="Cari produk" aria-label="Recipient's username" aria-describedby="button-addon2">
					<div class="input-group-append">
						<button class="btn btn-primary" type="button" id="button-addon2">Cari</button>
					</div>
				</div>
			</div>
		</div>

		<hr>


		<?php if ($products) : ?>
			<div class="row">
				<?php foreach ($products as $product) : ?>
					<div class="col-sm-3">
						<div class="card h-100 shadow border-0">
							<a href="<?= base_url("produk/" . $product["slug"]) ?>"><img class="card-img-top" src="<?= base_url("assets/uploads/items/" . $product["images"]) ?>" style="height: 180px; object-fit: cover; object-position: center;"></a>
							<div class="card-body">
								<h5 class="card-title">
									<a href="<?= base_url("produk/" . $product["slug"]) ?>"><?= $product["name"] ?></a>
								</h5>
								<h6>IDR. <?= $product["price"] ?></h6>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php else : ?>
			<div class="alert alert-danger">
				Maaf, belum ada produk yang tersedia.
			</div>
		<?php endif; ?>

	</div>
	<!-- /.container -->

	<section class="categories-section bg-light py-5">
		<div class="container">
			<h3 class="font-weight-bold">Kategori produk</h3>
			<p class="text-muted">Cari item yang kamu mau dengan mudah dari kategori berikut</p>
			<hr>
			<?php if ($categories) : ?>
				<div class="row">
					<?php foreach ($categories as $category) : ?>
						<div class="col-sm-3">
							<a href="">
								<figure class="figure">
									<img src="<?= base_url("assets/uploads/categories/" . $category["image"]) ?>" class="figure-img img-fluid rounded" alt="...">
									<figcaption class="figure-caption text-center font-weight-bold"><?= $category["name"] ?></figcaption>
								</figure>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="text-center">
					<a href="">Lihat semua Kategori</a>
				</div>
			<?php else : ?>
				<div class="alert alert-danger">
					Maaf, belum ada kategori yang tersedia
				</div>
			<?php endif; ?>

		</div>
	</section>

	<!-- Footer -->
	<?php $this->load->view("_components/frontend/footer"); ?>

	<?php $this->load->view("_components/frontend/scripts"); ?>

</body>

</html>

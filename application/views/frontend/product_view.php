<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_components/frontend/head"); ?>

<body>
	<!-- Navigation -->
	<?php $this->load->view("_components/frontend/navbar"); ?>

	<!-- Page Content -->
	<div class="page-content page-home">

		<section class="section-header">
			<div class="container">
				<div class="text-center">
					<h3 class="font-weight-bold">Belanja</h3>
					<p class="text-muted">Temukan beragam produk untuk hewan peliharaan kesayangan anda.</p>
				</div>
			</div>
		</section>

		<section class="store-trend-categories">
			<div class="container">
				<div class="row">
					<div class="col-12" data-aos="fade-up">
						<h5 class="font-weight-bold">Kategori</h5>
					</div>
				</div>
				<?php if ($categories) : ?>
					<div class="row">
						<?php foreach ($categories as $category) : ?>
							<div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="100">
								<a class="component-categories d-block" href="index.html#">
									<div class="categories-image">
										<img src="<?= base_url("assets/uploads/categories_images/" . $category["image"]) ?>" alt="Gadgets Categories" class="w-100" />
									</div>
									<p class="categories-text">
										<?= $category["name"]; ?>
									</p>
								</a>
							</div>
						<?php endforeach; ?>
					<?php else : ?>
						<div class="text-center text-muted">Belum ada kategori</div>
					</div>
				<?php endif; ?>
			</div>

			<?php if ($categories) : ?>
				<div class="text-center">
					<a href="">Lihat semua kategori</a>
				</div>
			<?php endif; ?>

		</section>
		<section class="store-new-products py-5">
			<div class="container">
				<div class="row d-flex justify-content-between">
					<div class="col-6 align-self-center" data-aos="fade-up">
						<h5 class="font-weight-bold">Produk Item</h5>
					</div>
					<div class="col-5" data-aos="fade up">
						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="Cari nama produk..." aria-label="Recipient's username" aria-describedby="button-addon2">
							<div class="input-group-append">
								<button class="btn btn-success" type="button" id="button-addon2">Cari</button>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<?php if ($products) : ?>
					<div class="row">
						<?php foreach ($products as $product) : ?>
							<div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
								<a class="component-products d-block" href="details.html">
									<div class="products-thumbnail">
										<img src="<?= base_url("assets/uploads/items_images/" . $product["images"]) ?>" class="products-image">
									</div>
									<div class="products-text">
										<?= $product["name"] ?>
									</div>
									<div class="products-price">
										IDR. <?= $product["price"] ?>
									</div>
								</a>
							</div>
						<?php endforeach; ?>
					<?php else : ?>
						<div class="text-center text-muted">
							<h4 class="font-weight-lighter">Uppss..!! Belum ada produk</h4>
							<small>Sepertinya admin belum menjual produk</small>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</section>
	</div>

	<?php $this->load->view("_components/frontend/footer"); ?>

	<?php $this->load->view("_components/frontend/scripts"); ?>
</body>

</html>

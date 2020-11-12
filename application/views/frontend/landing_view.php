<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_components/frontend/head"); ?>

<body>
	<!-- Navigation -->
	<?php $this->load->view("_components/frontend/navbar"); ?>

	<!-- Page Content -->
	<div class="page-content page-home">
		<section class="store-carousel">
			<div class="container">
				<div class="row">
					<div class="col-lg-12" data-aos="zoom-in">
						<div id="storeCarousel" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#storeCarousel" data-slide-to="0" class="active"></li>
								<li data-target="#storeCarousel" data-slide-to="1"></li>
								<li data-target="#storeCarousel" data-slide-to="2"></li>
							</ol>
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img src="assets/frontend/images/banner.jpg" class="d-block w-100" alt="Carousel Image" />
								</div>
								<div class="carousel-item">
									<img src="assets/frontend/images/banner.jpg" class="d-block w-100" alt="Carousel Image" />
								</div>
								<div class="carousel-item">
									<img src="assets/frontend/images/banner.jpg" class="d-block w-100" alt="Carousel Image" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="info-panel py-4">
			<div class="container">
				<div class="card">
					<div class="card-body">
						<div class="row d-flex justify-content-between ">
							<div class="col-sm-4 text-center">
								<img src="<?= base_url("assets/images/info-panel/buy.png") ?>" width="25%">
								<h4 class="font-weight-bold mt-2">Belanja</h4>
								<p class="text-muted">Beli kebutuhan peliharaan anda</p>
							</div>
							<div class="col-sm-4 text-center">
								<img src="<?= base_url("assets/images/info-panel/grooming.png") ?>" width="25%">
								<h4 class="font-weight-bold mt-2">Grooming</h4>
								<p class="text-muted">Rawat peliharaan kesayangan anda</p>
							</div>
							<div class="col-sm-4 text-center">
								<img src="<?= base_url("assets/images/info-panel/information.png") ?>" width="25%">
								<h4 class="font-weight-bold mt-2">Informasi</h4>
								<p class="text-muted">Dapatkan informasi tentang peliharaan</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="store-new-products py-4">
			<div class="container">
				<div class="row">
					<div class="col-12" data-aos="fade-up">
						<h5 class="font-weight-bold">Produk Kami</h5>
						<p class="text-muted">Beli keperluan untuk peliharaan kesayangan kamu</p>
					</div>
				</div>
				<div class="row">
					<?php if ($products) : ?>
						<?php foreach ($products as $product) : ?>
							<div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
								<a class="component-products d-block" href="<?= base_url("main/detailproduct/" . $product["slug"]) ?>">
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
						<div class="alert alert-danger">Belum ada produk</div>
					<?php endif; ?>
				</div>
			</div>
		</section>

		<section class="grooming-package py-4">
			<div class="container">
				<div class="row">
					<div class="col-12" data-aos="fade-up">
						<h5 class="font-weight-bold">Kami menawarkan paket Grooming</h5>
						<p class="text-muted">Pastikan peliharaan anda tetap bersih dan sehat dengan layanan grooming kami</p>
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-sm-3">
						<div class="card">
							<div class="card-body">
								<div class="text-center">
									<h3>Paket 1</h3>
									<p>
										<small class="text-muted">
											Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque sint beatae, inventore veritatis repudiandae id. Deleniti iure similique odio repellat nihil voluptatibus suscipit, est perspiciatis hic aspernatur, dolore dicta magni.
										</small>
									</p>
									<a href="" class="btn btn-success btn-block">Pilih Paket</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="card">
							<div class="card-body">
								<div class="text-center">
									<h3>Paket 1</h3>
									<p>
										<small class="text-muted">
											Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque sint beatae, inventore veritatis repudiandae id. Deleniti iure similique odio repellat nihil voluptatibus suscipit, est perspiciatis hic aspernatur, dolore dicta magni.
										</small>
									</p>
									<a href="" class="btn btn-success btn-block">Pilih Paket</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="card">
							<div class="card-body">
								<div class="text-center">
									<h3>Paket 1</h3>
									<p>
										<small class="text-muted">
											Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque sint beatae, inventore veritatis repudiandae id. Deleniti iure similique odio repellat nihil voluptatibus suscipit, est perspiciatis hic aspernatur, dolore dicta magni.
										</small>
									</p>
									<a href="" class="btn btn-success btn-block">Pilih Paket</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="card">
							<div class="card-body">
								<div class="text-center">
									<h3>Paket 1</h3>
									<p>
										<small class="text-muted">
											Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque sint beatae, inventore veritatis repudiandae id. Deleniti iure similique odio repellat nihil voluptatibus suscipit, est perspiciatis hic aspernatur, dolore dicta magni.
										</small>
									</p>
									<a href="" class="btn btn-success btn-block">Pilih Paket</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<?php $this->load->view("_components/frontend/footer"); ?>

	<?php $this->load->view("_components/frontend/scripts"); ?>
</body>

</html>

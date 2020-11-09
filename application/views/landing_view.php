<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_components/frontend/head"); ?>

<body>

	<?php $this->load->view("_components/frontend/navbar"); ?>

	<!-- Page Content -->
	<div class="container">

		<div class="row py-5">

			<div class="col-lg-3">

				<h4 class="my-4">Kategori</h4>
				<div class="list-group shadow p-2">
					<?php if ($categories) : ?>
						<?php foreach ($categories as $category) : ?>
							<a href="#" class="list-group-item"><?= $category["name"]; ?></a>
						<?php endforeach; ?>
						<a href="" class="list-group-item text-muted">Lihat semua</a>
					<?php else : ?>
						<div class="text-center">
							<small class="text-danger">Tidak ada kategori</small>
						</div>
					<?php endif; ?>
				</div>

			</div>
			<!-- /.col-lg-3 -->

			<div class="col-lg-9">

				<div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner" role="listbox">
						<div class="carousel-item active">
							<img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
						</div>
						<div class="carousel-item">
							<img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
						</div>
						<div class="carousel-item">
							<img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
						</div>
					</div>
				</div>

				<hr>

				<div class="row d-flex justify-content-between py-2">
					<div class="col-6">
						<h3 class="font-weight-bold my-4" style="font-family: 'Lora', sans-serif;">Produk Terbaru</h3>
					</div>
					<div class="col-6 align-self-center">
						<form action="" method="POST">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Cari Produk...">
								<div class="input-group-append">
									<button class="btn btn-primary" type="submit">Cari</button>
								</div>
							</div>
						</form>
					</div>
				</div>

				<div class="row">

					<?php if ($products) : ?>
						<?php foreach ($products as $product) : ?>
							<div class="col-lg-4 col-md-6 mb-4">
								<div class="card h-100 shadow border-0">
									<a href="#"><img class="card-img-top" src="<?= base_url("assets/uploads/products_thumbnails/" . $product["thumbnail"]); ?>" style="height: 170px; width: 100%; object-fit: cover; object-position: center;"></a>
									<div class="card-body">
										<h6 class="card-title">
											<a href="#"><?= $product["name"]; ?></a>
										</h6>
										<h6>IDR. <?= $product["price"]; ?></h6>
										<p class="card-text small"><?= $product["category_name"]; ?>
										</p>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					<?php else : ?>
						<div class="alert alert-danger text-center">Tidak ada produk</div>
					<?php endif; ?>
				</div>
				<!-- /.row -->

				<div class="text-center">
					<a href="">Lihat Semua</a>
				</div>

			</div>
			<!-- /.col-lg-9 -->

		</div>
		<!-- /.row -->


	</div>
	<!-- /.container -->

	<section class="grooming-section bg-light py-5">
		<div class="container">
			<h2 class="font-weight-bold">Paket Grooming</h2>
			<p class="text-muted">Kami juga menyediakan paket Grooming murah untuk Peliharaan Kesayangan anda.</p>
		</div>
	</section>

	<?php $this->load->view("_components/frontend/footer"); ?>

	<?php $this->load->view("_components/frontend/scripts"); ?>

</body>

</html>

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


		<?php if ($categories) : ?>
			<div class="row">
				<?php foreach ($categories as $category) : ?>
					<div class="col-6">
						<a href="">
							<div class="card mb-3" style="max-width: 540px;">
								<div class="row no-gutters">
									<div class="col-md-4">
										<img src="<?= base_url("assets/uploads/categories/" . $category["image"]) ?>" class="card-img" height="100%" width="100%" style="object-fit: cover; object-position: center;">
									</div>
									<div class="col-md-8">
										<div class="card-body">
											<h5 class="card-title"><?= $category["name"] ?></h5>
										</div>
									</div>
								</div>
							</div>
						</a>
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

	<section class="latest-product bg-light py-5">

		<div class="container">
			<h3>Produk Terbaru</h3>
			<p class="text-muted">Berikut Item terbaru yang kami jual</p>
		</div>

	</section>

	<!-- Footer -->
	<?php $this->load->view("_components/frontend/footer"); ?>

	<?php $this->load->view("_components/frontend/scripts"); ?>

</body>

</html>

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
					<h3 class="font-weight-bold">Paket Grooming</h3>
					<p class="text-muted">Pilih paket grooming sesuai dengan kebutuhan</p>
				</div>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-sm-7 mx-auto">
				<?php foreach ($packages as $package) : ?>
					<a href="<?= base_url("pendaftaran-grooming/" . $package["slug"]) ?>" class="text-decoration-none text-dark">
						<div class="card shadow border-0 mb-3" width="100%">
							<div class="row no-gutters">
								<div class="col-md-8">
									<div class="card-body">
										<h5 class="card-title font-weight-bold"><?= $package["name"] ?></h5>
										<p class="card-text">IDR. <span class="text-success"><?= $package["cost"] ?></span></p>
									</div>
								</div>
							</div>
						</div>
					</a>
				<?php endforeach; ?>
			</div>
		</div>

	</div>
	<!-- /.container -->


	<!-- Footer -->
	<?php $this->load->view("_components/frontend/footer"); ?>

	<?php $this->load->view("_components/frontend/scripts"); ?>

</body>

</html>

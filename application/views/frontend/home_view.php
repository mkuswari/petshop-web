<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_components/frontend/head"); ?>

<body>

	<!-- Navigation -->
	<?php $this->load->view("_components/frontend/navbar"); ?>
	<!-- Page Content -->
	<div class="container-fluid p-5">

		<div class="row pt-5">
			<div class="col">
				<h3 class="font-weight-bold">Akun Saya</h3>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-2">
				<?php $this->load->view("_components/frontend/card-navigation"); ?>
			</div>
			<div class="col-10">
				<h4 class="font-weight-bold mb-3">Detail akun kamu</h4>
				<div class="card shadow border-0 mb-3" style="max-width: 540px;">
					<div class="row no-gutters">
						<div class="col-md-4">
							<img src="<?= base_url("assets/uploads/avatars/" . $user_session["avatar"]) ?>" class="card-img" alt="...">
						</div>
						<div class="col-md-8 align-self-center">
							<div class="card-body">
								<h5 class="card-title"><?= $user_session["name"] ?></h5>
								<p class="card-text"><?= $user_session["email"] ?></p>
								<p class="card-text"><small class="text-muted">Member Sejak : <?= date('d F Y', $user_session["date_created"]) ?></small></p>
							</div>
						</div>
					</div>
				</div>
				<hr>
			</div>
		</div>
	</div> <!-- /.container -->


	<!-- Footer -->
	<?php $this->load->view("_components/frontend/footer"); ?>

	<?php $this->load->view("_components/frontend/scripts"); ?>

</body>

</html>

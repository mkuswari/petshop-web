<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_components/auth/head"); ?>

<body>

	<!-- Page Content -->
	<div class="page-content page-auth">
		<div class="section-store-auth" data-aos="fade-up">
			<div class="container">
				<div class="row align-items-center row-login">
					<div class="col-lg-4 mx-auto">
						<h2 class="font-weight-bold">Silahkan Login</h2>
						<hr>
						<?= $this->session->flashdata('message'); ?>
						<form class="mt-3" action="<?= base_url("auth") ?>" method="POST">
							<div class="form-group">
								<label for="email">E-mail</label>
								<input type="email" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>" name="email" id="email" value="<?= set_value("email") ?>" />
								<?= form_error('email', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control <?= form_error('password') ? 'is-invalid' : ''; ?>" name="password" id="password" />
								<?= form_error('email', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
							</div>
							<button type="submit" class="btn btn-success btn-block mt-4">
								Masuk
							</button>
							<div class="text-center mt-2">
								<small>
									<a href="">Lupa Password?</a>
								</small>
								<br>
								<small>
									Belum punya akun? <a href="<?= base_url("auth/register") ?>">Daftar</a>
								</small>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php $this->load->view("_components/auth/scripts"); ?>

</body>

</html>

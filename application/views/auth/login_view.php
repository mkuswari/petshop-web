	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-lg-6">

				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Silahkan Login</h1>
									</div>

									<?= $this->session->flashdata('message'); ?>

									<form class="user" method="POST" action="<?= base_url("auth"); ?>">
										<div class="form-group">
											<input type="text" class="form-control form-control-user <?= form_error('email') ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value("email"); ?>">
											<?= form_error('email', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
										</div>
										<div class="form-group">
											<input type="password" class="form-control form-control-user <?= form_error('password') ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="Password">
											<?= form_error('password', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
										</div>
										<div class="form-group">
											<div class="custom-control custom-checkbox small">
												<input type="checkbox" class="custom-control-input" id="customCheck">
												<label class="custom-control-label" for="customCheck">Remember Me</label>
											</div>
										</div>
										<button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
										<hr>
										<a href="index.html" class="btn btn-google btn-user btn-block">
											<i class="fab fa-google fa-fw"></i> Login with Google
										</a>
									</form>
									<hr>
									<div class="text-center">
										<a class="small" href="forgot-password.html">Lupa Password?</a>
									</div>
									<div class="text-center">
										<a class="small" href="<?= base_url("auth/register"); ?>">Buat Akun Baru!</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>

<div class="container">

	<div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 mx-auto">
		<div class="card-body p-0">
			<!-- Nested Row within Card Body -->
			<div class="row">
				<div class="col">
					<div class="p-5">
						<div class="text-center">
							<h1 class="h4 text-gray-900 mb-4">Buat Akun Baru!</h1>
						</div>
						<form class="user" method="POST" action="<?= base_url("auth/register"); ?>">
							<div class="form-group">
								<input type="text" class="form-control form-control-user <?= form_error('name') ? 'is-invalid' : ''; ?> " id="name" name="name" placeholder="Nama Lengkap" value="<?= set_value('name'); ?>">
								<?= form_error('name', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
							</div>
							<div class="form-group">
								<input type="email" class="form-control form-control-user <?= form_error('email') ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
								<?= form_error('email', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
							</div>
							<div class="form-group">
								<input type="password" class="form-control form-control-user <?= form_error('password') ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="Password">
								<?= form_error('password', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
							</div>
							<div class="form-group">
								<input type="password" class="form-control form-control-user <?= form_error('password_confirm') ? 'is-invalid' : ''; ?>" id="password_confirm" name="password_confirm" placeholder="Konfirmasi Password">
								<?= form_error('password_confirm', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
							</div>
							<button type="submit" class="btn btn-primary btn-user btn-block">Register Account</button>
							<hr>
							<a href="index.html" class="btn btn-google btn-user btn-block">
								<i class="fab fa-google fa-fw"></i> Register with Google
							</a>
						</form>
						<hr>
						<div class="text-center">
							<a class="small" href="forgot-password.html">Lupa Passowrd?</a>
						</div>
						<div class="text-center">
							<a class="small" href="<?= base_url("auth"); ?>">Suah Memiliki Akun? Login!</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_components/backend/head"); ?>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<?php $this->load->view("_components/backend/sidebar"); ?>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<?php $this->load->view("_components/backend/topbar"); ?>
				<!-- End of Topbar -->
				<!-- Begin Page Content -->
				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-gray-800">Profile Saya</h1>
						<!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
					</div>

					<div class="row">
						<div class="col-sm-4">
							<div class="card mb-3" style="max-width: 100%;">
								<div class="row no-gutters">
									<div class="col-md-4">
										<img src="<?= base_url("assets/images/" . $user_session["avatar"]); ?>" class="card-img">
									</div>
									<div class="col-md-8 align-self-center">
										<div class="card-body">
											<h5 class="card-title"><?= $user_session["name"]; ?></h5>
											<p class="card-text"><?= $user_session["email"]; ?></p>
											<p class="card-text"><small class="text-muted">Bergabung Sejak : <?= date('d F Y', $user_session["date_created"]); ?></small></p>
										</div>
									</div>
								</div>
							</div>
							<?= $this->session->flashdata("message"); ?>
						</div>
						<div class="col-sm-8">
							<div class="card">
								<div class="card-body">
									<h5 class="font-weight-bold">Informasi Personal</h5>
									<hr>

									<form action="<?= base_url("profile/editprofile"); ?>" method="post" enctype="multipart/form-data">
										<div class="form-group row">
											<label class="col-sm-2 col-form-label" for="name">Nama Lengkap</label>
											<div class="col-sm-10">
												<input type="text" name="name" id="name" class="form-control <?= form_error('name') ? 'is-invalid' : ''; ?>" value="<?= $user_session["name"]; ?>">
												<?= form_error('name', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label" for="nickname">Nama Panggilan</label>
											<div class="col-sm-10">
												<input type="text" name="nickname" id="nickname" class="form-control <?= form_error('nickname') ? 'is-invalid' : ''; ?>" value="<?= $user_session["nickname"]; ?>">
												<?= form_error('nickname', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label" for="email">Email</label>
											<div class="col-sm-10">
												<input type="text" name="email" id="email" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>" value="<?= $user_session["email"]; ?>">
												<?= form_error('email', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
											</div>
										</div>
										<div class="form-group row">
											<label for="phone" class="col-sm-2 col-form-label">Nomor Ponsel</label>
											<div class="col-sm-10">
												<input type="number" name="phone" id="phone" class="form-control <?= form_error('phone') ? 'is-invalid' : ''; ?>" value="<?= $user_session["phone"]; ?>">
												<?= form_error('phone', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
											</div>
										</div>
										<div class="form-group row">
											<label for="address" class="col-sm-2 col-form-label">Alamat Tinggal</label>
											<div class="col-sm-10">
												<textarea name="address" id="address" rows="3" class="form-control <?= form_error('address') ? 'is-invalid' : ''; ?>"><?= $user_session["address"]; ?></textarea>
												<?= form_error('address', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label" for="avatar">Foto Profil</label>
											<div class="col-sm-10">
												<input type="file" name="avatar" id="avatar" class="form-control">
												<small class="text-muted">Kosongkan jika tidak ingin merubah</small>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-2"></div>
											<div class="col-sm-10">
												<button type="submit" class="btn btn-primary">Update Profil</button>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="card mt-3 mb-3">
								<div class="card-body">
									<h5 class="font-weight-bold">Ganti Password</h5>
									<hr>
									<form action="<?= base_url("profile/changepassword"); ?>" method="post">
										<div class="form-group row">
											<label class="col-sm-2 col-form-label" for="current_password">Password Saat ini</label>
											<div class="col-sm-10">
												<input type="password" name="current_password" id="current_password" class="form-control <?= form_error('current_password') ? 'is-invalid' : ''; ?>">
												<?= form_error('current_password', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label" for="new_password">Password Baru</label>
											<div class="col-sm-10">
												<input type="password" name="new_password" id="new_password" class="form-control <?= form_error('new_password') ? 'is-invalid' : ''; ?>">
												<?= form_error('new_password', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label" for="new_password_confirm">Konfirmasi</label>
											<div class="col-sm-10">
												<input type="password" name="password_confirm" id="new_password_confirm" class="form-control <?= form_error('password_confirm') ? 'is-invalid' : ''; ?>">
												<?= form_error('password_confirm', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-2"></div>
											<div class="col-sm-10">
												<button type="submit" class="btn btn-primary">Ganti Password</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>



				</div>
				<!-- /.container-fluid -->

				<!-- /.container-fluid -->
			</div>
			<!-- End of Main Content -->

			<!-- Footer -->
			<?php $this->load->view("_components/backend/footer"); ?>
			<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>


	<?php $this->load->view("_components/backend/scripts"); ?>

</body>

</html>

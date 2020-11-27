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
				<div class="container-fluid">
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
					</div>

					<div class="card mb-4">
						<div class="card-body">
							<div class="row">
								<div class="col-sm-10 mx-auto">
									<form action="" method="post" enctype="multipart/form-data">
										<input type="hidden" name="user_id" value="<?= $user["user_id"]; ?>">
										<div class="form-group row">
											<label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
											<div class="col-sm-10">
												<input type="text" class="form-control <?= form_error('name') ? 'is-invalid' : ''; ?>" id="name" name="name" value="<?= $user["name"]; ?>">
												<?= form_error('name', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
											</div>
										</div>
										<div class="form-group row">
											<label for="nickname" class="col-sm-2 col-form-label">Nama Panggilan</label>
											<div class="col-sm-10">
												<input type="text" class="form-control <?= form_error('nickname') ? 'is-invalid' : ''; ?>" id="nickname" name="nickname" value="<?= $user["nickname"]; ?>">
												<?= form_error('nickname', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
											</div>
										</div>
										<div class="form-group row">
											<label for="email" class="col-sm-2 col-form-label">E-mail</label>
											<div class="col-sm-10">
												<input type="text" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= $user["email"]; ?>">
												<?= form_error('email', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
											</div>
										</div>
										<div class="form-group row">
											<label for="phone" class="col-sm-2 col-form-label">Nomor Ponsel</label>
											<div class="col-sm-10">
												<input type="number" class="form-control <?= form_error('phone') ? 'is-invalid' : ''; ?>" id="phone" name="phone" value="<?= $user["phone"]; ?>">
												<?= form_error('phone', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
											</div>
										</div>
										<div class="form-group row">
											<label for="address" class="col-sm-2 col-form-label">Alamat Tinggal</label>
											<div class="col-sm-10">
												<textarea name="address" id="address" rows="3" class="form-control <?= form_error('address') ? 'is-invalid' : ''; ?>"><?= $user["address"]; ?></textarea>
												<?= form_error('address', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
											</div>
										</div>
										<div class="form-group row">
											<label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
											<div class="col-sm-10">
												<div class="row">
													<div class="col-sm-2">
														<img src="<?= base_url("assets/uploads/avatars/" . $user["avatar"]); ?>" width="100%">
													</div>
													<div class="col-sm-10 align-self-center">
														<input type="file" class="form-control" id="avatar" name="avatar">
														<small class="text-muted">Kosongkan jika tidak ingin merubah</small>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group row">
											<label for="role_id" class="col-sm-2 col-form-label">Hak Akses</label>
											<div class="col-sm-10">
												<select name="role_id" id="role_id" class="form-control <?= form_error('role_id') ? 'is-invalid' : ''; ?>">
													<option value="" selected disabled>--Pilih Hak Akses--</option>
													<?php foreach ($roles as $role) : ?>
														<?php if ($role["role_id"] == $user["role_id"]) : ?>
															<option value="<?= $role["role_id"]; ?>" selected><?= $role["role_name"]; ?></option>
														<?php else : ?>
															<option value="<?= $role["role_id"]; ?>"><?= $role["role_name"]; ?></option>
														<?php endif; ?>
													<?php endforeach; ?>
												</select>
												<?= form_error('role_id', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
											</div>
										</div>
										<div class="form-action row">
											<div class="col-sm-2"></div>
											<div class="col-sm-10">
												<button type="submit" class="btn btn-primary">Ubah Data User</button>
												<a href="<?= base_url("user") ?>" class="btn btn-warning">Batalkan</a>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>

				</div>

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
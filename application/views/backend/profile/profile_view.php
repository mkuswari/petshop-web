<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Profile Saya</h1>
		<!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
	</div>

	<div class="row">
		<div class="col-sm-5">
			<div class="card mb-3" style="max-width: 100%;">
				<div class="row no-gutters">
					<div class="col-md-4">
						<img src="<?= base_url("assets/images/" . $users["avatar"]); ?>" class="card-img">
					</div>
					<div class="col-md-8 align-self-center">
						<div class="card-body">
							<h5 class="card-title"><?= $users["name"]; ?></h5>
							<p class="card-text"><?= $users["email"]; ?></p>
							<p class="card-text"><small class="text-muted">Bergabung Sejak : <?= date('d F Y', $users["date_created"]); ?></small></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-7">
			<div class="card">
				<div class="card-body">
					<h5 class="font-weight-bold">Informasi Peronal</h5>
					<hr>

					<?= $this->session->flashdata("message"); ?>

					<form action="<?= base_url("profile/editprofile"); ?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="name">Nama Lengkap</label>
							<input type="text" name="name" id="name" class="form-control <?= form_error('name') ? 'is-invalid' : ''; ?>" value="<?= $users["name"]; ?>">
							<?= form_error('name', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="text" name="email" id="email" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>" value="<?= $users["email"]; ?>">
							<?= form_error('email', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
						</div>
						<div class="form-group">
							<label for="avatar">Foto Profil</label>
							<input type="file" name="avatar" id="avatar" class="form-control">
							<small class="text-muted">Kosongkan jika tidak ingin merubah</small>
						</div>
						<button type="submit" class="btn btn-primary">Update Profil</button>
					</form>
				</div>
			</div>
			<div class="card mt-3 mb-3">
				<div class="card-body">
					<h5 class="font-weight-bold">Ganti Password</h5>
					<hr>
					<form action="<?= base_url("profile/update"); ?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="password">Password Saat ini</label>
							<input type="password" name="password" id="password" class="form-control">
						</div>
						<div class="form-group">
							<label for="password">Password Baru</label>
							<input type="password" name="password" id="password" class="form-control">
						</div>
						<div class="form-group">
							<label for="password">Konfirmasi Password</label>
							<input type="password" name="password" id="password" class="form-control">
						</div>
						<button type="submit" class="btn btn-primary">Ganti Password</button>
					</form>
				</div>
			</div>
		</div>
	</div>



</div>
<!-- /.container-fluid -->

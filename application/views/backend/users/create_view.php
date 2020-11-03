<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
	</div>

	<div class="card mb-4">
		<div class="card-body">
			<div class="row">
				<div class="col-sm-10 mx-auto">
					<form action="<?= base_url("user/create") ?>" method="post" enctype="multipart/form-data">
						<div class="form-group row">
							<label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
							<div class="col-sm-10">
								<input type="text" class="form-control <?= form_error('name') ? 'is-invalid' : ''; ?>" id="name" name="name">
								<?= form_error('name', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="email" class="col-sm-2 col-form-label">E-mail</label>
							<div class="col-sm-10">
								<input type="text" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>" id="email" name="email">
								<?= form_error('email', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
							<div class="col-sm-10">
								<input type="file" class="form-control" id="avatar" name="avatar">
							</div>
						</div>
						<div class="form-group row">
							<label for="password" class="col-sm-2 col-form-label">Password</label>
							<div class="col-sm-10">
								<input type="password" class="form-control <?= form_error('password') ? 'is-invalid' : ''; ?>" id="password" name="password">
								<?= form_error('password', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="password_confirm" class="col-sm-2 col-form-label">Konfirmasi Password</label>
							<div class="col-sm-10">
								<input type="password" class="form-control <?= form_error('password_confirm') ? 'is-invalid' : ''; ?>" id="password_confirm" name="password_confirm">
								<?= form_error('password_confirm', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="role_id" class="col-sm-2 col-form-label">Hak Akses</label>
							<div class="col-sm-10">
								<select name="role_id" id="role_id" class="form-control <?= form_error('role_id') ? 'is-invalid' : ''; ?>">
									<option value="" selected disabled>--Pilih Hak Akses--</option>
									<?php foreach ($roles as $role) : ?>
										<option value="<?= $role["id"]; ?>"><?= $role["role_name"]; ?></option>
									<?php endforeach; ?>
								</select>
								<?= form_error('role_id', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
							</div>
						</div>
						<div class="form-action row">
							<div class="col-sm-2"></div>
							<div class="col-sm-10">
								<button type="submit" class="btn btn-primary">Tambah User</button>
								<a href="<?= base_url("user") ?>" class="btn btn-warning">Batalkan</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>

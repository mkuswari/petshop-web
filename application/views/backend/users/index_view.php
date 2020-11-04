<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
		<a href="<?= base_url("user/create") ?>" class="btn btn-primary"><i class="fas fa-user-plus fa-sm text-white-50"></i> Tambah User</a>
	</div>

	<div class="card mb-4">
		<div class="card-body">

			<?= $this->session->flashdata('message'); ?>

			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%">
					<thead>
						<tr>
							<th>No. </th>
							<th>Avatar</th>
							<th>Nama</th>
							<th>E-mail</th>
							<th>Hak Akses</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($users as $user) : ?>
							<tr>
								<td>#</td>
								<td>
									<img class="img-profile rounded-circle" src="<?= base_url("assets/images/" . $user["avatar"]); ?>" style="width: 50px; height: 50px; object-fit: cover; object-position: center;">
								</td>
								<td><?= $user["name"]; ?></td>
								<td><?= $user["email"]; ?></td>
								<td><?= $user["role_name"]; ?></td>
								<td>
									<a href="<?= base_url("user/edit/" . $user["user_id"]); ?>" class="btn btn-warning btn-sm">Edit</a>
									<a href="<?= base_url("user/delete/" . $user["user_id"]); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus user ini?');">Hapus</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>

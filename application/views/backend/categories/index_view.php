<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
		<a href="<?= base_url("category/create") ?>" class="btn btn-primary"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Tambah Kategori</a>
	</div>

	<div class="card mb-4">
		<div class="card-body">

			<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%">
					<thead>
						<tr>
							<th>No. </th>
							<th>Image</th>
							<th>Nama</th>
							<th>Tanggal Dibuat</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($categories as $category) : ?>
							<tr>
								<td>#</td>
								<td>
									<img class="img-profile rounded-circle" src="<?= base_url("assets/uploads/categories_thumbnails/" . $category["image"]); ?>" style="width: 50px; height: 50px; object-fit: cover; object-position: center;">
								</td>
								<td><?= $category["name"]; ?></td>
								<td><?= date('d F Y', $category["date_created"]); ?></td>
								<td>
									<a href="<?= base_url("category/edit/" . $category["category_id"]); ?>" class="btn btn-warning btn-sm">Edit</a>
									<a href="<?= base_url("category/delete/" . $category["category_id"]); ?>" class="btn btn-danger btn-sm button-delete">Hapus</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>

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
						<h1 class="h3 mb-0 text-gray-800"><?= $page_title; ?></h1>
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
											<th>Slug</th>
											<th>Tanggal Dibuat</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1; ?>
										<?php foreach ($categories as $category) : ?>
											<tr>
												<td width="10"><?= $i++; ?></td>
												<td width="100">
													<img class="img-profile rounded-circle" src="<?= base_url("assets/uploads/categories_images/" . $category["image"]); ?>" style="width: 50px; height: 50px; object-fit: cover; object-position: center;">
												</td>
												<td width="400"><?= $category["name"]; ?></td>
												<td width="400"><?= $category["slug"]; ?></td>
												<td><?= date('d F Y', $category["date_created"]); ?></td>
												<td width="150">
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

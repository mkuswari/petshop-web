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
						<a href="<?= base_url("product/create") ?>" class="btn btn-primary"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Tambah Produk</a>
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
											<th>Nama Produk</th>
											<th>Deskripsi Produk</th>
											<th>Stok Produk</th>
											<th>Harga Produk</th>
											<th>Kategori</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($products as $product) : ?>
											<tr>
												<td>#</td>
												<td>
													<img class="img-profile rounded-circle" src="<?= base_url("assets/uploads/products_thumbnails/" . $product["thumbnail"]); ?>" style="width: 50px; height: 50px; object-fit: cover; object-position: center;">
												</td>
												<td><?= $product["name"]; ?></td>
												<td>
													<small><?= $product["description"]; ?></small>
												</td>
												<td><?= $product["stock"]; ?></td>
												<td><?= $product["price"]; ?></td>
												<td><?= $product["category_name"]; ?></td>
												<td>
													<a href="<?= base_url("product/edit/" . $product["product_id"]); ?>" class="btn btn-warning btn-sm">Edit</a>
													<a href="<?= base_url("product/delete/" . $product["product_id"]); ?>" class="btn btn-danger btn-sm button-delete">Hapus</a>
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

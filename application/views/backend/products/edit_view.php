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
					</div>

					<div class="card mb-4">
						<div class="card-body">
							<div class="row">
								<div class="col-sm-10 mx-auto">
									<form action="<?= base_url("product/edit/" . $product["item_id"]); ?>" method="post" enctype="multipart/form-data">
										<input type="hidden" name="item_id" value="<?= $product["item_id"]; ?>">
										<div class="form-group row">
											<label for="name" class="col-sm-2 col-form-label">Nama Produk</label>
											<div class="col-sm-10">
												<input type="text" class="form-control <?= form_error('name') ? 'is-invalid' : ''; ?>" id="name" name="name" value="<?= $product["name"]; ?>">
												<?= form_error('name', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
											</div>
										</div>
										<div class="form-group row">
											<label for="slug" class="col-sm-2 col-form-label">Slug</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" id="slug" name="slug" value="<?= $product["slug"]; ?>" disabled>
											</div>
										</div>
										<div class="form-group row">
											<label for="thumbnail" class="col-sm-2 col-form-label">Thumbnail Produk</label>
											<div class="col-sm-10">
												<div class="row">
													<div class="col-sm-4">
														<img src="<?= base_url("assets/uploads/items/" . $product["images"]); ?>" width="100%">
													</div>
													<div class="col-sm-8 align-self-center">
														<input type="file" class="form-control <?= form_error('images') ? 'is-invalid' : ''; ?>" id="images" name="images">
														<small class="text-muted">Kosongkan jika tidak ingin merubah</small>
														<?= form_error('images', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group row">
											<label for="description" class="col-sm-2 col-form-label">Deskripsi Produk</label>
											<div class="col-sm-10">
												<textarea name="description" id="description" rows="4" class="form-control <?= form_error('description') ? 'is-invalid' : ''; ?>"><?= $product["description"]; ?></textarea>
												<?= form_error('description', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
											</div>
										</div>
										<div class="form-group row">
											<label for="stock" class="col-sm-2 col-form-label">Stok Produk</label>
											<div class="col-sm-10">
												<input type="number" class="form-control <?= form_error('stock') ? 'is-invalid' : ''; ?>" id="stock" name="stock" value="<?= $product["stock"]; ?>">
												<?= form_error('stock', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
											</div>
										</div>
										<div class="form-group row">
											<label for="price" class="col-sm-2 col-form-label">Harga Produk</label>
											<div class="col-sm-10">
												<input type="text" class="form-control <?= form_error('price') ? 'is-invalid' : ''; ?>" id="price" name="price" value="<?= $product["price"]; ?>">
												<?= form_error('price', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
											</div>
										</div>
										<div class="form-group row">
											<label for="category_id" class="col-sm-2 col-form-label">Kategori Produk</label>
											<div class="col-sm-10">
												<select name="category_id" id="category_id" class="form-control <?= form_error('category_id') ? 'is-invalid' : ''; ?>">
													<option value="">--PILIH KATEGORI--</option>
													<?php foreach ($categories as $category) : ?>
														<?php if ($category["category_id"] == $product["category_id"]) : ?>
															<option value="<?= $category["category_id"]; ?>" selected><?= $category["name"]; ?></option>
														<?php else : ?>
															<option value="<?= $category["category_id"]; ?>"><?= $category["name"]; ?></option>
														<?php endif; ?>
													<?php endforeach; ?>
												</select>
												<?= form_error('category_id', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
											</div>
										</div>
										<div class="form-action row">
											<div class="col-sm-2"></div>
											<div class="col-sm-10">
												<button type="submit" class="btn btn-primary">Update Produk</button>
												<a href="<?= base_url("category") ?>" class="btn btn-warning">Batalkan</a>
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
	<script type="text/javascript">
		$(document).ready(function() {

			// Format mata uang.
			$('#price').mask('000.000.000', {
				reverse: true
			});

		})
	</script>

</body>

</html>

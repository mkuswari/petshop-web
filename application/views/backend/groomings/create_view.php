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
									<form action="<?= base_url("kelola-grooming/tambah") ?>" method="post" enctype="multipart/form-data">
										<div class="form-group row">
											<label for="customer_name" class="col-sm-2 col-form-label">Nama Customer</label>
											<div class="col-sm-10">
												<input type="text" class="form-control <?= form_error('customer_name') ? 'is-invalid' : ''; ?>" id="customer_name" name="customer_name" value="<?= set_value("customer_name"); ?>">
												<?= form_error('customer_name', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
											</div>
										</div>
										<div class="form-group row">
											<label for="customer_phone" class="col-sm-2 col-form-label">Nomor HP Customer</label>
											<div class="col-sm-10">
												<input type="number" class="form-control <?= form_error('customer_phone') ? 'is-invalid' : ''; ?>" id="customer_phone" name="customer_phone" value="<?= set_value('customer_phone'); ?>">
												<?= form_error('customer_phone', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
											</div>
										</div>
										<div class="form-group row">
											<label for="customer_address" class="col-sm-2 col-form-label">Alamat Customer</label>
											<div class="col-sm-10">
												<textarea name="customer_address" id="customer_address" rows="3" class="form-control <?= form_error('customer_address') ? 'is-invalid' : ''; ?>"><?= set_value("customer_address") ?></textarea>
												<?= form_error('customer_address', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
											</div>
										</div>
										<div class="form-group row">
											<label for="pet_type" class="col-sm-2 col-form-label">Tipe Peliharaan</label>
											<div class="col-sm-10">
												<select name="pet_type" id="pet_type" class="form-control <?= form_error('pet_type') ? 'is-invalid' : ''; ?>">
													<option value="" selected disabled>-PILIH TIPE PELIHARAAN-</option>
													<option value="Kucing">Kucing</option>
													<option value="Anjing">Anjing</option>
													<?= form_error('pet_type', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label for="package_id" class="col-sm-2 col-form-label">Paket Grooming</label>
											<div class="col-sm-10">
												<select name="package_id" id="package_id" class="form-control <?= form_error('package_id') ? 'is-invalid' : ''; ?>">
													<option value="" disabled selected>-PILIH PAKET GROOMING-</option>
													<?php foreach ($packages as $package) : ?>
														<option value="<?= $package["package_id"] ?>"><?= $package["name"] ?> (IDR. <?= number_format($package["cost"]) ?>)</option>
													<?php endforeach; ?>
													<?= form_error('package_id', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label for="notes" class="col-sm-2 col-form-label">Catatan Customer</label>
											<div class="col-sm-10">
												<textarea name="notes" id="notes" rows="3" class="form-control"></textarea>
											</div>
										</div>
										<div class="form-action row">
											<div class="col-sm-2"></div>
											<div class="col-sm-10">
												<button type="submit" class="btn btn-primary">Tambah Produk</button>
												<button type="reset" class="btn btn-warning text-white">Reset</button>
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
	<!-- <script type="text/javascript">
		$(document).ready(function() {

			// Format mata uang.
			$('#price').mask('000.000.000', {
				reverse: true
			});

		})
	</script> -->

</body>

</html>

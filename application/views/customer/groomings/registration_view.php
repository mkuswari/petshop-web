<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("customer/layouts/_home/_head"); ?>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<?php $this->load->view("customer/layouts/_home/_sidebar"); ?>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<?php $this->load->view("customer/layouts/_home/_topbar"); ?>
				<!-- End of Topbar -->
				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-gray-800"><?= $page_title; ?></h1>
						<!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
					</div>

					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-8 mx-auto">
									<form action="" method="post" enctype="multipart/form-data">
										<div class="form-group">
											<label for="customer_name">Nama Customer</label>
											<input type="text" id="customer_name" name="customer_name" class="form-control">
										</div>
										<div class="form-group">
											<label for="customer_phone">Nomor HP Customer</label>
											<input type="number" id="customer_phone" name="customer_phone" class="form-control">
										</div>
										<div class="form-group">
											<label for="customer_address">Alamat Customer</label>
											<textarea name="customer_address" id="customer_address" rows="3" class="form-control"></textarea>
										</div>
										<div class="form-group">
											<label for="pet_type">Jenis Peliharaan</label>
											<select name="pet_type" id="pet_type" class="form-control">
												<option value="" disabled selected>--Pilih Jenis Peliharaan--</option>
												<option value="Kucing">Kucing</option>
												<option value="Anjing">Anjing</option>
											</select>
										</div>
										<div class="form-group">
											<label for="package_id">Paket Grooming</label>
											<select name="package_id" id="package_id" class="form-control">
												<option value="" disabled selected>--Pilih Paket Grooming--</option>
												<?php foreach ($packages as $package) : ?>
													<option value="<?= $package["package_id"] ?>"><?= $package["name"] ?> | IDR. <?= number_format($package["cost"]) ?></option>
												<?php endforeach; ?>
											</select>
										</div>
										<div class="form-group">
											<label for="notes">Catatan Customer</label>
											<textarea name="notes" id="notes" rows="3" class="form-control"></textarea>
										</div>
										<div class="form-action">
											<button type="submit" class="btn btn-primary">Register Grooming</button>
											<a href="" class="btn btn-warning">Batalkan</a>
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
			<?php $this->load->view("customer/layouts/_home/_footer"); ?>
			<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>


	<?php $this->load->view("customer/layouts/_home/_scripts"); ?>

</body>

</html>
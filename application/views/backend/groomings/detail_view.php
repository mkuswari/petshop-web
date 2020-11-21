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
							<p>Nama Customer : <?= $grooming["customer_name"] ?></p>
							<p>Nomor HP Customer : <?= $grooming["customer_phone"] ?></p>
							<p>Alamat Customer : <?= $grooming["customer_address"] ?></p>
							<p>Tipe Peliharaan : <?= $grooming["pet_type"] ?></p>
							<p>Paket Grooming dipilih : <?= $grooming["package_name"] ?></p>
							<p>Catatan Customer : <?= $grooming["notes"] ?></p>
							<p>Status Grooming : <?= $grooming["grooming_status"] ?></p>
							<p>Tanggal Masuk : <?= date('y F Y', $grooming["date_created"]) ?></p>
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

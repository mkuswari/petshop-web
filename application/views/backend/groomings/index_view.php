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
						<a href="<?= base_url("kelola-user/tambah") ?>" class="btn btn-primary"><i class="fas fa-user-plus fa-sm text-white-50"></i> Tambah Grooming</a>
					</div>

					<div class="card mb-4">
						<div class="card-body">

							<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%">
									<thead>
										<tr>
											<th>No. </th>
											<th>Nama Customer</th>
											<th>Jenis Peliharaan</th>
											<th>Paket Grooming</th>
											<th>Biaya Grooming</th>
											<th>Status</th>
											<th width="150">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1; ?>
										<?php foreach ($groomings as $grooming) : ?>
											<tr>
												<td width="10"><?= $i++; ?></td>
												<td width="250"><?= $grooming["customer_name"]; ?></td>
												<td width="150"><?= $grooming["pet_type"]; ?></td>
												<td width="300"><?= $grooming["package_name"]; ?></td>
												<td width="200">IDR. <?= $grooming["cost"]; ?></td>
												<td>
													<?php if ($grooming["grooming_status"] == "Diterima") : ?>
														<span class="badge badge-info"><?= $grooming["grooming_status"]; ?></span>
													<?php elseif ($grooming["grooming_status"] == "Diproses") : ?>
														<span class="badge badge-warning"><?= $grooming["grooming_status"]; ?></span>
													<?php else : ?>
														<span class="badge badge-success"><?= $grooming["grooming_status"]; ?></span>
													<?php endif; ?>
												</td>
												<td>
													<a href="<?= base_url("kelola-user/ubah/" . $grooming["package_id"]); ?>" class="btn btn-info btn-sm">Detail</a>
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

	<!-- spesifik js -->
	<script>
		const flashData = $('.flash-data').data('flashdata');
		if (flashData) {
			Swal.fire({
				title: 'Yeay! Berhasil',
				text: 'Data User Berhasil ' + flashData,
				icon: 'success'
			});
		}

		// tombol hapus
		$('.button-delete').on('click', function(e) {

			e.preventDefault();
			const href = $(this).attr('href');

			Swal.fire({
				title: 'Apakah anda yakin?',
				text: "Data User akan dihapus!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya, Hapus!'
			}).then((result) => {
				if (result.isConfirmed) {
					document.location.href = href;
				}
			})

		})
	</script>

</body>

</html>

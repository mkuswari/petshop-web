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
						<a href="<?= base_url("kelola-grooming/tambah") ?>" class="btn btn-primary"><i class="fas fa-user-plus fa-sm text-white-50"></i> Tambah Grooming</a>
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
											<th>Tanggal Daftar</th>
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
												<td width="200">IDR. <?= number_format($grooming["cost"]); ?></td>
												<td>
													<?php if ($grooming["grooming_status"] == "Diterima") : ?>
														<a href="" data-toggle="modal" data-target="#statusModal"><span class="badge badge-info"><?= $grooming["grooming_status"]; ?></span></a>
													<?php elseif ($grooming["grooming_status"] == "Diproses") : ?>
														<a href="" data-toggle="modal" data-target="#statusModal"><span class="badge badge-warning"><?= $grooming["grooming_status"]; ?></span></a>
													<?php else : ?>
														<a href="" data-toggle="modal" data-target="#statusModal"><span class="badge badge-success"><?= $grooming["grooming_status"]; ?></span></a>
													<?php endif; ?>
												</td>
												<td><?= date('d F Y', $grooming["date_created"]) ?></td>
												<td>
													<a href="<?= base_url("kelola-grooming/detail/" . $grooming["grooming_id"]); ?>" class="btn btn-info btn-sm">Detail</a>
													<a href="<?= base_url("kelola-grooming/hapus/" . $grooming["grooming_id"]); ?>" class="btn btn-danger btn-sm button-delete">Hapus</a>
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

	<div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<form action="<?= base_url("kelola-grooming/ubah-status/" . $grooming["grooming_id"]) ?>" method="POST">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Ubah Status Grooming</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<input type="hidden" name="grooming_id" value="<?= $grooming["grooming_id"] ?>">
							<label for="grooming_status">Status Grooming</label>
							<select name="grooming_status" id="grooming_status" class="form-control">
								<?php if ($grooming["grooming_status"] == "Diterima") : ?>
									<option value="Diterima" selected>Diterima</option>
									<option value="Diproses">Diproses</option>
									<option value="Selesai">Selesai</option>
								<?php elseif ($grooming["grooming_status"] == "Diproses") : ?>
									<option value="Diterima">Diterima</option>
									<option value="Diproses" selected>Diproses</option>
									<option value="Selesai">Selesai</option>
								<?php else : ?>
									<option value="Diterima">Diterima</option>
									<option value="Diproses">Diproses</option>
									<option value="Selesai" selected>Selesai</option>
								<?php endif; ?>
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
						<button type="submit" class="btn btn-primary">Ubah</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<?php $this->load->view("_components/backend/scripts"); ?>

	<!-- spesifik js -->
	<script>
		const flashData = $('.flash-data').data('flashdata');
		if (flashData) {
			Swal.fire({
				title: 'Yeay! Berhasil',
				text: 'Data Grooming Berhasil ' + flashData,
				icon: 'success'
			});
		}

		// tombol hapus
		$('.button-delete').on('click', function(e) {

			e.preventDefault();
			const href = $(this).attr('href');

			Swal.fire({
				title: 'Apakah anda yakin?',
				text: "Data Grooming akan dihapus!",
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

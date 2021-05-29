<!DOCTYPE html>
<html lang="en">

<!-- head -->
<?php $this->load->view("admin/layouts/_head"); ?>

<body>
	<div id="app">
		<div class="main-wrapper main-wrapper-1">

			<!-- topbar -->
			<?php $this->load->view("admin/layouts/_topbar"); ?>

			<!-- sidebar -->
			<?php $this->load->view("admin/layouts/_sidebar"); ?>

			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header d-flex justify-content-between">
						<h1><?= $page_title; ?></h1>
					</div>
					<!-- alert flashdata -->
					<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
					<!-- end alert flashdata -->
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-striped" id="table-1">
											<thead>
												<tr>
													<th>No.</th>
													<th>Tanggal</th>
													<th>Nama Customer</th>
													<th>Jenis Peliharaan</th>
													<th>Paket</th>
													<th>Biaya</th>
													<th>Status</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php $i = 1; ?>
												<?php foreach ($groomings as $grooming) : ?>
													<tr>
														<td><?= $i++ ?></td>
														<td><?= date('d F Y', strtotime($grooming["date_created"])) ?></td>
														<td><?= $grooming["customer_name"] ?></td>
														<td><?= $grooming["pet_type"] ?></td>
														<td><?= $grooming["name"] ?></td>
														<td> IDR.
															<?php if ($grooming["pet_type"] == "Kucing") : ?>
																<?= $grooming["cost_for_cat"] ?>
															<?php else : ?>
																<?= $grooming["cost_for_dog"] ?>
															<?php endif; ?>
														</td>
														<td>
															<?php if ($grooming["grooming_status"] == "Didaftarkan") : ?>
																<a href="#" data-toggle="modal" data-target="#modalStatus" class="badge badge-secondary"><?= $grooming["grooming_status"] ?></a>
															<?php elseif ($grooming["grooming_status"] == "Diterima") : ?>
																<a href="#" data-toggle="modal" data-target="#modalStatus" class="badge badge-info"><?= $grooming["grooming_status"] ?></a>
															<?php elseif ($grooming["grooming_status"] == "Dikerjakan") : ?>
																<a href="#" data-toggle="modal" data-target="#modalStatus" class="badge badge-warning"><?= $grooming["grooming_status"] ?></a>
															<?php else : ?>
																<a href="#" data-toggle="modal" data-target="#modalStatus" class="badge badge-success"><?= $grooming["grooming_status"] ?></a>
															<?php endif; ?>
														</td>
														<td>
															<a href="<?= base_url("kelola-grooming/detail/" . $grooming["grooming_id"]) ?>" class="btn btn-icon btn-info">
																<i class="far fa-eye"></i>
															</a>
															<a href="<?= base_url("kelola-grooming/hapus/" . $grooming["grooming_id"]) ?>" class="btn btn-icon btn-danger button-delete">
																<i class="fas fa-trash"></i>
															</a>
														</td>
													</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<!-- footer -->
			<?php $this->load->view("admin/layouts/_footer"); ?>

			<!-- modal status -->
			<div class="modal fade" id="modalStatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
										<?php if ($grooming["grooming_status"] == "Didaftarkan") : ?>
											<option value="Didaftarkan" selected>Didaftarkan</option>
											<option value="Diterima">Diterima</option>
											<option value="Dikerjakan">Dikerjakan</option>
											<option value="Selesai">Selesai</option>
										<?php elseif ($grooming["grooming_status"] == "Diterima") : ?>
											<option value="Didaftarkan">Didaftarkan</option>
											<option value="Diterima" selected>Diterima</option>
											<option value="Dikerjakan">Dikerjakan</option>
											<option value="Selesai">Selesai</option>
										<?php elseif ($grooming["grooming_status"] == "Dikerjakan") : ?>
											<option value="Didaftarkan">Didaftarkan</option>
											<option value="Diterima">Diterima</option>
											<option value="Dikerjakan" selected>Dikerjakan</option>
											<option value="Selesai">Selesai</option>
										<?php else : ?>
											<option value="Didaftarkan">Didaftarkan</option>
											<option value="Diterima">Diterima</option>
											<option value="Dikerjakan">Dikerjakan</option>
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
			<!-- end of modal status -->

		</div>
	</div>

	<!-- scripts -->
	<?php $this->load->view("admin/layouts/_scripts"); ?>
	<!-- specified scripts -->
	<script>
		const flashData = $('.flash-data').data('flashdata');
		if (flashData) {
			swal({
				title: 'Berhasil',
				text: 'Status Grooming Berhasil ' + flashData,
				icon: 'success'
			});
		}

		// tombol hapus
		$('.button-delete').on('click', function(e) {

			e.preventDefault();
			const href = $(this).attr('href');

			swal({
				title: "Anda yakin?",
				text: "Data Admin akan dihapus!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			}).then((result) => {
				if (result) {
					document.location.href = href;
				}
			})

		})
	</script>
</body>

</html>

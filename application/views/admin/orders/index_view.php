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
													<th>Nama Penerima</th>
													<th>Alamat COD</th>
													<th>Total Pembayaran</th>
													<th>Status Orderan</th>
													<th>Informasi</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php $i = 1; ?>
												<?php foreach ($orders as $order) : ?>
													<tr>
														<td><?= $i++ ?></td>
														<td><?= date('d F Y', strtotime($order["order_date"])) ?></td>
														<td><?= $order["receipent_name"] ?></td>
														<td><?= $order["receipent_address"] ?></td>
														<td>Rp. <?= number_format($order["total_payment"]) ?></td>
														<td>
															<?php if ($order["order_status"] == "Masuk") : ?>
																<a href="<?= base_url("kelola-orderan/ubah-status/" . $order["order_id"]) ?>" data-toggle="modal" data-target="#modalStatus" class="badge badge-info"><?= $order["order_status"] ?></a>
															<?php elseif ($order["order_status"] == "Diproses") : ?>
																<a href="<?= base_url("kelola-orderan/ubah-status/" . $order["order_id"]) ?>" data-toggle="modal" data-target="#modalStatus" class="badge badge-warning"><?= $order["order_status"] ?></a>
															<?php elseif ($order["order_status"] == "Diantar") : ?>
																<a href="<?= base_url("kelola-orderan/ubah-status/" . $order["order_id"]) ?>" data-toggle="modal" data-target="#modalStatus" class="badge badge-primary"><?= $order["order_status"] ?></a>
															<?php else : ?>
																<a href="<?= base_url("kelola-orderan/ubah-status/" . $order["order_id"]) ?>" data-toggle="modal" data-target="#modalStatus" class="badge badge-success"><?= $order["order_status"] ?></a>
															<?php endif; ?>
														</td>
														<td><?= $order["info"] ?></td>
														<td>
															<a href="<?= base_url("kelola-orderan/detail/" . $order["order_id"]) ?>" class="btn btn-icon btn-info">
																<i class="far fa-eye"></i>
															</a>
															<a href="<?= base_url("kelola-orderan/hapus/" . $order["order_id"]) ?>" class="btn btn-icon btn-danger button-delete">
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
					<form action="<?= base_url("kelola-orderan/ubah-status/" . $order["order_id"]) ?>" method="POST">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Ubah Status Orderan</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<input type="hidden" name="order_id" value="<?= $order["order_id"] ?>">
									<label for="order_status">Status Orderan</label>
									<select name="order_status" id="order_status" class="form-control">
										<?php if ($order["order_status"] == "Masuk") : ?>
											<option value="Masuk" selected>Masuk</option>
											<option value="Diproses">Diproses</option>
											<option value="Diantar">Diantarkan</option>
											<option value="Diterima">Diterima</option>
										<?php elseif ($order["order_status"] == "Diproses") : ?>
											<option value="Masuk">Masuk</option>
											<option value="Diproses" selected>Diproses</option>
											<option value="Diantar">Diantarkan</option>
											<option value="Diterima">Diterima</option>
										<?php elseif ($order["order_status"] == "Diantar") : ?>
											<option value="Masuk">Masuk</option>
											<option value="Diproses">Diproses</option>
											<option value="Diantar" selected>Diantarkan</option>
											<option value="Diterima">Diterima</option>
										<?php else : ?>
											<option value="Masuk">Masuk</option>
											<option value="Diproses">Diproses</option>
											<option value="Diantar">Diantarkan</option>
											<option value="Diterima" selected>Diterima</option>
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

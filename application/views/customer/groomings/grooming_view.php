<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_components/frontend/head"); ?>

<body>

	<!-- Navigation -->
	<?php $this->load->view("_components/frontend/navbar"); ?>
	<!-- Page Content -->
	<div class="container-fluid p-5">

		<div class="row pt-5">
			<div class="col">
				<h3 class="font-weight-bold">Akun Saya</h3>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-2">
				<?php $this->load->view("_components/frontend/card-navigation"); ?>
			</div>
			<div class="col-10">
				<div class="row justify-content-between px-3">
					<h4 class="font-weight-bold">Data Grooming Kamu</h4>
					<a href="" class="btn btn-primary align-self-center">Tambah Grooming</a>
				</div>
				<hr>
				<div class="card shadow border-0 mb-3">
					<div class="card-body">
						<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
						<table class="table table-borderless">
							<thead>
								<tr>
									<th scope="col">Tanggal</th>
									<th scope="col">Nama</th>
									<th scope="col">Alamat</th>
									<th scope="col">Peliharaan</th>
									<th scope="col">Paket Grooming (Tarif)</th>
									<th scope="col">Status</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($groomings as $grooming) : ?>
									<tr>
										<th><?= date('d F Y', $grooming["date_created"]) ?></th>
										<td><?= $grooming["customer_name"] ?></td>
										<td><?= $grooming["customer_address"] ?></td>
										<td><?= $grooming["pet_type"] ?></td>
										<td><?= $grooming["package_name"] ?> (IDR. <?= number_format($grooming["cost"]) ?>)</td>
										<td>
											<?php if ($grooming["grooming_status"] == "Diterima") : ?>
												<span class="badge badge-info"><?= $grooming["grooming_status"]; ?></span>
											<?php elseif ($grooming["grooming_status"] == "Diproses") : ?>
												<span class="badge badge-warning"><?= $grooming["grooming_status"]; ?></span>
											<?php else : ?>
												<span class="badge badge-success"><?= $grooming["grooming_status"]; ?></span>
											<?php endif; ?>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
				<hr>
			</div>
		</div>
	</div> <!-- /.container -->


	<!-- Footer -->
	<?php $this->load->view("_components/frontend/footer"); ?>

	<?php $this->load->view("_components/frontend/scripts"); ?>

	<script>
		const flashData = $('.flash-data').data('flashdata');
		if (flashData) {
			Swal.fire({
				title: 'Yeay! Berhasil',
				text: 'Pendaftaran Grooming ' + flashData,
				icon: 'success'
			});
		}
	</script>

</body>

</html>
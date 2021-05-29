<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("customer/layouts/_head"); ?>

<body>

	<!-- Navigation -->
	<?php $this->load->view("customer/layouts/_navbar"); ?>
	<!-- Page Content -->
	<div class="container py-5">
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
		<div class="row pt-5">
			<div class="col text-center">
				<h2 class="font-weight-bold">Lengkapi Detail Pesanan</h2>
			</div>
		</div>

		<div class="row mt-4">
			<div class="col-sm-8 mx-auto">
				<div class="card shadow border-0 text-center text-decoration-none text-muted" style="border-radius: 20px; margin-top: 20px;">
					<div class="card-body">
						<h4 class="font-weight-bold">Transfer</h4>
						<div class="text-center">
							<p>Harap Transfer pembayaran ke rekening berikut : </p>
						</div>
					</div>
				</div>
				<form action="<?= base_url("customer/order/processorder") ?>" method="post" enctype="multipart/form-data">
					<div class="card shadow border-0 text-decoration-none text-muted" style="border-radius: 20px; margin-top: 20px;">
						<div class="card-body">
							<div class="text-center">
								<h4 class="font-weight-bold">Upload Bukti Pembayaran</h4>
							</div>
							<div class="form-group">
								<label for="payment_slip">Slip Pembayaran</label>
								<input type="file" name="payment_slip" id="payment_slip" class="form-control">
							</div>
						</div>
					</div>
					<div class="card shadow border-0 text-decoration-none text-muted" style="border-radius: 20px; margin-top: 20px;">
						<div class="card-body">
							<div class="text-center">
								<h4 class="font-weight-bold">Detail Pengiriman</h4>
							</div>
							<div class="form-group">
								<label for="receipent_name">Nama Penerima</label>
								<input type="text" class="form-control" name="receipent_name" id="receipent_name" placeholder="Nama Penerima">
							</div>
							<div class="form-group">
								<label for="receipent_phone">Nomor HP Penerima</label>
								<input type="number" class="form-control" name="receipent_phone" id="receipent_phone" placeholder="Nomor HP Penerima">
							</div>
							<div class="form-group">
								<label for="receipent_address">Alamat Penerima</label>
								<textarea name="receipent_address" id="receipent_address" rows="4" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">Order Sekarang</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>

	</div> <!-- /.container -->


	<!-- Footer -->
	<!-- <?php $this->load->view("customer/layouts/_footer"); ?> -->

	<?php $this->load->view("customer/layouts/_scripts"); ?>

</body>

</html>

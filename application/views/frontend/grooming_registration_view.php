<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_components/frontend/head"); ?>

<body>

	<!-- Navigation -->
	<?php $this->load->view("_components/frontend/navbar"); ?>
	<!-- Page Content -->
	<div class="container py-5">

		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url("") ?>">Paket Grooming</a></li>
				<li class="breadcrumb-item active" aria-current="page">Pendaftaran Grooming</li>
			</ol>
		</nav>

		<hr>

		<div class="row pt-5">
			<div class="col">
				<h3 class="font-weight-bold">Form Registrasi Grooming Hewan</h3>
				<p class="text-muted">Lengkapi form dibawah, lalu anda hanya perlu membawa peliharaan anda ke toko kami</p>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-12">
				<form action="<?= base_url("pendaftaran-grooming") ?>" method="post" enctype="multipart/form-data">
					<div class="form-group row">
						<label for="customer_name" class="col-sm-2 col-form-label">Nama Customer</label>
						<div class="col-sm-10">
							<input type="text" class="form-control <?= form_error('customer_name') ? 'is-invalid' : ''; ?>" id="customer_name" name="customer_name" value="<?= $user_session["name"] ?>">
							<?= form_error('customer_name', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="customer_phone" class="col-sm-2 col-form-label">Nomor HP Customer</label>
						<div class="col-sm-10">
							<input type="number" class="form-control <?= form_error('customer_phone') ? 'is-invalid' : ''; ?>" id="customer_phone" name="customer_phone" value="<?= $user_session["phone"] ?>">
							<?= form_error('customer_phone', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="customer_address" class="col-sm-2 col-form-label">Alamat Customer</label>
						<div class="col-sm-10">
							<textarea name="customer_address" id="customer_address" rows="3" class="form-control <?= form_error('customer_address') ? 'is-invalid' : ''; ?>"><?= set_value("customer_address") ?><?= $user_session["address"] ?></textarea>
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
					<input type="hidden" name="user_id" value="<?= $user_session["user_id"] ?>">
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
	</div> <!-- /.container -->


	<!-- Footer -->
	<?php $this->load->view("_components/frontend/footer"); ?>

	<?php $this->load->view("_components/frontend/scripts"); ?>

</body>

</html>

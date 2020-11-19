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
				<li class="breadcrumb-item active" aria-current="page"><?= $selected_package["name"] ?></li>
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
			<div class="col-8">
				<form action="<?= base_url("pendaftaran-grooming/" . $selected_package["slug"]) ?>" method="post">
					<div class="form-group">
						<label for="costumer_name">Nama Customer</label>
						<input type="text" class="form-control <?= form_error('customer_name') ? 'is-invalid' : ''; ?>" id="customer_name" name="customer_name" value="<?= $user_session["name"] ?>">
						<?= form_error('customer_name', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
					</div>
					<div class="form-group">
						<label for="customer_phone">Nomor Ponsel</label>
						<input type="number" class="form-control <?= form_error('customer_phone') ? 'is-invalid' : ''; ?>" id="customer_phone" name="customer_phone" value="<?= $user_session["phone"] ?>">
						<?= form_error('customer_phone', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
					</div>
					<div class="form-group">
						<label for="customer_address">Alamat Customer</label>
						<textarea name="customer_address <?= form_error('customer_address') ? 'is-invalid' : ''; ?>" id="customer_address" rows="3" class="form-control"><?= $user_session["address"] ?></textarea>
						<?= form_error('customer_address', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
					</div>
					<div class="form-group">
						<label for="pet_type">Jenis Peliharaan</label>
						<select name="pet_type" id="pet_type" class="form-control <?= form_error('pet_type') ? 'is-invalid' : ''; ?>">
							<option value="" selected disabled>--Pilih Jenis Peliharaan--</option>
							<option value="Kucing">Kucing</option>
							<option value="Anjing">Anjing</option>
						</select>
						<?= form_error('pet_type', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
					</div>
					<div class="form-group">
						<label for="package_id">Paket Grooming</label>
						<select name="package_id" id="package_id" class="form-control <?= form_error('package_id') ? 'is-invalid' : ''; ?>">
							<option value="" selected disabled>--Pilih Jenis Peliharaan--</option>
							<?php foreach ($packages as $package) : ?>
								<?php if ($package["package_id"] == $selected_package["package_id"]) : ?>
									<option value="<?= $package["package_id"]; ?>" selected><?= $package["name"]; ?></option>
								<?php else : ?>
									<option value="<?= $package["package_id"]; ?>"><?= $package["name"]; ?></option>
								<?php endif; ?>
							<?php endforeach; ?>
						</select>
						<?= form_error('package_id', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
					</div>
					<div class="form-group">
						<label for="notes">Catatan Customer</label>
						<textarea name="notes" id="notes" rows="3" class="form-control <?= form_error('notes') ? 'is-invalid' : ''; ?>"></textarea>
						<?= form_error('notes', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
					</div>
					<div class="form-action">
						<button type="submit" class="btn btn-primary">Daftar Grooming</button>
						<button type="reset" class="btn btn-warning text-white">Reset Form</button>
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

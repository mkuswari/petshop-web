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
						<h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
						<a href="<?= base_url("user/create") ?>" class="btn btn-primary"><i class="fas fa-user-plus fa-sm text-white-50"></i> Tambah User</a>
					</div>

					<div class="card mb-4">
						<div class="card-body">

							<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%">
									<thead>
										<tr>
											<th>No. </th>
											<th>Avatar</th>
											<th>Nama Lengkap</th>
											<th>Nama Panggilan</th>
											<th>E-mail</th>
											<th>Nomor Ponsel</th>
											<th>Hak Akses</th>
											<th>Status</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1; ?>
										<?php foreach ($users as $user) : ?>
											<tr>
												<td width="10"><?= $i++; ?></td>
												<td width="20">
													<img class="img-profile rounded-circle" src="<?= base_url("assets/images/" . $user["avatar"]); ?>" style="width: 50px; height: 50px; object-fit: cover; object-position: center;">
												</td>
												<td width="250"><?= $user["name"]; ?></td>
												<td width="150"><?= $user["nickname"]; ?></td>
												<td width="300"><?= $user["email"]; ?></td>
												<td width="160"><?= $user["phone"]; ?></td>
												<td width="160"><?= $user["role_name"]; ?></td>
												<td width="100">
													<?php if ($user["is_active"] == 1) : ?>
														<span class="badge badge-success">Aktif</span>
													<?php else : ?>
														<span class="badge badge-danger">Nonaktif</span>
													<?php endif; ?>
												</td>
												<td>
													<a href="<?= base_url("user/edit/" . $user["user_id"]); ?>" class="btn btn-warning btn-sm">Edit</a>
													<a href="<?= base_url("user/delete/" . $user["user_id"]); ?>" class="btn btn-danger btn-sm button-delete">Hapus</a>
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

</body>

</html>

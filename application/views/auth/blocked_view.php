<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

	<!-- Main Content -->
	<div id="content">

		<!-- Begin Page Content -->
		<div class="container-fluid" style="margin-top: 120px;">

			<!-- 404 Error Text -->
			<div class="text-center">
				<div class="error mx-auto" data-text="403">403</div>
				<p class="lead text-gray-800 mb-5">Upss..! Akses Ditolak</p>
				<p class="text-gray-500 mb-0">Sepertinya kamu tidak memiliki cukup hak akses.</p>
				<a href="<?= base_url("landing"); ?>">&larr; Kembali</a>
			</div>

		</div>
		<!-- /.container-fluid -->

	</div>
	<!-- End of Main Content -->

	<!-- Footer -->
	<footer class="sticky-footer bg-white">
		<div class="container my-auto">
			<div class="copyright text-center my-auto">
				<span>Copyright &copy; Cat Food Store | All Right Reserved <?= date('Y'); ?></span>
			</div>
		</div>
	</footer>
	<!-- End of Footer -->
	<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url("assets/backend/vendor/jquery/jquery.min.js") ?>"></script>
<script src="<?= base_url("assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url("assets/backend/vendor/jquery-easing/jquery.easing.min.js") ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url("assets/backend/js/sb-admin-2.min.js") ?>"></script>

</body>

</html>

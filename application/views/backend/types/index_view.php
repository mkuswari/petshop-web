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
						<a href="javascript:void(0)" class="btn btn-primary showCreateModal" onclick="addPackage()"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Tambah Kategori</a>
					</div>

					<div class="card mb-4">
						<div class="card-body">

							<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

							<div class="table-responsive">
								<table class="table table-bordered" id="table" width="100%">
									<thead>
										<tr>
											<th width="50">No. </th>
											<th width="300">Nama Paket</th>
											<th>Slug</th>
											<th>Biaya</th>
											<th width="200">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<!-- Table generate from ajax -->
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


	<!-- Modal here -->
	<!-- Modal Update -->
	<div class="modal fade" id="modal_form" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="#" id="form">
					<input type="hidden" value="" name="package_id">
					<div class="modal-header">
						<h5 class="modal-title" id="modalLabel">Tambah Paket Grooming</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="name">Nama Paket</label>
							<input type="text" class="form-control" id="name" name="name">
						</div>
						<div class="form-group">
							<label for="name">Slug Paket</label>
							<input type="text" class="form-control" id="slug" name="slug" placeholder="Slug akan digenerate otomatis" disabled>
						</div>
						<div class="form-group">
							<label for="cost">Biaya Paket</label>
							<input type="text" class="form-control" id="cost" name="cost">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="button" class="btn btn-primary" id="btnSave" onclick="save()">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>


	<?php $this->load->view("_components/backend/scripts"); ?>

	<!-- ajax -->
	<script>
		let saveMethod;
		let table;
		let baseUrl = '<?= base_url() ?>';

		$(document).ready(function() {
			//datatables
			table = $('#table').DataTable({

				"processing": true, //Feature control the processing indicator.
				"serverSide": true, //Feature control DataTables' server-side processing mode.
				"order": [], //Initial no order.

				// Load data for the table's content from an Ajax source
				"ajax": {
					"url": "<?= base_url('package/ajaxlist') ?>",
					"type": "POST"
				},

				//Set column definition initialisation properties.
				"columnDefs": [{
						"targets": [-1], //last column
						"orderable": false, //set not orderable
					},
					{
						"targets": [-2], //2 last column (photo)
						"orderable": false, //set not orderable
					},
				],

			});

			//set input/textarea/select event when change value, remove class error and remove text help block 
			$("input").change(function() {
				$(this).removeClass('has-error');
				$(this).next().empty();
			});

		});

		function addPackage() {
			saveMethod = 'add';
			$('#form')[0].reset(); // reset form on modals
			$('.form-control').removeClass('is-invalid'); // clear error class
			$('.invalid-feedback').empty(); // clear error string
			$('#modal_form').modal('show'); // show bootstrap modal
			$('.modal-title').text('Tambah Paket Grooming'); // Set Title to Bootstrap modal title

		}

		function editPackage(id) {
			saveMethod = 'update';
			$('#form')[0].reset(); // reset form on modals
			$('.form-control').removeClass('is-invalid'); // clear error class
			$('.invalid-feedback').empty(); // clear error string

			// load data from ajax
			$.ajax({
				url: "<?= base_url('package/ajaxedit') ?>/" + id,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
					$('[name="package_id"]').val(data.package_id);
					$('[name="name"]').val(data.name);
					$('[name="slug"]').val(data.slug);
					$('[name="cost"]').val(data.cost);
					$('#modal_form').modal('show'); // show bootstrap modal
					$('.modal-title').text('Ubah Paket Grooming'); // Set Title to Bootstrap modal title

				},
				error: function(jqXHR, textStatus, errorThrown) {
					Swal.fire({
						title: 'Error',
						text: 'Gagal mendapatkan data dari AJAX',
						icon: 'error'
					});
				}
			});
		}

		function reloadTable() {
			table.ajax.reload(null, false); //reload datatable ajax 
		}

		function save() {
			$('#btnSave').text('Memproses...'); //change button text
			$('#btnSave').attr('disabled', true); //set button disable 
			let url;

			if (saveMethod == 'add') {
				url = "<?= base_url('package/ajaxadd') ?>";
			} else {
				url = "<?= base_url('package/ajaxupdate') ?>";
			}

			// ajax adding data to database

			var formData = new FormData($('#form')[0]);
			$.ajax({
				url: url,
				type: "POST",
				data: formData,
				contentType: false,
				processData: false,
				dataType: "JSON",
				success: function(data) {

					if (data.status) //if success close modal and reload ajax table
					{

						if (saveMethod == 'add') {
							$('#modal_form').modal('hide');
							Swal.fire({
								title: 'Berhasil',
								text: 'Kategori berhasil ditambahkan',
								icon: 'success'
							});
						} else {
							$('#modal_form').modal('hide');
							Swal.fire({
								title: 'Berhasil',
								text: 'Kategori berhasil diubah',
								icon: 'success'
							});
						}

						reloadTable();
					} else {
						// for (let i = 0; i < data.inputerror.length; i++) {
						// 	$('[form-control="' + data.inputerror[i] + '"]').parent().addClass('is-invalid'); //select parent twice to select div form-group class and add has-error class
						// 	$('[form-control="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
						// }
						Swal.fire({
							title: 'Gagal',
							text: 'Lengkapi semua form',
							icon: 'error'
						});
					}
					$('#btnSave').text('Simpan'); //change button text
					$('#btnSave').attr('disabled', false); //set button enable 


				},
				error: function(jqXHR, textStatus, errorThrown) {
					Swal.fire({
						title: 'Gagal',
						text: 'Kategori gagal ditambahkan',
						icon: 'error'
					});
					$('#btnSave').text('Simpan'); //change button text
					$('#btnSave').attr('disabled', false); //set button enable 

				}
			});
		}

		function deletePackage(id) {
			Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						url: "<?= base_url('package/ajaxdelete') ?>/" + id,
						type: "POST",
						dataType: "JSON",
						success: function(data) {
							//if success reload ajax table
							$('#modal_form').modal('hide');
							reloadTable();
						},
						error: function(jqXHR, textStatus, errorThrown) {
							Swal.fire(
								'Deleted!',
								'Your file has been deleted.',
								'error'
							)
						}
					});
					Swal.fire(
						'Deleted!',
						'Your file has been deleted.',
						'success'
					)
				}
			})
		}
	</script>


</body>

</html>

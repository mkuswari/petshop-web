<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
	</div>

	<div class="card mb-4">
		<div class="card-body">
			<div class="row">
				<div class="col-sm-10 mx-auto">
					<form action="<?= base_url("category/create") ?>" method="post" enctype="multipart/form-data">
						<div class="form-group row">
							<label for="name" class="col-sm-2 col-form-label">Nama Kategori</label>
							<div class="col-sm-10">
								<input type="text" class="form-control <?= form_error('name') ? 'is-invalid' : ''; ?>" id="name" name="name" value="<?= set_value("name"); ?>">
								<?= form_error('name', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="image" class="col-sm-2 col-form-label">Thumbnail Category</label>
							<div class="col-sm-10">
								<input type="file" class="form-control" id="image" name="image">
							</div>
						</div>
						<div class="form-action row">
							<div class="col-sm-2"></div>
							<div class="col-sm-10">
								<button type="submit" class="btn btn-primary">Tambah Kategori</button>
								<a href="<?= base_url("category") ?>" class="btn btn-warning">Batalkan</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>

<!-- Page Content -->
<div class="container">

	<div class="row mt-5">

		<div class="col-lg-3">

			<h4 class="my-4">Kategori</h4>
			<div class="list-group shadow p-2">
				<?php if ($categories) : ?>
					<?php foreach ($categories as $category) : ?>
						<a href="#" class="list-group-item"><?= $category["name"]; ?></a>
					<?php endforeach; ?>
					<a href="" class="list-group-item text-muted">Lihat semua</a>
				<?php else : ?>
					<div class="text-center">
						<small class="text-danger">Tidak ada kategori</small>
					</div>
				<?php endif; ?>
			</div>

		</div>
		<!-- /.col-lg-3 -->

		<div class="col-lg-9">

			<div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<div class="carousel-item active">
						<img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
					</div>
					<div class="carousel-item">
						<img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
					</div>
					<div class="carousel-item">
						<img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>

			<hr>

			<div class="row d-flex justify-content-between py-2">
				<div class="col-6">
					<h3 class="font-weight-bold my-4" style="font-family: 'Lora', sans-serif;">Produk Terbaru</h3>
				</div>
				<div class="col-6 align-self-center">
					<form action="" method="POST">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Cari Produk...">
							<div class="input-group-append">
								<button class="btn btn-primary" type="submit">Cari</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4 col-md-6 mb-4">
					<div class="card h-100 shadow border-0">
						<a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
						<div class="card-body">
							<h5 class="card-title">
								<a href="#">Item One</a>
							</h5>
							<h6>$24.99</h6>
							<p class="card-text small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!
							</p>
						</div>
						<div class="card-footer">
							<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 mb-4">
					<div class="card h-100 shadow border-0">
						<a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
						<div class="card-body">
							<h5 class="card-title">
								<a href="#">Item Two</a>
							</h5>
							<h6>$24.99</h6>
							<p class="card-text small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!
								Lorem ipsum dolor sit amet.</p>
						</div>
						<div class="card-footer">
							<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 mb-4">
					<div class="card h-100 shadow border-0">
						<a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
						<div class="card-body">
							<h5 class="card-title">
								<a href="#">Item Three</a>
							</h5>
							<h6>$24.99</h6>
							<p class="card-text small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!
							</p>
						</div>
						<div class="card-footer">
							<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 mb-4">
					<div class="card h-100 shadow border-0">
						<a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
						<div class="card-body">
							<h5 class="card-title">
								<a href="#">Item Four</a>
							</h5>
							<h6>$24.99</h6>
							<p class="card-text small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!
							</p>
						</div>
						<div class="card-footer">
							<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 mb-4">
					<div class="card h-100 shadow border-0">
						<a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
						<div class="card-body">
							<h5 class="card-title">
								<a href="#">Item Five</a>
							</h5>
							<h6>$24.99</h6>
							<p class="card-text small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!
								Lorem ipsum dolor sit amet.</p>
						</div>
						<div class="card-footer">
							<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 mb-4">
					<div class="card h-100 shadow border-0">
						<a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
						<div class="card-body">
							<h5 class="card-title">
								<a href="#">Item Six</a>
							</h5>
							<h6>$24.99</h6>
							<p class="card-text small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!
							</p>
						</div>
						<div class="card-footer">
							<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
						</div>
					</div>
				</div>

			</div>
			<!-- /.row -->

			<!-- Pagination -->
			<nav aria-label="Page navigation example">
				<ul class="pagination justify-content-center mt-3">
					<li class="page-item disabled">
						<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
					</li>
					<li class="page-item"><a class="page-link" href="#">1</a></li>
					<li class="page-item"><a class="page-link" href="#">2</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item">
						<a class="page-link" href="#">Next</a>
					</li>
				</ul>
			</nav>

		</div>
		<!-- /.col-lg-9 -->

	</div>
	<!-- /.row -->


</div>
<!-- /.container -->

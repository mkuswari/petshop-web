<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("customer/layouts/_head"); ?>

<body>

    <!-- Navigation -->
    <?php $this->load->view("customer/layouts/_navbar"); ?>
    <!-- Page Content -->
    <div class="container mt-3">

        <div class="row">

            <div class="col-lg-3">

                <h4 class="my-4 font-weight-bold">Kategori</h4>
                <div class="list-group shadow">
                    <?php foreach ($categories as $category) : ?>
                        <a href="<?= base_url("kategori/" . $category["category_id"]) ?>" class="list-group-item border-0"><?= $category["name"] ?></a>
                    <?php endforeach; ?>
                    <a href="<?= base_url("kategori") ?>" class="list-group-item border-0 text-center text-muted">Lihat semua</a>
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

                <section class="some-products py-5">
                    <div class="row">
                        <div class="col-7">
                            <h4 class="font-weight-bold">Produk yang kami jual</h4>
                            <p class="small text-muted">Berikut produk yang kami jual untuk anda</p>
                        </div>
                        <div class="col-5 align-self-center">
                            <div class="input-group mb-3">
                                <form action="<?= base_url("produk") ?>" method="POST">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Cari produk" name="keyword">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">Cari</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <?php if ($products) : ?>
                        <div class="row">
                            <?php foreach ($products as $product) : ?>
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="card h-100 shadow border-0">
                                        <a href="<?= base_url("produk/" . $product["slug"]) ?>"><img class="card-img-top" src="<?= base_url("assets/uploads/items/" . $product["images"]) ?>" style="height: 180px; object-fit: cover; object-position: center;"></a>
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a href="<?= base_url("produk/" . $product["slug"]) ?>"><?= $product["name"] ?></a>
                                            </h5>
                                            <h6>IDR. <?= number_format($product["price"]) ?></h6>
                                        </div>
                                        <div class="card-footer border-top-0 bg-white">
                                            <div class="action text-center">
                                                <a href="<?= base_url("produk/tambah-keranjang/" . $product["item_id"]) ?>" class="btn btn-success btn-sm">Add to Cart</a>
                                                <a href="<?= base_url("produk/" . $product["slug"]) ?>" class="btn btn-warning btn-sm text-white">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <!-- /.row -->
                        <div class="text-center mb-5">
                            <a href="<?= base_url("produk") ?>">Lihat semua produk</a>
                        </div>
                    <?php else : ?>
                        <div class="alert alert-danger">
                            Maaf, belum ada produk tersedia untuk saat ini.
                        </div>
                    <?php endif; ?>
                </section>

                <section class="groomings py-5">
                    <div class="row">
                        <div class="col-7">
                            <h4 class="font-weight-bold">Kami juga menawarkan jasa Grooming</h4>
                            <p class="small text-muted">Dengan beragam paket grooming yang sesuai dengan kebutuhan anda.</p>
                        </div>
                    </div>
                    <hr>
                    <?php if ($packages) : ?>
                        <div class="row">
                            <div class="col-sm-9 mx-auto">
                                <div class="card shadow border-0 mb-3" width="100%">
                                    <div class="row no-gutters">
                                        <div class="col-md-12">
                                            <div class="card-body text-center">
                                                <h5 class="font-weight-bold">Saya ingin Grooming</h5>
                                                <p class="text-muted">Klik tombol dibawah untuk melakukan Pendaftaran Grooming</p>
                                                <a href="<?= base_url("pendaftaran-grooming") ?>" class="btn btn-success shadow">Daftar Grooming</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="alert alert-danger">
                            Maaf, belum ada paket grooming tersedia
                        </div>
                    <?php endif; ?>
                </section>

            </div>
            <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php $this->load->view("customer/layouts/_footer"); ?>

    <?php $this->load->view("customer/layouts/_scripts"); ?>

</body>

</html>
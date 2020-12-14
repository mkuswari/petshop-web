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
            <div class="col">
                <h3 class="font-weight-bold">Keranjang Saya</h3>
            </div>
        </div>
        <hr>
        <?php if ($this->cart->contents()) : ?>
            <div class="cart">
                <table class="table table-borderless table-hover">
                    <tr>
                        <th>No.</th>
                        <th>Nama Item</th>
                        <th>Jumlah</th>
                        <th align="right">Harga</th>
                        <th align="right">Sub Total</th>
                    </tr>
                    <?php $i = 1; ?>
                    <?php foreach ($this->cart->contents() as $item) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $item["name"]; ?></td>
                            <td><?= $item["qty"]; ?></td>
                            <td>IDR. <?= number_format($item["price"], 0, ',', '.'); ?></td>
                            <td>IDR. <?= number_format($item["subtotal"], 0, ',', '.'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>

                <div class="text-right">
                    <h4><b class="text-info">Total Belanja : </b> IDR. <?= number_format($this->cart->total(), 0, ',', '.'); ?></h4>
                    <a href="<?= base_url("kosongkan-keranjang") ?>" class="btn btn-danger">Kosongkan</a>
                    <a href="<?= base_url("produk") ?>" class="btn btn-info">Lanjut Belanja</a>
                    <a href="" data-toggle="modal" data-target="#exampleModal" class="btn btn-success">Order Sekarang</a>
                </div>
            </div>
        <?php else : ?>
            <div class="text-center mt-5">
                <img src="<?= base_url("assets/customer/img/cart.png") ?>" width="250">
                <h3 class="text-danger mt-3 font-weight-bold">Keranjang kamu masih kosong</h3>
                <p class="text-muted">Keranjang kamu terlihat masih kosong, silahkan pilih item dulu.</p>
                <a href="<?= base_url("produk") ?>" class="btn btn-success">Katalog Produk</a>
            </div>
        <?php endif; ?>

    </div> <!-- /.container -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal">
        <div class="modal-dialog">
            <form action="<?= base_url("proses-order") ?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Masukkan Data Order</h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="customer_id" value="<?= $this->session->userdata("customer_id"); ?>">
                        <input type="hidden" name="total_payment" value="<?= $this->cart->total(); ?>">
                        <div class="form-group">
                            <label for="receipent_name">Nama Penerima</label>
                            <input type="text" name="receipent_name" id="receipent_name" class="form-control" value="<?= $this->session->userdata("name"); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="receipent_phone">Nomor HP</label>
                            <input type="number" name="receipent_phone" id="receipent_phone" class="form-control" value="<?= $this->session->userdata("phone"); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="receipent_address">Alamat Penerima</label>
                            <textarea name="receipent_address" id="receipent_address" rows="3" class="form-control" required><?= $this->session->userdata("address"); ?></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success rounded-0">Proses Order</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <!-- <?php $this->load->view("customer/layouts/_footer"); ?> -->

    <?php $this->load->view("customer/layouts/_scripts"); ?>
    <script>
        const flashData = $('.flash-data').data('flashdata');
        if (flashData) {
            Swal.fire({
                title: 'Yeaayy!!!',
                text: 'Item berhasil ' + flashData,
                icon: 'success'
            });
        }

        // // tombol hapus
        // $('.button-delete').on('click', function(e) {

        //     e.preventDefault();
        //     const href = $(this).attr('href');

        //     Swal.fire({
        //         title: 'Kamu yakin?',
        //         text: "Data grooming kamu akan dihapus!",
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Ya, hapus'
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             document.location.href = href;
        //         }
        //     })

        // })
    </script>

</body>

</html>
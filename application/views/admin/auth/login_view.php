<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url("assets/admin/modules/bootstrap/css/bootstrap.min.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/admin/modules/fontawesome/css/all.min.css") ?>">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url("assets/admin/modules/bootstrap-social/bootstrap-social.css") ?>">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url("assets/admin/css/style.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/admin/css/components.css") ?>">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <!-- <img src="assets/admin/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle"> -->
                            <h5>Admin Petshop</h5>
                        </div>

                        <?= $this->session->flashdata('message'); ?>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Silahkan Login</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="<?= base_url("admin"); ?>">
                                    <div class="form-group">
                                        <label for="email" class="control-label">Email</label>
                                        <input id="email" type="email" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>" name="email" autofocus>
                                        <?= form_error('email', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                            <div class="float-right">
                                                <a href="auth-forgot-password.html" class="text-small">
                                                    Lupa Password?
                                                </a>
                                            </div>
                                        </div>
                                        <input id="password" type="password" class="form-control <?= form_error('password') ? 'is-invalid' : ''; ?>" name="password">
                                        <?= form_error('password', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; Tegal Petshop <?= date('Y'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url("assets/admin/modules/jquery.min.js") ?>"></script>
    <script src="<?= base_url("assets/admin/modules/popper.js") ?>"></script>
    <script src="<?= base_url("assets/admin/modules/tooltip.js") ?>"></script>
    <script src="<?= base_url("assets/admin/modules/bootstrap/js/bootstrap.min.js") ?>"></script>
    <script src="<?= base_url("assets/admin/modules/nicescroll/jquery.nicescroll.min.js") ?>"></script>
    <script src="<?= base_url("assets/admin/modules/moment.min.js") ?>"></script>
    <script src="<?= base_url("assets/admin/js/stisla.js") ?>"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="<?= base_url("assets/admin/js/scripts.js") ?>"></script>
    <script src="<?= base_url("assets/admin/js/custom.js") ?>"></script>
</body>

</html>
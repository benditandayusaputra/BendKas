<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('template/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('template/css/sb-admin-2.min.css') ?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
  <div class="error" data-error="<?php echo $this->session->flashdata('error'); ?>"></div>
  <div class="waning" data-waning="<?php echo $this->session->flashdata('waning'); ?>"></div>
  <div class="success" data-success="<?php echo $this->session->flashdata('success'); ?>"></div>

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center pt-2">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="py-5 px-4">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                  </div>
                  <form method="POST" action="<?php echo site_url('login') ?>" class="user">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user <?php if (form_error('username')) { echo "is-invalid"; } ?>" id="username" name="username" placeholder="Masukan Username">
                      <small class="text-danger"><?php echo form_error('username') ?></small>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user <?php if (form_error('password')) { echo "is-invalid"; } ?>" id="password" name="password" placeholder="Masukan Password">
                      <small class="text-danger"><?php echo form_error('password') ?></small>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      <i class="fa fa-sign-in-alt"></i> Login
                    </button>
                  </form>
                  <div class="text-center mt-5">
                    <small><strong>Aplikasi Kas XII RPL 1 SMK Negeri 1 Bawang, Banjarnegara</strong></small>
                    <br>
                    <small><strong>Powered By Bend Coder (Bendi Tandayu Saputra)</strong></small>
                    <br>
                    <small><strong>Copyright &copy; 2020 Made With <i class="fa fa-heart text-danger"></i></strong></small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('template/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('template/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('template/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('template/js/sb-admin-2.min.js') ?>"></script>

  <script src="<?php echo base_url('template/vendor/sweetalert2/dist/sweetalert2.all.min.js') ?>"></script>
  <script src="<?php echo base_url('modules/app.js') ?>"></script>

</body>

</html>

</html>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <title>
    <?= $title; ?>
  </title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('files/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('files/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center mt-5 pt-lg-5">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg">
          <div class="card-body p-lg-5 p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
              <div class="col-lg-6 d-none d-lg-block">
                <img src="<?= base_url('files/img/profil/user.png'); ?>" alt="logo halaman login" style="max-width: 400px; max-height: 400px;">
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center mb-4">
                    <h1 class="h4 text-gray-900">CRUD PAKET KURSUS </h1>
                    <span class="text-muted">Login</span>
                  </div>
                  <?= $this->session->flashdata('pesan'); ?>
                  <form class="user" method="post" action="<?= base_url('Auth') ?>">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Anda" value="<?= set_value('email'); ?>">
                      <?= form_error('email',  '<small class="text-danger pl-3 ">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                      <?= form_error('password',  '<small class="text-danger pl-3 ">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                    <hr>
                    <div class="text-center">
                      <a class="small" href="forgot-password.html">Lupa Password?</a>
                    </div>
                    <div class="text-center">
                      <a class="small" href="<?= site_url('Auth/register') ?>">Belum Mempunyai Akun? Register!</a>
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

  <script src="<?php echo base_url('files/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('files/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('files/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('files/'); ?>js/sb-admin-2.min.js"></script>

</body>

</html>
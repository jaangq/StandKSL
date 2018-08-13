<?php
session_start();
require_once 'etc/conf.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pendaftaran Anggota KSL</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?=$base_url?>assets/img/Tux_2014.png" type="image/png">
    <!-- Bootstrap -->
		<link rel="stylesheet" href="<?=$base_url?>assets/css/bootstrap.min.css">
		<!-- Fonts Awesome -->
		<!-- <link rel="stylesheet" href="<?=$base_url?>assets/css/fontawesome-all.min.css"> -->
		<!-- Style -->
    <link rel="stylesheet" href="<?=$base_url?>assets/css/style.css">
    <link rel="stylesheet" href="<?=$base_url?>assets/css/style.pendaftaran.css">
  </head>
  <body style="background-image:url('<?=$base_url?>assets/img/north-polar.jpg')">
    &nbsp;
    <div class="form-container row">
      <div class="col-md-5 left-form" style="background-image:url('<?=$base_url?>assets/img/dark-linux.png')"></div>
      <div class="col-md-7 right-form">
        <hr>
        <p class="h2 title-right m-3 text-center">Yuk Jadi Anggota KSL</p>
        <p class="h5 title-right text-center">(Kelompok Study Linux)</p>
        <hr>
        <div class="container px-4 pb-4 pt-2 anggap-aja-form">
          <div class="form-group">
            <input class="form-control" type="text" id="nim" name="nim" placeholder="NIM">
            <i class="fas fa-times"></i>
            <i class="fas fa-check"></i>
          </div>
          <div class="form-group">
            <input class="form-control" type="text" id="nama" name="nama" placeholder="Nama Lengkap">
            <i class="fas fa-times"></i>
            <i class="fas fa-check"></i>
          </div>
          <div class="form-group">
            <input class="form-control" type="email" id="email" name="email" placeholder="Email">
            <i class="fas fa-times"></i>
            <i class="fas fa-check"></i>
          </div>
          <div class="form-group">
            <input class="form-control" type="text" id="nohp" name="nohp" placeholder="No. Handphone">
            <i class="fas fa-times"></i>
            <i class="fas fa-check"></i>
          </div>
          <div class="form-group">
            <select class="form-control" id="jk" name="jk">
              <option value="">Jenis Kelamin</option>
              <option value="laki-laki">Laki-laki</option>
              <option value="perempuan">Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <!-- <input class="btn btn-primary form-control" type="submit" name="daftar" value="Daftar"> -->
            <button class="btn btn-primary form-control btn-daftar" type="button" name="button"><strong>Daftar</strong></button>
          </div>
        </div>
      </div>
    </div>

    <!-- Fixed Content -->
    <div class="flash-message-container">
      <!-- <p class="alert alert-primary text-center"></p> -->
    </div>
    <div class="img-container">
      <img class="img img-fluid" src="<?=$base_url?>assets/img/tux-sleep.png" alt="Bobo Yuks">
    </div>
    <div class="img-container2">
      <img class="img img-fluid" src="<?=$base_url?>assets/img/logo_KSL-UBL.png" alt="Kuy Join">
    </div>
    <div class="dot-container">
      <span class="dot-light"></span><hr>
      <span class="dot-dark"></span>
    </div>
    <!-- End Fixed Content -->
    <footer class="alert text-center m-0">
      <small>&copy;KSL(Kelompok Study Linux) 2018</small>
    </footer>
    <!-- Bootstrap -->
   <script src="<?=$base_url?>assets/js/jquery-3.3.1.slim.min.js"></script>
   <script src="<?=$base_url?>assets/js/popper.min.js"></script>
   <script src="<?=$base_url?>assets/js/bootstrap.min.js"></script>
   <script src="<?=$base_url?>assets/js/fontawesome-all.min.js"></script>
   <script src="<?=$base_url?>assets/js/pendaftaran.js"></script>
  </body>
</html>

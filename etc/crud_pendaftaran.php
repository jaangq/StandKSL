<?php
  require_once 'db.php';

  if(isset($_POST['nim']) && isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['no_hp']) && isset($_POST['jk'])) {
    $nim = htmlspecialchars($_POST['nim'], ENT_QUOTES, 'UTF-8');
    $fullname = htmlspecialchars($_POST['fullname'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $no_hp = htmlspecialchars($_POST['no_hp'], ENT_QUOTES, 'UTF-8');
    $jk = htmlspecialchars($_POST['jk'], ENT_QUOTES, 'UTF-8');

    if (!$nim || !$fullname || !$email || !$no_hp || !$jk) {
      die(makeAlert('Ups.. Maaf.. Mohon Lengkapi Isi Form Terlebih Dahulu', 'danger'));
    }
    if(!preg_match('/^[0-9]{10}$/', $nim, $match)) {
      die(makeAlert('Ups.. Maaf.. Format NIM Salah', 'danger'));
    }
    if(!preg_match('/^[a-zA-Z ]{2,}$/', $fullname, $match)) {
      die(makeAlert('Ups.. Maaf.. Mungkin Format Penulisan Nama Lengkap Salah', 'danger'));
    }
    if(!preg_match('/^[0+][0-9]{8,}$/', $no_hp, $match)) {
      die(makeAlert('Ups.. Maaf.. Format Nomor HP Salah', 'danger'));
    }
    if(!preg_match('/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $email, $match)) {
      die(makeAlert('Ups.. Maaf.. Format Penulisan Email Salah', 'danger'));
    }
    if(!preg_match('/^[laki\-laki|perempuan]+$/', $jk, $match)) {
      die(makeAlert('Ups.. Maaf.. Harap Pilih Jenis Kelamin-mu', 'danger'));
    }

    $stmt = $mysqli->prepare("INSERT INTO pendaftar (nim, fullname, email, no_hp, jk) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nim, $fullname, $email, $no_hp, $jk);
    $alert = $stmt->execute() ?  makeAlert('Terimakasih Sudah Berkunjung ke Stand Kami', 'primary') : makeAlert('Ups.. Maaf NIM Sudah Terdaftar', 'danger');
    $affected_rows = $mysqli->affected_rows;
    $stmt->close();
    die($alert);
  }

  function makeAlert($text, $type) {
    return '<p class="alert alert-'.$type.' text-center"><strong>'.$text.'</strong></p>';
  }

?>

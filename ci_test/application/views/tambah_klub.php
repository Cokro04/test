<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <title>Input Data Tim</title>
</head>

<body>
<div class="row">
    <div class="col">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="<?= base_url('/tim'); ?>">Klasemen</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/tim/tambah'); ?>">Tambah Data Tim </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/tim/v_single'); ?>">Tambah Skor Single</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/tim/v_multiple'); ?>">Tambah Skor Multiple</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col">
        <div class="my-4">
          <center>
            <h3>Tambah data baru</h3>
            <?= $this->session->flashdata('msg'); ?>
          </center>
        </div>
        <form action="<?php echo base_url() . 'Tim/tambah_aksi'; ?>" method="post">
          <table style="margin:20px auto;">
            <tr>
              <td>Nama Klub</td>
              <td>
                <div class="form-group mx-sm-3 mb-2">
                  <input type="text" class="form-control" name="nama_club" placeholder="Nama Tim">
                </div>
              </td>
            </tr>
            <tr>
              <td>Alamat Klub</td>
              <td>
                <div class="form-group mx-sm-3 mb-2">
                  <input type="text" class="form-control" name="kota_club" placeholder="Kota Tim">
                </div>
              </td>
            </tr>
            <tr>
              <td></td>
              <td><input type="submit" class="btn btn-primary" value="Tambah"></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>

</html>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

  <title>Hasil Tanding Multiple</title>
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
        <center>
          <h3>Tambah Data Hasil Pertandingan</h3>
          <?= $this->session->flashdata('msg'); ?>
          <form action="<?= base_url('Tim/multiple'); ?>" method="post">
            <table>
              <tr>
                <td>
                  Pertandingan ke 1
                </td>
              </tr>
              <tr>
                <td>
                  <div class="form-group mx-sm-3 mb-2">
                    <select name="tim_a" id="tim_a" class="custom-select" required>
                      <option value="" selected disabled>Pilih Tim</option>
                      <?php foreach ($data as $d) : ?>
                        <option value="<?= $d['nama_club'] ?>"><?= $d['nama_club'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </td>
                <td>
                  <div class="form-group mx-sm-3 mb-2">
                    <input type="number" class="form-control" name="skor_a" placeholder="Skor a">
                  </div>
                </td>
                <td>
                  <div class="form-group mx-sm-3 mb-2">
                    <select name="tim_b" id="tim_b" class="custom-select" required>
                      <option value="" selected disabled>Pilih Tim</option>
                      <?php foreach ($data as $d) : ?>
                        <option value="<?= $d['nama_club'] ?>"><?= $d['nama_club'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </td>
                <td>
                  <div class="form-group mx-sm-3 mb-2">
                    <input type="number" class="form-control" name="skor_b" placeholder="Skor b">
                  </div>
                </td>
              </tr>

              <tr>
                <td>
                  Pertandingan ke 2
                </td>
              </tr>

              <tr>
                <td>
                  <div class="form-group mx-sm-3 mb-2">
                    <select name="tim_c" id="tim_c" class="custom-select" required>
                      <option value="" selected disabled>Pilih Tim</option>
                      <?php foreach ($data as $d) : ?>
                        <option value="<?= $d['nama_club'] ?>"><?= $d['nama_club'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </td>
                <td>
                  <div class="form-group mx-sm-3 mb-2">
                    <input type="number" class="form-control" name="skor_c" placeholder="Skor c">
                  </div>
                </td>
                <td>
                  <div class="form-group mx-sm-3 mb-2">
                    <select name="tim_d" id="tim_d" class="custom-select" required>
                      <option value="" selected disabled>Pilih Tim</option>
                      <?php foreach ($data as $d) : ?>
                        <option value="<?= $d['nama_club'] ?>"><?= $d['nama_club'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </td>
                <td>
                  <div class="form-group mx-sm-3 mb-2">
                    <input type="number" class="form-control" name="skor_d" placeholder="Skor d">
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <input type="submit" class="btn btn-primary" value="Simpan">
                </td>
              </tr>
            </table>
          </form>
        </center>
      </div>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>
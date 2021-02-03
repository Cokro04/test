<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

  <title>Input Data Tim</title>
</head>

<body>
  <center>
    <h3>Tambah Data Hasil Pertandingan</h3>
 
  <form method="post" action="<?php echo base_url("index.php/siswa/save"); ?>">
    <!-- Buat tombol untuk menabah form data -->
    <button type="button" id="btn-tambah-form">Tambah Data Form</button>
    <button type="button" id="btn-reset-form">Reset Form</button><br><br>

    <b>Pertandingan Ke 1 :</b>
    <table>
      <tr>
        <td>Tim A</td>
        <td><input type="text" name="nama_club1[]" required></td>
      </tr>
      <tr>
        <td>Skor A</td>
        <td><input type="text" name="skor1[]" required></td>
      </tr>
      <tr>
        <td>Tim B</td>
        <td><input type="text" name="nama_club2[]" required></td>
      </tr>
      <tr>
        <td>Skor B</td>
        <td><input type="text" name="skor2[]" required></td>
      </tr>
    </table>
    <br><br>

    <div id="insert-form"></div>

    <hr>
    <input type="submit" value="Simpan">
  </form>
  </center>
  <!-- Kita buat textbox untuk menampung jumlah data form -->
  <input type="hidden" id="jumlah-form" value="1">

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function() { // Ketika halaman sudah diload dan siap
      $("#btn-tambah-form").click(function() { // Ketika tombol Tambah Data Form di klik
        var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
        var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

        $("#insert-form").append("<b>Pertandingan Ke " + nextform + " :</b>" +
          "<table>" +
          "<tr>" +
          "<td>Tim A</td>" +
          "<td><input type='text' name='nama_club1[]' required></td>" +
          "</tr>" +
          "<tr>" +
          "<td>Skor A</td>" +
          "<td><input type='text' name='skor1[]' required></td>" +
          "</tr>" +
          "<tr>" +
          "<td>Tim B</td>" +
          "<td><input type='text' name='nama_club2[]' required></td>" +
          "</tr>" +
          "<tr>" +
          "<td>Skor B</td>" +
          "<td><input type='text' name='skor2[]' required></td>" +
          "</tr>" +
          "</table>" +
          "<br><br>");

        $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
      });

      // Buat fungsi untuk mereset form ke semula
      $("#btn-reset-form").click(function() {
        $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
        $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
      });
    });
  </script>

</body>

</html>
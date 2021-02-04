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
        <center>
          <div class="my-5">
            <h2>Klasemen Sementara</h2>
          </div>
        </center>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Tim</th>
                <th scope="col">Main</th>
                <th scope="col">Menang</th>
                <th scope="col">Seri</th>
                <th scope="col">Kalah</th>
                <th scope="col">GM</th>
                <th scope="col">GA</th>
                <th scope="col">SG</th>
                <th scope="col">Poin</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1 ?>
              <?php foreach ($data as $d) : ?>
                <?php $poin = $this->db->get_where('tbl_poin', array('nama_club' => $d['nama_club']))->result_array();
                ?>
                <?php $this->db->where('tim_a', $d['nama_club']);
                $this->db->where('skor_a' . '>' . 'skor_b');
                $this->db->from('tbl_tanding');
                $m1 = $this->db->count_all_results();

                ?>
                <?php $this->db->where('tim_b', $d['nama_club']);
                $this->db->where('skor_b' . '>' . 'skor_a');
                $this->db->from('tbl_tanding');
                $m2 = $this->db->count_all_results();
                ?>

                <?php $this->db->where('tim_a', $d['nama_club']);
                $this->db->where('skor_a' . '<' . 'skor_b');
                $this->db->from('tbl_tanding');
                $k1 = $this->db->count_all_results();

                ?>
                <?php $this->db->where('tim_b', $d['nama_club']);
                $this->db->where('skor_b' . '<' . 'skor_a');
                $this->db->from('tbl_tanding');
                $k2 = $this->db->count_all_results();
                ?>

                <?php $this->db->where('tim_a', $d['nama_club']);
                $this->db->where('skor_a' . '=' . 'skor_b');
                $this->db->from('tbl_tanding');
                $s1 = $this->db->count_all_results();

                ?>
                <?php $this->db->where('tim_b', $d['nama_club']);
                $this->db->where('skor_b' . '=' . 'skor_a');
                $this->db->from('tbl_tanding');
                $s2 = $this->db->count_all_results();
                ?>


                <?php $this->db->like('tim_b', $d['nama_club']);
                $this->db->from('tbl_tanding');
                $b = $this->db->count_all_results() ?>


                <?php $this->db->like('tim_a', $d['nama_club']);
                $this->db->from('tbl_tanding');
                $a = $this->db->count_all_results() ?>


                <?php $this->db->where('tim_a', $d['nama_club']);
                $this->db->select_sum('skor_a', 'a');
                $ga1 = $this->db->get('tbl_tanding')->result_array(); ?>

                <?php $this->db->where('tim_b', $d['nama_club']);
                $this->db->select_sum('skor_b', 'a');
                $ga2 = $this->db->get('tbl_tanding')->result_array(); ?>


                <?php $this->db->where('tim_b', $d['nama_club']);
                $this->db->select_sum('skor_a', 'b');
                $gm1 = $this->db->get('tbl_tanding')->result_array(); ?>

                <?php $this->db->where('tim_a', $d['nama_club']);
                $this->db->select_sum('skor_b', 'b');
                $gm2 = $this->db->get('tbl_tanding')->result_array(); ?>

                <tr>
                  <td scope="row"><?= $i++; ?></td>
                  <td><?= $d['nama_club']; ?></td>
                  <td>
                    <?= $a + $b; ?>
                  </td>
                  <td>
                    <?= $m1 + $m2; ?>
                  </td>
                  <td>
                    <?= $s1 + $s2; ?>
                  </td>
                  <td>
                    <?= $k1 + $k2; ?>
                  </td>
                  <td><?= ($ga1[0]['a']) + ($ga2[0]['a']); ?></td>
                  <td><?= ($gm1[0]['b']) + ($gm2[0]['b']); ?></td>
                  <td><?= (($ga1[0]['a']) + ($ga2[0]['a'])) - (($gm1[0]['b']) + ($gm2[0]['b'])); ?></td>
                  <td><?php if (count($poin) > 0) {
                        echo $poin[0]['poin'];
                      }; ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>

</html>
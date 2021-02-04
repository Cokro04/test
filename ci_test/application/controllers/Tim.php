<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tim extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('KlubModel');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data = [
      'data' => $this->KlubModel->get_club()
    ];
    $this->load->view('data_tanding', $data);
  }

  public function tambah()
  {
    $data = [
      'eror' => validation_errors()
    ];
    $this->load->view('tambah_klub', $data);
  }

  public function tambah_aksi()
  {
    $this->form_validation->set_rules('nama_club', 'Club', 'required|is_unique[tbl_club.nama_club]');
    $this->form_validation->set_rules('kota_club', 'Kota', 'required');

    if ($this->form_validation->run() != false) {
      $nama = $this->input->post('nama_club');
      $alamat = $this->input->post('kota_club');

      $data = [
        'nama_club' => $nama,
        'kota_club' => $alamat,
      ];
      $data_name = [
        'nama_club' => $nama,
        'poin' => 0
      ];
      $this->KlubModel->input_data($data, 'tbl_club');
      $this->KlubModel->input_name($data_name, 'tbl_poin');
      redirect('tim/tambah');
    } else {
      $this->session->set_flashdata(
        'msg',
        '<div class="alert alert-danger">
            <p>Nama Tim Sama.</p>
        </div>'
      );
      redirect('tim/tambah');
    }
  }

  public function tambah_skor()
  {
    $this->load->view('tambah_skor');
  }

  public function v_multiple()
  {
    $data = [
      'data' =>   $this->KlubModel->get_club()
    ];
    $this->load->view('tambah_skor_multiple', $data);
  }

  public function multiple()
  {
    $tim_a = $this->input->post('tim_a');
    $tim_b = $this->input->post('tim_b');
    $tim_c = $this->input->post('tim_c');
    $tim_d = $this->input->post('tim_d');

    $gabung_ab = $tim_a . $tim_b;
    $gabung_cd = $tim_c . $tim_d;

    $skor_a = $this->input->post('skor_a');
    $skor_b = $this->input->post('skor_b');
    $skor_c = $this->input->post('skor_c');
    $skor_d = $this->input->post('skor_d');

    if (($skor_a > $skor_b) && ($skor_c > $skor_d)) {
      $get_p_a = $this->KlubModel->get_poin($tim_a);
      $get_p_c = $this->KlubModel->get_poin($tim_c);
      $p_a = $get_p_a[0]['poin'] + 3;
      $p_c = $get_p_c[0]['poin'] + 3;
      $data = [['nama_club' => $tim_a, 'poin' => $p_a], ['nama_club' => $tim_c, 'poin' => $p_c]];
      $this->KlubModel->seri($data, 'tbl_poin');
    } elseif (($skor_a < $skor_b) && ($skor_c < $skor_d)) {
      $get_p_b = $this->KlubModel->get_poin($tim_b);
      $get_p_d = $this->KlubModel->get_poin($tim_d);
      $p_b = $get_p_b[0]['poin'] + 3;
      $p_d = $get_p_d[0]['poin'] + 3;
      $data = [['nama_club' => $tim_b, 'poin' => $p_b], ['nama_club' => $tim_d, 'poin' => $p_d]];
      $this->KlubModel->seri($data, 'tbl_poin');
    } elseif (($skor_a > $skor_b) && ($skor_c < $skor_d)) {
      $get_p_aa = $this->KlubModel->get_poin($tim_a);
      $get_p_dd = $this->KlubModel->get_poin($tim_d);
      $p_aa = $get_p_aa[0]['poin'] + 3;
      $p_dd = $get_p_dd[0]['poin'] + 3;
      $data = [['nama_club' => $tim_a, 'poin' => $p_aa], ['nama_club' => $tim_d, 'poin' => $p_dd]];
      $this->KlubModel->seri($data, 'tbl_poin');
    } elseif (($skor_a < $skor_b) && ($skor_c > $skor_d)) {
      $get_p_bb = $this->KlubModel->get_poin($tim_b);
      $get_p_cc = $this->KlubModel->get_poin($tim_c);
      $p_bb = $get_p_bb[0]['poin'] + 3;
      $p_cc = $get_p_cc[0]['poin'] + 3;
      $data = [['nama_club' => $tim_b, 'poin' => $p_bb], ['nama_club' => $tim_c, 'poin' => $p_cc]];
      $this->KlubModel->seri($data, 'tbl_poin');
    } elseif (($skor_a = $skor_b) && ($skor_c = $skor_d)) {
      $get_p_aaa = $this->KlubModel->get_poin($tim_a);
      $get_p_bbb = $this->KlubModel->get_poin($tim_b);
      $get_p_ccc = $this->KlubModel->get_poin($tim_c);
      $get_p_ddd = $this->KlubModel->get_poin($tim_d);
      $p_aaa = $get_p_aaa[0]['poin'] + 1;
      $p_bbb = $get_p_bbb[0]['poin'] + 1;
      $p_ccc = $get_p_ccc[0]['poin'] + 1;
      $p_ddd = $get_p_ddd[0]['poin'] + 1;
      $data = [['nama_club' => $tim_a, 'poin' => $p_aaa], ['nama_club' => $tim_b, 'poin' => $p_bbb], ['nama_club' => $tim_c, 'poin' => $p_ccc], ['nama_club' => $tim_d, 'poin' => $p_ddd]];
      $this->KlubModel->seri($data, 'tbl_poin');
    }

    if (($tim_a != $tim_b) && ($tim_c != $tim_d)) {
      $data = [
        [
          'tim_a' => $tim_a,
          'tim_b' => $tim_b,
          'skor_a' => $skor_a,
          'skor_b' => $skor_b
        ],
        [
          'tim_a' => $tim_c,
          'tim_b' => $tim_d,
          'skor_a' => $skor_c,
          'skor_b' => $skor_d
        ]
      ];
      $this->KlubModel->multiple_insert($data, 'tbl_tanding');
      redirect('tim/v_multiple');
    } elseif (($tim_a != $tim_c) && ($tim_a != $tim_d) && ($tim_b != $tim_c) && ($tim_b != $tim_d)) {
      $data = [
        [
          'tim_a' => $tim_a,
          'tim_b' => $tim_b,
          'skor_a' => $skor_a,
          'skor_b' => $skor_b
        ],
        [
          'tim_a' => $tim_c,
          'tim_b' => $tim_d,
          'skor_a' => $skor_c,
          'skor_b' => $skor_d
        ]
      ];
      $this->KlubModel->multiple_insert($data, 'tbl_tanding');
      redirect('tim/v_multiple');
    } else {
      $this->session->set_flashdata(
        'msg',
        '<div class="alert alert-danger">
            <h4>Gagal </h4>
            <p>Nama Tim Sama.</p>
        </div>'
      );
      redirect('tim/v_multiple');
    }
  }

  public function v_single()
  {
    $data = [
      'data' =>   $this->KlubModel->get_club()
    ];
    $this->load->view('tambah_skor', $data);
  }

  public function single()
  {
    $tim_a = $this->input->post('tim_a');
    $tim_b = $this->input->post('tim_b');
    $skor_a = $this->input->post('skor_a');
    $skor_b = $this->input->post('skor_b');

    if ($skor_a > $skor_b) {
      $get_poin = $this->KlubModel->get_poin($tim_a);
      $poin_a = $get_poin[0]['poin'] + 3;
      $data = ['poin' => $poin_a];
      $this->KlubModel->update_poin($data, $tim_a);
    } elseif ($skor_a < $skor_b) {
      $get_poin = $this->KlubModel->get_poin($tim_b);
      $poin_b = $get_poin[0]['poin'] + 3;
      $data = ['poin' => $poin_b];
      $this->KlubModel->update_poin($data, $tim_b);
    } elseif ($skor_a == $skor_b) {
      $get_poin_a = $this->KlubModel->get_poin($tim_a);
      $seri_a = $get_poin_a[0]['poin'] + 1;
      $get_poin_b = $this->KlubModel->get_poin($tim_b);
      $seri_b = $get_poin_b[0]['poin'] + 1;
      $data = [['nama_club' => $tim_a, 'poin' => $seri_a], ['nama_club' => $tim_b, 'poin' => $seri_b]];
      $this->KlubModel->seri($data, 'tbl_poin');
    }

    if ($tim_a != $tim_b) {
      $data = [
        'tim_a' => $tim_a,
        'tim_b' => $tim_b,
        'skor_a' => $skor_a,
        'skor_b' => $skor_b
      ];
      $this->KlubModel->single_insert($data, 'tbl_tanding');
      redirect('tim/v_single');
    } else {
      $this->session->set_flashdata(
        'msg',
        '<div class="alert alert-danger">
            <h4>Gagal </h4>
            <p>Nama Tim Sama.</p>
        </div>'
      );
      redirect('tim/v_single');
    }
  }
}

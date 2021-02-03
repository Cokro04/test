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

      $data = array(
        'nama_club' => $nama,
        'kota_club' => $alamat,
      );
      $this->KlubModel->input_data($data, 'tbl_club');
      redirect('tim/tambah');
    } else {
      redirect('tim/tambah');
    }
  }

  public function tambah_skor()
  {
    $this->load->view('tambah_skor');
  }
}

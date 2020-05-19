<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Owner extends MY_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model('UserModel');
    $this->load->helper('url','form');
    //load libary pagination
    $this->load->library('pagination');
  }

  public function welcome()
  {
    $this->load->view('tampilan/header_owner');
    $this->load->view('welcome');
    $this->load->view('tampilan/footer');
  }

  //Laporan Data Pengguna
  public function cari(){
    $keyword = $this->input->get('cari', TRUE); //mengambil nilai dari form input cari
    $data['login_jo1'] = $this->UserModel->cari_pengguna($keyword); //mencari data karyawan berdasarkan inputan
    $this->load->view('tampilan/header_owner');
    //$this->load->view('templates/sidebar');
    $this->load->view('owner/laporan_periode/laporan_user', $data); //menampilkan data yang sudah dicari
    $this->load->view('tampilan/footer');
  }

   //Laporan Data Menu
   public function cari_menu(){
    $keyword = $this->input->get('cari_makanan', TRUE); //mengambil nilai dari form input cari
    $data['daftar_menu'] = $this->UserModel->cari_makanan($keyword); //mencari data karyawan berdasarkan inputan
    $this->load->view('tampilan/header_owner');
    //$this->load->view('templates/sidebar');
    $this->load->view('owner/laporan_periode/laporan_menu', $data); //menampilkan data yang sudah dicari
    $this->load->view('tampilan/footer');
  }

  //Laporan Data Pesanan
  public function cari_pesanan(){
    $keyword = $this->input->get('cari_pesanan', TRUE); //mengambil nilai dari form input cari
    $data['pesanan'] = $this->UserModel->cari_pesanan($keyword); //mencari data karyawan berdasarkan inputan
    $this->load->view('tampilan/header_owner');
    //$this->load->view('templates/sidebar');
    $this->load->view('owner/laporan_periode/laporan_pesanan', $data); //menampilkan data yang sudah dicari
    $this->load->view('tampilan/footer');
  }

  //Laporan Transaksi
  public function cari_transaksi(){
    $keyword = $this->input->get('cari_transaksi', TRUE); //mengambil nilai dari form input cari
    $data['transaksi1'] = $this->UserModel->cari_transaksi1($keyword); //mencari data karyawan berdasarkan inputan
    $this->load->view('tampilan/header_owner');
    //$this->load->view('templates/sidebar');
    $this->load->view('owner/laporan_periode/laporan_transaksi', $data); //menampilkan data yang sudah dicari
    $this->load->view('tampilan/footer');
  }

  
}

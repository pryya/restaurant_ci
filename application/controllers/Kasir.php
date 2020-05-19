<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends MY_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model('UserModel');
    $this->load->helper('url','form');
    //load libary pagination
    $this->load->library('pagination');
  }

  public function welcome()
  {
    $this->load->view('tampilan/header_kasir');
    $this->load->view('welcome');
    $this->load->view('tampilan/footer');
  }

  //MENAMPILKAN DATA TEMPORY
  public function pesanan(){
    $data['pesan']= $this->UserModel->tampil_datapesanan()->result();
    //kode diatas ditulis jika akan menampilkan tabel dibawahnya,
    //Tetapi kalau tidak ada bisa dihilangkan
    $this->load->view('tampilan/header_kasir',$data);
    $this->load->view('kasir/pesanan');
    $this->load->view('tampilan/footer');
  }

  //KE MODEL UNTUK SIMPAN DATA KE TABEL TEMPORARY
  public function pesanan_tambah(){
    $p['id_pesanan']=$this->UserModel->input_pesanan();
    $data['pesan']= $this->UserModel->tampil_datapesanan()->result();
    $this->load->view('tampilan/header_kasir.php', $data);
		$this->load->view('kasir/pesanan',$p);
		$this->load->view('tampilan/footer.php');
    }

  //KE MODEL UNTUK MEMINDAHKAN DATA TEMPORARY KE TABEL BIASA
  public function tambah_pesanan(){
    $this->UserModel->pindahTemp($data, 'pesanan');
    $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Data Berhasil Ditambahkan!
    </div>');
    redirect('kasir/pesanan');
  }

  ///MENAMPILKAN HALAMAN TRANSAKSI
  public function transaksi(){
    $data['transaksi']= $this->UserModel->tampil_datatransaksi()->result();
    $this->load->view('tampilan/header_kasir');
    $this->load->view('kasir/transaksi',$data);
    $this->load->view('tampilan/footer');
  }  

  //PENCARIAN DATA PESANAN UNTUK TRANSAKSI
  public function search_transaksi(){
    $keyword = $this->input->get('cari_transaksi', TRUE);
    $data['transaksi'] = $this->UserModel->cari_transaksi($keyword);
    $this->load->view('tampilan/header_kasir');
    $this->load->view('kasir/transaksi', $data);
    $this->load->view('tampilan/footer');
    $this->session->set_flashdata('flash_sukses', '<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Data Berhasil Diubah!
    </div>');
  }

  public function tambah_transaksi(){
    $this->UserModel->input_transaksi($data, 'posisi_meja');
    $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Data Berhasil Ditambahkan!
    </div>');
    redirect('kasir/transaksi');
      
  }
}

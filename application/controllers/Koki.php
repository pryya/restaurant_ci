<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Koki extends MY_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model('UserModel');
    $this->load->helper('url','form');
    //load libary pagination
    $this->load->library('pagination');
  }

  public function welcome()
  {
    $this->load->view('tampilan/header_koki');
    $this->load->view('welcome');
    $this->load->view('tampilan/footer');
  }

   //MENAMPILKAN DATA PESANAN
   public function pesanan(){
    $data['pesanan']= $this->UserModel->tampil_pesanan()->result();
    $this->load->view('tampilan/header_koki');
    $this->load->view('pesanan_view',$data);
    $this->load->view('tampilan/footer');
  }
}

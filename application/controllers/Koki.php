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

  
}

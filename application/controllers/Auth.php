<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('UserModel');
	}

	public function index(){
		if($this->session->userdata('authenticated')) // Jika user sudah login (Session authenticated ditemukan)
			redirect('admin/welcome'); // Redirect ke page home

		// function render_login tersebut dari file core/MY_Controller.php
		$this->load->view('login'); // Load view login.php
	}

	public function login(){
		$username = $this->input->post('username'); // Ambil isi dari inputan username pada form login
		$password = $this->input->post('password'); // Ambil isi dari inputan password pada form login dan encrypt dengan md5
		$no_meja = $this->input->post('no_meja');

		$user = $this->UserModel->get($username); // Panggil fungsi get yang ada di UserModel.php
		$posisi_meja = $this->UserModel->getmeja($no_meja);

		if(empty($user)){ // Jika hasilnya kosong / user tidak ditemukan
			$this->session->set_flashdata('message', 'Username tidak ditemukan'); // Buat session flashdata
			redirect('auth'); // Redirect ke halaman login
		}else{
			if($password == $user->password){ // Jika password yang diinput sama dengan password yang didatabase
				$session = array(
					'authenticated'=>true, // Buat session authenticated dengan value true
					'id_user'=>$user->id_user, // Buat session id_user
					'username'=>$user->username,  // Buat session username
					'nama_user'=>$user->nama_user, // Buat session nama
					'id_level'=>$user->id_level, // Buat session id_level
					'nama_level'=>$user->nama_level, 
					'no_meja' =>$posisi_meja->no_meja
				);
				$user->id_level;
				// die;
				if ($user->id_level == 1) {
					$this->session->set_userdata($session); // Buat session sesuai $session
					redirect('admin/welcome'); // Redirect ke halaman home
				}elseif ($user->id_level == 2) {
					$this->session->set_userdata($session); // Buat session sesuai $session
					redirect('kasir/welcome');
					$user->id_level;
					// die;
				}elseif ($user->id_level == 3) {
					$this->session->set_userdata($session); // Buat session sesuai $session
					redirect('koki/welcome');
					$user->id_level;
					// die;
				}elseif ($user->id_level == 4) {
					$this->session->set_userdata($session); // Buat session sesuai $session
					redirect('owner/welcome');
					$user->id_level;
					// die;
				}

				else{
					echo "Anda Tidak Berhak";
					die;
				}
				
			}else{
				$this->session->set_flashdata('message', 'Password salah'); // Buat session flashdata
				redirect('auth'); // Redirect ke halaman login
			}
		}
	}




	 /* public function msk(){
		$nama_masakan = $this->input->post('nama_masakan');
		$Harga = $this->input->post('harga');
		$status_masakan = $this->input->post('status_masakan');
		$stock = $this->input->post('stock');

		$this->UserModel->tambahDatamasakan();
		redirect('auth');

		if($stock >= 60 && $stock <= 100){
			$status_masakan = "Tersedia";
		}
		elseif($stock >= 1 && $stock <= 59){
			$status_masakan = "Hampir Habis";
		}
		elseif($stock == 0){
			$status_masakan = "Sudah Habis";
		}


	}  */

	public function logout(){
		$this->session->sess_destroy(); // Hapus semua session
		redirect('auth'); // Redirect ke halaman login
	}
}

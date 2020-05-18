<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model('UserModel');
    $this->load->helper('url','form');
    //load libary pagination
    $this->load->library('pagination');
  }

  //MENAMPILKAN HALAMAN WELCOME
  public function welcome(){
    $this->load->view('tampilan/header');
    $this->load->view('welcome');
    $this->load->view('tampilan/footer');
  }

       /** PENGGUNA */

  //Menampilkan Halaman Data Pengguna
  public function pengguna(){
    $data['user']= $this->UserModel->tampil_datapengguna()->result();
    $this->load->view('tampilan/header');
    $this->authenticated();
    $this->load->view('pengguna',$data);
    $this->load->view('tampilan/footer');
  }

  //Menghubungkan Ke Model untuk Tambah Data Pengguna
  public function tambah_pengguna(){
    $this->UserModel->input_pengguna($data, 'user');
    $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Data Berhasil Ditambahkan!
    </div>');
    redirect('admin/pengguna');
  
  }

  //Menghubungkan ke Model untuk Hapus Data Pengguna
  public function hapus($id_user){
    $this->UserModel->hapus_pengguna($id_user);
    redirect('admin/pengguna');
  }

  //Untuk Menampilkan Form Edit
  public function edit($id_user){
    $data['user'] = $this->UserModel->getDatapengguna($id_user);
    $this->load->view('tampilan/header');
    $this->load->view('pengguna_ubah', $data);
    $this->load->view('tampilan/footer');

  }

  //Menghubungkan ke Model untuk Proses Edit Data Pengguna
  public function pengguna_edit(){
    $this->UserModel->ubahDatapengguna();
    $this->session->set_flashdata('flash_sukses', '<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Data Berhasil Diubah!
    </div>');
    redirect('admin/pengguna');
  }

  //untuk Menampilkan Detail Data Pengguna
  public function detail($id_user){
    $this->load->model('UserModel');
    $detail = $this->UserModel->detail_data($id_user);
    $data['detail'] = $detail;
    $this->load->view('tampilan/header');
    $this->load->view('detail_pengguna', $data);
    $this->load->view('tampilan/footer');
  }

  //Laporan Data Pengguna PDF
  public function pdf(){
    //load library dompdf_gen
    $this->load->library('dompdf_gen');
    //membuat varibel
  
    $data['user'] = $this->UserModel->tampil_datapengguna('user')->result();
  
    $this->load->view('laporan/pengguna_pdf',$data);
  
    $paper_size = 'A4';
    $orientation = 'landscape';
    $html = $this->output->get_output();
    $this->dompdf->set_paper($paper_size, $orientation);
  
    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("laporan_pengguna.pdf", array('Attachment'=>0));
    }

  //Pencarian Data Pengguna Di Hal Pengguna
  public function search_pengguna(){
    $keyword = $this->input->get('cari_pengguna', TRUE); //mengambil nilai dari form input cari
    $data['user'] = $this->UserModel->cari_pengguna($keyword); //mencari data karyawan berdasarkan inputan
    $this->load->view('tampilan/header');
    //$this->load->view('templates/sidebar');
    $this->load->view('pengguna', $data); //menampilkan data yang sudah dicari
    $this->load->view('tampilan/footer');
  }

  //Laporan Periode Data Pengguna
  public function cari(){
    $keyword = $this->input->get('cari', TRUE); //mengambil nilai dari form input cari
    $data['login_jo1'] = $this->UserModel->cari_pengguna($keyword); //mencari data karyawan berdasarkan inputan
    $this->load->view('tampilan/header');
    //$this->load->view('templates/sidebar');
    $this->load->view('laporan_periode/laporan_user', $data); //menampilkan data yang sudah dicari
    $this->load->view('tampilan/footer');
  }


      /** MAKANAN */

  ///Menampilka Halaman Data Menu
  public function makanan(){
    $data['makanan']= $this->UserModel->tampil_datamakanan()->result();
    $this->load->view('tampilan/header');
    $this->load->view('makanan',$data);
    $this->load->view('tampilan/footer');
  }

  //Laporan Data Menu PDF
  public function pdf_makanan(){
    //load library dompdf_gen
    $this->load->library('dompdf_gen');
    //membuat varibel

		$data['makanan'] = $this->UserModel->tampil_datamakanan('makanan')->result();

		$this->load->view('laporan/makanan_pdf',$data);

		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan_makanan.pdf", array('Attachment'=>0));
  }  

  //Pencarian Data Makanan
  public function search_makanan(){
    $keyword = $this->input->get('cari_makanan', TRUE); //mengambil nilai dari form input cari
    $data['makanan'] = $this->UserModel->cari_makanan($keyword); //mencari data karyawan berdasarkan inputan
    $this->load->view('tampilan/header');
    //$this->load->view('templates/sidebar');
    $this->load->view('makanan', $data); //menampilkan data yang sudah dicari
    $this->load->view('tampilan/footer');
  }

  //Untuk Menampilkan Detail Data Menu
  public function detail_menu($id_menu){
    $this->load->model('UserModel');
    $detail_menu = $this->UserModel->detail_datam($id_menu);
    $data['detail_menu'] = $detail_menu;
    $this->load->view('tampilan/header');
    $this->load->view('detail_menumm', $data);
    $this->load->view('tampilan/footer');
  }

  //Mengbungkan ke Model untuk Hapus Data Menu
  public function hapus_menu($id_menu){
    $this->UserModel->hapus_menumm($id_menu);
    redirect('admin/makanan');
  }

  //untuk Menampilkan Form Edit
  public function menu_ubah($id_menu){
    $data['makanan'] = $this->UserModel->getDatamakanan($id_menu);
    $this->load->view('tampilan/header');
    $this->load->view('menu_ubah', $data);
    $this->load->view('tampilan/footer');
  }

  //Menghubungkan ke Model untuk Tambah Data
  public function tambah_makanan(){
    $this->UserModel->input_makanan($data, 'daftar_menu');
    $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Data Berhasil Ditambahkan!
    </div>');
    redirect('admin/makanan');
  }

  //Menghubungkan ke Model untuk Proses Edit Data Menu
  public function makanan_edit(){
    $this->UserModel->ubahDatamakanan();
    $this->session->set_flashdata('flash_sukses', '<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Data Berhasil Diubah!
    </div>');
    redirect('admin/makanan');
  }

  //Laporan Periode Data Menu
  public function cari_menu(){
    $keyword = $this->input->get('cari_makanan', TRUE); //mengambil nilai dari form input cari
    $data['daftar_menu'] = $this->UserModel->cari_makanan($keyword); //mencari data karyawan berdasarkan inputan
    $this->load->view('tampilan/header');
    //$this->load->view('templates/sidebar');
    $this->load->view('laporan_periode/laporan_menu', $data); //menampilkan data yang sudah dicari
    $this->load->view('tampilan/footer');
  }

  //Pencarian Data Pesanan
  public function search_pesanan(){
    $keyword = $this->input->get('cari_pesanan', TRUE); //mengambil nilai dari form input cari
    $data['pesanan'] = $this->UserModel->cari_pesanan($keyword); //mencari data karyawan berdasarkan inputan
    $this->load->view('tampilan/header');
    //$this->load->view('templates/sidebar');
    $this->load->view('pesanan_view', $data); //menampilkan data yang sudah dicari
    $this->load->view('tampilan/footer');
  }

  //PENCARIAN DATA PESANAN UNTUK TRANSAKSI
  public function search_transaksi(){
    $keyword = $this->input->get('cari_transaksi', TRUE);
    $data['transaksi'] = $this->UserModel->cari_transaksi($keyword);
    $this->load->view('tampilan/header');
    $this->load->view('transaksi', $data);
    $this->load->view('tampilan/footer');
    $this->session->set_flashdata('flash_sukses', '<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Data Berhasil Diubah!
  </div>');
  }

  //PENCARIAN DATA Transaksi
  public function search_transaksi1(){
    $keyword = $this->input->get('cari_transaksi', TRUE); //mengambil nilai dari form input cari
    $data['transaksi1'] = $this->UserModel->cari_transaksi1($keyword); //mencari data karyawan berdasarkan inputan
    $this->load->view('tampilan/header');
    //$this->load->view('templates/sidebar');
    $this->load->view('transaksi_view', $data); //menampilkan data yang sudah dicari
    $this->load->view('tampilan/footer');
  }

  //MENAMPILKAN HALAMAN MEJA
  public function meja(){
    $data['meja']= $this->UserModel->tampil_datameja()->result();
    $this->load->view('tampilan/header');
    $this->load->view('meja',$data);
    $this->load->view('tampilan/footer');
  }

  //KE MODEL UNTUK MENAMBAHKAN DATA MEJA
  public function tambah_meja(){
    $this->UserModel->input_meja($data, 'posisi_meja');
    $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Data Berhasil Ditambahkan!
  </div>');
    redirect('admin/meja');
    
  }

   public function hapus_meja($no_meja){
      $this->UserModel->hapus_meja($no_meja);
      redirect('admin/meja');
    }

    public function edit_meja($no_meja){
      $data['meja'] = $this->UserModel->getDatameja($no_meja);
      $this->load->view('tampilan/header');
      $this->load->view('meja_ubah', $data);
      $this->load->view('tampilan/footer');
    }

    public function meja_edit(){
      $this->UserModel->ubahDataMeja();
      $this->session->set_flashdata('flash_sukses', '<div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      Data Berhasil Diubah!
    </div>');
    redirect('admin/meja');
    }

     //PENCARIAN DATA MEJA
  public function search_meja(){
    $keyword = $this->input->get('cari_meja', TRUE); //mengambil nilai dari form input cari
    $data['meja'] = $this->UserModel->cari_meja($keyword); //mencari data karyawan berdasarkan inputan
    $this->load->view('tampilan/header');
    //$this->load->view('templates/sidebar');
    $this->load->view('meja', $data); //menampilkan data yang sudah dicari
    $this->load->view('tampilan/footer');
  }





 /*  public function pesan(){
    $data['pesanan'] = $this->UserModel->tampil_datapesanan()->result();
    $this->load->view('tampilan/header');
    $this->load->view('pesan', $data);
    $this->load->view('tampilan/footer');

  } */





  
  //Struk Pesanan
  public function pdf_pesanan(){
    //load library dompdf_gen
    $this->load->library('dompdf_gen');
    //membuat varibel

		$data['pesan'] = $this->UserModel->tampil_datapesanan('pesan')->result();

		$this->load->view('laporan/pesanan_pdf',$data);

		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan_pesanan.pdf", array('Attachment'=>0));
  }


  /* function get_menu()
    {
        $id_menu=$this->input->post('id_menu');
        $data=$this->UserModel->nama($id_menu);
        echo json_encode($data);
    } */

    function get_harga(){
      $id_menu=$this->input->post('id_menu');
      $data=$this->UserModel->get_harga($id_menu);
      echo json_encode($data);
    }


    
  //MENAMPILKAN DATA TEMPORY
  public function pesanan(){
    $data['pesan']= $this->UserModel->tampil_datapesanan()->result();
    //kode diatas ditulis jika akan menampilkan tabel dibawahnya,
    //Tetapi kalau tidak ada bisa dihilangkan
    $this->load->view('tampilan/header',$data);
    $this->load->view('pesanan');
    $this->load->view('tampilan/footer');
  }
  

  //KE MODEL UNTUK SIMPAN DATA KE TABEL TEMPORARY
  public function pesanan_tambah(){
    $p['id_pesanan']=$this->UserModel->input_pesanan();
    $data['pesan']= $this->UserModel->tampil_datapesanan()->result();
    $this->load->view('tampilan/header.php', $data);
		$this->load->view('pesanan',$p);
		$this->load->view('tampilan/footer.php');
    }

  //MENAMPILKAN DATA PESANAN
  public function pesanan_view(){
    $data['pesanan']= $this->UserModel->tampil_pesanan()->result();
    $this->load->view('tampilan/header');
    $this->load->view('pesanan_view',$data);
    $this->load->view('tampilan/footer');
  }

    //KE MODEL UNTUK MEMINDAHKAN DATA TEMPORARY KE TABEL BIASA
    public function tambah_pesanan(){
      $this->UserModel->pindahTemp($data, 'pesanan');
    $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Data Berhasil Ditambahkan!
  </div>');
    redirect('admin/pesanan');
      }

      //KE MODEL UNTUK HAPUS DATA TEMPORARY
    public function hapus_pesanan($id){
      $this->UserModel->hapus_pesan($id);
      redirect('admin/pesanan');
    }

    //KE MODEL UNTUK HAPUS DATA BIASA
    public function hapus_vpesanan($id){
      $this->UserModel->hapus_vpesan($id);
      redirect('admin/pesanan_view');
    }

      ///MENAMPILKAN HALAMAN DATA MENU
  public function transaksi(){
    $data['transaksi']= $this->UserModel->tampil_datatransaksi()->result();
    $this->load->view('tampilan/header');
    $this->load->view('transaksi',$data);
    $this->load->view('tampilan/footer');
  }  
   ///MENAMPILKAN HALAMAN DATA MENU
   public function transaksi_view(){
    $data['transaksi1']= $this->UserModel->tampil_datatransaksi1()->result();
    $this->load->view('tampilan/header');
    $this->load->view('transaksi_view',$data);
    $this->load->view('tampilan/footer');
  }

  public function tambah_transaksi(){
    $this->UserModel->input_transaksi($data, 'posisi_meja');
    $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Data Berhasil Ditambahkan!
  </div>');
    redirect('admin/transaksi_view');
    
  }

  public function hapus_vtransaksi($id_transaksi){
    $this->UserModel->hapus_vtransaksi($id_transaksi);
    redirect('admin/transaksi_view');
  }

  

  

  public function cari_pesanan(){
    $keyword = $this->input->get('cari_pesanan', TRUE); //mengambil nilai dari form input cari
    $data['pesanan'] = $this->UserModel->cari_pesanan($keyword); //mencari data karyawan berdasarkan inputan
    $this->load->view('tampilan/header');
    //$this->load->view('templates/sidebar');
    $this->load->view('laporan_periode/laporan_pesanan', $data); //menampilkan data yang sudah dicari
    $this->load->view('tampilan/footer');
  }

  //Laporan periode
  public function cari_transaksi(){
    $keyword = $this->input->get('cari_transaksi', TRUE); //mengambil nilai dari form input cari
    $data['transaksi1'] = $this->UserModel->cari_transaksi1($keyword); //mencari data karyawan berdasarkan inputan
    $this->load->view('tampilan/header');
    //$this->load->view('templates/sidebar');
    $this->load->view('laporan_periode/laporan_transaksi', $data); //menampilkan data yang sudah dicari
    $this->load->view('tampilan/footer');
  }




    

    

    



}

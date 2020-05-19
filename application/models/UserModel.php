<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model{
  public function get($username){
    $this->db->where('username', $username); // Untuk menambahkan Where Clause : username='$username'
    $result = $this->db->get('login_jo1')->row(); // Untuk mengeksekusi dan mengambil data hasil query
    return $result;
  }

  public function getmeja($no_meja){
    $this->db->where('no_meja', $no_meja);
    $result = $this->db->get('posisi_meja')->row();
    return $result;
  }

  //UNTUK MENGAMBIL DATA DARI TABLE SESUAI ID_USER 
  public function getDatapengguna($id_user){
    return $this->db->get_where('user', ['id_user'=>$id_user])->row_array();
  }

  //PENGAMBILAN DATA UNTUK DI TAMPILKAN DI VIEW 
  public function tampil_datapengguna(){
    return $this->db->get('user');
  }

  //PROSES TAMBAH DATA PENGGUNA
  public function input_pengguna(){
    $username	= $this->input->post('username', true);
    $password	= $this->input->post('password', true);
    $nama_user	= $this->input->post('nama_user', true);
    $id_level	= $this->input->post('id_level', true);
        
    $this->db->select('RIGHT(user.id_user,4) as kode', FALSE);
    $this->db->order_by('id_user','DESC');    
    $this->db->limit(1);    
    $query = $this->db->get('user');      //cek dulu apakah ada sudah ada kode di tabel.    
    if($query->num_rows() <> 0){      
      //jika kode ternyata sudah ada.      
      $data = $query->row();      
      $kode = intval($data->kode) + 1;    
    }else {      
      //jika kode belum ada      
      $kode = 1;    
    }
  
    $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
    $kodejadi = "US-".$kodemax;    // hasilnya ,E-0001 dst.
      
    //query ke database
    $data 		= array(
                  'id_user'		=>$kodejadi,
                  'username'  =>$username,
                  'password'	=>$password,
                  'nama_user'	=>$nama_user,
                  'id_level'	=>$id_level
                  );
        $data = $this->security->xss_clean($data);
        return $this->db->insert('user', $data);
      }

  //PROSES HAPUS DATA PENGGUNA
  public function hapus_pengguna($id_user){
    $this->db->delete('user', ['id_user' => $id_user]);
  }

  //PROSES UBAH DATA PENGGUNA
  public function ubahDatapengguna(){
    $username = $this->input->post('username', true);
    $password = $this->input->post('password', true);
    $nama_user = $this->input->post('nama_user', true);
    $id_level = $this->input->post('id_level', true);
    $data = array( 
      'username' =>$username,
      'password' =>$password,
      'nama_user' =>$nama_user,
      'id_level' =>$id_level,
    );
    $this->db->where('id_user', $this->input->post('id_user'));
    $this->db->update('user', $data);
  }

  //UNTUK MELIHAT DATA PENGGUNA SECARA KESELURUHAN 
  public function detail_data($id_user = NULL){
    $query = $this->db->get_where('login_jo1', array('id_user' => $id_user))->row();
    return $query;
  }

  //MENGAMBIL DATA DARI DATABASE SESUAI ID nya (id_menu) 
  public function getDatamakanan($id_menu){
     return $this->db->get_where('daftar_menu', ['id_menu'=>$id_menu])->row_array();
  }

  //PENGAMBIL DATA YANG AKAN DITAMPILKAN DI VIEW
  public function tampil_datamakanan(){
    return $this->db->get('daftar_menu');
  }

  //PROSES TAMBAH DATA MENU
  public function input_makanan(){
    $nama_menu		= $this->input->post('nama_menu', true);
    $jenis_menu	= $this->input->post('jenis_menu', true);
    $harga_satuan	= $this->input->post('harga_satuan', true);
    $foto	= $this->input->post('foto', true);
    $foto = $_FILES['foto'];
		if ($foto=''){}else{
			$config['upload_path'] = './assets/foto';
			$config['allowed_types'] ='jpg|png|gif';

			$this->load->library('upload',$config);

			if(!$this->upload->do_upload('foto')){
				echo "Upload Gagal"; die();
			}else{
				$foto=$this->upload->data('file_name');
			}
		}
      $deskripsi	= $this->input->post('deskripsi', true);
      
      $this->db->select('RIGHT(daftar_menu.id_menu,4) as kode', FALSE);
		  $this->db->order_by('id_menu','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('daftar_menu');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }

		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "ME-".$kodemax;    // hasilnya ,ME-0001 dst.
		
      //query ke database

    	$data 		= array(
        'id_menu'		=>$kodejadi,
    		'nama_menu'		=>$nama_menu,
    		'jenis_menu'	=>$jenis_menu,
    		'harga_satuan'	=>$harga_satuan,
    		'foto'	=>$foto,
    		'deskripsi'	=>$deskripsi,
				'foto' => $foto
    						);
    	$data = $this->security->xss_clean($data);
    	return $this->db->insert('daftar_menu', $data);
    }

  //PROSES UNTUK MELIHAT DATA MENU SECARA KESELURUHAN 
  public function detail_datam($id_menu = NULL){
    $query = $this->db->get_where('daftar_menu', array('id_menu' => $id_menu))->row();
    return $query;
  }

  //PROSES HAPUS DATA MENU
  public function hapus_menumm($id_menu){
    $data['gbr'] = $this->db->get_where('daftar_menu', ['id_menu' => $id_menu])->row_array();
    unlink(FCPATH . 'assets/foto/'.$data['gbr']['foto']);
    return $this->db->delete('daftar_menu', ['id_menu' => $id_menu]);
  }

  //PROSES EDIT DATA MENU
  public function ubahDatamakanan(){
    $nama_menu		= $this->input->post('nama_menu', true);
    $jenis_menu	= $this->input->post('jenis_menu', true);
    $harga_satuan	= $this->input->post('harga_satuan', true);
    $foto	= $this->input->post('foto', true);
    $foto = $_FILES['foto'];
    //Membuat pengecekan
    //jika ada file yang di-upload saat mengedit data, maka upload filenya
    if ($foto=''){}else{
      $config['upload_path'] = './assets/foto';
      $config['allowed_types'] ='jpg|png|gif';
      
      $this->load->library('upload',$config);
      if(!$this->upload->do_upload('foto')){
        echo "Upload Gagal"; die();
        }else{
          $foto=$this->upload->data('file_name');
        }
      }
      $deskripsi	= $this->input->post('deskripsi', true);

    	$data 		= array(
    						'nama_menu'     =>$nama_menu,
    						'jenis_menu'    =>$jenis_menu,
                'harga_satuan'	=>$harga_satuan,
                'deskripsi'     =>$deskripsi,
                'foto'          => $foto
						
    						);

    $data = $this->security->xss_clean($data);
    $this->db->where('id_menu', $this->input->post('id_menu'));
    $this->db->update('daftar_menu', $data);
  }

  //PROSES PENCARIAN DATA PENGGUNA
  public function cari_pengguna($keyword){
	  $this->db->like('username', $keyword)->or_like('nama_user', $keyword); //mencari data yang serupa dengan keyword
	  return $this->db->get('login_jo1')->result();
  }
    
  //PROSES PENCARIAN DATA MAKANAN
  public function cari_makanan($keyword){
	  $this->db->like('id_menu', $keyword)->or_like('nama_menu', $keyword); //mencari data yang serupa dengan keyword
	  return $this->db->get('daftar_menu')->result();
  }
    
  //PROSES PENCARIAN DATA PESANAN
  public function cari_pesanan($keyword){
	  $this->db->like('id_pesanan', $keyword); //mencari data yang serupa dengan keyword
	  return $this->db->get('pesana_jo2')->result();
  }

  //PROSES PENCARIAN DATA PESANAN UNTUK TRANSAKSI
  public function cari_transaksi($keyword){
    $this->db->like('id_pesanan', $keyword); //mencari data yang serupa dengan keyword
    $query=$this->db->query("SELECT sum(jlm_pesan * harga_satuan) as total1 FROM pesanan");
    $ttl=$query->row();
    $tott = $ttl->total1;
    return $this->db->get('pesana_jo2')->result();
  }

  public function cari_transaksi1($keyword){
	  $this->db->like('id_transaksi', $keyword); //mencari data yang serupa dengan keyword
	  return $this->db->get('transaksi1')->result();
  }
    
  function get_harga($id_menu){
    $hasil=$this->db->query("SELECT * FROM daftar_menu WHERE id_menu='$id_menu'");
    return $hasil->result();
  }

  public function getDatapesanan($id_pesanan){
    return $this->db->get_where('pesanan', ['id_pesanan'=>$id_pesanan])->row_array();
  }

  public function tampil_datapesanan(){
    return $this->db->get('pesanan_jo1');
  }

  public function tampil_pesanan(){
    return $this->db->get('pesana_jo2');
  }

  public function input_pesanan(){
    $id_pesanan	= $this->input->post('id_pesanan', true);
    $jlm_pesan	= $this->input->post('jlm_pesan', true);
    $no_meja	= $this->input->post('no_meja', true);
    $harga_satuan	= $this->input->post('harga_satuan', true);
    $tgl_pesan	= $this->input->post('tgl_pesan', true);
    $jam_pesan	= $this->input->post('jam_pesan', true);
    $id_menu	= $this->input->post('id_menu', true);
    $total	= $this->input->post('total', true);
      
    // Cek di tabel pesanan apakah sudah ada data
	  $cek = $this->db->query("SELECT id_pesanan FROM pesanan");
	  $data = $cek->num_rows();
	  if($data==0){
		  //Jika belum ada ada
		  $kodejadi= "PE-001";
	  }else{
		  //Line 267
		  // Pemakaian limit 1 boleh ditiadakan karena tidak di looping, artinya pasti 
		  $cek = $this->db->query("SELECT id_pesanan FROM pesanan ORDER BY id_pesanan DESC");
		  $data = $cek->row();
		  $kode = $data->id_pesanan;
		  $d=substr($kode,4)+1;
		  $kodejadi= "PE-".str_pad($d, 3,"0", STR_PAD_LEFT);

	}
    
   //query ke database
   $data = array(
      'id_pesanan'		=>$kodejadi,
      'jlm_pesan'		  =>$jlm_pesan,
      'no_meja'     	=>$no_meja,
      'harga_satuan'	=>$harga_satuan,
      'tgl_pesan'	    =>$tgl_pesan,
      'jam_pesan'     => $jam_pesan,
      'id_menu'       => $id_menu,
      'total'         =>$total
    );
      $data = $this->security->xss_clean($data);
      $this->db->insert('pesanan_temp', $data);
      return $this->input->post('id_pesanan', true);
    }

    function pindahTemp(){
      $pindah['a']=$this->db->get('pesanan_temp')->result_array();
      foreach ($pindah['a'] as $s){
        $data=[
          'id_pesanan'   => $s['id_pesanan'],
          'id_menu'      => $s['id_menu'],
          'jlm_pesan'    => $s['jlm_pesan'],
          'no_meja'      => $s['no_meja'],
          'harga_satuan' => $s['harga_satuan'],
          'tgl_pesan'    => $s['tgl_pesan'],
          'jam_pesan'    => $s['jam_pesan'],
          'total'        => $s['total']
        ];
        $this->db->insert('pesanan', $data);
      }
      $this->db->empty_table('pesanan_temp');
    }

  public function pesanan(){
     return $this->db->get('pesanan_temp');
  }

  public function hapus_pesan($id){
     $this->db->delete('pesanan_temp', ['id' => $id]);
  }

  public function hapus_vpesan($id){
    $this->db->delete('pesanan', ['id' => $id]);
  }

  //PENGAMBIL DATA YANG AKAN DITAMPILKAN DI VIEW
  public function tampil_datatransaksi(){
    return $this->db->get('detail_transaksi');
  } 

  public function tampil_datatransaksi1(){
    return $this->db->get('transaksi1');
  }

  //PROSES TAMBAH DATA TRANSAKSI
  public function input_transaksi(){
    $id_pesanan		= $this->input->post('id_pesanan', true);
    $data1 		= array('status'=>'Sudah Bayar');
    $this->db->where('id_pesanan', $id_pesanan);
    $this->db->update('pesanan', $data1);
    $id_user	= $this->input->post('id_user', true);
    $tgl_jual	= $this->input->post('tgl_jual', true);
    $subtotal	= $this->input->post('subtotal', true);
    $bayar	= $this->input->post('bayar', true);
    $kembalian	= $this->input->post('kembalian', true);
        
    $this->db->select('RIGHT(transaksi1.id_transaksi,4) as kode', FALSE);
    $this->db->order_by('id_transaksi','DESC');    
    $this->db->limit(1);    
    $query = $this->db->get('transaksi1');      //cek dulu apakah ada sudah ada kode di tabel.    
    if($query->num_rows() <> 0){      
      //jika kode ternyata sudah ada.      
      $data = $query->row();      
      $kode = intval($data->kode) + 1;    
    }else {      
      //jika kode belum ada      
      $kode = 1;    
    }
  
    $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
    $kodejadi = "TR-".$kodemax;    // hasilnya ,ME-0001 dst.
    
    //query ke database
    $data = array(
      'id_transaksi'		=>$kodejadi,
      'id_pesanan'		  =>$id_pesanan,
      'id_user'	        =>$id_user,
      'tgl_jual'	      =>$tgl_jual,
      'subtotal'	      =>$subtotal,
      'bayar'           => $bayar,
      'kembalian'       => $kembalian
    );
    $data = $this->security->xss_clean($data);
    return $this->db->insert('transaksi1', $data);
  }

  public function hapus_vtransaksi($id_transaksi){
    $this->db->delete('transaksi1', ['id_transaksi' => $id_transaksi]);
  }

  public function getDatameja($no_meja){
    return $this->db->get_where('posisi_meja', ['no_meja'=>$no_meja])->row_array();
  }

  public function tampil_datameja(){
    return $this->db->get('posisi_meja');
  }

  public function input_meja(){
    $no_meja = $this->input->post('no_meja',true);
    $deskripsi_meja = $this->input->post('deskripsi_meja',true);

    $this->db->select('RIGHT(posisi_meja.no_meja,4) as kode', FALSE);
    $this->db->order_by('no_meja','DESC');    
    $this->db->limit(1);    
    $query = $this->db->get('posisi_meja');      //cek dulu apakah ada sudah ada kode di tabel.    
    if($query->num_rows() <> 0){      
       //jika kode ternyata sudah ada.      
       $data = $query->row();      
      $kode = intval($data->kode) + 1;    
    }else {      
      //jika kode belum ada      
      $kode = 1;    
    }
    $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
    $kodejadi = "M-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
        
    $data = array(
      'no_meja'        =>$kodejadi, 
      'deskripsi_meja' =>$deskripsi_meja
    );
    $data = $this->security->xss_clean($data);
    return $this->db->insert('posisi_meja', $data);
  }

  public function hapus_meja($no_meja) {
    $this->db->delete('posisi_meja', ['no_meja' => $no_meja]);
  }

  //PROSES EDIT DATA MENU
  public function ubahDatameja(){
    $no_meja		= $this->input->post('no_meja', true);
    $deskripsi_meja	= $this->input->post('deskripsi_meja', true);
    $data 		= array(
    	'no_meja'		      =>$no_meja,
    	'deskripsi_meja'	=>$deskripsi_meja
						
    );

    $data = $this->security->xss_clean($data);
    $this->db->where('no_meja', $this->input->post('no_meja'));
    $this->db->update('posisi_meja', $data);
  }

  //PROSES PENCARIAN DATA MEJA
  public function cari_meja($keyword){
    $this->db->like('no_meja', $keyword); //mencari data yang serupa dengan keyword
    return $this->db->get('posisi_meja')->result();
  }


    


    


      
}
?>
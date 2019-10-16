<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Json extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();		
		$this->load->model('json_model');
	}

	function register()
	{
		$a = array();
		$b = array();
		if($this->input->post('email')){
			$in['nama']		=$this->input->post('nama');
			$in['telepon']	=$this->input->post('telepon');
			$in['email']	=$this->input->post('email');
			$in['password']	=$this->input->post('password');
			$in['status']	='1';
			$in['foto']		='avatar.png';
			if($this->json_model->cek_email($in['email'])){
				$this->json_model->simpan("user",$in);	
				$a['status']='sukses';
			}else{
				$a['status']='exist';
			}
			array_push($b,$a);
			echo json_encode($b);
		}
	}
	
	function login()
	{
		$a = array();
		$b = array();
		if($this->input->post('email')){
			$email	=$this->input->post('email');
			$pass	=$this->input->post('password');
			$hasil 	=$this->json_model->login($email,$pass);
			if ($hasil->num_rows()>0){
				foreach($hasil->result_array() as $row){
					$a['userid']  	=$row['id'];
					$a['nama']		=$row['nama'];
					$a['telepon']	=$row['telepon'];
					$a['email']		=$row['email'];
					$a['foto']		=asset_url('images/user/'.$row['foto'].'');
					$a['level']		='user';
					if($row['status']==1){
						$a['status']='sukses';
					}else{
						$a['status']='suspend';
					}
					array_push($b,$a);
				}		
			}else{
				$a['status']='gagal';
				array_push($b,$a);
			}
			echo json_encode($b);
		}
	}
	
	function myakun()
	{
		$a = array();
		$b = array();
		$userid=$this->input->post('userid');
		$mprofile=$this->json_model->my_akun($userid);
		if($mprofile->num_rows()>0){
			foreach($mprofile->result_array() as $row){
				$a['nama']		=$row['nama'];
				$a['telepon']	=$row['telepon'];
				$a['email']		=$row['email'];
				$a['foto']		=asset_url('images/pengguna/'.$row['foto'].'');
				array_push($b,$a);	
			}			
		}
		echo json_encode($b);
	}
	

	function myakun_update()
	{
		$a = array();
		$b = array();
		if($this->input->post('userid')){
			$date_now	=date('YmdHis');
			$email		=$this->input->post('email');
			$newpass	=$this->input->post('password');
			$foto		=$this->input->post('foto');
			if($foto!=''){
				$filename=md5($email).'-'.$date_now.'.JPG';
				$path='./asset/images/pengguna/'.$filename.'';
				file_put_contents($path,base64_decode($foto));
				$in['foto']=$filename;
			}
			
			if($newpass!=''){
				$in['password']=$newpass;
			}
			
			$in['id']			=$this->input->post('userid');
			$in['nama']			=$this->input->post('nama');
			$in['telepon']		=$this->input->post('telepon');
			$in['email']		=$this->input->post('email');
			$this->json_model->update("pengguna",$in,"id");
			$a["status"] = 'sukses';
			array_push($b,$a);
			echo json_encode($b);
		}
	}
	
	
	function notifikasi_alert()
	{
		$a = array();
		$b = array();
		$userid	=$this->input->post('userid');
		$mdata 	=$this->json_model->notifikasi_alert($userid);
		if($mdata->num_rows()>0){
			$no=1;
			foreach($mdata->result_array() as $row){
				$a['nomor']		= $no;
				$a['id']		= $row['id'];
				$a['subjek']	= $row['subjek'];
				$a['pesan']		= $row['pesan'];
				$a['tanggal']	= tgl_indo($row['tgl']);
				$a['waktu']		= $row['jam'];
				$a['status']	= $row['status'];
				array_push($b,$a);
				$no++;
			}
		}
		echo json_encode($b);
	}
	
	function notifikasi_list()
	{
		$a = array();
		$b = array();
		$userid	=$this->input->post('userid');
		$mdata	=$this->json_model->notifikasi_list($userid);
		if($mdata->num_rows()>0){
			$no=1;
			foreach($mdata->result_array() as $row){
				$a['nomor']		= $no;
				$a['id']		= $row['id'];
				$a['subjek']	= $row['subjek'];
				$a['pesan']		= $row['pesan'];
				$a['tanggal']	= tgl_indo($row['tgl']);
				$a['waktu']		= $row['jam'];
				$a['status']	= $row['status'];
				array_push($b,$a);
				$no++;
			}
		}
		echo json_encode($b);
	}
	
	function notifikasi_read()
	{
		$a = array();
		$b = array();
		if($this->input->post('id')){
			$id=$this->input->post('id');
			$this->json_model->notifikasi_read($id);
			$a['status']= 'sukses';
			array_push($b,$a);
		}
		echo json_encode($b);
	}
	


	function jenis_list()
	{
		$a = array();
		$b = array();
		$mdata=$this->json_model->master("jenis");
		if($mdata->num_rows()>0){
			foreach($mdata->result_array() as $row){
				$a['id']	=$row['id'];
				$a['jenis']	=$row['jenis'];
				array_push($b,$a);	
			}			
		}
		echo json_encode($b);
	}
	
	function info_list()
	{
		$a = array();
		$b = array();
		$no= 1;
		$mdata=$this->json_model->info_list();
		if($mdata->num_rows()>0){
			foreach($mdata->result_array() as $row){
				$detail='';
				if(strlen($row['detail'])>450){
					$detail=substr($row['detail'], 0, 450).'...';
				}else{
					$detail=$row['detail'];
				}
				$a['nomor']			=$no++;
				$a['id']			=$row['id'];
				$a['judul']			=$row['judul'];
				$a['detail']		=$detail;
				$a['detail_full']	=$row['detail'];
				array_push($b,$a);	
			}			
		}
		echo json_encode($b);
	}
	function artikel_list()
	{
		$a = array();
		$b = array();
		$no= 1;
		$mdata=$this->json_model->artikel_list();
		if($mdata->num_rows()>0){
			foreach($mdata->result_array() as $row){
				$detail='';
				if(strlen($row['detail'])>450){
					$detail=substr($row['detail'], 0, 450).'...';
				}else{
					$detail=$row['detail'];
				}
				$a['nomor']			=$no++;
				$a['id']			=$row['id'];
				$a['judul']			=$row['judul'];
				$a['detail']		=$detail;
				$a['detail_full']	=$row['detail'];
				array_push($b,$a);	
			}			
		}
		echo json_encode($b);
	}
	
	function pets_list()
	{
		$a = array();
		$b = array();
		$userid=$this->input->post('userid');
		$mdata=$this->json_model->pets_list($userid);
		if($mdata->num_rows()>0){
			foreach($mdata->result_array() as $row){
				$a['id']		=$row['id'];
				$a['nama']		=$row['nama'];
				$a['ras']		=$row['ras'];
				$a['jenis']		=$row['jenis'];
				$a['jk']		=$row['jenis_kelamin'];
				$a['tgl_lahir']	=$row['tgl_lahir'];
				$a['umur']		=$row['umur'];
				$a['keterangan']=$row['keterangan'];
				$a['foto']		=asset_url('images/pets/'.$row['foto'].'');
				array_push($b,$a);	
			}			
		}
		echo json_encode($b);
	}
	
	function pets_vaksin()
	{
		$a = array();
		$b = array();
		$id=$this->input->post('id');
		$mdata=$this->json_model->pets_vaksin($id=1);
		if($mdata->num_rows()>0){
			foreach($mdata->result_array() as $row){
				$a['id']			=$row['id'];
				$a['nama_vaksin']	=$row['nama_vaksin'];
				$a['tanggal']		=$row['tanggal'];
				$a['keterangan']	=$row['keterangan'];
				array_push($b,$a);	
			}			
		}
		echo json_encode($b);
	}
	
	
	function pets_save()
	{
		$a = array();
		$b = array();
		$file_foto	='default.jpg';
		$date_now	=date('YmdHis');
		$foto		=$this->input->post('foto');
		if($foto!=''){
			$filename=md5($kost).'-'.$date_now.'.JPG';
			$path='./asset/images/pets/'.$filename.'';
			file_put_contents($path,base64_decode($foto));
			$file_foto=$filename;
		}
		
		$in['id_user']			=$this->input->post('userid');
		$in['nama']				=strtoupper($this->input->post('nama'));
		$in['ras']				=strtoupper($this->input->post('ras'));
		$in['jenis']			=$this->input->post('jenis');
		$in['jenis_kelamin']	=$this->input->post('jk');
		$in['tgl_lahir']		=$this->input->post('tgl_lahir');
		$in['keterangan']		=$this->input->post('keterangan');	
		$in['foto']				=$file_foto;	
		if($this->json_model->simpan("peliharaan",$in)){
			$a["status"] = 'sukses';
		}else{
			$a["status"] = 'gagal';
		}
		array_push($b,$a);
		echo json_encode($b);	
	}
	
	function pets_update()
	{
		$a = array();
		$b = array();
		if($this->input->post('id')){
			$date_now	=date('YmdHis');
			$id		=$this->input->post('id');
			$foto	=$this->input->post('foto');
			if($foto!=''){
				$filename=md5($id).'-'.$date_now.'.JPG';
				$path='./asset/images/pets/'.$filename.'';
				file_put_contents($path,base64_decode($foto));
				$file_foto	=$filename;
				$in['foto']	=$file_foto;
			}
			$in['id']				=$this->input->post('id');
			$in['id_user']			=$this->input->post('userid');
			$in['nama']				=strtoupper($this->input->post('nama'));
			$in['ras']				=strtoupper($this->input->post('ras'));
			$in['jenis']			=$this->input->post('jenis');
			$in['jenis_kelamin']	=$this->input->post('jk');
			$in['tgl_lahir']		=$this->input->post('tgl_lahir');
			$in['keterangan']		=$this->input->post('keterangan');	
			$this->json_model->update("peliharaan",$in,"id");
			$a["status"] = 'sukses';
			array_push($b,$a);
			echo json_encode($in);
		}
	}
	
	function pets_hapus()
	{
		$a = array();
		$b = array();
		if($this->input->post('id')){
			$id=$this->input->post('id');
			$this->json_model->hapus($id,"id","peliharaan");
			$this->json_model->hapus($id,"id_peliharaan","riwayat_vaksin");
			$a["status"] = 'sukses';
			array_push($b,$a);
			echo json_encode($b);
		}
	}
	
	
	function vaksin_list()
	{
		$a = array();
		$b = array();
		$a['id_vaksin']	 ='NONE';
		$a['nama_vaksin']='PILIH VAKSIN';
		array_push($b,$a);	
		$id		=$this->input->post('id');
		$jenis	=$this->input->post('jenis');
		$mdata=$this->json_model->vaksin_list($id,$jenis);
		if($mdata->num_rows()>0){
			foreach($mdata->result_array() as $row){
				$a['id_vaksin']	 =$row['id'];
				$a['nama_vaksin']=$row['nama_vaksin'];
				array_push($b,$a);	
			}			
		}
		echo json_encode($b);
	}
	
	function vaksin_save()
	{
		$a = array();
		$b = array();
		$in['id_peliharaan']	=$this->input->post('peliharaan');
		$in['id_vaksin']		=$this->input->post('vaksin');
		$in['tanggal']			=$this->input->post('tanggal');
		$in['keterangan']		=$this->input->post('keterangan');	
		if($this->json_model->simpan("riwayat_vaksin",$in)){
			$a["status"] = 'sukses';
		}else{
			$a["status"] = 'gagal';
		}
		array_push($b,$a);
		echo json_encode($b);	
	}
	
		
}

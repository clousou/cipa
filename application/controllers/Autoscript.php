<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Autoscript extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('app_model'));
	}
	
	function index()
	{
		$param=array();
		$mpeliharaan= $this->app_model->peliharaan_list();
		if($mpeliharaan->num_rows()>0){
			foreach($mpeliharaan->result() as $rows){
				$id_peliharaan		=$rows->id;
				$id_user			=$rows->id_user;
				$nama_pemilik		=$rows->pemilik;
				$nama_peliharaan	=$rows->nama;
				$jenis_peliharaan	=$rows->jenis;
				$jenis_kelamin		=$rows->jenis_kelamin;
				$umur_peliharaan	=$rows->umur;
				
				$mvaksin= $this->app_model->vaksin_cek($id_peliharaan,$jenis_peliharaan,$umur_peliharaan);
				if($mvaksin->num_rows()>0){
					foreach($mvaksin->result() as $vak){
						$nama_vaksin=$vak->nama_vaksin;
						$subjek		='Peringatan';
						$pesan		='Dear, '.$nama_pemilik.' peliharaan anda yang bernama '.$nama_peliharaan.' saat ini telah berumur '.$umur_peliharaan.' Hari, harap melakukan vaksin '.$nama_vaksin.' secepatnya';
						$this->send_notifikasi($id_user,$subjek,$pesan);
					}
				}
				
			}
		}
	}
	
	function send_notifikasi($penerima=null,$subjek=null,$pesan=null){
		$in['tanggal']	=date('Y-m-d H:i:s');
		$in['penerima']	=$penerima;
		$in['subjek']	=$subjek;
		$in['pesan']	=$pesan;
		$in['status']	='NEW';
		$this->app_model->simpan("notifikasi",$in);			
	}

}

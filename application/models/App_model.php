<?php
Class App_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function manualQuery($q)
	{
		return $this->db->query($q);
	}

	function master($master)
	{
		$q=$this->db->query("select * from $master");
		return $q;
	}
	
	function simpan($tabel,$data)
	{
		$s=$this->db->insert($tabel,$data);
		return $s;
	}

	function edit($tabel,$seleksi)
	{
		$query=$this->db->query("select * from $tabel where $seleksi");
		return $query;
	}

	function update($tabel,$isi,$seleksi)
	{
		$this->db->where($seleksi,$isi[$seleksi]);
		$this->db->update($tabel,$isi);
	}

	function hapus($id,$seleksi,$tabel)
	{
		$this->db->where($seleksi,$id);
		$this->db->delete($tabel);
	}

	function total($tabel)
	{
		$q=$this->db->query("select * from $tabel");
		return $q;
	}

	function view_data($tabel,$id)
	{
		$q=$this->db->query("select * from ".$tabel." order by ".$id." ASC");
		return $q;
	}

	function CekID($tbl,$field,$id)
	{
		$CResult=$this->db->query("SELECT $field FROM $tbl WHERE $field='$id'");
		if(count($CResult->result_array())>0){	
			return false;
		}else{
			return true;
		}
	}

	function getCount($tbl,$field)
	{ 	
		$query = $this->db->query("select count($field) as jumlah from $tbl");	
		foreach($query->result() as $k)
		{
			$jumlah =$k->jumlah;
		}
		
		return $jumlah;
	}
		

	function login($email,$password)
	{
		$query=$this->db->query("SELECT a.* FROM admin a WHERE a.email='$email' AND a.password='$password'");
		return $query;
	}

	function email_cek($email){
		$cek_result=$this->db->query("select * from admin WHERE email='$email'");
		if($cek_result->num_rows()>0){	
			return false;
		}
		else{
			return true;
		}
	}

	function user_list(){
		$q=$this->db->query("SELECT u.*	FROM user u ORDER BY  u.nama ASC");
		return $q;
	}
	
	function user_detail($id=null){
		$q=$this->db->query("SELECT u.* FROM user u WHERE u.id='".$id."' LIMIT 1");
		return $q;
	}
	
	
	function peliharaan_list(){
		$q=$this->db->query("SELECT p.*,DATEDIFF(current_date(), p.tgl_lahir) as umur, u.nama as pemilik
							FROM peliharaan p
							LEFT JOIN user u ON u.id=p.id_user
							ORDER BY u.nama,p.nama
							ASC");
		return $q;
	}
	
	function peliharaan_detail($id=null){
		$q=$this->db->query("SELECT p.*,DATEDIFF(current_date(), p.tgl_lahir) as umur,u.nama as pemilik
							FROM peliharaan p
							LEFT JOIN user u ON u.id=p.id_user	
							WHERE p.id='".$id."'
							LIMIT 1");
		return $q;
	}

	function peliharaan_vaksin($id=null){
		$q=$this->db->query("SELECT h.*,v.nama_vaksin
							FROM riwayat_vaksin h
							LEFT JOIN vaksin v ON v.id=h.id_vaksin
							WHERE h.id_peliharaan='".$id."'
							ORDER BY h.id ASC");
		return $q;
	}
	
	
	function vaksin_list(){
		$q=$this->db->query("SELECT j.* FROM vaksin j ORDER BY j.jenis,j.vaksin_ke ASC");
		return $q;
	}

	function notifikasi_list(){
		$q=$this->db->query("SELECT n.id,date(n.tanggal) as tgl,TIME(n.tanggal) as waktu, n.subjek,n.pesan,n.status, u.nama
								FROM notifikasi n
								LEFT JOIN user u ON u.id=n.penerima
								ORDER BY n.id DESC");
		return $q;
	}
	function artikel_list(){
		$q=$this->db->query("SELECT a.* FROM artikel a ORDER BY a.id DESC");
		return $q;
	}
	function info_list(){
		$q=$this->db->query("SELECT i.* FROM info i ORDER BY i.id DESC");
		return $q;
	}
	
	function vaksin_cek($id=null,$jenis=null,$umur=null){
		$q=$this->db->query("SELECT v.* FROM vaksin v
							WHERE v.id NOT IN(
								SELECT h.id from riwayat_vaksin h
								WHERE h.id_peliharaan='".$id."' 
							)
							AND v.jenis='".$jenis."'
							AND v.usia_min<='".$umur."' AND v.usia_max >= '".$umur."'
							ORDER BY v.jenis,v.vaksin_ke ASC");
		return $q;
	}
}
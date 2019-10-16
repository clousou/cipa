<?php
Class Json_model extends CI_Model
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

	
	function cek_email($email)
	{
		$query=$this->db->query("SELECT * FROM user WHERE email='".$email."'");
		if($query->num_rows()>0){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	
	function login($email=null,$password=null)
	{
		$q=$this->db->query("select * from user	WHERE email='".$email."' AND password='".$password."'");
		return $q;
	}

	function my_akun($userid=null)
	{
		$q=$this->db->query("select * from user	WHERE id='".$userid."'");
		return $q;
	}

	
	function notifikasi_alert($userid=null){
		$q=$this->db->query("SELECT n.*,DATE(n.tanggal) as tgl,TIME(n.tanggal) as jam
							FROM notifikasi n
							WHERE n.penerima='".$userid."'
							AND n.status='NEW'
							ORDER BY n.id DESC
							LIMIT 1 ");
		return $q;
	}
	
	function notifikasi_list($userid=null){
		$q=$this->db->query("SELECT n.*,DATE(n.tanggal) as tgl,TIME(n.tanggal) as jam
							FROM notifikasi n
							WHERE n.penerima='".$userid."'	
							ORDER BY  n.id DESC");
		return $q;
	}
	
	function notifikasi_read($id=null){
		$q=$this->db->query("UPDATE notifikasi set status='READ' WHERE id='".$id."'");
		return $q;
	}
	
	
	function artikel_list(){
		$q=$this->db->query("SELECT a.* FROM artikel a WHERE a.status='PUBLISH' ORDER BY a.id DESC");
		return $q;
	}
	function info_list(){
		$q=$this->db->query("SELECT i.* FROM info i WHERE i.status='PUBLISH'  ORDER BY i.id DESC");
		return $q;
	}
	
	function pets_list($userid=null){
		$q=$this->db->query("SELECT p.*,DATEDIFF(current_date(), p.tgl_lahir) as umur, u.nama as pemilik
							FROM peliharaan p
							LEFT JOIN user u ON u.id=p.id_user
							WHERE u.id='".$userid."'
							ORDER BY u.nama,p.nama
							ASC");
		return $q;
	}
	
	function pets_vaksin($id=null){
		$q=$this->db->query("SELECT h.*,v.nama_vaksin
							FROM riwayat_vaksin h
							LEFT JOIN vaksin v ON v.id=h.id_vaksin
							WHERE h.id_peliharaan='".$id."'
							ORDER BY h.id ASC");
		return $q;
	}
	function vaksin_list($id=null,$jenis=null){
		$q=$this->db->query("SELECT v.* FROM vaksin v
							WHERE v.id NOT IN(
								SELECT h.id from riwayat_vaksin h
								WHERE h.id_peliharaan='".$id."' 
							)
							AND v.jenis='".$jenis."'
							ORDER BY v.jenis,v.vaksin_ke ASC");
		return $q;
	}
	
	
	
}
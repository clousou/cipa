<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Auth extends CI_Controller { 
	function __construct()
	{
		parent::__construct();		
		$this->load->model(array('app_model'));
	}
	function index()
	{
		$email 		= $this->db->escape_str($this->input->post('email'));
		$password  	= $this->db->escape_str($this->input->post('password'));
		$hasil 		= $this->app_model->login($email,$password);
		if ($hasil->num_rows()>0){
			foreach($hasil->result() as $items){
				if($items->status==1){
					$this->session->set_userdata('id',$items->id);
					$this->session->set_userdata('nama',$items->nama);
					$this->session->set_userdata('email',$items->email);
					$this->session->set_userdata('foto',$items->foto);
					redirect('home');
				}if($items->status==2){
					$this->session->set_flashdata('error_login', 'AKUN DISUSPEND OLEH');
					redirect('home');
				}else{
					$this->session->set_flashdata('error_login', 'AKUN BELUM AKTIF !');
					redirect('home');
				}
			}
			redirect('home');
		}else{
			$this->session->set_flashdata('error_login', 'GAGAL LOGIN !');
			redirect('home');
		}
		
			
	}
	//fungsi logout
	function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('error_login', 'You Are Logout!');
		redirect('admin');
	}
}
?>
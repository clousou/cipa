<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();		
		$this->load->model(array('app_model'));
		$this->id		=$this->session->userdata('id');
		$this->nama		=$this->session->userdata('nama');
		$this->email	=$this->session->userdata('email');
		$this->foto		=$this->session->userdata('foto');
		if($this->id==''){redirect();}
	}

	function index()
	{
		$data = array();
		$data["title"] 		= "PETS JOURNEY";
		$data["subtitle"] 	= "DATA USER";
		$data['pages'] 		= 'user_view';
		$data['mdata'] 		= $this->app_model->user_list();
		$this->load->view('index',$data);
	}

	function detail($id=null)
	{
		$id = base64_decode($id);	
		$data = array();
		$data["title"] 		= "PETS JOURNEY";
		$data["subtitle"] 	= "DETAIL USER";
		$data['pages'] 		= 'user_detail';
		$data['mdata'] 		= $this->app_model->user_detail($id);	
		$this->load->view('index',$data);
	}	

	function delete($id=null)
	{
		$id = base64_decode($id);
		$this->app_model->hapus($id,"id","user");
		$this->session->set_flashdata('info','<p><div class="alert alert-warning">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<strong>Data berhasil dihapus !</strong>
									</div>');
		redirect('user');
	}
	

	function aktivasi($id=null)
	{
		$id = base64_decode($id);
		$this->app_model->manualQuery("update user set status='1' WHERE id='".$id."'");
		$this->session->set_flashdata('info','<p><div class="alert alert-warning">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<strong>Data berhasil diaktivasi !</strong>
									</div>');
		redirect('user');
	}
	

	function suspend($id=null)
	{
		$id = base64_decode($id);
		$this->app_model->manualQuery("update user set status='0' WHERE id='".$id."'");
		$this->session->set_flashdata('info','<p><div class="alert alert-warning">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<strong>Data berhasil disuspend !</strong>
									</div>');
		redirect('user');
	}
	
}

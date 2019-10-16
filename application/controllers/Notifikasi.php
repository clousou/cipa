<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Notifikasi extends CI_Controller 
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
		$data["subtitle"] 	= "NOTIFIKASI";
		$data['pages'] 		= 'notifikasi';
		$data['mdata'] 		= $this->app_model->notifikasi_list();
		$this->load->view('index',$data);
	}

	function delete($id=null)
	{
		$id = base64_decode($id);
		$this->app_model->hapus($id,"id","notifikasi");
		$this->session->set_flashdata('info','<p><div class="alert alert-warning">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<strong>Data berhasil dihapus !</strong>
									</div>');
		redirect('notifikasi');
	}

}

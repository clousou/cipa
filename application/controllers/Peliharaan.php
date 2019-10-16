<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Peliharaan extends CI_Controller 
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
		$data["subtitle"] 	= "DATA PELIHARAAN";
		$data['pages'] 		= 'peliharaan_view';
		$data['mdata'] 		= $this->app_model->peliharaan_list();
		$this->load->view('index',$data);
	}

	function detail($id=null)
	{
		$id = base64_decode($id);	
		$data = array();
		$data["title"] 		= "PETS JOURNEY";
		$data["subtitle"] 	= "DETAIL PELIHARAAN";
		$data['pages'] 		= 'peliharaan_detail';
		$data['mdata'] 		= $this->app_model->peliharaan_detail($id);	
		$data['mvaksin'] 	= $this->app_model->peliharaan_vaksin($id);	
		$this->load->view('index',$data);
	}	

	function delete($id=null)
	{
		$id = base64_decode($id);
		$this->app_model->hapus($id,"id","peliharaan");
		$this->app_model->hapus($id,"id_peliharaan","peliharaan_vaksin");
		$this->session->set_flashdata('info','<p><div class="alert alert-warning">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<strong>Data berhasil dihapus !</strong>
									</div>');
		redirect('peliharaan');
	}

}

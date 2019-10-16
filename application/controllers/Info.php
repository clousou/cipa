<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Info extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();		
		$this->load->model(array('app_model'));
		$this->id		=$this->session->userdata('id');
		$this->nama		=$this->session->userdata('nama');
		$this->email	=$this->session->userdata('email');
		$this->level	=$this->session->userdata('level');
		$this->foto		=$this->session->userdata('foto');
		if($this->id==''){redirect();}
	}

	function index()
	{
		$data = array();
		$data["title"] 		= "PETS JOURNEY";
		$data["subtitle"] 	= "DATA INFO";
		$data['pages'] 		= 'info_view';
		$data['mdata'] 		= $this->app_model->info_list();
		$this->load->view('index',$data);
	}

	function add()
	{
		$data = array();
		$data["title"] 		= "PETS JOURNEY";
		$data["subtitle"] 	= "TAMBAH INFO";
		$data['pages'] 		= 'info_add';
		$this->load->view('index',$data);
	}

	function save() 
	{
		$in["judul"]		=$this->input->post('judul');
		$in["detail"]		=$this->input->post('detail');
		$in["status"]		='DRAFT';
		$this->app_model->simpan("info",$in);
		$this->session->set_flashdata('info','<p><div class="alert alert-warning">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<strong>data berhasil disimpan !</strong>
									</div>');
		redirect('info');
	}

	function edit($id=null)
	{
		$id = base64_decode($id);	
		$data = array();
		$data["title"] 		= "PETS JOURNEY";
		$data["subtitle"] 	= "EDIT INFO";
		$data['pages'] 		= 'info_edit';
		$data['mdata'] 		= $this->app_model->edit("info","id='".$id."'");	
		$this->load->view('index',$data);
	}	

	function update() 
	{
		$in["id"]			=$this->input->post('id');
		$in["judul"]		=$this->input->post('judul');
		$in["detail"]		=$this->input->post('detail');
		$this->app_model->update("info",$in,"id");
		$this->session->set_flashdata('info','<p><div class="alert alert-warning">
											<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
											<strong>Data berhasil diupdate !</strong>
										</div>');
		redirect('info');
	}

	function delete($id=null)
	{
		$id = base64_decode($id);
		$this->app_model->hapus($id,"id","info");
		$this->session->set_flashdata('info','<p><div class="alert alert-warning">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<strong>Data berhasil dihapus !</strong>
									</div>');
		redirect('info');
	}
	

	function publish($id=null)
	{
		$id = base64_decode($id);
		$this->app_model->manualQuery("update info set status='PUBLISH' WHERE id='".$id."'");
		$this->session->set_flashdata('info','<p><div class="alert alert-warning">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<strong>Data berhasil diaktivasi !</strong>
									</div>');
		redirect('info');
	}
	

	function unpublish($id=null)
	{
		$id = base64_decode($id);
		$this->app_model->manualQuery("update info set status='UNPUBLISH' WHERE id='".$id."'");
		$this->session->set_flashdata('info','<p><div class="alert alert-warning">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<strong>Data berhasil disuspend !</strong>
									</div>');
		redirect('info');
	}
	
	
	
}

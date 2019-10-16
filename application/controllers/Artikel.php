<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Artikel extends CI_Controller 
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
		$data["subtitle"] 	= "DATA ARTIKEL";
		$data['pages'] 		= 'artikel_view';
		$data['mdata'] 		= $this->app_model->artikel_list();
		$this->load->view('index',$data);
	}

	function add()
	{
		$data = array();
		$data["title"] 		= "PETS JOURNEY";
		$data["subtitle"] 	= "TAMBAH ARTIKEL";
		$data['pages'] 		= 'artikel_add';
		$this->load->view('index',$data);
	}

	function save() 
	{
		$in["judul"]		=$this->input->post('judul');
		$in["detail"]		=$this->input->post('detail');
		$in["status"]		='DRAFT';
		$this->app_model->simpan("artikel",$in);
		$this->session->set_flashdata('info','<p><div class="alert alert-warning">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<strong>data berhasil disimpan !</strong>
									</div>');
		redirect('artikel');
	}

	function edit($id=null)
	{
		$id = base64_decode($id);	
		$data = array();
		$data["title"] 		= "PETS JOURNEY";
		$data["subtitle"] 	= "EDIT ARTIKEL";
		$data['pages'] 		= 'artikel_edit';
		$data['mdata'] 		= $this->app_model->edit("artikel","id='".$id."'");	
		$this->load->view('index',$data);
	}	

	function update() 
	{
		$in["id"]			=$this->input->post('id');
		$in["judul"]		=$this->input->post('judul');
		$in["detail"]		=$this->input->post('detail');
		$this->app_model->update("artikel",$in,"id");
		$this->session->set_flashdata('info','<p><div class="alert alert-warning">
											<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
											<strong>Data berhasil diupdate !</strong>
										</div>');
		redirect('artikel');
	}

	function delete($id=null)
	{
		$id = base64_decode($id);
		$this->app_model->hapus($id,"id","artikel");
		$this->session->set_flashdata('info','<p><div class="alert alert-warning">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<strong>Data berhasil dihapus !</strong>
									</div>');
		redirect('artikel');
	}
	

	function publish($id=null)
	{
		$id = base64_decode($id);
		$this->app_model->manualQuery("update artikel set status='PUBLISH' WHERE id='".$id."'");
		$this->session->set_flashdata('info','<p><div class="alert alert-warning">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<strong>Data berhasil diaktivasi !</strong>
									</div>');
		redirect('artikel');
	}
	

	function unpublish($id=null)
	{
		$id = base64_decode($id);
		$this->app_model->manualQuery("update artikel set status='UNPUBLISH' WHERE id='".$id."'");
		$this->session->set_flashdata('info','<p><div class="alert alert-warning">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<strong>Data berhasil disuspend !</strong>
									</div>');
		redirect('artikel');
	}
	
	
	
}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Vaksin extends CI_Controller 
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
		$data["subtitle"] 	= "DATA VAKSIN";
		$data['pages'] 		= 'vaksin_view';
		$data['mdata'] 		= $this->app_model->vaksin_list();
		$this->load->view('index',$data);
	}
	
	function add()
	{
		$data = array();
		$data["title"] 		= "PETS JOURNEY";
		$data["subtitle"] 	= "TAMBAH VAKSIN";
		$data['mjenis'] 	= $this->app_model->master("jenis");
		$data['pages'] 		= 'vaksin_add';
		$this->load->view('index',$data);
	}

	function save() 
	{
		$in["jenis"]			=$this->input->post('jenis');
		$in["nama_vaksin"]		=$this->input->post('nama_vaksin');
		$in["vaksin_ke"]		=$this->input->post('vaksin_ke');
		$in["usia_min"]			=$this->input->post('usia_min');
		$in["usia_max"]			=$this->input->post('usia_max');
		$in["keterangan"]		=$this->input->post('keterangan');
		$this->app_model->simpan("vaksin",$in);
		$this->session->set_flashdata('info','<p><div class="alert alert-warning">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<strong>data berhasil disimpan !</strong>
									</div>');
		redirect('vaksin');
		
	}

	function edit($id=null)
	{
		$id = base64_decode($id);	
		$data = array();
		$data["title"] 		= "PETS JOURNEY";
		$data["subtitle"] 	= "EDIT VAKSIN";
		$data['pages'] 		= 'vaksin_edit';
		$data['mjenis'] 	= $this->app_model->master("jenis");
		$data['mdata'] 		= $this->app_model->edit("vaksin","id='".$id."'");
		$this->load->view('index',$data);
	}	

	function update() 
	{
		$in["id"]				=$this->input->post('id');
		$in["jenis"]			=$this->input->post('jenis');
		$in["nama_vaksin"]		=$this->input->post('nama_vaksin');
		$in["vaksin_ke"]		=$this->input->post('vaksin_ke');
		$in["usia_min"]			=$this->input->post('usia_min');
		$in["usia_max"]			=$this->input->post('usia_max');
		$in["keterangan"]		=$this->input->post('keterangan');
		$this->app_model->update("vaksin",$in,"id");
		$this->session->set_flashdata('info','<p><div class="alert alert-warning">
											<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
											<strong>Data berhasil diupdate !</strong>
										</div>');
		redirect('vaksin');
	}
	
	function detail($id=null)
	{
		$id = base64_decode($id);	
		$data = array();
		$data["title"] 		= "PETS JOURNEY";
		$data["subtitle"] 	= "JADWAL VAKSIN";
		$data['pages'] 		= 'vaksin_detail';
		$data['mdata'] 		= $this->app_model->vaksin_detail($id);	
		$this->load->view('index',$data);
	}	

	function delete($id=null)
	{
		$id = base64_decode($id);
		$this->app_model->hapus($id,"id","vaksin");
		$this->session->set_flashdata('info','<p><div class="alert alert-warning">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<strong>Data berhasil dihapus !</strong>
									</div>');
		redirect('vaksin');
	}

}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('app_model'));
		$this->id		=$this->session->userdata('id');
		$this->nama		=$this->session->userdata('nama');
		$this->email	=$this->session->userdata('email');
		$this->foto		=$this->session->userdata('foto');
	}
	
	function index()
	{	
		$data=array();
		$data["title"]= "PETS JOURNEY";
		if($this->id!=""){
			$data["pages"]= 'dashboard';
			$this->load->view('index',$data);
		}else{
			$this->load->view('login',$data);
		}
	}

}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Profile extends CI_Controller 
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
		$data["title"] 		="PETS JOURNEY";
		$data["subtitle"] 	="PROFILE";
		$data['pages'] 		='profile';	
		$data['mdata'] 		= $this->app_model->edit("admin","id='".$this->id."'");	
		$this->load->view('index',$data);
		
	}

	function update()
	{
		$in['id']		=$this->id;
		$in['nama']	 	=$this->input->post('nama');
		$in['telepon']	=$this->input->post('telepon');
		$in['email']	=$this->input->post('email');	
		$newpass=$this->input->post('newpassword');
		if($newpass!=''){
			$in['password']=md5($newpass);
		}

		if(empty($_FILES['userfile']['name'])){
			$this->app_model->update("admin",$in,"id");
			$this->session->set_userdata('adm_nama',$in['nama']);
			$this->session->set_flashdata('info','<div class="alert alert-warning alert-dismissible fade in">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<strong>Profile telah diupdate !</strong>
									</div>');
			redirect('profile/index');
		}else{
			$date 	  		= date('ymdhis');
			$namefile		= $_FILES['userfile']['name'];
			$ext 			= pathinfo($namefile, PATHINFO_EXTENSION);
			$namefile_tmp 	= $date.'_'.md5(preg_replace('/[#$%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/', '', $namefile));			
			$namefile_fix	= $namefile_tmp.'.'.$ext;
						
			$config["file_name"]	= $namefile_fix; 
			$config['upload_path'] 	= './asset/images/admin/';
			$config['allowed_types']= 'bmp|gif|jpg|jpeg|png';
			$config['max_size'] 	= '50000';
			$config['max_width'] 	= '12000';
			$config['max_height'] 	= '12000';
			$config['create_thumb'] = TRUE;
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload()){
				$u_foto=$this->input->post('foto');
				echo $this->upload->display_errors();
			}else{			
				$img=$this->adm_foto;
				if($img!='avatar.png'){
					unlink("".$config['upload_path']."".$img."");
				}
				$this->res_img($namefile_fix);
				$this->crop_img($namefile_fix);
				$in['foto']=$namefile_fix;
				$this->app_model->update("admin",$in,"id");
				$this->session->set_userdata('adm_foto',$namefile_fix);
				$this->session->set_userdata('adm_nama',$in['nama']);
				$this->session->set_flashdata('info','<div class="alert alert-warning alert-dismissible fade in">
														<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														<strong>Profile telah diupdate !</strong>
													</div>');
				redirect('profile/index');
			}			
		}
	}

	public function res_img($img)
	{
		$upload_data 				= $this->upload->data();
		$config3['image_library'] 	= 'gd2';
		$config3['source_image'] 	= './asset/images/admin/'.$img;
		$config3['new_image'] 		= './asset/images/admin/'.$img;
		$config3['maintain_ratio'] 	= TRUE;
		$config3['create_thumb'] 	= FALSE;
		$config3['width'] 			= 215;
		$config3['height'] 			= 215;
		$dim = (intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($config3['width'] / $config3['height']);
		$config3['master_dim'] = ($dim > 0)? "height" : "width";
		
		$this->load->library('image_lib');
		$this->image_lib->initialize($config3);
		
		
		if (!$this->image_lib->resize()) 
		{
			echo $this->image_lib->display_errors();
		}
	}

	public function crop_img($img)
	{
		$config2['image_library'] = 'gd2';
		$config2['source_image'] = './asset/images/admin/'.$img;
		$config2['new_image'] = './asset/images/admin/'.$img;
		$config2['quality'] = "100%";
		$config2['maintain_ratio'] = FALSE;
		$config2['width']  = 215;
		$config2['height'] = 215;
		$config2['x_axis'] = '0';
		$config2['y_axis'] = '0';
			 
		$this->image_lib->clear();
		$this->image_lib->initialize($config2); 
							 
		if (!$this->image_lib->crop())
		{
			echo $this->upload->display_errors();
		}
	}
}

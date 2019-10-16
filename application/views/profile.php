<?php
foreach($mdata->result_array() as $rows){
	$nama		= $rows['nama'];
	$telepon	= $rows['telepon'];
	$email		= $rows['email'];
	$foto		= $rows['foto'];
}
?>
 <div class="content-wrapper">
        <section class="content-header">
          <h1>
            <?php echo $subtitle;?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Akun</a></li>
            <li class="active">Profile</li>
          </ol>
        </section>
		 <form id="frm" class="form-horizontal" method="post" action="<?php echo site_url('profile/update'); ?>" enctype="multipart/form-data">
       
		<section class="content">
		
          <div class="row">
		
            <div class="col-md-3">
              	<div class="box box-info">
					<div class="box-body box-profile">
						<img class="profile-user-img img-responsive img-circle" src="<?php echo asset_url('images/admin/'.$foto.''); ?>" alt="profile picture">
						<h3 class="profile-username text-center"><?php echo $nama;?></h3>
					</div>
					<input class="btn btn-primary btn-block" type="file" name="userfile">
				</div>
			</div>
		  <div class="col-md-9">
              <div class="box box-info">
                <div class="box-header with-border">
				<?php
				if ($this->session->flashdata('info')){  
					echo $this->session->flashdata('info');
				}
				?>
                </div>
                  <div class="box-body">
                    
					<div class="form-group">
                      <label for="nama" class="col-sm-2 control-label">Nama</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?php echo $nama;?>" required>
                      </div>
                    </div>
					<div class="form-group">
                      <label for="telepon" class="col-sm-2 control-label">Telepon</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Telepon" value="<?php echo $telepon;?>" required>
                      </div>
                    </div>
					<div class="form-group">
                      <label for="email" class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $email;?>" required>
                      </div>
                    </div>
					<div class="form-group">
                      <label for="password" class="col-sm-2 control-label">Password</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="newpassword" name="newpassword" placeholder="Ganti Password ?">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="password" class="col-sm-2 control-label"></label>
                      <div class="col-sm-5">
						<button type="submit" id="btn-update" class="btn btn-md btn-primary">
						<i class="ace-icon fa fa-save"></i> Update
						</button>
						<button type="button" class="btn btn-md btn-danger">
						<i class="ace-icon fa fa-ban"></i> Reset
						</button>
                      </div>
                    </div>
                  </div>               
              </div>
            </div>
		  </div>
        </section>
		</form>
      </div>
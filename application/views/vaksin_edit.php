<?php
foreach($mdata->result_array() as $rows){
	$id				= $rows['id'];
	$jenis			= $rows['jenis'];
	$nama_vaksin	= $rows['nama_vaksin'];
	$vaksin_ke		= $rows['vaksin_ke'];
	$usia_min		= $rows['usia_min'];
	$usia_max		= $rows['usia_max'];
	$keterangan		= $rows['keterangan'];
}
?>
<div class="content-wrapper">
 <section class="content-header">
  <h1>
	<?php echo $subtitle;?>
  </h1>
<ol class="breadcrumb">
	<li><a href="#">Home</a></li>
	<li><a href="#">Vaksin</a></li>
	<li class="active">Edit</a></li>
  </ol>
</section>
<section class="content">
<div class="box box-primary">
<div class="box-header with-border">
	<a href="<?php echo site_url('vaksin');?>">
		<span class="glyphicon fa fa-mail-reply"></span> <b>Kembali</b>
	</a> 
  <div class="box-tools pull-right">
	<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
  </div>
</div>
<?php
	if ($this->session->flashdata('info')){  
		echo $this->session->flashdata('info');
	}
?>
<div class="box-body">
  <div class="row">
	<div class="col-md-12">
	  <form id="frm" method="post" class="form-horizontal" action="<?php echo site_url('vaksin/update'); ?>" enctype="multipart/form-data">
		<div class="box-body">
			<div class="form-group">
				<label class="control-label col-sm-2" for="jenis">Jenis</label>
				<div class="col-sm-9">
					<select name="jenis" class="form-control" id="jenis" required>
					  <?php
						  foreach($mjenis->result_array() as $val){
							  if($jenis==$val['jenis']){
								  echo'<option value="'.$val['jenis'].'" selected>'.$val['jenis'].'</option>';
							  }else{
								  echo'<option value="'.$val['jenis'].'">'.$val['jenis'].'</option>';
							  }						  
						  }
					  ?>
					</select>
				</div>
			</div>	
			<div class="form-group">
				<label class="control-label col-sm-2" for="nama_vaksin">Nama Vaksin</label>
				<div class="col-sm-9">
					<input type="hidden" id="id" name="id" value="<?php echo $id;?>" >
					<input type="text" class="form-control" id="nama_vaksin" name="nama_vaksin" value="<?php echo $nama_vaksin;?>" placeholder="Nama Vaksin" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="vaksin_ke">Vaksin Ke</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="vaksin_ke" name="vaksin_ke" value="<?php echo $vaksin_ke;?>" placeholder="Vaksin Ke" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="usia_min">Usia Minimum</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="usia_min" name="usia_min" value="<?php echo $usia_min;?>" placeholder="Usia Min" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="usia_max">Usia Maksimum</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="usia_max" name="usia_max" value="<?php echo $usia_max;?>" placeholder="Usia Max" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="keterangan">Keterangan</label>
				<div class="col-sm-9">
					<textarea class="form-control" id="keterangan" name="keterangan" rows="3"  placeholder="Keterangan" required><?php echo $keterangan;?></textarea>
				</div>
			</div>
			<div class="form-group"> 
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" id="btn-save" class="btn btn-md btn-primary">
				  <i class="ace-icon fa fa-save"></i> Update
				  </button>
				  <button type="button" class="btn btn-md btn-danger">
					<i class="ace-icon fa fa-ban"></i> Reset
				  </button>
				</div>
			</div>
		</div>
	  </form>
	</div>
  </div>
</div>
</div>
</section>
</div>
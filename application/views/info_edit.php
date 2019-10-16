<?php
foreach($mdata->result_array() as $rows){
	$id			= $rows['id'];
	$judul		= $rows['judul'];
	$detail		= $rows['detail'];
}
?>
<div class="content-wrapper">
 <section class="content-header">
  <h1>
	<?php echo $subtitle;?>
  </h1>
<ol class="breadcrumb">
	<li><a href="#">Home</a></li>
	<li><a href="#">Info</a></li>
	<li class="active">Edit</a></li>
  </ol>
</section>
<section class="content">
<div class="box box-primary">
<div class="box-header with-border">
	<a href="<?php echo site_url('info');?>">
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
	  <form id="frm" method="post" class="form-horizontal" action="<?php echo site_url('info/update'); ?>" enctype="multipart/form-data">
		<div class="box-body">
			<div class="form-group">
				<label class="control-label col-sm-2" for="judul">Judul</label>
				<div class="col-sm-9">
					<input type="hidden" id="id" name="id" value="<?php echo $id;?>" >
					<input type="text" class="form-control" id="judul" name="judul" value="<?php echo $judul;?>"  placeholder="Judul" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="detail">Detail</label>
				<div class="col-sm-9">
					<textarea class="form-control" id="detail" name="detail" rows="5"  placeholder="Detail" required><?php echo $detail;?></textarea>
				</div>
			</div>
			<div class="form-group"> 
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" id="btn-update" class="btn btn-md btn-primary">
				  <i class="ace-icon fa fa-update"></i> Update
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
<script>
  CKEDITOR.replace('detail');
</script>

 <div class="content-wrapper">
<section class="content">
<!-- SELECT2 EXAMPLE -->
<div class="box box-primary">
<div class="box-header with-border">
<strong>
	<?php echo $subtitle;?>
</strong>
<div class="box-tools pull-right">
	<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
</div>
</div>
<div class="box-body">
  <div class="row">
	<div class="col-md-12">
		<?php
		foreach($mdata->result_array() as $rows){
		if($rows['status']==1){
			$status='<span class="label label-success">Aktif</span>';
		}else{
			$status='<span class="label label-danger">Non Aktif</span>';
		}
		?>
		<table class="table table-bordered">
			<tbody>
			  <tr>
				<td width="20%">Nama</td>
				<td class="text-center" width="5%">:</td>
				<td><?php echo $rows['nama'];?></td>
				<td width="15%" rowspan="5"><img width="100%" class="img-responsive" src="<?php echo asset_url('images/user/'.$rows['foto'].'');?>"></td>
			  </tr>
			  <tr>
				<td>Email</td>
				<td class="text-center" width="5%">:</td>
				<td><?php echo $rows['email'];?></td>
			  </tr>
			  <tr>
				<td>Telepon</td>
				<td class="text-center" width="5%">:</td>
				<td><?php echo $rows['telepon'];?></td>
			  </tr>
			  <tr>
				<td>Status</td>
				<td class="text-center" width="5%">:</td>
				<td><?php echo $status;?></td>
			  </tr>
			</tbody>
		</table>
		<a href="<?php echo site_url('user');?>" type="button" class="btn btn-sm pull-right btn-danger">
			<i class="ace-icon fa fa-ban"></i> Tutup
		</a>
	  <?php } ?>
	</div>
  </div>
</div>
</div>
</section>
</div>
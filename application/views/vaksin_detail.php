
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
		?>
		<table class="table table-bordered">
			<tbody>
			  <tr>
				<td>Jenis Peliharaan</td>
				<td class="text-center" width="5%">:</td>
				<td><?php echo $rows['jenis'];?></td>
			  </tr>
			  <tr>
				<td>Nama Vaksin</td>
				<td class="text-center" width="5%">:</td>
				<td><?php echo $rows['nama_vaksin'];?></td>
			  </tr>
			  <tr>
				<td>VaksinKe</td>
				<td class="text-center" width="5%">:</td>
				<td><?php echo $rows['vaksin_ke'];?></td>
			  </tr>
			  <tr>
				<td>Usia Minimum</td>
				<td class="text-center" width="5%">:</td>
				<td><?php echo $rows['usia_min'];?></td>
			  </tr>
			  <tr>
				<td>Usia Maximum</td>
				<td class="text-center" width="5%">:</td>
				<td><?php echo $rows['usia_max'];?></td>
			  </tr>
			  <tr>
				<td>Keterangan</td>
				<td class="text-center" width="5%">:</td>
				<td><?php echo $rows['keterangan'];?></td>
			  </tr>
			</tbody>
		</table>
		<a href="<?php echo site_url('vaksin');?>" type="button" class="btn btn-sm pull-right btn-danger">
			<i class="ace-icon fa fa-ban"></i> Tutup
		</a>
	  <?php } ?>
	</div>
  </div>
</div>
</div>
</section>
</div>
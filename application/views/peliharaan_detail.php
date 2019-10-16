
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
				<td width="20%">Nama</td>
				<td class="text-center" width="5%">:</td>
				<td><?php echo $rows['nama'];?></td>
				<td width="15%" rowspan="7"><img width="100%" class="img-responsive" src="<?php echo asset_url('images/pets/'.$rows['foto'].'');?>"></td>
			  </tr>
			  <tr>
				<td>Jenis Peliharaan</td>
				<td class="text-center" width="5%">:</td>
				<td><?php echo $rows['jenis'];?></td>
			  </tr>
			  <tr>
				<td>Ras</td>
				<td class="text-center" width="5%">:</td>
				<td><?php echo $rows['ras'];?></td>
			  </tr>
			  <tr>
				<td>Jenis Kelamin</td>
				<td class="text-center" width="5%">:</td>
				<td><?php echo $rows['jenis_kelamin'];?></td>
			  </tr>
			  <tr>
				<td>Tanggal Lahir</td>
				<td class="text-center" width="5%">:</td>
				<td><?php echo $rows['tgl_lahir'];?></td>
			  </tr>
			  <tr>
				<td>Umur Peliharaan</td>
				<td class="text-center" width="5%">:</td>
				<td><?php echo $rows['umur'];?> Hari</td>
			  </tr>
			  <tr>
				<td>Pemilik</td>
				<td class="text-center" width="5%">:</td>
				<td><?php echo $rows['pemilik'];?></td>
			  </tr>
			</tbody>
		</table>
		<br/><br/>
		<table id="user" class="table table-bordered table-striped table-hover" cellspacing="0" width="100%">
			<thead>
				<tr class="info">
					<th colspan="4">RIWAYAT VAKSIN</th>
				</tr>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Vaksin</th>
					<th>Keterangan</th>
				</tr>
			</thead>
			<tbody>
			<?php
			if($mvaksin->num_rows()>0){
				$no=1;
				foreach($mvaksin->result_array() as $rows){
					echo '<tr>';
					echo '<td>'.$no.'</td>';
					echo '<td>'.$rows['tanggal'].'</td>';
					echo '<td>'.$rows['nama_vaksin'].'</td>';
					echo '<td>'.$rows['keterangan'].'</td>';
					echo '</tr>';
					$no++;
				}
			}
			?>
			</tbody>
		  </table>
		<a href="<?php echo site_url('peliharaan');?>" type="button" class="btn btn-sm pull-right btn-danger">
			<i class="ace-icon fa fa-ban"></i> Tutup
		</a>
	  <?php } ?>
	</div>
  </div>
</div>
</div>
</section>
</div>
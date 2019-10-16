<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
	<?php echo $subtitle;?>
  </h1>
<ol class="breadcrumb">
	<li><a href="#">Home</a></li>
	<li><a href="#">Admin</a></li>
	<li class="active">List</a></li>
</ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
	<div class="col-xs-12">
	<a href="<?php echo site_url('admin/add');?>">
		<button type="button" class="btn btn-primary btn-sm flat">
			<span class="glyphicon glyphicon-plus"></span> Tambah
		</button>
	</a>
	<?php
		if ($this->session->flashdata('info'))
		{  
			echo $this->session->flashdata('info');
		}
	?>
	 <div class="box box-primary">
		<div class="box-body">
		<div class="table-responsive">
		  <table id="user" class="display table-bordered table-striped table-hover" cellspacing="0" width="100%">
			<thead>
			  <tr>
				<th>No</th>
				<th>Foto</th>
				<th>Nama</th>				
				<th>Level</th>
				<th>Telepon</th>
				<th>Email</th>
				<th>Status</th>
				<th>Opsi</th>
			  </tr>
			</thead>
			<tbody>
			<?php
			if($mdata->num_rows()>0){
				$no=1;
				foreach($mdata->result_array() as $rows){
					if($rows['level']=='admin'){
						$level='SUPER ADMIN';
					}else{
						$level='GENERAL ADMIN';
					}
					if($rows['status']==1){
						$status='<span class="label label-success">Aktif</span>';
						$button='<a class="btn btn-sm btn-warning" href="'.site_url('admin/suspend/'.trim(base64_encode($rows['id']),'=').'').'">
									<i class="fa fa-ban" aria-hidden="true"></i>
								 </a>';
					}else if($rows['status']==2){
						$status='<span class="label label-warning">Suspend</span>';
						$button='<a class="btn btn-sm btn-warning" href="'.site_url('admin/aktivasi/'.trim(base64_encode($rows['id']),'=').'').'">
									<i class="fa fa-ban" aria-hidden="true"></i>
								 </a>';
					}else{
						$status='<span class="label label-danger">Non Aktif</span>';
						$button='<a class="btn btn-sm btn-success" href="'.site_url('admin/aktivasi/'.trim(base64_encode($rows['id']),'=').'').'">
									<i class="fa fa-check-square" aria-hidden="true"></i>
								 </a>';
					}
					echo '<tr>';
					echo '<td>'.$no.'</td>';
					echo '<td><img src="'.asset_url('images/admin/'.$rows['foto'].'').'" class="img-circle" width="100%"></td>';
					echo '<td>'.$rows['nama'].'</td>';
					echo '<td>'.$level.'</td>';
					echo '<td>'.$rows['telepon'].'</td>';
					echo '<td>'.$rows['email'].'</td>';
					echo '<td>'.$status.'</td>';
					echo '<td>
							'.$button.'
							<a class="btn btn-sm btn-primary" href="'.site_url('admin/edit/'.trim(base64_encode($rows['id']),'=').'').'">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</a>
							<a class="btn btn-sm btn-danger" href="#" data-href="'.site_url('admin/delete/'.trim(base64_encode($rows['id']),'=').'').'"  data-toggle="modal" data-target="#confirm-delete" >
								<i class="fa fa-trash" aria-hidden="true"></i>
							</a>
							</td>';
					echo '</tr>';
					$no++;
				}
			}
			?>
			</tbody>
		  </table>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</section>
</div>

<script type="text/javascript">
var user;
$(document).ready(function() {
    user = $('#user').DataTable({ 
		dom: "Bfrtip",
		buttons: [
			{extend: "print", text: "<span class='glyphicon glyphicon-print'></span> Print"},          
			{extend: "excelHtml5", text: "<span class='glyphicon glyphicon-th-list'></span> Excel"},
			{extend: "pdfHtml5", text: "<span class='glyphicon glyphicon-save'></span> PDF", title: "Filename"}
		],
        "oLanguage": {
		"sProcessing": "<img src='<?php echo asset_url('core/img/loader.gif')?>'>"
		},
		"processing": true, 
        "serverSide": false, 
        "order": [], 
        "columnDefs": [
        { 
            "targets": [ 0 ],
            "orderable": true,
			"width": "5%",
			"targets": 0,
        },
		{ 
            "targets": [ 1 ],
            "orderable": true,
			"width": "5%",
			"targets": 1,
        },
		{ 
            "targets": [ 7 ],
            "orderable": false,
			"width": "5%",
			"targets": 7,
        },
        ],

    });

});
jQuery(function($) {
	$('#confirm-delete').on('show.bs.modal', function(e) {
		$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
	});
})
</script>
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                Apakah anda ingin menghapus data ini ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok btn-sm">Delete</a>
            </div>
        </div>
    </div>
</div>
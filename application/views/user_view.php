<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
	<?php echo $subtitle;?>
  </h1>
<ol class="breadcrumb">
	<li><a href="#">Home</a></li>
	<li><a href="#">User</a></li>
	<li class="active">List</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
	<div class="col-xs-12">
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
				<th>Email</th>
				<th>Telepon</th>		
				<th>Status</th>
				<th>Opsi</th>
			  </tr>
			</thead>
			<tbody>
			<?php
			if($mdata->num_rows()>0){
				$no=1;
				foreach($mdata->result_array() as $rows){
					if($rows['status']==true){
						$status='<span class="label label-success">Aktif</span>';
						$button='<a class="btn btn-sm btn-warning" href="'.site_url('user/suspend/'.trim(base64_encode($rows['id']),'=').'').'">
									<i class="fa fa-ban" aria-hidden="true"></i>
								 </a>';
					}else{
						$status='<span class="label label-danger">Non Aktif</span>';
						$button='<a class="btn btn-sm btn-success" href="'.site_url('user/aktivasi/'.trim(base64_encode($rows['id']),'=').'').'">
									<i class="fa fa-check-square" aria-hidden="true"></i>
								 </a>';
					}
					echo '<tr>';
					echo '<td>'.$no.'</td>';
					echo '<td><img src="'.asset_url('images/user/'.$rows['foto'].'').'" class="img-circle" width="100%"></td>';
					echo '<td>'.$rows['nama'].'</td>';
					echo '<td>'.$rows['email'].'</td>';
					echo '<td>'.$rows['telepon'].'</td>';					
					echo '<td>'.$status.'</td>';
					echo '<td>
							'.$button.'
							<a class="btn btn-sm btn-primary" href="'.site_url('user/detail/'.trim(base64_encode($rows['id']),'=').'').'">
								<i class="fa fa-file-text" aria-hidden="true"></i>
							</a>
							<a class="btn btn-sm btn-danger" href="#" data-href="'.site_url('user/delete/'.trim(base64_encode($rows['id']),'=').'').'"  data-toggle="modal" data-target="#confirm-delete" >
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
            "targets": [ 6 ],
            "orderable": false,
			"width": "5%",
			"targets": 6,
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
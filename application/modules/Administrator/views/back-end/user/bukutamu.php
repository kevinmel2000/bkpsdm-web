
<div class="row"> 
  <div class="col-xs-12 col-sm-9 widget-container-col">
   <div class="widget-box widget-color-green">
	<div class="widget-header">
	  <h5 class="widget-title bigger lighter">
		<i class="ace-icon fa fa-table"></i>
		Data Buku Tamu Web Administrator 
	  </h5>
	  <div class="widget-toolbar">
		<a href="#" data-action="collapse">
		 <i class="ace-icon fa fa-plus" data-icon-show="fa-plus" data-icon-hide="fa-minus"></i>
		</a>
		<a href="#" data-action="close">
		  <i class="ace-icon fa fa-times"></i>
		</a>
	  </div>
	  <div class="widget-toolbar widget-toolbar-light no-border"></div>
	</div>
	<div class="widget-body">
	  <div class="widget-main">
	  	<table id="4IDE-Datatable" class="table table-striped table-bordered table-hover">
		 <thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Tlp</th>
				<th>Tanggal</th>
				<th>Pesan</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		   <?php $no =  0 ; foreach ($row as $key => $vaData) { ?>
			<tr>
				<td><?=++$no?></td>
				<td><?=$vaData['nama']?></td>
				<td><?=$vaData['email']?></td>
				<td><?=$vaData['tlp']?></td>
				<td><?=String2Date($vaData['tanggal'])?></td>
				<td><?=$vaData['pesan']?></td>
				<td align="center">
					<div class="hidden-sm hidden-xs action-buttons">
						<button class="btn btn-xs btn-danger"
						onclick="return HapusData('<?=$vaData['id_bukutamu']?>');">
							<i class="ace-icon fa fa-trash-o bigger-120"></i>
						</button
					</div>
				</td>
			</tr>
		   <?php } ?>	
		</tbody>
	  </table>
	  </div>
	 </div>
    </div>
    <hr/>
  </div><!-- /.span -->	

  <div class="col-xs-12 col-sm-3 widget-container-col">
   <div class="widget-box widget-color-blue">
	<div class="widget-header">
	  <h5 class="widget-title bigger lighter">
		<i class="ace-icon fa fa-table"></i>
		Information
	  </h5>
	  <div class="widget-toolbar widget-toolbar-light no-border"></div>
	</div>
	<div class="widget-body">
	  <div class="widget-main">
	   	<p>Tabel Buku Tamu Adalah List Tamu Yang Terdaftar Dalam Database</p>
	   	<hr/>
	   	2018 © Sugih Mukti
	   </div>
	 </div>
    </div>
   </div><!-- /.span -->  
   <div id="result_foto"></div>
 
 </div>

 
 <script type="text/javascript">


	function HapusData(id){
		bootbox.confirm("Apakah Yakin Hapus Data ?", function(result) {
	          if(result) {
	            $.ajax({
	                type: "GET",  
	                url: "<?=site_url('Administrator/User_Act/bukutamu/hapus')?>/"+id,
	                cache: false,
	                success:function(msg){
	                  $.gritter.add({
	                        title: 'Notifikasi Sukses',
	                        text:  'Data Sukses Dihapus',
	                        class_name: 'gritter-danger gritter-center' 
	                    });
	                  setTimeout(function() { window.location = '<?=base_url()?>Administrator/User/bukutamu' },2000);
	                }
	            });
	          }
	        });	
	}

 </script>

	

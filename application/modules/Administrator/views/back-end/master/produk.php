<?php 
	if($action == 'edit') {
		 foreach ($field as $column) {
		 	$cIdService		=	$column['id_service']	;
		 	$cIdKategori 	=	$column['id_kategori']	;
		 	$cGambar 		=	$column['gambar']		;
		 	$cNama			=	$column['nama'];
		 	$cHeadline	 	=	$column['headline']		;
		 	$cKeterangan 	=	$column['keterangan']	;
		 }
		 	$cIconButton    =   "fa fa-refresh"    ;
            $cValueButton   =   "Update Data" ; 
		 	$cAction 		=   "ubah/".$cIdService."" ;
	}else{		
			$cIdService		=	""		;
		 	$cIdKategori	=	""		;
		 	$cGambar		=	""		;
		 	$cNama 			=	""		;
		 	$cHeadline		=	""		;
		 	$cKeterangan	=	""		;
			$cIconButton    =   "fa fa-save"    ;
            $cValueButton   =   "Save Data" ;
            $cAction        =   "simpan" ;	
	}
?>

  <div class="col-xs-12 col-sm-12 widget-container-col">
   <div class="widget-box widget-color-blue collapsed">
	<div class="widget-header">
	  <h5 class="widget-title bigger lighter">
		<i class="ace-icon fa fa-table"></i>
		Data Produk
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
				<th>Produk</th>
				<th>Headline</th>
				<th>Gambar</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		   <?php $no =  0 ; foreach ($row as $key => $vaData) { ?>
			<tr>
				<td style="width:5%"><?=++$no?></td>
				<td><?=$vaData['nama']?></td>
				<td><?=substr($vaData['headline'], 0,100)?> [...]</td>
				<td><a href="<?=base_url().$vaData['gambar']?>" class="4IDE-Gallery">
					Lihat Foto
				</a></td>
				<td style="width:10%">
					<div class="hidden-sm hidden-xs action-buttons">
						<button class="btn btn-xs btn-primary" 
						onclick="return EditData('<?=$vaData['id_service']?>');">
							<i class="ace-icon fa fa-pencil bigger-120"></i>
						</button>
						<button class="btn btn-xs btn-danger"
						onclick="return HapusData('<?=$vaData['id_service']?>');">
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

  <div class="col-xs-12 col-sm-9 widget-container-col">
   <div class="widget-box widget-color-red2">
	  <div class="widget-header">
	  <h5 class="widget-title bigger lighter">
		<i class="ace-icon fa fa-table"></i>
		Input Produk 
	  </h5>
	  <div class="widget-toolbar widget-toolbar-light no-border"></div>
	</div>
	<div class="widget-body">
	<form role="form" 
	data-toggle="validator" 
	id="Outlet" 
	method="post"
	enctype="multipart/form-data" 
	action="<?=site_url('Administrator/Master_Act/service/'.$cAction.'')?>" >
	  <div class="widget-main">
	    <div class="row">
	    	<!--
	     <div class="col-sm-12 col-xs-12">
	      <div class="form-group">
 			<label>Kategori</label>
 			<select name="cIdKategori" id="cIdKategori" class="form-control 4IDE-Combobox">
 				<option></option>
 				<?php 
 				$dbService = $this->db->query("SELECT * FROM kategori WHERE id_menu = 4 ");
 				foreach ($dbService->result_array() as $key => $vaService) {
 					# code...
 				?>
 				<option value="<?=$vaService['id_kategori']?>"<?php if($vaService['id_kategori'] == $cIdKategori)echo "selected"; ?>><?=$vaService['nama_kategori']?></option>
 				<?php } ?>
 			</select>
	      </div>
	     </div>
		-->
		 <input type="hidden" name="cIdKategori" id="cIdKategori" value="58">
	     <div class="col-sm-12 col-xs-12">
	      <div class="form-group">
 			<label>Nama Produk</label>
 			<input type="text" name="cNama" id="cNama" placeholder="Nama Produk" class="form-control" value="<?=$cNama?>">
 			<input type="hidden" name="url" value="produk">
	      </div>
	     </div>
	     
	    
		<!--	 
		<div class="col-sm-6 col-xs-6">
	      <div class="form-group">
 			<label>Preview Foto / Gambar </label>
 			<div id="result_foto">
 				<input type="hidden" name="cFotoFix" id="cFotoFix" value="<?=$cGambar?>">
 			</div>
	      </div>
	     </div>
	     <div class="col-sm-6 col-xs-6">
	      <div class="form-group">
 			<label>Preview Dokumen</label>
 			<div id="result_file">
 				<input type="hidden" name="cFileFix" id="cFileFix" value="<?=$cDokumen?>">
 			</div>
	      </div>
	    </div>
	 	-->

	    <div class="col-sm-12 col-xs-12">
	      <div class="form-group">
 			<label>Headline</label>
 			<textarea name="cHeadline" id="cHeadline" class="form-control" rows="5"><?=$cHeadline?></textarea>
	      </div>
	     </div>
	     <div class="col-sm-12 col-xs-12">
	      <div class="form-group">
 			<label>Foto / Gambar</label>
 			<input type="file" id="4IDE-File" name="foto" class="form-control"  />
	      </div>
	     </div>
	     <div class="col-sm-12 col-xs-12">
	      <div class="form-group">
 			<label>Keterangan</label>
 			<textarea name="cKeterangan" class="4IDE-Editor" id="contents" title="Contents"><?=$cKeterangan?></textarea>
	      </div>
	     </div>
	    </div>
	    <div class="row">
	     <div class="col-xs-12 col-sm-6 widget-container-col"><br/>
    		<button type="submit" id="act" 
    		class="btn btn-primary btn-flat"><i class="<?=$cIconButton?>"></i> 
    		<?=$cValueButton?>
    		</button>
   		 </div>
	    </div>
	  </div>
	  </form>
	</div>

  </div>
  </div><!-- /.span --> 

    <div class="col-xs-12 col-sm-3 widget-container-col">
   <div class="widget-box widget-color-green3">
	<div class="widget-header">
	  <h5 class="widget-title bigger lighter">
		<i class="ace-icon fa fa-table"></i>
		Information
	  </h5>
	  <div class="widget-toolbar widget-toolbar-light no-border"></div>
	</div>
	<div class="widget-body">
	  <div class="widget-main">
	   	<p>Form Produk Adalah List Produk-Produk Yang Akan Ditampilkan Di Halaman Web Front End</p>
	   	<hr/>
	   	2018 © Sugih Mukti
	   </div>
	 </div>
    </div>
   </div><!-- /.span -->  
   <div id="result_foto"></div>
   <?php if($action == 'edit'){ ?>
   <input type="hidden" name="cFotoService" id="cFotoService" value="<?=$cGambar?>">
   <?php } ?>

 
 <script type="text/javascript">

	function EditData(id){
		window.location.href='<?=base_url()?>Administrator/Master/produk/edit/'+id; 
	}

	function HapusData(id){
		bootbox.confirm("Apakah Yakin Hapus Data ?", function(result) {
	          if(result) {
	            $.ajax({
	                type: "GET",  
	                url: "<?=site_url('Administrator/Master_Act/service/hapus')?>/"+id,
	                cache: false,
	                success:function(msg){
	                  $.gritter.add({
	                        title: 'Notifikasi Sukses',
	                        text:  'Data Sukses Dihapus',
	                        class_name: 'gritter-danger gritter-center' 
	                    });
	                  setTimeout(function() { window.location = '<?=base_url()?>Administrator/Master/produk' },2000);
	                }
	            });
	          }
	        });	
	}

 </script>

	

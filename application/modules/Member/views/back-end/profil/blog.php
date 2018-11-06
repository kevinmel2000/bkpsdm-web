<?php 
	if($action == 'edit') {
		 foreach ($field as $column) {
		 	$cIdBlog		=	$column['id_blog']	;
		 	$cIdKelas 		=	$column['id_kelas'];
		 	$dTgl 			=	String2Date($column['tanggal']);
		 	$cJudul 		=	$column['judul'];
		 	$cGambar 		=	$column['gambar'];
		 	$cHeadline 		=	$column['headline'];
		 	$cIsi 			=	$column['isi'];
		 	$cAktor 		=	$column['aktor'];
		 	$cWaktu 		=	$column['waktu'];
		 	$cStatus 		=	$column['status'];	

		 }
		 	$cIconButton    =   "fa fa-refresh"    ;
            $cValueButton   =   "Update Data" ; 
		 	$cAction 		=   "ubah/".$cIdBlog."" ;
	}else{
			$cIdBlog		=	""	;
		 	$cIdKelas 		=	""  ;
		 	$dTgl 			=	date('d-m-Y')	;
		 	$cJudul 		=	""	;
		 	$cGambar 		=	""	;
		 	$cHeadline 		=	""	;
		 	$cIsi 			=	""	;
		 	$cAktor 		=	""	;
		 	$cWaktu 		=	""	;
		 	$cStatus 		=	""	;	
			$cIconButton    =   "fa fa-save"    ;
            $cValueButton   =   "Save Data" ;
            $cAction        =   "simpan" ; 	
	}
?>
<div class="row"> 
  <div class="col-xs-12 col-sm-12 widget-container-col">
   <div class="widget-box widget-color-blue collapsed">
	<div class="widget-header">
	  <h5 class="widget-title bigger lighter">
		<i class="ace-icon fa fa-table"></i>
		Data <?=$file?>
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
	  	<table style="width: 100%" id="4IDE-Datatable" class="table table-responsive table-striped table-bordered table-hover">
		 <thead>
			<tr>
				<th>No</th>
				<th>Tanggal</th>
				<th>Judul</th>
				<th>Headline</th>
				<th>Aktor</th>
				<th>Foto</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 0; foreach ($row as $key => $vaData){?>
			<tr>
				<td width="1%"><?=++$no?></td>
				<td><?=String2Date($vaData['tanggal'])." | ".$vaData['waktu']?></td>
				<td><?=$vaData['judul']?></td>
				<td><?=substr($vaData['headline'],0,100)?> [...] </td>
				<td><?=$vaData['aktor']?></td>
				<td><a href="<?=base_url().$vaData['gambar']?>" class="4IDE-Gallery">Lihat Foto</a></td>
				<td width="10%">
					<button class="btn btn-xs btn-primary" 
						onclick="return EditData('<?=$vaData['id_blog']?>');">
						 <i class="ace-icon fa fa-pencil bigger-100"></i>
					</button>
					<button class="btn btn-xs btn-warning"
							onclick="return HapusData('<?=$vaData['id_blog']?>');">
							<i class="ace-icon fa fa-trash-o bigger-100"></i>
					</button>
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
 
  <div class="col-xs-12 col-sm-12 widget-container-col">
   <div class="widget-box widget-color-orange">
	  <div class="widget-header">
	  <h5 class="widget-title bigger lighter">
		<i class="ace-icon fa fa-table"></i>
		Input <?=$file?>
	  </h5>
	  <div class="widget-toolbar widget-toolbar-light no-border"></div>
	</div>
	<div class="widget-body"> 
	<form data-toggle="validator" method="post"
  enctype="multipart/form-data" action="<?=site_url('Administrator/Profil_Act/blog/'.$cAction.'')?>">
  <input type="hidden" name="cLink" value="blog">
	  <div class="widget-main">
	    <div class="row">
	     <div class="col-sm-6 ol-xs-12">
	      <div class="form-group">
 			<label>Tanggal </label>
 			<input type="text" name="dTgl" id="dTgl" class="form-control 4IDE-Date" 
 			placeholder="Tanggal Posting" value="<?=$dTgl?>" data-date-format="DD-MM-YYYY">
	      </div>
	     </div>
	     <div class="col-sm-6 ol-xs-12">
	      <div class="form-group">
 			<label>Jam </label>
 			<input type="text" name="cJam" id="cJam" class="form-control 4IDe-Time" 
 			placeholder="Jam Posting" value="<?=$cWaktu?>">
	      </div>
	     </div>
	     <div class="col-sm-12 col-xs-12">
	      <div class="form-group">
 			<label>Judul </label>
 			<input type="text" name="cJudul" id="cJudul" class="form-control" 
 			placeholder="Judul" value="<?=$cJudul?>">
	      </div>
	     </div>	
	     <div class="col-sm-12 col-xs-12">
	      <div class="form-group">
 			<label>Headline</label>
 			<textarea class="form-control" name="cHeadline" rows="4" placeholder="Headline"><?=$cHeadline?></textarea>
	      </div>
	     </div>
	     <div class="col-sm-6 col-xs-12">
	      <div class="form-group">
 			<label>Foto Headline</label>
 			<input type="file" id="4IDE-File" class="4IDE-File" name="foto" 
 			onchange="return uploadFoto();" />
	      </div>
	     </div>	
	     <div class="col-sm-6 col-xs-12" id="result">
	     <div class="form-group"> 
	    <?php 
   		  if($action == 'edit'){ ?>
   		  	<img src="<?=base_url()?><?=$cGambar?>" style="height: 150px">
   		 	<input type="hidden" name="cFotoFix" id="cFotoFix" value="<?=$cGambar?>">
   		 <?php }else{ ?>
   		 <img style="width: 15%" src="<?=base_url()?>assets-admin/img/no_preview_.jpg">
   		 <?php } ?>
   		 </div>
	    </div>
	     <div class="col-sm-12 col-xs-12">
	      <div class="form-group">
 			<label>Deskripsi</label>
 			<textarea name="cIsi" id="" class="4IDE-Editor" placeholder="Deskripsi"><?=$cIsi?></textarea>
	      </div>
	     </div>
	     <div class="col-sm-6 col-xs-12">
	      <div class="form-group">
 			<label>Status Posting</label>
 			<select name="cStatus" id="cStatus" class="form-control 4IDE-Combobox" placeholder="Status">
 				<option></option>
 				<option value="ya" <?php if($cStatus=='ya')echo "selected"; ?>>YA</option>
 				<option value="tidak"<?php if($cStatus=='tidak')echo "selected"; ?>>TIDAK</option>
 			</select>
	      </div>
	     </div>
	      <div class="col-sm-6 col-xs-12">
	      <div class="form-group">
 			<label>Posting By</label>
 			<input type="text" name="cAktor" id="cAktor" class="form-control" 
 			placeholder="Aktor" value="<?=$cAktor?>">
	      </div>
	     </div>
	     <div class="col-sm-12 col-xs-12">
	        <button type="submit" id="act" 
	        class="btn btn-primary btn-flat"><i class="<?=$cIconButton?>"></i> 
	        <?=$cValueButton?>
	        </button>
        </div>
	    </div>
	  </div>
	</div>
  </div>
  </div><!-- /.span --> 
   </form>
 </div>
	


  <script type="text/javascript">

   function uploadFoto(){
       var file = new FormData();
       file.append('file',$('#4IDE-File')[0].files[0]);
       
       $.ajax({
        url: "<?=site_url('Administrator/Master_Act/upload_foto/')?>",
        type: "POST",
        data: file,
        processData: false,
        contentType: false, 
         beforeSend:function(){
          $("#result").html("<div align='center'><img  width='150' height=150' src='<?=base_url()?>assets/img/hex-loader2.gif'/></div>");
          }, 
         success:function(data){
          $("#result").html(data);
          }
      });
    }

  

  function EditData(id){
		window.location.href='<?=base_url()?>Administrator/Profil/blog/edit/'+id; 
	}

	function HapusData(id){
		bootbox.confirm("Apakah Yakin Hapus Data ?", function(result) {
	          if(result) {
	            $.ajax({
	                type: "GET",  
	                url: "<?=site_url('Administrator/Profil_Act/blog/hapus')?>/"+id,
	                cache: false,
	                success:function(msg){
	                  $.gritter.add({
	                        title: 'Notifikasi Sukses',
	                        text:  'Data Sukses Dihapus',
	                        class_name: 'gritter-danger gritter-center' 
	                    });
	                  setTimeout(function() { window.location = '<?=base_url()?>Administrator/Profil/blog' },2000);
	                }
	            });
	          }
	        });	
	}
</script>
 
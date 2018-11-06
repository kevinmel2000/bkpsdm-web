<?php 

	if($action == 'edit') {

		 foreach ($field as $column) {

		 	$cIdBlog		=	$column['id_blog']	;

		 	$cIdKelas 		=	$column['id_kelas'];

		 	$cIdMapel 		=	$column['id_mapel'];

		 	$dTgl 			=	String2Date($column['tanggal']);

		 	$cJudul 		=	$column['judul'];

		 	$cGambar 		=	$column['gambar'];

		 	$cHeadline 		=	$column['headline'];

		 	$cLink 			=	$column['link_youtube'];

		 	$cIsi 			=	$column['isi'];

		 	$cAktor 		=	$column['id_user'];

		 	$cWaktu 		=	$column['waktu'];

		 	$cStatus 		=	$column['status'];	



		 }

		 	$cIconButton    =   "fa fa-refresh"    ;

            $cValueButton   =   "Update Data" ; 

		 	$cAction 		=   "ubah/".$cIdBlog."" ;

	}else{

			$cIdBlog		=	""	;

		 	$cIdKelas 		=	""  ;

		 	$cIdMapel 		=	""  ;

		 	$dTgl 			=	date('d-m-Y')	;

		 	$cJudul 		=	""	;

		 	$cGambar 		=	""	;

		 	$cHeadline 		=	""	;

		 	$cLink 			=	""	;

		 	$cIsi 			=	""	;

		 	$cAktor 		=	$this->session->userdata('id_user')	;

		 	$cWaktu 		=	""	;

		 	$cStatus 		=	"ya"	;	

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

				<th>Kelas</th>

				<th>Mapel</th>

				<!-- <th>Tanggal</th> -->

				<th>Judul</th>

				<th>Headline</th>

				<th>Foto</th>

				<th>Action</th>

			</tr>

		</thead>

		<tbody>

			<?php $no = 0; foreach ($row as $key => $vaData){?>

			<tr>

				<td width="1%"><?=++$no?></td>

				<td><?=$vaData['nama_kelas']?> - <?=$vaData['nama_jenjang']?></td>

				<td><?=$vaData['nama_mapel']?></td>

				<!-- <td><?=String2Date($vaData['tanggal'])." | ".$vaData['waktu']?></td> -->

				<td><?=$vaData['judul']?></td>

				<td><?=substr($vaData['headline'],0,100)?> [...] </td>

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

  enctype="multipart/form-data" action="<?=site_url('Administrator/Master_Act/pembelajaran/'.$cAction.'')?>">

  <input type="hidden" name="cLink" value="pembelajaran">

	  <div class="widget-main">

	    <div class="row">

	     <div class="col-sm-6 ol-xs-12">

	      <div class="form-group">

 			<label>Kelas </label>

 			<select name="cIdKelas" id="cIdKelas" 

 			class="form-control 4IDE-Combobox" placeholder="Kelas">

 				<option></option>

 				<?php foreach ($kelas as $key => $vaData) { ?>

 					<option value="<?=$vaData['id_kelas']?>" <?php if($vaData['id_kelas'] == $cIdKelas)echo "selected"; ?>>

 						<?=$vaData['nama_kelas']?> - <?=$vaData['nama_jenjang']?>

 					</option>

 				<?php } ?>	

 			</select>

	      </div>

	     </div>

	     <div class="col-sm-6 ol-xs-12">

	      <div class="form-group">

 			<label>Mapel </label>

 			<select name="cIdMapel" id="cIdMapel" 

 			class="form-control 4IDE-Combobox" placeholder="Mapel">

 				<option></option>

 				<?php foreach ($mapel as $key => $vaData) { ?>

 					<option value="<?=$vaData['id_mapel']?>" <?php if($vaData['id_mapel'] == $cIdMapel)echo "selected"; ?>>

 						<?=$vaData['nama_mapel']?>

 					</option>

 				<?php } ?>	

 			</select>

	      </div>

	     </div>

	     <!-- <div class="col-sm-6 ol-xs-12">

	      <div class="form-group">

 			<label>Tanggal </label> -->

 			<input type="hidden" name="dTgl"  class="form-control 4IDE-Date" 

 			 value="<?=$dTgl?>" data-date-format="DD-MM-YYYY" disabled>

	      <!-- </div>

	     </div>

	     <div class="col-sm-6 ol-xs-12">

	      <div class="form-group">

 			<label>Jam </label> -->

 			<input type="hidden" name="cJam"  class="form-control 4IDe-Time" 

 			 value="<?=$cWaktu?>" disabled>

	      <!-- </div>

	     </div> -->

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

 			<label>Link </label>

 			<input type="text" name="cLink" id="cLink" class="form-control" 

 			placeholder="Link Youtube" value="<?=$cLink?>">

	      </div>

	     </div>	

	     <div class="col-sm-12 col-xs-12">

	      <div class="form-group">

 			<label>Deskripsi</label>

 			<textarea name="cIsi" id="" class="4IDE-Editor" placeholder="Deskripsi"><?=$cIsi?></textarea>

	      </div>

	     </div>

	    <!--  <div class="col-sm-6 col-xs-12">

	      <div class="form-group">

 			<label>Status Posting</label> -->

 			<input type="hidden" name="cStatus" id="cStatus" class="form-control" 

 			placeholder="Status" value="<?=$cStatus?>">

	      <!-- </div>

	     </div>

	      <div class="col-sm-6 col-xs-12">

	      <div class="form-group">

 			<label>Posting By</label> -->

 			<input type="hidden" name="cAktor" id="cAktor" class="form-control" 

 			placeholder="Aktor" value="<?=$cAktor?>">

	      <!-- </div>

	     </div> -->

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

		window.location.href='<?=base_url()?>Administrator/Master/pembelajaran/edit/'+id; 

	}



	function HapusData(id){

		bootbox.confirm("Apakah Yakin Hapus Data ?", function(result) {

	          if(result) {

	            $.ajax({

	                type: "GET",  

	                url: "<?=site_url('Administrator/Master_Act/pembelajaran/hapus')?>/"+id,

	                cache: false,

	                success:function(msg){

	                  $.gritter.add({

	                        title: 'Notifikasi Sukses',

	                        text:  'Data Sukses Dihapus',

	                        class_name: 'gritter-danger gritter-center' 

	                    });

	                  setTimeout(function() { window.location = '<?=base_url()?>Administrator/Master/pembelajaran' },2000);

	                }

	            });

	          }

	        });	

	}

</script>

 
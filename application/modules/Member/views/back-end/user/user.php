<?php 

	if($action == 'edit') {

		 foreach ($field as $column) {

		 	$cIdUser		=	$column['id_user']	;

		 	$dTglRegister 	=	String2Date($column['tgl_register']) ;

		 	$cNama 			=	$column['nama']	;

		 	$cAsalSekolah 	=	$column['asal_sekolah']	;

		 	$cUsername		=	$column['username']	;

		 	$cPassword		=	"" ;

		 	$cLevel 		=	$column['level']	;		

		 }

		 	$cIconButton    =   "fa fa-refresh"    ;

            $cValueButton   =   "Update Data" ; 

		 	$cAction 		=   "UpdateData('$cIdUser')" ;

	}else{

			

			$cIdUser		=	""	;

		 	$dTglRegister 	=	""  ;

		 	$cNama 			=	""	;
		 	$cAsalSekolah 	=	""	;

		 	$cUsername		=	""	;

		 	$cPassword		=	""  ;

		 	$cLevel 		=	""  ;

			$cIconButton    =   "fa fa-save"    ;

            $cValueButton   =   "Save Data" ;

            $cAction        =   "SaveData()" ; 	

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

	  	<table style="width:100%" id="4IDE-Datatable" class="table table-striped table-bordered table-hover">

		 <thead>

			<tr>

				<th>No</th>

				<th>Tanggal</th>

				<th>Nama</th>

				<th>Sekolah</th>

				<th>Username</th>

				<th>Level</th>

				<th>Action</th>

			</tr>

		</thead>

		<tbody>

		   <?php $no =  0 ; foreach ($row as $key => $vaUser) { ?>

			<tr>

				<td><?=++$no?></td>

				<td><?=String2Date($vaUser['tgl_register'])?></td>

				<td><?=$vaUser['nama']?></td>
				<td><?=$vaUser['asal_sekolah']?></td>
				<td><?=$vaUser['username']?></td>

				<td><?=$vaUser['level']?></td>

				<td width="10%" align="center">

					<div class="hidden-sm hidden-xs action-buttons">

						<button class="btn btn-xs btn-primary" 

						onclick="return EditData('<?=$vaUser['id_user']?>');">

							<i class="ace-icon fa fa-pencil bigger-100"></i>

						</button>

						<button class="btn btn-xs btn-danger"

						onclick="return HapusData('<?=$vaUser['id_user']?>');">

							<i class="ace-icon fa fa-trash-o bigger-100"></i>

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

	 <form role="form" data-toggle="validator" id="User"> 

	  <div class="widget-main">

	    <div class="row">

	     <div class="col-sm-4">

	      <div class="form-group">

 			<label>Tanggal Register </label>

 			<input type="text" name="dTglRegister" id="dTglRegister" value="<?=$dTglRegister?>"

 			class="form-control 4IDE-Date" data-date-format="DD-MM-YYYY">

	      </div>

	     </div>	

	     <div class="col-sm-4">

	      <div class="form-group">

 			<label>Nama Lengkap </label>

 			<input type="text" name="cNama" id="cNama" value="<?=$cNama?>"

 			class="form-control" placeholder="Nama Lengkap">

	      </div>

	     </div>
	     <div class="col-sm-4">

	      <div class="form-group">

 			<label>Asal Sekolah </label>

 			<input type="text" name="cAsalSekolah" id="cAsalSekolah" value="<?=$cAsalSekolah?>"

 			class="form-control" placeholder="Asal Sekolah">

	      </div>

	     </div>

	     <div class="col-sm-4">

	      <div class="form-group">

 			<label>Username </label>

 			<input type="text" name="cUser" id="cUser" value="<?=$cUsername?>"

 			class="form-control" placeholder="Username">

	      </div>

	     </div>		

	     <div class="col-sm-4">

	      <div class="form-group">

 			<label>Password </label>

 			<input type="password" name="cPassword" id="cPassword" value="<?=$cPassword?>"

 			class="form-control" placeholder="Password">

	      </div>

	     </div>

	      <div class="col-sm-4">

	      <div class="form-group">

 			<label>Level </label>

 			<select name="cLevel" id="cLevel" 

 			class="form-control 4IDE-Combobox" placeholder="Level">

 				<option></option>

 					<option value="1">Administrator</option>

 					<option value="2">Member</option>

 			</select>

	      </div>

	     </div>

	    

	     </div>

	    <div class="row">

	     <div class="col-xs-12 col-sm-6 widget-container-col"><br/>

    		<button type="button" id="act" onclick="return <?=$cAction?>;" 

    		class="btn btn-primary btn-flat"><i class="<?=$cIconButton?>"></i> 

    		<?=$cValueButton?>

    		</button> 

   		 </div>

	    </div>

	  </div>

	</div>

  </div>

  </div><!-- /.span --> 

<!--   <div class="col-xs-12 col-sm-3 widget-container-col">

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

	   	<p>Form Member Adalah List Member Yang Terdaftar Dalam Database</p>

	   	<hr/>

	   	2018 © Sugih Mukti

	   </div>

	 </div>

    </div>

   </div> -->
   <!-- /.span -->  

   <div id="result_foto"></div>

 

 </div>



 

 <script type="text/javascript">



	 function validator(){

	 $('#User').bootstrapValidator({

//        live: 'disabled',

        message: 'This value is not valid',

        feedbackIcons: {

            valid: 'fa fa-check',

            invalid: 'fa fa-times',

            validating: 'fa fa-refresh'

        },

        fields: {

            cNama: {

                validators: {

                    notEmpty: {

                        message: 'Nama Masih Kosong'

                    }

                }

            },
            cAsalSekolah: {

                validators: {

                    notEmpty: {

                        message: 'Asal Sekolah Kosong'

                    }

                }

            },

            cUser: {

                validators: {

                    notEmpty: {

                        message: 'Username Masih Kosong'

                    }

                }

            },

            cLevel: {

                validators: {

                    notEmpty: {

                        message: 'Level Masih Kosong'

                    }

                }

            },

            <?php if($action != 'edit'){ ?>

            cPassword: {

                validators: {

                    notEmpty: {

                        message: 'Password Masih Kosong'

                    }

                }

            },

           <?php } ?> 

           

         }

     });

      $('#User').bootstrapValidator('validate', function(e){})

	 

	 }



 	function SaveData(){

 	 

 	var dTglRegister 	=	$('#dTglRegister').val() ;

 	var cNama 			=	$('#cNama').val() ;
 	var cAsalSekolah 	=	$('#cAsalSekolah').val() ;

 	var cUsername		=	$('#cUser').val() ;

 	var cPassword   	=   $('#cPassword').val() ;

 	var cLevel 			=	$('#cLevel').val() ; 		



	 if(validator()){	

		return false ;

       } else {	

       	if(cNama ==  "" || cAsalSekolah ==  "" || cUsername == "" || cLevel == ""){

       	 	return false ; 

       	}else{

	       bootbox.confirm("Apakah Yakin Simpan Data ?", function(result) {

	          if(result) {

	            $.ajax({

	                type: "POST",

	                data  :"tanggal_register="+dTglRegister+

	                	   "&nama="+cNama+
	                	   "&asal_sekolah="+cAsalSekolah+

	                	   "&username="+cUsername+

	                	   "&password="+cPassword+

	                	   "&level="+cLevel,  

	                url: "<?=site_url('Administrator/User_Act/user/simpan')?>",

	                cache: false,

	                success:function(msg){

	                  $.gritter.add({

	                        title: 'Notifikasi Sukses',

	                        text:  'Data ' +cNama+ ' Sukses Ditambahkan',

	                        class_name: 'gritter-info gritter-center' 

	                    });

	                  setTimeout(function() { location.reload() },2000);

	                }

	            });

	          }

	        });	

	     }   

      } 	

	};



	function EditData(id){

		window.location.href='<?=base_url()?>Administrator/user/username/edit/'+id; 

	}



	function UpdateData(id){

	var dTglRegister 	=	$('#dTglRegister').val() ;

 	var cNama 			=	$('#cNama').val() ;
 	var cAsalSekolah 	=	$('#cAsalSekolah').val() ;

 	var cUsername		=	$('#cUser').val() ;

 	var cPassword   	=   $('#cPassword').val() ;

 	var cLevel 			=	$('#cLevel').val() ; 		



	 if(validator()){	

		return false ;

       } else {	

       	if(cNama ==  "" || cAsalSekolah ==  "" || cUsername == "" || cLevel == ""){

       	 	return false ; 

       	}else{

	       bootbox.confirm("Apakah Yakin Simpan Data ?", function(result) {

	          if(result) {

	            $.ajax({

	                type: "POST",

	                data  :"tanggal_register="+dTglRegister+

	                	   "&nama="+cNama+
	                	   "&asal_sekolah="+cAsalSekolah+

	                	   "&username="+cUsername+

	                	   "&password="+cPassword+

	                	   "&level="+cLevel,   

	                url: "<?=site_url('Administrator/User_Act/user/ubah')?>/"+id,

	                cache: false,

	                success:function(msg){

	                  $.gritter.add({

	                        title: 'Notifikasi Sukses',

	                        text:  'Data ' +cNama+ ' Sukses Diupdate',

	                        class_name: 'gritter-success gritter-center' 

	                    });

	                  setTimeout(function() { window.location = '<?=base_url()?>Administrator/user/username' },2000);

	                }

	            });

	          }

	        });	

	     }   

      } 	

	};



	function HapusData(id){

		bootbox.confirm("Apakah Yakin Hapus Data ?", function(result) {

	          if(result) {

	            $.ajax({

	                type: "GET",  

	                url: "<?=site_url('Administrator/User_Act/user/hapus')?>/"+id,

	                cache: false,

	                success:function(msg){

	                  $.gritter.add({

	                        title: 'Notifikasi Sukses',

	                        text:  'Data Sukses Dihapus',

	                        class_name: 'gritter-danger gritter-center' 

	                    });

	                  setTimeout(function() { window.location = '<?=base_url()?>Administrator/user/username' },2000);

	                }

	            });

	          }

	        });	

	}



 </script>



	


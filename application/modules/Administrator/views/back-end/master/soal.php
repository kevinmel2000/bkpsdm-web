<?php 
if($action == 'edit') {
	foreach ($field as $column) {
		$cIdSoal		=	$column['id']			;
		$cIdKelas		=	$column['id_kelas']		;
		$cIdMapel		=	$column['id_mapel']		;
		$cSoal			=	$column['soal']			;
		$cA 			=	$column['a']			;
		$cB 			=	$column['b']			;
		$cC 			=	$column['c']			;
		$cD 			=	$column['d']			;
		$cJawaban 		=	$column['jawaban']		;
		$cGambar	 	=	$column['gambar']		;
	}
	$cIconButton    =   "fa fa-refresh"    ;
	$cValueButton   =   "Update Data" ; 
	$cAction 		=   "UpdateData('$cIdSoal')" ;
}else{

	$cIdSoal			=	""		;
	$cIdKelas			=	""		;
	$cIdMapel			=	""		;
	$cSoal				=	""		;
	$cA					=	""		;
	$cB 				=	""		;
	$cC 				=	""		;
	$cD					=	""		;
	$cJawaban			=	""		;
	$cGambar			=	""		;
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
					<table style="width: 100%" id="4IDE-Datatable" class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Kelas</th>
								<th>Soal</th>
								<th>A</th>
								<th>B</th>
								<th>C</th>
								<th>D</th>
								<th>Jawab</th>
<!-- 								<th>Gambar</th> -->
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $no =  0 ; foreach ($row as $key => $vaData) { ?>
								<tr>
									<td><?=++$no?></td>
									<td><?=$vaData['nama_kelas'] - $vaData['nama_jenjang']?></td>
									<td><?=$vaData['soal']?></td>
									<td><?=$vaData['a']?></td>
									<td><?=$vaData['b']?></td>
									<td><?=$vaData['c']?></td>
									<td><?=$vaData['d']?></td>
									<?php if($vaData['jawaban']=='1'){
										$Jwb='A';
									} else if ($vaData['jawaban']==2){
										$Jwb='B';
									} elseif ($vaData['jawaban']==3){
										$Jwb='C';
									} elseif ($vaData['jawaban']==4){
										$Jwb='D';
									}?>
									<td><?=$Jwb?></td>
									<!-- <td><a href="<?=base_url().$vaData['gambar']?>" class="4IDE-Gallery">
										Lihat Foto
									</a></td> -->
									<td width="10%" align="center">
										<div class="hidden-sm hidden-xs action-buttons">
											<button class="btn btn-xs btn-primary" 
											onclick="return EditData('<?=$vaData['id']?>');">
											<i class="ace-icon fa fa-pencil bigger-100"></i>
										</button>
										<button class="btn btn-xs btn-danger"
										onclick="return HapusData('<?=$vaData['id']?>');">
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
	<div class="widget-box widget-color-red2">
		<div class="widget-header">
			<h5 class="widget-title bigger lighter">
				<i class="ace-icon fa fa-table"></i>
				Input <?=$file?>
			</h5>
			<div class="widget-toolbar widget-toolbar-light no-border"></div>
		</div>
		<div class="widget-body">
			<form role="form" data-toggle="validator" id="Outlet">
				<div class="widget-main">
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label>Kelas</label>
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

					<div class="col-sm-12">
						<div class="form-group">
							<label>Soal</label>
							<textarea name="cSoal" id="cSoal" class="form-control" placeholder="Soal"><?=$cSoal?></textarea>
						</div>
					</div>

					<div class="col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Foto / Gambar (500 x 500)</label>
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

					<div class="col-sm-12">
						<div class="form-group">
							<label>Jawaban A</label>
							<textarea name="cA" id="cA" class="form-control" placeholder="Jawaban A"><?=$cA?></textarea>
						</div>
					</div>

					<div class="col-sm-12">
						<div class="form-group">
							<label>Jawaban B</label>
							<textarea name="cB" id="cB" class="form-control" placeholder="Jawaban B"><?=$cB?></textarea>
						</div>
					</div>

					<div class="col-sm-12">
						<div class="form-group">
							<label>Jawaban C</label>
							<textarea name="cC" id="cC" class="form-control" placeholder="Jawaban C"><?=$cC?></textarea>
						</div>
					</div>

					<div class="col-sm-12">
						<div class="form-group">
							<label>Jawaban D</label>
							<textarea name="cD" id="cD" class="form-control" placeholder="Jawaban D"><?=$cD?></textarea>
						</div>
					</div>

					<div class="col-sm-4">
						<div class="form-group">
							<div class="form-group">
								<label>Jawaban</label>
								<select name="cJawaban" id="cJawaban" class="form-control 4IDE-Combobox">
									<option value="">Pilih Jawaban</option>
									<option value="1" <?php if($cJawaban == '1')echo "selected"; ?>>A</option>	
									<option value="2" <?php if($cJawaban == '2')echo "selected"; ?>>B</option>	
									<option value="3" <?php if($cJawaban == '3')echo "selected"; ?>>C</option>		
									<option value="4" <?php if($cJawaban == '4')echo "selected"; ?>>D</option>	
								</select>
							</div>
						</div>
					</div>

					<div class="col-xs-12 col-sm-12 widget-container-col"><br/>
						<button type="button" id="act" onclick="return <?=$cAction?>;" 
							class="btn btn-primary btn-flat"><i class="<?=$cIconButton?>"></i> 
							<?=$cValueButton?>
						</button> 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</form>
</div>




<script type="text/javascript">

	function validator(){
		$('#Outlet').bootstrapValidator({
//        live: 'disabled',
message: 'This value is not valid',
feedbackIcons: {
	valid: 'fa fa-check',
	invalid: 'fa fa-times',
	validating: 'fa fa-refresh'
},
fields: {
	cIdKelas: {
		validators: {
			notEmpty: {
				message: 'Kelas Masih Kosong'
			}
		}
	},
	cSoal: {
		validators: {
			notEmpty: {
				message: 'Soal Masih Kosong'
			}
		}
	},
	cA: {
		validators: {
			notEmpty: {
				message: 'Pilihan A Masih Kosong'
			}
		}
	},
	cB: {
		validators: {
			notEmpty: {
				message: 'Pilihan B Masih Kosong'
			}
		}
	},
	cC: {
		validators: {
			notEmpty: {
				message: 'Pilihan C Masih Kosong'
			}
		}
	},
	cD: {
		validators: {
			notEmpty: {
				message: 'Pilihan D Masih Kosong'
			}
		}
	},
	cJawaban: {
		validators: {
			notEmpty: {
				message: 'Jawaban Masih Kosong'
			}
		}
	}
}
});
		$('#Outlet').bootstrapValidator('validate', function(e){})

	}

	function uploadFoto(){
		var file = new FormData();
		file.append('file',$('#4IDE-File')[0].files[0]);

		$.ajax({
			url: "<?=site_url('Administrator/Master_Act/upload_foto_soal/')?>",
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
	
	function SaveData(){
		var cIdKelas           	= $('#cIdKelas').val();
		var cSoal 					= $('#cSoal').val();
		var cA 					= $('#cA').val();
		var cB 					= $('#cB').val();
		var cC 					= $('#cC').val();
		var cD 					= $('#cD').val();
		var cJawaban 				= $('#cJawaban').val();
		var cGambar 				= $('#cFotoFix').val();

		if(validator()){	
			return false ;
		} else {	
			if(cIdKelas == "" || cSoal == "" || cA == "" || cB == "" || cC == "" || cD == "" || cJawaban == ""){
				return false ; 
			}else{
				bootbox.confirm("Apakah Yakin Simpan Data ?", function(result) {
					if(result) {
						$.ajax({
							type: "POST",
							data  :"cIdKelas="+cIdKelas+
							"&cSoal="+cSoal+
							"&cA="+cA+
							"&cB="+cB+
							"&cC="+cC+
							"&cD="+cD+
							"&cJawaban="+cJawaban+
							"&gambar="+cGambar,  
							url: "<?=site_url('Administrator/Master_Act/soal/simpan')?>",
							cache: false,
							success:function(msg){
								$.gritter.add({
									title: 'Notifikasi Sukses',
									text:  'Data Sukses Ditambahkan',
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
		window.location.href='<?=base_url()?>Administrator/Master/soal/edit/'+id; 
	}

	function UpdateData(id){
		var cIdKelas           	= $('#cIdKelas').val();
		var cSoal 					= $('#cSoal').val();
		var cA 					= $('#cA').val();
		var cB 					= $('#cB').val();
		var cC 					= $('#cC').val();
		var cD 					= $('#cD').val();
		var cJawaban 				= $('#cJawaban').val();
		var cGambar 				= $('#cFotoFix').val();

		if(validator()){	
			return false ;
		} else {	
			if(cIdKelas == "" || cSoal == "" || cA == "" || cB == "" || cC == "" || cD == "" || cJawaban == ""){
				return false ; 
			}else{
				bootbox.confirm("Apakah Yakin Simpan Data ?", function(result) {
					if(result) {
						$.ajax({
							type: "POST",
							data  :"cIdKelas="+cIdKelas+
							"&cSoal="+cSoal+
							"&cA="+cA+
							"&cB="+cB+
							"&cC="+cC+
							"&cD="+cD+
							"&cJawaban="+cJawaban+
							"&gambar="+cGambar,
							url: "<?=site_url('Administrator/Master_Act/soal/ubah')?>/"+id,
							cache: false,
							success:function(msg){
								$.gritter.add({
									title: 'Notifikasi Sukses',
									text:  'Data Sukses Diupdate',
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

	function HapusData(id){
		bootbox.confirm("Apakah Yakin Hapus Data ?", function(result) {
			if(result) {
				$.ajax({
					type: "GET",  
					url: "<?=site_url('Administrator/Master_Act/soal/hapus')?>/"+id,
					cache: false,
					success:function(msg){
						$.gritter.add({
							title: 'Notifikasi Sukses',
							text:  'Data Sukses Dihapus',
							class_name: 'gritter-danger gritter-center' 
						});
						s setTimeout(function() { location.reload() },2000);
					}
				});
			}
		});	
	}

</script>



<?php 
  if($action == 'edit') {
     foreach ($field as $column) {
        $cIdKategori  =   $column['id_kategori'];
        $cIdMenu      =   $column['id_menu'];
        $cNama        =   $column['nama_kategori']; 
        $cHeadline    =   $column['headline']   ;
        $cGambar      =   $column['gambar']   ;
     }
      $cIconButton    =   "fa fa-refresh"    ;
      $cValueButton   =   "Update Data" ; 
      $cAction        =   "UpdateData('$cIdKategori')" ;
  }else{
      $cIdKategori    =   "" ;
      $cIdMenu        =   "4" ;
      $cNama          =   "" ;
      $cHeadline      =   "" ;
      $cGambar        =   "" ;
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
    Data Kategori Produk
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
      <div id="data-umum" style="width: 100%">
      <table id="4IDE-Datatable" class="table table-responsive table-striped table-bordered table-hover" width="100%">
     <thead>
      <tr>
        <th>No</th>
        
        <th>Kategori Produk</th>
        <th>Headline</th>
        <th>Gambar</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 0; foreach ($row as $key => $vaData){?>
      <tr>
        <td style="width:5%"><?=++$no?></td>
        
        <td style=""><?=$vaData['nama_kategori']?></td>
        <td><?=substr($vaData['headline'],0,50)?>[...]</td>
        <td><a href="<?=base_url().$vaData['gambar']?>" class="4IDE-Gallery">
          Lihat Gambar
        </a></td>
        <td style="width:10%">
          <button class="btn btn-xs btn-primary" 
            onclick="return EditData('<?=$vaData['id_kategori']?>');">
             <i class="ace-icon fa fa-pencil bigger-120"></i>
          </button>
          <button class="btn btn-xs btn-warning" 
            onclick="return HapusData('<?=$vaData['id_kategori']?>');">
             <i class="ace-icon fa fa-times bigger-120"></i>
          </button>        </td>
      </tr>
      <?php } ?>
    </tbody>
    </table>
    </div>
    </div>
   </div>
    </div>
    <hr/>
  </div><!-- /.span --> 
  <form  data-toggle="validator" id="travel-package">
  <div class="col-xs-12 col-sm-12 widget-container-col">
   <div class="widget-box widget-color-orange">
    <div class="widget-header">
    <h5 class="widget-title bigger lighter">
    <i class="ace-icon fa fa-table"></i>
    Input Kategori Produk
    </h5>
    <div class="widget-toolbar widget-toolbar-light no-border"></div>
  </div>
  <div class="widget-body"> 
    <div class="widget-main">
      <div class="row">
       <div class="col-sm-12 col-xs-12">
        <div class="form-group">
          <input type="hidden" name="cIdMenu" id="cIdMenu" class="form-control" placeholder="Nama Menu" value="<?=$cIdMenu?>"> 



        <label>Kategori Produk</label>
         <input type="text" name="cNama" id="cNama" class="form-control" placeholder="Kategori Produk" value="<?=$cNama?>"> 
        </select>
        </div>
       </div>
         <div class="col-sm-12 col-xs-12">
        <div class="form-group">
      <label>Keterangan</label>
      <textarea name="cHeadline" id="cHeadline" class="form-control" rows="4"><?=$cHeadline?></textarea>
        </div>
       </div>
  
       <div class="col-sm-6 col-xs-6">
        <div class="form-group">
          <label>Foto / Gambar </label>
      <input type="file" id="4IDE-File" name="cGambar" class="form-control" 
      onchange="return uploadFoto();" />
        </div>
       </div>
       <div class="col-sm-6 col-xs-6">
        <div class="form-group">
          <label>Preview Foto / Gambar </label>
      <div id="result_foto"></div>
        <?php if($action == 'edit'){ ?>
          <input type="hidden" name="cFotoFix" id="cFotoFix" value="<?=$cGambar?>">
          <?php } ?>
        </div>
       </div>

  

       <div class="col-sm-12">
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
   
   </form>
 </div>
  
  <script type="text/javascript">


  function validator(){
   $('#travel-package').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'
        },
        fields: {
            cIdMenu: {
                validators: {
                    notEmpty: {
                        message: 'Nama Menu Belum Dipilih...'
                    }
                }
            },
            cNama: {
                validators: {
                    notEmpty: {
                        message: 'Kategori Produk Kosong...'
                    }
                }
            },
            cHeadline: {
                validators: {
                    notEmpty: {
                        message: 'Keterangan Kosong...'
                    }
                }
            }
         }
     });
      $('#travel-package').bootstrapValidator('validate', function(e){})
  }

     function uploadFoto(){
       var file = new FormData();
       file.append('file',$('#4IDE-File')[0].files[0]);
       
       $.ajax({
        url: "<?=site_url('Administrator/Master_Act/upload_foto_kategori/')?>",
        type: "POST",
        data: file,
        processData: false,
        contentType: false, 
         beforeSend:function(){
          $("#result_foto").html("<div align='center'><img  width='150' height=150' src='<?=base_url()?>assets/img/hex-loader2.gif'/></div>");
          }, 
         success:function(data){
          $("#result_foto").html(data);
          }
      });
    }



  function SaveData(){
   
    var cIdMenu      = $('#cIdMenu').val();
    var cNama        = $('#cNama').val();
    var cGambar       = $('#cFotoFix').val();
    var cHeadline     = $('#cHeadline').val();
  

   if(validator()){ 
    return false ;
    } else { 
        if(cNama == "" || cIdMenu == "" || cHeadline == "") {
          return false ; 
        }else{
         bootbox.confirm("Apakah Yakin Simpan Data ?", function(result) {
            if(result) {
              $.ajax({
                  type: "POST",
                  data:"id_menu="+cIdMenu+
                       "&name="+cNama+
                       "&headline="+cHeadline+
                       "&gambar="+cGambar,
                  url: "<?=site_url('Administrator/Master_Act/kategori/simpan')?>",
                  cache: false,
                  success:function(msg){
                    $.gritter.add({
                          title: 'Notifikasi Sukses',
                          text:  'Data Sukses Ditambahkan',
                          class_name: 'gritter-info gritter-center' ,
                          time:1000
                      });
                    setTimeout(function() { window.location = '<?=base_url()?>Administrator/master/kategori/' },2000);
                    
                  }
              });
            }
          }); 
       }   
      }   
  };

  function UpdateData(id){
   
    var cIdMenu      = $('#cIdMenu').val();
    var cNama        = $('#cNama').val();
    var cGambar       = $('#cFotoFix').val();
    var cHeadline       = $('#cHeadline').val();
  

   if(validator()){ 
    return false ;
    } else { 
        if(cNama == "" || cIdMenu == "" || cHeadline == "") {
          return false ; 
        }else{
         bootbox.confirm("Apakah Yakin Simpan Data ?", function(result) {
            if(result) {
              $.ajax({
                  type: "POST",
                  data:"id_menu="+cIdMenu+
                       "&name="+cNama+
                       "&headline="+cHeadline+
                       "&gambar="+cGambar,
                   url: "<?=site_url('Administrator/Master_Act/kategori/ubah')?>/"+id,
                  cache: false,
                  success:function(msg){
                    $.gritter.add({
                          title: 'Notifikasi Sukses',
                          text:  'Data Sukses Diupdate',
                          class_name: 'gritter-success gritter-center' 
                      });
                    setTimeout(function() { window.location = '<?=base_url()?>Administrator/master/kategori/' },2000);
                  }
              });
            }
          }); 
       }   
      }   
  };

  function EditData(id){
    window.location.href='<?=base_url()?>Administrator/master/kategori/edit/'+id; 
  }

  function HapusData(id){
    bootbox.confirm("Apakah Yakin Hapus Data ?", function(result) {
            if(result) {
              $.ajax({
                  type: "GET",  
                  url: "<?=site_url('Administrator/Master_Act/kategori/hapus')?>/"+id,
                  cache: false,
                  success:function(msg){
                    $.gritter.add({
                          title: 'Notifikasi Sukses',
                          text:  'Data Sukses Dihapus',
                          class_name: 'gritter-danger gritter-center' 
                      });
                    setTimeout(function() { window.location = '<?=base_url()?>Administrator/master/kategori' },2000);
                  }
              });
            }
          }); 
  }
</script>
 
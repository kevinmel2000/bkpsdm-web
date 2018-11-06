<?php 
  if($action == 'edit') {
     foreach ($field as $column) {
      
      $cIdSosmed      =   $column['id'];
      $cSosmed        =   $column['sosmed'];
      $cIcon          =   $column['icon'];
      $cLink          =   $column['link'];

     }
      $cIconButton    =   "fa fa-refresh"    ;
      $cValueButton   =   "Update Data" ; 
      $cAction        =   "ubah/".$cIdSosmed."" ;
  }else{
      $cIdSosmed      =   "" ;
      $cSosmed        =   "" ;
      $cIcon          =   "" ;
      $cLink          =   "" ;
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
    Data Sosial Media
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
        <th>Akun Sosmed</th>
        <th>Icon</th>
        <th>Link</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 0; foreach ($row as $key => $vaData){?>
      <tr>
        <td style="width:5%"><?=++$no?></td>
        <td style="width:20%"><?=$vaData['sosmed']?></td>
        <td style="width:10%"><span class="<?=($vaData['icon'])?>"></span> </td>
        <td style="width:55%"><?=$vaData['link']?></td>
        <td>
          <button class="btn btn-xs btn-primary" 
            onclick="return EditData('<?=$vaData['id']?>');">
             <i class="ace-icon fa fa-pencil bigger-120"></i>
          </button>
          <button class="btn btn-xs btn-warning"
              onclick="return HapusData('<?=$vaData['id']?>');">
              <i class="ace-icon fa fa-trash-o bigger-120"></i>
          </button>
        </td>
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
  <form  data-toggle="validator" id="travel-package" method="post"
  enctype="multipart/form-data" action="<?=site_url('Administrator/Gallery/sosmed_act/'.$cAction.'')?>">
  <div class="col-xs-12 col-sm-12 widget-container-col">
   <div class="widget-box widget-color-orange">
    <div class="widget-header">
    <h5 class="widget-title bigger lighter">
    <i class="ace-icon fa fa-table"></i>
    Input Data Sosial Media
    </h5>
    <div class="widget-toolbar widget-toolbar-light no-border"></div>
  </div>
  <div class="widget-body"> 
    <div class="widget-main">
      <div class="row">
       <div class="col-sm-12 ol-xs-12">
        <div class="form-group">
          <label>Sosmed</label>
          <input type="text" name="cSosmed" class="form-control" value="<?=$cSosmed?>" placeholder="Sosial Media">
        </div>
       </div>
       <div class="col-sm-12 ol-xs-12">
        <div class="form-group">
        <label>Link </label>
        <input type="text" name="cLink" class="form-control" value="<?=$cLink?>" placeholder="Link Sosmed">
        </div>
       </div>
       <div class="col-sm-12">
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
            cJudul: {
                validators: {
                    notEmpty: {
                        message: 'Kategori Belum Dipilih...'
                    }
                }
            }
            
         }
     });
      $('#travel-package').bootstrapValidator('validate', function(e){})
  }



  function EditData(id){
    window.location.href='<?=base_url()?>Administrator/Gallery/sosial_media/edit/'+id; 
  }

  function HapusData(id){
    bootbox.confirm("Apakah Yakin Hapus Data ?", function(result) {
            if(result) {
              $.ajax({
                  type: "GET",  
                  url: "<?=site_url('Administrator/Gallery/sosmed_act/hapus')?>/"+id,
                  cache: false,
                  success:function(msg){
                    $.gritter.add({
                          title: 'Notifikasi Sukses',
                          text:  'Data Sukses Dihapus',
                          class_name: 'gritter-danger gritter-center' 
                      });
                    setTimeout(function() { window.location = '<?=base_url()?>Administrator/gallery/sosial_media' },2000);
                  }
              });
            }
          }); 
  }
</script>
 
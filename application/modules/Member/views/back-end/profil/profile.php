<?php 
  foreach ($row as $key => $vaData) {
    $cDeskripsi = $vaData['deskripsi'];
  }
  $cId = 2;
  $cJudul = "Profile";
  $cLink  = "profile";
?>
<div class="row"> 
  <form  data-toggle="validator" id="travel-package" method="post" 
  enctype="multipart/form-data" action="<?=site_url('Administrator/Profil_Act/text/'.$cId.'')?>">
  <div class="col-xs-12 col-sm-12 widget-container-col">
   <div class="widget-box widget-color-orange">
    <div class="widget-header">
    <h5 class="widget-title bigger lighter">
    <i class="ace-icon fa fa-table"></i>
    Data <?=$cJudul?>
    </h5>
    <div class="widget-toolbar widget-toolbar-light no-border"></div>
  </div>
  <div class="widget-body"> 
    <div class="widget-main">
      <div class="row">
       <div class="col-sm-12 ol-xs-12">
        <div class="form-group">
          <input type="hidden" name="link" value="<?=$cLink?>">
          <textarea id="cDeskripsiNoJs" class="4IDE-Editor" name="cText"><?=$cDeskripsi?></textarea>
        </div>
       </div>
       <div class="col-sm-12">
        <button type="submit" id="act" 
        class="btn btn-primary btn-flat"><i class="fa fa-edit"></i> 
        Edit Data
        </button>
        <br/>
        <br/>
      </div>
      </div>
    </div>
  </div>
  </div>
  </div><!-- /.span --> 
   
   </form>
 </div>
  
  
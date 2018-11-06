 <style type="text/css">
 @media (max-width: 767px) {
    .blog{
        margin-top: 1%;
    }
}
@media (min-width: 768px) {
    .blog {
        margin-top: -4%;
    }
</style>
<div class="content-wrapper">
    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <!-- Main content starts -->
        <div>
            <!-- Header Starts -->
            <div class="row">
                <div class="col-sm-12 col-xs-12 p-0">
                    <div class="main-header">
                        <h4>Modul</h4>
                        <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                            <li class="breadcrumb-item">
                                <a href="<?=site_url('Front/Halaman/index')?>">
                                    <i class="icofont icofont-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="<?=site_url('Front/Halaman/pembelajaran')?>">Modul <?=$judul?></a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- Header end -->
            <div class="row">
                <div class="col-sm-12 col-xs-12 p-0">
                    <div class="box box-primary">
                        <div class="ibox-content">
                         <div class="panel panel-success">
                          <div class="panel-heading">
                           <!--  PILIH KELAS -->
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form method="post" action="<?=base_url()?>/Front/Halaman/<?=$apa?>/cari/">

                                    <div class="col-sm-3 col-xs-12" style="margin-left:1%"> 
                                        <div class="form-group">  
                                          <select class="form-control comboBox" name="cKelas" style="width:100%">
                                              <?php if(empty($kelasmu)){?>
                                                <option value=""> PILIH KELAS</option>
                                                <?php 
                                            }else{
                                                $kelasini = $this->model->ViewWhere('v_kelas','id_kelas',$kelasmu);
                                                foreach ($kelasini as $key => $vaIni) {
                                                    ?>
                                                    <option value="<?=$vaIni['id_kelas']?>"> <?=$vaIni['nama_kelas']?> - <?=$vaIni['nama_jenjang']?></option>
                                                <?php } }  ?>
                                                <?php 
                                                foreach ($kelas as $key => $vaKelas) {
                                                  ?>
                                                  <option value="<?=$vaKelas['id_kelas']?>"><?=$vaKelas['nama_kelas']?> - <?=$vaKelas['nama_jenjang']?></option>
                                              <?php } ?>
                                          </select>  
                                      </div>
                                  </div>
                                  <div class="col-sm-3 col-xs-12" style="margin-left:1%"> 
                                        <div class="form-group">  
                                          <select class="form-control comboBox" name="cMapel" style="width:100%">
                                              <?php if(empty($mapelmu)){?>
                                                <option value=""> PILIH MAPEL</option>
                                                <?php 
                                            }else{
                                                $mapelini = $this->model->ViewWhere('mapel','id_mapel',$mapelmu);
                                                foreach ($mapelini as $key => $vaIni) {
                                                    ?>
                                                    <option value="<?=$vaIni['id_mapel']?>"> <?=$vaIni['nama_mapel']?></option>
                                                <?php } }  ?>
                                                <?php 
                                                foreach ($mapel as $key => $vaMapel) {
                                                  ?>
                                                  <option value="<?=$vaMapel['id_mapel']?>"><?=$vaMapel['nama_mapel']?></option>
                                              <?php } ?>
                                          </select>  
                                      </div>
                                  </div>
                                  <div class="col-sm-3 col-xs-12" style="margin-left:1%;margin-bottom:1%"> 
                                    <button type="submit" name="cetak"  value="act" class="btn btn-success">
                                     <i class="fa fa-search"></i> 
                                 </button>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
</div>
<div class="row">
   <?php 
   foreach ($row as $key => $vaData) { ?>
    <div class="col-sm-6 col-xs-12">

        <div id="blog" class="blog card">

            <div class="container">

                <div class="card-block">
                 <!-- <ul id="lightgallery" class="m-b-0"> -->

                    <!-- <li class="col-lg-12 col-xl-12 col-md-12 col-xs-12 b-none" data-responsive="<?=$vaData['isi']?>" data-src="<?=$vaData['isi']?>" data-sub-html="<h5><?=$vaData['judul']?></h5><p><?=$vaData['headline']?>.</p>"> -->
                        <a href="<?=site_url('Front/Halaman/blog_detail/'.$vaData['url'].'')?>">
                            <h4><?=$vaData['judul']?></h4>
                            <!-- <img src="<?=base_url().$vaData['gambar']?>" style="height: 100px"> -->
                            <div class="blog-block">

                                <p><?=$vaData['headline']?></p>
                                <div class="read-more">
                                    <h5>
                                        <a href="<?=site_url('Front/Halaman/blog_detail/'.$vaData['url'].'')?>">Lihat Sekarang....</a>
                                    </h5>
                                </div>
                            </div>
                        </a>
                        <!-- </li> -->

                        
                        <!-- </ul> -->
                    </div>
                    <div class="card-footer">
      <small class="text-muted"><?=$vaData['nama_kelas']?> - <?=$vaData['nama_jenjang']?> | <?=$vaData['tanggal']?></small>
    </div>

                </div>

            </div>

        </div>
    <?php } ?>
</div>  
</div>
</div>

<!-- Container-fluid ends -->
</div>

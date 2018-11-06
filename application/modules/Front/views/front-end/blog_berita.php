 <div class="content-wrapper">
    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <!-- Main content starts -->
        <div>
            <br>
            <div class="row">
                <div class="col-sm-12 col-xs-12 p-0">
                    <div class="main-header">
                        <h4>Berita</h4>
                        <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                            <li class="breadcrumb-item">
                                <a href="<?=site_url('Front/Halaman/index')?>">
                                    <i class="icofont icofont-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="<?=site_url('Front/Halaman/berita')?>">Berita</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- Header end -->
                 
                    <div class="row">
                   <?php 
                   foreach ($row as $key => $vaData) { ?>
                    <div class="col-sm-6 col-xs-12" style="margin-top: -7%;">

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
        </div>
    <?php } ?>
</div> 
    </div>
</div>

<!-- Container-fluid ends -->
</div>

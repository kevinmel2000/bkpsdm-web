 <div class="content-wrapper">
    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <!-- Main content starts -->
        <div>
            <!-- Header Starts -->
            <div class="row">
                <div class="col-sm-12 p-0">
                    <div class="main-header">
                        <h4>Tutorial</h4>
                        <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                            <li class="breadcrumb-item">
                                <a href="<?=site_url('Website/Halaman/index')?>">
                                    <i class="icofont icofont-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="<?=site_url('Website/Halaman/tutorial')?>">Tutorial</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- Header end -->

            <div id="blog" class="blog card" style="margin-top: -103px;">
                <div class="container">
                    <div class="card-block">


                       <ul id="lightgallery" class="m-b-0">
                        <?php 
                        foreach ($row as $key => $vaData) {
                            # code...
                        
                        ?>
                        <li class="col-lg-12 col-xl-12 col-md-12 col-xs-12 b-none" data-responsive=""<?=$vaData['isi']?>" data-src="<?=$vaData['isi']?>" data-sub-html="<h5><?=$vaData['judul']?></h5><p><?=$vaData['headline']?>.</p>">
                            <a href="">
                                <h4><?=$vaData['judul']?></h4>
                                <img src="http://www.freeiconspng.com/uploads/video-youtube-icon--14.png" style="height: 30px">
                                <div class="blog-block">

                                    <p><?=$vaData['headline']?></p>
                                    <div class="read-more">
                                        <h5>
                                            <a href="#">Lihat Sekarang....</a>
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <?php } ?>


                    </ul>





                </div>
            </div>
        </div>
    </div>
</div>

<!-- Container-fluid ends -->
</div>

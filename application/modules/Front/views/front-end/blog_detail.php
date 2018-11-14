<div class="content-wrapper">
    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <!-- Main content starts -->
        <div>
            <!-- Row Starts -->
            <div class="row">
                <div class="col-sm-12 p-0">
                    <div class="main-header">
                        <h4>Detail</h4>
                        <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                            <li class="breadcrumb-item">
                                <a href="<?=site_url('Front/Halaman/index')?>">
                                    <i class="icofont icofont-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="<?=site_url('Front/Halaman/berita')?>">Detail <?=$judul?></a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <!--Post blog single start-->
            <div class="card blog-details" style="margin-top: -4%;">
                <div class="container">

                    <div class="card-block">
                        <div class="row">
                            <div class="blog-single">
                                <?php foreach ($blog as $key => $vaData) { ?>

                                <h4 class="m-b-0"><?=$vaData['judul']?></h4>
                                <img style="margin-top: 15px" src="<?=base_url().$vaData['gambar']?>" alt="image-blog" class="img-fluid">
                                
                               
                                    <?=$vaData['isi'];?>

                                    <br>
                                    <div align="center">
                                    
                                     <?php if(!empty($vaData['link_youtube'])){?>
                                            <h4 align="center">LINK VIDEO</h4>
                                            <iframe width="800" height="500" src="<?=$vaData['link_youtube']?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen align="center"></iframe>
                                        <?php } ?>
                                    <div>
                                        
                                <?php } ?>
                            </div>


                        </div>

                        <!--post blog single Ends-->
                        <!-- Related Articles start -->

                    </div>
                </div>
            </div>
        </div>

        <!-- Container-fluid ends -->
    </div>
</div>
<div class="content-wrapper">
    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <!-- Main content starts -->
        <div>
            <!-- Row Starts -->
            <br>
            <div class="row">
                <div class="col-sm-12 col-xs-12 p-0">
                    <div class="main-header">
                        <h4>Profil</h4>
                        <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                            <li class="breadcrumb-item">
                                <a href="<?=site_url('Front/Halaman/index')?>">
                                    <i class="icofont icofont-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="<?=site_url('Front/Halaman/profil')?>">Profil</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <!--Post blog single start-->
            <div class="card blog-details" style="background: white;margin-top: -103px;">
                <div class="container">

                    <div class="card-block">
                        <div class="row">
                            <div class="blog-single">
                                <center><img src="<?=base_url()?>assets/images/profil.jpg" alt="image-blog" class="img-fluid"></center>
                                <h4 class="m-b-0"><!-- PROFIL --></h4>
                                <?php foreach ($row as $key => $vaData) { ?>
                                    <?=$vaData['deskripsi'];?>
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
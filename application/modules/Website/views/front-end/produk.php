<div class="content-wrapper">
    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <!-- Main content starts -->
        <div>
            <!-- Row Starts -->
            <div class="row">
                <div class="col-sm-12 p-0">
                    <div class="main-header">
                        <h4>Produk Jamur</h4>
                        <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                            <li class="breadcrumb-item">
                                <a href="<?=site_url('Website/Halaman/index')?>">
                                    <i class="icofont icofont-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="<?=base_url()?>Website/Halaman/produk">Produk Jamur</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <!--Post blog single start-->
            <div class="table-content p-l-30 p-r-30">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Produk Jamur</h5>
                        </div>
                        <div>
                            <div class="row">
                                <br/>
                   <div class="table-content p-l-30 p-r-30">
                    <?php foreach ($row as $key => $vaData) { ?>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="card prod-view">
                            <div class="prod-item text-center">
                                <div align="center" class="prod-img " >
                                    
                                    <a href="#!" class="hvr-shrink">
                                        <img src="<?=base_url().$vaData['gambar']?>" class="img-fluid o-hidden" style="height:200px">
                                    </a>
                                    <div class="p-new"><a href=""> <?=$vaData['nama']?> </a></div>
                                </div>
                                <div class="prod-info">
                                    <h5><a href="" class="txt-muted"> <?=$vaData['nama']?> </a></h5>
                                    <div class="stars stars-example-css m-b-10">
                                        <span><?=$vaData['keterangan']?></span>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
                             <!--
                            <div class="row">

                                <div class="table-content p-l-30 p-r-30">
                                    <div class="project-table">
                                        <table id="e-product-list" class="table table-striped width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Gambar</th>
                                                    <th>Nama Produk</th>
                                                    <th>Deskripsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($row as $key => $vaData) { ?>
                                                <tr>
                                                    <td class="pro-name" style="width: 20%">
                                                        <img src="<?=base_url().$vaData['gambar']?>" >
                                                    </td>
                                                    <td class="pro-name" style="width: 20%">
                                                        <h6><?=$vaData['nama']?></h6>     
                                                    </td>
                                                    <td><span><?=$vaData['keterangan']?></span></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid ends -->
    </div>
</div>
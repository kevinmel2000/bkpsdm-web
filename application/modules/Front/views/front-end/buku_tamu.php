<div class="content-wrapper">
    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <!-- Main content starts -->
        <div>
            <!-- Row Starts -->
            <div class="row">
                <div class="col-sm-12 p-0">
                    <div class="main-header">
                        <h4>Buku Tamu</h4>
                        <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                            <li class="breadcrumb-item">
                                <a href="<?=site_url('Website/Halaman/index')?>">
                                    <i class="icofont icofont-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="<?=site_url('Website/Halaman/buku_tamu')?>">Buku Tamu</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <!--Post blog single start-->

            <div class="row">
                <div class="card media-contactBox">
                    <div class="card-block ">
                        <div class="contact-mobi-front">
                            <i class="icofont icofont-navigation-menu contact-btn " ></i>
                            <div class="contact-details-front-img">
                                <img class="img" src="<?=base_url()?>assets-admin/images/logo/biotrop.png" alt="img cap" />
                                <h4>SEAMEO BIOTROP</h4>
                                <p>Terimakasih telah datang di Website kami, Isi Data berikut untuk mendapatkan Tutorial Budidaya Jamur</p>

                            </div>

                            <form class="contact-form" name="contactform" method="post" action="<?=site_url('Website/halaman/emails_kontak')?>">
                                <div class="container">
                                    <div class="md-float-material">
                                        <?php if($info == 'sukses') { ?>
                                            <span class="hm_field_name"><strong style="color: green">Success!</strong> Messages Successfully</span>
                                            <br><br>
                                        <?php } elseif($info == 'gagal'){ ?>
                                            <span class="hm_field_name"><strong style="color: red">Error!</strong> Error Message Sending</span>
                                            <br><br>
                                        <?php } ?>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="md-group-add-on p-relative">
                                                <span class="md-add-on">
                                                    <i class="icofont icofont-user"></i>
                                                </span>
                                                <div class="md-input-wrapper">
                                                    <input type="text" name="cNama" class="md-form-control">
                                                    <label>Nama Lengkap</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="md-group-add-on p-relative">
                                                <span class="md-add-on">
                                                    <i class="icofont icofont-envelope-open"></i>
                                                </span>
                                                <div class="md-input-wrapper">
                                                    <input type="email" name="cEmail" class="md-form-control">
                                                    <label>Email</label>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="md-group-add-on p-relative">
                                                <span class="md-add-on">
                                                    <i class="icofont icofont-phone-circle"></i>
                                                </span>
                                                <div class="md-input-wrapper">
                                                    <input type="number" name="cTlp" class="md-form-control">
                                                    <label>No Telepon</label>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <!-- </div> -->

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="md-group-add-on p-relative">
                                                    <span class="md-add-on">
                                                        <i class="icofont icofont-address-book"></i>
                                                    </span>
                                                    <div class="md-input-wrapper">
                                                        <textarea name="cPesan" class="md-form-control" cols="2" rows="3"></textarea>
                                                        <label>Pesan</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                            <div class="contact-card-button">
                                                <button type="submit" value="submit" class="btn btn-primary waves-effect waves-light">
                                                    <i class="icofont icofont-save m-r-5"> </i> Simpan Buku Tamu
                                                </button>
                                            </div>
                                        
                                    </div>
                                </div>
                            </form>
                                <!-- end of contact-details-front-img -->
                            </div>
                            <!-- end of contact-mobi-front -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid ends -->
        </div>
    </div>
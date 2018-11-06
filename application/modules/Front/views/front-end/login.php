<div class="content-wrapper">

    <!-- Container-fluid starts -->

    <div class="container-fluid">

        <!-- Main content starts -->

        <div>

            <!-- Row Starts -->
            <br>

            <div class="row">

                <div class="col-sm-12 p-0">

                    <div class="main-header">

                        <h4>Login</h4>

                        <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">

                            <li class="breadcrumb-item">

                                <a href="<?=site_url('Front/Halaman/index')?>">

                                    <i class="icofont icofont-home"></i>

                                </a>

                            </li>

                            <li class="breadcrumb-item"><a href="<?=base_url()?>Front/Halaman/login">Login</a></li>

                        </ol>

                    </div>

                </div>

            </div>

            <!--Post blog single start-->



            <div class="row">

                <div class="card media-contactBox" >

                    <div class="card-block ">

                        <div class="contact-mobi-front">

                            <i class="icofont icofont-navigation-menu contact-btn " ></i>

                            <div class="contact-details-front-img">

                                <img class="img" src="<?=base_url()?>assets-admin/images/logo/logo.png" alt="img cap" />

                                <h4>BKPSDM</h4>

                                <p>Lakukan Login untuk Mengakses Modul Pembelajaran </p>

                            </div>

                            <div class="card-block tab-icon">
                                <!-- Row start -->
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <!-- <h6 class="sub-title">Tab With Icon</h6> -->
                                        <!-- <div class="sub-title">Tab With Icon</div> -->
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs md-tabs " role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#home7" role="tab"><i class="icofont icofont-login"></i>LOGIN</a>
                                                <div class="slide"></div>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#profile7" role="tab"><i class="icofont icofont-location-arrow "></i>REGISTER</a>
                                                <div class="slide"></div>
                                            </li>

                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content card-block">
                                            <div class="tab-pane active" id="home7" role="tabpanel">
                                               <form method="post">


                                    <div class="md-float-material">

                                        <?php if($info == 'sukses') { ?>

                                            <span class="hm_field_name"><strong style="color: green">Success!</strong> Login Successfully</span>

                                            <br>

                                        <?php } elseif($info == 'gagal'){ ?>

                                            <span class="hm_field_name"><strong style="color: red">Error!</strong> Something Wrong</span>

                                            <br>

                                        <?php } ?>

                                        <div class="row">

                                            <div class="col-sm-12">

                                                <div class="md-group-add-on p-relative">

                                                    <span class="md-add-on">

                                                        <i class="icofont icofont-user"></i>

                                                    </span>

                                                    <div class="md-input-wrapper">

                                                        <input type="text" name="cUsername" id="cUsername" class="md-form-control">

                                                        <label>Username</label>

                                                    </div>

                                                </div>

                                            </div>



                                            <div class="col-sm-12">

                                                <div class="md-group-add-on p-relative">

                                                    <span class="md-add-on">

                                                        <i class="icofont icofont-key"></i>

                                                    </span>

                                                    <div class="md-input-wrapper">

                                                        <input type="password" name="cPassword" id="cPassword" class="md-form-control">

                                                        <label>Password</label>



                                                    </div>

                                                </div>

                                            </div>



                                            <div class="contact-card-button col-sm-12 btn-block">

                                                <button type="button" id="act" onclick="return login();"  class="btn btn-primary waves-effect waves-light">

                                                    <i class="icofont icofont-login"> </i> Login

                                                </button>

                                            </div>

                                        </div>

                                    </div>

                    

                            </form>
                                            </div>
                                            <div class="tab-pane" id="profile7" role="tabpanel">
                                                 <form method="post">


                                    <div class="md-float-material">

                                        <?php if($info == 'sukses') { ?>

                                            <span class="hm_field_name"><strong style="color: green">Success!</strong> Register Successfully</span>

                                            <br>

                                        <?php } elseif($info == 'gagal'){ ?>

                                            <span class="hm_field_name"><strong style="color: red">Error!</strong> Something Wrong</span>

                                            <br>

                                        <?php } ?>

                                        <div class="row">
                                            <div class="col-sm-12">

                                                <div class="md-group-add-on p-relative">

                                                    <span class="md-add-on">

                                                        <i class="icofont icofont-id"></i>

                                                    </span>

                                                    <div class="md-input-wrapper">

                                                        <input type="text" name="cNama" id="cNama" class="md-form-control">

                                                        <label>Nama</label>

                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-sm-12">

                                                <div class="md-group-add-on p-relative">

                                                    <span class="md-add-on">

                                                        <i class="icofont icofont-school-bag"></i>

                                                    </span>

                                                    <div class="md-input-wrapper">

                                                        <input type="text" name="cAsalSekolah" id="cAsalSekolah" class="md-form-control">

                                                        <label>Asal Sekolah</label>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-sm-12">

                                                <div class="md-group-add-on p-relative">

                                                    <span class="md-add-on">

                                                        <i class="icofont icofont-user"></i>

                                                    </span>

                                                    <div class="md-input-wrapper">

                                                        <input type="text" name="cUsername2" id="cUsername2" class="md-form-control">

                                                        <label>Username</label>

                                                    </div>

                                                </div>

                                            </div>



                                            <div class="col-sm-12">

                                                <div class="md-group-add-on p-relative">

                                                    <span class="md-add-on">

                                                        <i class="icofont icofont-key"></i>

                                                    </span>

                                                    <div class="md-input-wrapper">

                                                        <input type="password" name="cPassword2" id="cPassword2" class="md-form-control">

                                                        <label>Password</label>



                                                    </div>

                                                </div>

                                            </div>

                                            

                                            <div class="contact-card-button col-sm-12 btn-block">


                                                <button type="button" id="act2" onclick="return register();"  class="btn btn-warning waves-effect waves-light">

                                                    <i class="icofont icofont-location-arrow"> </i> Register

                                                </button>

                                            </div>

                                        </div>

                                    </div>

                    

                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Row end -->
                            </div>

                            

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



<script src="<?=base_url()?>assets/js/jquery.2.1.1.min.js"></script>

<script src="<?=base_url()?>assets/js/jquery.gritter.min.js"></script>

<script>

        function register(){
        cUsername       =   $('#cUsername2').val() ;
        cPassword       =   $('#cPassword2').val() ;
        cNama           =   $('#cNama').val() ;
        cAsalSekolah    =   $('#cAsalSekolah').val() ;
        if(cUsername == "" ){
            $.gritter.add({
              title: 'Informasi',
              text: 'Username Kosong',
              class_name: 'gritter-info gritter-center' 
          });
            return false ;
        }else if(cPassword == ""){
            $.gritter.add({
              title: 'Informasi',
              text: 'Password Kosong',
              class_name: 'gritter-info gritter-center' 
          });
            return false ;
        } else if(cAsalSekolah == ""){
            $.gritter.add({
              title: 'Informasi',
              text: 'Asal Sekolah Kosong',
              class_name: 'gritter-info gritter-center' 
          });
            return false ;
        } else if(cNama == ""){
            $.gritter.add({
              title: 'Informasi',
              text: 'Nama Kosong',
              class_name: 'gritter-info gritter-center' 
          });
            return false ;
        }

        $.ajax({
         type: "POST",
         data  :"user="+cUsername+
         "&pass="+cPassword+  
         "&nama="+cNama+  
         "&asal_sekolah="+cAsalSekolah,  
         url: "<?=site_url('Front/Halaman_Act/signup')?>",
         cache: false,
        success:function(msg){
          if(msg == 'sukses-1'){
            window.location.href='<?=site_url('Front/Halaman/index')?>';
        } else if(msg == 'sukses-2'){
            window.location.href='<?=site_url('Front/Halaman/index')?>';

        }else{
            window.location.href='<?=site_url('Front/Halaman/login/gagal')?>';
        }
    }

});

    }

    function login(){
        cUsername   =   $('#cUsername').val() ;
        cPassword   =   $('#cPassword').val() ;
        if(cUsername == "" ){

            $.gritter.add({

              title: 'Informasi',

              text: 'Username Kosong',

              class_name: 'gritter-info gritter-center' 

          });

            return false ;

        }else if(cPassword == ""){

            $.gritter.add({

              title: 'Informasi',

              text: 'Password Kosong',

              class_name: 'gritter-info gritter-center' 

          });

            return false ;

        }


        $.ajax({

         type: "POST",

         data  :"user="+cUsername+

         "&pass="+cPassword,  

         url: "<?=site_url('Front/Halaman_Act/signin')?>",

         cache: false,



         success:function(msg){
          if(msg == 'sukses-1'){
            window.location.href='<?=site_url('Front/Halaman/index')?>';

        } else if(msg == 'sukses-2'){

            window.location.href='<?=site_url('Front/Halaman/index')?>';

        }else{
            window.location.href='<?=site_url('Front/Halaman/login/gagal')?>';
        }

    }

});

    }

</script>
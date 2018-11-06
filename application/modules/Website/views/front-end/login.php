<div class="content-wrapper">
    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <!-- Main content starts -->
        <div>
            <!-- Row Starts -->
            <div class="row">
                <div class="col-sm-12 p-0">
                    <div class="main-header">
                        <h4>Login</h4>
                        <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                            <li class="breadcrumb-item">
                                <a href="<?=site_url('Website/Halaman/index')?>">
                                    <i class="icofont icofont-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="<?=base_url()?>Website/Halaman_Act/signin">Login</a></li>
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
                                <img class="img" src="<?=base_url()?>assets-admin/images/logo/biotrop.png" alt="img cap" />
                                <h4>SEAMEO BIOTROP</h4>
                                <p>Lakukan Login untuk mendapatkan Tutorial dari Budidaya Jamur </p>

                            </div>
                            <form method="post">
                            <div class="container">
                                <div class="md-float-material">
                                    <?php if($info == 'sukses') { ?>
                                    <span class="hm_field_name"><strong style="color: green">Success!</strong> Login Successfully</span>
                                    <br><br>
                                    <?php } elseif($info == 'gagal'){ ?>
                                    <span class="hm_field_name"><strong style="color: red">Error!</strong> Incorrect Username / Password</span>
                                    <br><br>
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

    <script src="<?=base_url()?>assets/js/jquery.2.1.1.min.js"></script>
    <script src="<?=base_url()?>assets/js/jquery.gritter.min.js"></script>
    <script>
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
               url: "<?=site_url('Website/Halaman_Act/signin')?>",
               cache: false,

               success:function(msg){

                  if(msg == 'sukses-1'){

                        window.location.href='<?=site_url('Website/Halaman/index')?>';
                 
                } else if(msg == 'sukses-2'){
                 
                        window.location.href='<?=site_url('Website/Halaman/index')?>';
             
                }else{
                        window.location.href='<?=site_url('Website/Halaman/login/gagal')?>';
                }
           }
       });
        }
    </script>
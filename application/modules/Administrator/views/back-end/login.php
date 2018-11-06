<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Login Site ! | Website Back-End Administrator </title>
		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<link rel="shortcut icon" href="<?=base_url()?>assets-admin/images/logo/icon.png">
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?=base_url()?>assets-admin/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets-admin/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="<?=base_url()?>assets-admin/fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?=base_url()?>assets-admin/css/ace.min.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets-admin/css/jquery.gritter.min.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="<?=base_url()?>assets-admin/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout blur-login">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
						<div class="center">
								<h4>
									<span class="red">Website Back-End Administrator</span><br/>
									<span style="color: white" id="id-text2">
									<strong>BKPSDM</strong></span><br/>
								</h4>
							</div>
							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
											<div align="center">
												<img src="<?=base_url()?>assets-admin/images/logo/logo.png"  height="130px">
											</div>
											</h4>

											<div class="space-6"></div>
											
											<form method="post">
											<div id="result"></div>
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" name="cUsername" id="cUsername" class="form-control" placeholder="Username" required="" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="cPassword" id="cPassword" class="form-control" placeholder="Password" required="" />
															<i class="ace-icon fa  fa-key"></i>
														</span>
													</label>
													<label class="block clearfix">
													 <div align="center" id="loadng-login">
														<button type="button" id="act" onclick="return login();" 
											    		class="btn btn-primary btn-flat" style="width:90%"><i class="fa fa-sign-in"></i> 
											    		Login
											    		</button> <br/>
													 </div>
													</label>
												</fieldset>
											</form>
										</div><!-- /.widget-main -->

										<div class="toolbar clearfix">
											<div style="width:100%" align="center">
												<p align="center" class="forgot-password-link">
													<font size="-1">&copy; Dept. Information Technology <br/>2018</font>
												</p>
											</div>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->
							</div><!-- /.position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		

		<!--[if !IE]> -->
		<script src="<?=base_url()?>assets-admin/js/jquery.2.1.1.min.js"></script>
		<script src="<?=base_url()?>assets-admin/js/jquery.gritter.min.js"></script>
		<script>
			function login(){
				cUsername	=	$('#cUsername').val() ;
				cPassword	=	$('#cPassword').val() ;
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
		                url: "<?=site_url('Administrator/Master_Act/signin')?>",
		                cache: false,

		                success:function(msg){
		                  
		                  if(msg == 'sukses-1'){
		                  	if($.gritter.add({
				              title: 'Informasi',
				              text: 'Login Berhasil',
				              class_name: 'gritter-info gritter-center' 
				            })){
		                  	window.location.href='<?=site_url('Administrator/Master/index')?>';
		                  	}
		                  }else if(msg == 'sukses-2'){
		                  	if($.gritter.add({
				              title: 'Informasi',
				              text: 'Login Berhasil',
				              class_name: 'gritter-info gritter-center' 
				            })){
		                  	window.location.href='<?=site_url('Member/Master/index')?>';
		                  	}
		                  }else{
		                  	 $.gritter.add({
				              title: 'Informasi',
				              text: 'Login Gagal, Password Salah',
				              class_name: 'gritter-info gritter-center' 
				            });
		                  }
		                }
	            });
			}
		</script>
	</body>
</html>

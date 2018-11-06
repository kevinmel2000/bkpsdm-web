

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?=$title?></title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="description" content="Sistem Informasi Panduan Budidaya Jamur Biotrop Indonesia">
    <meta name="keywords" content="Tutorial,Jamur,Biotrop,Indonesia">
    <meta name="author" content="Biotrop">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="<?=base_url()?>assets/images/logo/favicon.png" type="image/x-icon">
    <link rel="icon" href="<?=base_url()?>assets/images/logo/favicon.png" type="image/x-icon">

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="<?=base_url()?>assets/css/jquery.gritter.min.css" />

    <!-- iconfont -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/icon/icofont/css/icofont.css">

    <!-- ion-icon  -->
    
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/font-awesome.min.css">
    
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/icon/ion-icon/css/ionicons.min.css">


    <!-- simple line icon -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/icon/simple-line-icons/css/simple-line-icons.css">

    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/bootstrap.min.css">

    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/main.css">

    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/plugins/gallery/css/lightgallery.css">


    <!-- Responsive.css-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/responsive.css">
    <!--color css-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/color/color-1.css" id="color"/>
</head>
<body class="horizontal-fixed fixed">
 <div class="wrapper">
    <div class="loader-bg">
    <div class="loader-bar">
    </div>
  </div>
   <!-- Navbar-->
      <header class="main-header-top hidden-print">
        <a href="<?=base_url()?>" class="logo"><img class="img-fluid able-logo" src="<?=base_url()?>assets/images/logo/logo.png" alt="Theme-logo"></a>
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button--><a href="<?=base_url()?>#!" data-toggle="offcanvas" class="sidebar-toggle hidden-md-up"></a>
          <!-- Navbar Right Menu-->
          <div class="navbar-custom-menu">
            <ul class="top-nav">

            </ul>

         <!-- search end -->
       </div>
     </nav>
   </header>
   <!-- Side-Nav-->
   <aside class="main-sidebar hidden-print ">
    <section class="sidebar" id="sidebar-scroll">
      <div class="user-panel">
        <div class="f-left image"><img src="assets/images/avatar-1.png" alt="User Image" class="img-circle">
        </div>
        <div class="f-left info">
          <p>John Doe</p>
          <p class="designation">UX Designer <i class="fa fa-sort-down m-l-5"></i>
          </p>
        </div>
      </div>
      <!--horizontal Menu Starts-->
      <ul class="sidebar-menu">
        <li class="nav-level">Navigation</li>
        
        <li><a href="<?=base_url()?>Website/Halaman"><i class="icon-home"></i><span>  Home </span></a></li>
        <li><a href="<?=base_url()?>Website/Halaman/profil"><i class="icon-like"></i><span>  Profil </span></a></li>
        <li><a href="<?=base_url()?>Website/Halaman/produk"><i class="icon-folder-alt"></i><span>  Produk </span></a></li>
        <?php 
          if($this->session->userdata('isLogin') == "True"){
        ?>
        <li><a href="<?=base_url()?>Website/Halaman/tutorial"><i class="icon-layers"></i><span>  Tutorial </span></a></li>
        <?php } ?>
        <li><a href="<?=base_url()?>Website/Halaman/buku_tamu"><i class="icon-notebook"></i><span>  Buku Tamu </span></a></li>
        <?php 
          if($this->session->userdata('isLogin') == ""){
        ?>
            <li><a href="<?=base_url()?>Website/Halaman/login"><i class="icon-login"></i><span>  Login </span></a></li>
        <?php } else { ?>
            <li><a href="<?=base_url()?>Website/Halaman_Act/logout"><i class="icon-login"></i><span>  <?=$this->session->userdata('nama')?> , Logout </span></a></li>
        <?php } ?>
        

        
      </ul>
      <!--horizontal Menu Ends-->
    </section>
  </aside>

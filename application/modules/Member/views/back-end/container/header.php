<?php 
if($this->session->userdata('isLogin') == ""){
  redirect(site_url('Administrator/master/signin'));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?=$title?></title>
  <meta name="description" content="Website Back-End Administrator">
  <meta name="keywords" content="Website Back-End Administrator">
  <link rel="shortcut icon" href="<?=base_url()?>assets-admin/images/logo/icon.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  <link rel="stylesheet" href="<?=base_url()?>assets-admin/css/bootstrap.min.css" />
  
  <link rel="stylesheet" href="<?=base_url()?>assets-admin/font-awesome/4.7.0/css/font-awesome.min.css" />

  <!-- page specific plugin styles -->
  <link rel="stylesheet" href="<?=base_url()?>assets-admin/css/jquery-ui.custom.min.css" />
  <link rel="stylesheet" href="<?=base_url()?>assets-admin/js/select2/select2.css" />
  <link rel="stylesheet" href="<?=base_url()?>assets-admin/css/datepicker.min.css" />
  <link rel="stylesheet" href="<?=base_url()?>assets-admin/css/bootstrap-timepicker.min.css" />
  <link rel="stylesheet" href="<?=base_url()?>assets-admin/css/daterangepicker.min.css" />
  <link rel="stylesheet" href="<?=base_url()?>assets-admin/css/bootstrap-datetimepicker.min.css" />
  <link rel="stylesheet" href="<?=base_url()?>assets-admin/css/jquery.gritter.min.css" />
  <link rel="stylesheet" href="<?=base_url()?>assets-admin/js/validator/css/bootstrapValidator.css" />
  <link rel="stylesheet" href="<?=base_url()?>assets-admin/js/prettyphoto/css/prettyPhoto.css" type="text/css">
  <!-- text fonts -->
  <link rel="stylesheet" href="<?=base_url()?>assets-admin/fonts/fonts.googleapis.com.css" />

  <link rel="stylesheet" href="<?=base_url()?>assets-admin/summernote/summernote.css" />

  <!-- ace styles -->
  <link rel="stylesheet" href="<?=base_url()?>assets-admin/css/ace.min.css" class="ace-main-stylesheet" 
  id="main-ace-style" />
  <script src="<?=base_url()?>assets-admin/js/ace-extra.min.js"></script>
</head>
    <?php 
  function String2Date($dTgl){
      //return 22-11-2012  
      list($cYear,$cMount,$cDate) = explode("-",$dTgl) ;
      if(strlen($cYear) == 4){
        $dTgl = $cDate . "-" . $cMount . "-" . $cYear ;
      } 
      return $dTgl ;  
    }
  ?>
  
<body class="no-skin">
  <div id="masthead"></div>
  <div id="navbar" class="navbar navbar-default">
    <script type="text/javascript">
      try{ace.settings.check('navbar' , 'fixed')}catch(e){}
    </script>

    <div class="navbar-container" id="navbar-container">
      <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
        <span class="sr-only">Toggle sidebar</span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>
      </button>

      <div class="navbar-header pull-left">
        <a href="" class="navbar-brand">
          <small style="color: white;font-size:12px ">
            <!-- <i class="fa fa-user "> Login: <?=$this->session->userdata('nama')?> </span></i> |  -->
            <i class="fa fa-calendar-o "> <?=date("d-M-Y")?></span></i> | 
            <i class="fa fa-clock-o"> <span id="clockDisplay"></span></i>
            <script type="text/javascript" language="javascript">


              function renderTime() {
                var currentTime = new Date();
                var diem = "AM";
                var h = currentTime.getHours();
                var m = currentTime.getMinutes();
                var s = currentTime.getSeconds();
                setTimeout('renderTime()',1000);
                if (h == 0) {
                  h = 12;
                } else if (h > 12) { 
                  h = h - 12;
                  diem="PM";
                }
                if (h < 10) {
                  h = "0" + h;
                }
                if (m < 10) {
                  m = "0" + m;
                }
                if (s < 10) {
                  s = "0" + s;
                }
                var myClock = document.getElementById('clockDisplay');
                myClock.textContent = h + ":" + m + ":" + s + " " + diem;
                myClock.innerText = h + ":" + m + ":" + s + " " + diem;
              }
              renderTime();
            </script>
          </small>
        </a>
      </div>

      <div class="navbar-buttons navbar-header pull-right" role="navigation">
        <ul class="nav ace-nav">
          <li class="light-blue">
            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
              <img class="nav-user-photo" src="<?=base_url()?>assets-admin/images/team/avatar5.png" 
              alt="4IDE" />
              <span class="user-info">
                <small>Welcome,</small>
                <?=$this->session->userdata('nama')?>
              </span>

              <i class="ace-icon fa fa-caret-down"></i>
            </a>

            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
              <li>
                <a href="<?=site_url('Administrator/Master_Act/logout')?>">
                  <i class="ace-icon fa fa-power-off"></i>
                  Logout
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div><!-- /.navbar-container -->
  </div>

  <div class="main-container" id="main-container">
    <script type="text/javascript">
      try{ace.settings.check('main-container' , 'fixed')}catch(e){}
    </script>

    <div id="sidebar" class="sidebar responsive">
      <script type="text/javascript">
        try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
      </script>

      <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
          
         <!--  <img src="<?=base_url()?>assets-admin/images/logo/logo.png" 
          style="height: 40px"> -->
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
          <span class="btn btn-success">Ar</span>

          <span class="btn btn-info">Af</span>

          <span class="btn btn-warning">Al</span>

          <span class="btn btn-danger">Al</span>
        </div>
      </div><!-- /.sidebar-shortcuts -->

      <ul class="nav nav-list">
        <li class="<?php if($file=='Index')echo "active"; ?>">
          <a href="<?=base_url()?>Member/Master">
            <i class="menu-icon fa fa-home"></i>
            <span class="menu-text"> Home </span>
          </a>

          <b class="arrow"></b>
        </li>


       <!--  <li class="<?php if($link == 'produk')echo "active"; ?>">
          <a href="<?=site_url('Administrator/master/produk')?>">
            <i class="menu-icon fa fa-windows"></i>
            <span class="menu-text">
              Master Produk
            </span>
            <b class="arrow"></b>
          </a>
        </li>
 -->
        <li class="<?php if($link=='soal' or $link == 'pembelajaran' or $link == 'model_pembelajaran')echo "active"; ?>">
          <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-book"></i>
            <span class="menu-text">
              Pembelajaran
            </span>

            <b class="arrow fa fa-angle-down"></b>
          </a>

          <b class="arrow"></b>

          <ul class="submenu">

            <li class="<?php if($link=='pembelajaran')echo "active"; ?>">
              <a href="<?=site_url('Member/Master/pembelajaran')?>">
                <i class="menu-icon fa fa-font"></i>
                Modul Pembelajaran
              </a>

              <b class="arrow"></b>
            </li>
            <li class="<?php if($link=='model_pembelajaran')echo "active"; ?>">
              <a href="<?=site_url('Member/Master/model_pembelajaran')?>">
                <i class="menu-icon fa fa-font"></i>
                Modul Model Pembelajaran
              </a>

              <b class="arrow"></b>
            </li>
<!--             <li class="<?php if($link=='soal')echo "active"; ?>">
              <a href="<?=site_url('Administrator/Master/soal')?>">
                <i class="menu-icon fa fa-pencil"></i>
                Soal
              </a>

              <b class="arrow"></b>
            </li> -->
          </ul>   
        </li>

<!--         <li class="<?php if($link=='beranda' or $link == 'profile' or $link == 'blog')echo "active"; ?>">
          <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-user-circle-o"></i>
            <span class="menu-text">
              Profil
            </span>

            <b class="arrow fa fa-angle-down"></b>
          </a>

          <b class="arrow"></b>

          <ul class="submenu">

            <li class="<?php if($link=='beranda')echo "active"; ?>">
              <a href="<?=site_url('Administrator/profil/beranda')?>">
                <i class="menu-icon fa fa-vcard"></i>
                Beranda
              </a>

              <b class="arrow"></b>
            </li>
            <li class="<?php if($link=='profile')echo "active"; ?>">
              <a href="<?=site_url('Administrator/profil/profile')?>">
                <i class="menu-icon fa fa-phone"></i>
                Profile
              </a>
              <li class="<?php if($link=='blog')echo "active"; ?>">
              <a href="<?=site_url('Administrator/profil/blog')?>">
                <i class="menu-icon fa fa-globe"></i>
                Berita
              </a>

              <b class="arrow"></b>
            </li>
          </ul>   
        </li> -->

<!--         <li class="<?php if($link=='bukutamu' or $link == 'booking' or $link == 'visitor' or $link == 'username')echo "active"; ?>">
          <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-user"></i>
            <span class="menu-text">
              User
            </span>

            <b class="arrow fa fa-angle-down"></b>
          </a>

          <b class="arrow"></b>

          <ul class="submenu">

            <li class="<?php if($link=='username')echo "active"; ?>">
              <a href="<?=site_url('Administrator/user/username')?>">
                <i class="menu-icon fa fa-database"></i>
                Member
              </a>

              <b class="arrow"></b>
            </li>

          </ul>   
        </li>
 -->


      </ul><!-- /.nav-list -->

      <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
      </div>

      <script type="text/javascript">
        try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
      </script>
    </div>

    <div class="main-content">
      <div class="main-content-inner">
        <div class="breadcrumbs" id="breadcrumbs">
          <script type="text/javascript">
            try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
          </script>

          <ul class="breadcrumb">
            <li>
              <i class="ace-icon fa fa-home home-icon"></i>
              <a href="#">Home</a>
            </li>
            <li class="active"><?=$menu?></li>
            <li class="active"><?=$file?></li>
          </ul><!-- /.breadcrumb -->

          <div class="nav-search" id="nav-search">
            <form class="form-search">

            </form>
          </div><!-- /.nav-search -->
        </div>

        <div class="page-content">
          <!-- <div class="page-header">
            <h1>
              <?=$menu?>
              <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                <?=$file?>
              </small>
            </h1>
          </div> --><!-- /.page-header -->

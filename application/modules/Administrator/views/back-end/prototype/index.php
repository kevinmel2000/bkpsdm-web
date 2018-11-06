<style type="text/css">
    #close, #open, #dock, #undock {
      width: 100px;
      position:relative;
      display: -moz-inline-stack;
      display: inline-block;
      vertical-align: top;
      zoom: 1;
      *display: inline;
      margin:0 3px 3px 0;
      padding:1px 0;
      text-align:center;
      border:1px solid #ccc;
      background-color:#eee;
      margin:1em .5em;
      padding:.3em .7em;
      border-radius:5px; 
      -moz-border-radius:5px; 
      -webkit-border-radius:5px;
      cursor:pointer;
    }
  </style>
<div class="row"> 
  <div class="col-xs-12 col-sm-12 widget-container-col">
   <div class="widget-box widget-color-orange">
    <div class="widget-header">
    <h5 class="widget-title bigger lighter">
    <i class="ace-icon fa fa-table"></i>
    Input Slider , Gallery dan Logo
    </h5>
    <div class="widget-toolbar widget-toolbar-light no-border"></div>
  </div>
  <div class="widget-body"> 
    <div class="widget-main">
      <div class="row">
       <div class="col-sm-12">
        <button type="button" class="btn btn-primary btn-flat" onclick="return GetGallery();">
          Show File Manager
        </button>
        <div id="data_gallery"></div>   
       </div>
      </div>
    </div>
  </div>
  </div>
  </div><!-- /.span --> 
 </div>
  

  <script type="text/javascript">
    function GetGallery(){
      $.ajax({
        type: "GET",
        url: "<?=site_url('Administrator/Gallery/show_gallery')?>",
        cache: false,
        beforeSend: function(){
         $('#data_gallery').html("<div align='center'><img  width='80' height=80'   src='<?=base_url()?>assets/images/logo/loading.gif' /></div> ");
        },
        success:function(msg){
           $("#data_gallery").html(msg);
        }
      });
    }
  </script>
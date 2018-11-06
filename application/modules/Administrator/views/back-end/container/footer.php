				</div><!-- /.page-content -->
   </div>
  </div><!-- /.main-content --> 
  <br/>
  <div class="footer">
        <div class="footer-inner">
          <div class="footer-content">
            <span class="bigger-80">
              <span class="blue bolder"></span>
              Website Back-End Administrator | <strong style="color: blue">Ver. 1.0</strong>
            </span>

            <!--
            &nbsp; &nbsp;
            <span class="action-buttons">
              <a href="#">
                <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
              </a>

              <a href="#">
                <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
              </a>

              <a href="#">
                <i class="ace-icon fa fa-instagram-square orange bigger-150"></i>
              </a>
            </span>
          -->
          </div>
        </div>
      </div>


  


<!--[if !IE]> -->
    <script src="<?=base_url()?>assets-admin/js/jquery.2.1.1.min.js"></script>
    <!--[if !IE]> -->
    <script type="text/javascript">
      window.jQuery || document.write("<script src='<?=base_url()?>assets-admin/js/jquery.min.js'>"+"<"+"/script>");
    </script>

    <script type="text/javascript">
      if('ontouchstart' in document.documentElement) document.write("<script src='<?=base_url()?>assets-admin/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>
    <script src="<?=base_url()?>assets-admin/js/bootstrap.min.js"></script>

    <!-- page specific plugin scripts -->

    <!--[if lte IE 8]>
    <![endif]-->
    <script src="<?=base_url()?>assets-admin/js/jquery-ui.custom.min.js"></script>
    <script src="<?=base_url()?>assets-admin/js/jquery.ui.touch-punch.min.js"></script>

    <!-- Data Table -->
    <script src="<?=base_url()?>assets-admin/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>assets-admin/js/jquery.dataTables.bootstrap.min.js"></script>

    <!-- Data Table -->

    <!-- Select 2 -->
    <script src="<?=base_url()?>assets-admin/js/select2/select2.js"></script>
    <!-- Select 2 -->

    <!-- DatetimePicker -->
    <script src="<?=base_url()?>assets-admin/js/bootstrap-datepicker.min.js"></script>
    <script src="<?=base_url()?>assets-admin/js/bootstrap-timepicker.min.js"></script>
    <script src="<?=base_url()?>assets-admin/js/moment.min.js"></script>
    <script src="<?=base_url()?>assets-admin/js/daterangepicker.min.js"></script>
    <script src="<?=base_url()?>assets-admin/js/bootstrap-datetimepicker.min.js"></script>
    <!-- DatetimePicker -->

    <!-- Masked Input -->
    <script src="<?=base_url()?>assets-admin/js/jquery.maskedinput.min.js"></script>
    <!-- Masked Input -->

    <!-- Greeter Notif-->
    <script src="<?=base_url()?>assets-admin/js/jquery.gritter.min.js"></script>
    <!-- Greeter Notif -->

    <!-- Bootbox Notif-->
    <script src="<?=base_url()?>assets-admin/js/bootbox.min.js"></script>
    <!-- Bootbox Notif-->

    <!-- Validator-->
    <script src="<?=base_url()?>assets-admin/js/validator/js/bootstrapValidator.js"></script>
    <!-- Validator -->

    <!-- Gallery-->
    <script src="<?=base_url()?>assets-admin/js/prettyphoto/js/jquery.prettyPhoto.js"></script>
    <!-- Galery-->

    <!-- Editor-->
    <script src="<?=base_url()?>assets-admin/js/jquery.hotkeys.min.js"></script>

    <script src="<?=base_url()?>assets-admin/summernote/summernote.js"></script>
    <!-- Editor-->

    <script src="<?=base_url()?>assets-admin/js/jquery.inputlimiter.1.3.1.min.js"></script>


    <!-- ace scripts -->
    <script src="<?=base_url()?>assets-admin/js/ace-elements.min.js"></script>
    <script src="<?=base_url()?>assets-admin/js/ace.min.js"></script>

    <script src="<?=base_url()?>tinymce/tinymce.min.js"></script>
    <script src="<?=base_url()?>tinymce/plugins/table/plugin.min.js"></script>
    <script src="<?=base_url()?>tinymce/plugins/paste/plugin.min.js"></script>
    <script src="<?=base_url()?>tinymce/plugins/powerpaste/plugin.min.js"></script>
    <script src="<?=base_url()?>tinymce/plugins/spellchecker/plugin.min.js"></script>
    <script src="<?=base_url()?>tinymce/plugins/moxiemanager/plugin.min.js"></script>
    <?php if($link == 'index'){ ?>
    <script src="<?=base_url()?>assets-admin/js/jquery.easypiechart.min.js"></script>
    <script src="<?=base_url()?>assets-admin/js/jquery.sparkline.min.js"></script>
    <script src="<?=base_url()?>assets-admin/js/jquery.flot.min.js"></script>
    <script src="<?=base_url()?>assets-admin/js/jquery.flot.pie.min.js"></script>
    <script src="<?=base_url()?>assets-admin/js/jquery.flot.resize.min.js"></script>
    <?php } ?>
    <!-- page script -->
    <script type="text/javascript">
      tinymce.init({
          selector: 'textarea#cDeskripsi',
          height:300,
          themes:'modern',
          plugins: [
              "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
              "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media", 
              "nonbreaking powerpaste filemanager imagetools",
              "save table contextmenu directionality emoticons template paste textcolor "
            ],
          content_css: "<?=base_url()?>tinymce/css/development.css",
          add_unload_trigger: false,

            toolbar1: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | insertfile link image | print preview media fullpage | fontselect | fontsizeselect | forecolor backcolor emoticons table",
            toolbar2: "custompanelbutton textbutton spellchecker",
            powerpaste_allow_local_images:!0,
            powerpaste_word_import: 'clean',
              powerpaste_html_import: 'merge',
            paste_data_images: true,
            image_advtab: true,
          
          style_formats: [
            { title: 'Headers', items: [
              { title: 'h1', block: 'h1' },
              { title: 'h2', block: 'h2' },
              { title: 'h3', block: 'h3' },
              { title: 'h4', block: 'h4' },
              { title: 'h5', block: 'h5' },
              { title: 'h6', block: 'h6' }
            ] },

            { title: 'Blocks', items: [
              { title: 'p', block: 'p' },
              { title: 'div', block: 'div' },
              { title: 'pre', block: 'pre' }
            ] },

            { title: 'Containers', items: [
              { title: 'section', block: 'section', wrapper: true, merge_siblings: false },
              { title: 'article', block: 'article', wrapper: true, merge_siblings: false },
              { title: 'blockquote', block: 'blockquote', wrapper: true },
              { title: 'hgroup', block: 'hgroup', wrapper: true },
              { title: 'aside', block: 'aside', wrapper: true },
              { title: 'figure', block: 'figure', wrapper: true }
            ] }
          ],
          
          end_container_on_empty_block: true,
          content_css: [
            '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
            '//www.tinymce.com/css/codepen.min.css'
          ]
        });
    </script>

    <!-- inline scripts related to this page -->
    <script type="text/javascript">
      jQuery(function($) {
        $('#4IDE-Datatable').dataTable({
            responsive: {
                details: false
            }
        });
         $('.4IDE-Combobox').select2(); 
         $('.4IDe-Time').timepicker({
          minuteStep: 1,
          showSeconds: true,
          showMeridian: false
        }).next().on(ace.click_event, function(){
          $(this).prev().focus();
        });
        
        $('.4IDE-Date').datepicker({
          autoclose: true,
          todayHighlight: true,
          format:'dd-mm-yyyy',
        })

        $('.4IDE-Month').datepicker({
          autoclose: true,
          todayHighlight: true,
          format:'mm-yyyy',
        })

        $('#4IDE-Notif').on(ace.click_event, function(){
          $.gritter.add({
            title: 'This is a centered notification',
            text: 'Just add a "gritter-center" class_name to your $.gritter.add or globally to $.gritter.options.class_name',
            class_name: 'gritter-info gritter-center' 
          });
      
          return false;
        });

        $("#4IDE-Confrim").on(ace.click_event, function() {
          bootbox.confirm("Are you sure?", function(result) {
            if(result) {
              //
            }
          });
        });

        $('.4IDE-File').ace_file_input({
          no_file:'No File ...',
          btn_choose:'Choose',
          btn_change:'Change',
          droppable:false,
          onchange:null,
          thumbnail:false //| true | large
          //whitelist:'gif|png|jpg|jpeg'
          //blacklist:'exe|php'
          //onchange:''
          //
        });

        $(".4IDE-Gallery").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: true});

        

        $('.4IDE-Editor').summernote({
          height:200
        });


  $('.limited').inputlimiter({
    remText: '%n Karakter%s Lagi...',
    limitText: 'Max Nama : %n.'
  });


$('.easy-pie-chart.percentage').each(function(){
          var $box = $(this).closest('.infobox');
          var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
          var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
          var size = parseInt($(this).data('size')) || 50;
          $(this).easyPieChart({
            barColor: barColor,
            trackColor: trackColor,
            scaleColor: false,
            lineCap: 'butt',
            lineWidth: parseInt(size/10),
            animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
            size: size
          });
        })
      
        $('.sparkline').each(function(){
          var $box = $(this).closest('.infobox');
          var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
          $(this).sparkline('html',
                   {
                    tagValuesAttribute:'data-values',
                    type: 'bar',
                    barColor: barColor ,
                    chartRangeMin:$(this).data('min') || 0
                   });
        });
      
      
        //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
        //but sometimes it brings up errors with normal resize event handlers
        $.resize.throttleWindow = false;
      
        var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
        var data = [
        { label: "Disk Usage",  data: 24.7, color: "#68BC31"},
        { label: "Addon Domain",  data: 1.00, color: "#2091CF"},
        { label: "Akun Email",  data: 7.00, color: "#AF4E96"},
        { label: "Traffice",  data: 30.12, color: "#DA5430"},
        { label: "Bug/Error",  data: 0, color: "#FEE074"}
        ]
        function drawPieChart(placeholder, data, position) {
          $.plot(placeholder, data, {
          series: {
            pie: {
              show: true,
              tilt:0.8,
              highlight: {
                opacity: 0.25
              },
              stroke: {
                color: '#fff',
                width: 2
              },
              startAngle: 2
            }
          },
          legend: {
            show: true,
            position: position || "ne", 
            labelBoxBorderColor: null,
            margin:[-30,15]
          }
          ,
          grid: {
            hoverable: true,
            clickable: true
          }
         })
       }
       drawPieChart(placeholder, data);

      });
    </script>

</body>
</html>
		
		<!-- Data Table -->
		<script src="<?=base_url()?>assets/js/jquery.dataTables.min.js"></script>
		<script src="<?=base_url()?>assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<!-- Select 2 -->
		<script src="<?=base_url()?>assets/js/select2/select2.js"></script>
		<!-- Select 2 -->

		<!-- Greeter Notif-->
		<script src="<?=base_url()?>assets/js/jquery.gritter.min.js"></script>
		<!-- Greeter Notif -->


		<script type="text/javascript">
			jQuery(function($) {
				$('#4IDE-Datatables')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.dataTable();
			   $('.4IDE-Combobox').select2(); 
			});
		</script>
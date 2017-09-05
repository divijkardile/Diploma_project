  
   <?php
   		error_reporting('E_ALL');

	   include_once("navbar.php");
	  
	  ?>  
 
<!--Include Navbar-->	
	               
        <!-- page content -->
		  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
				 <section class="content-header" style="margin-top:0px;border:px solid gray;">
    
    </section>   
		<div class="row" style="margin-left:5px;margin-right:25px;margin-top:0px;">
					<div class="col-lg-11 col-md-11" align="center" style="border:px solid black;">					
							<div class="col-lg-6" align="left" style="border:px solid black;">
								<h1>Vehicle Details</h1>
							</div>
							<div class="col-lg-5" align="right" style="border:px solid black;margin-top:px;">
					
								<form action="" method="POST" name="search-form" id="search-form" class="form-inline" style="position:relative">
								<h2>	
								<input type="text" name="custname" id="custname" size="11" class="input-lg" 
								placeholder="Enter Vehicle Number">
								<input type="button" class="btn btn-info btn-md" name="search1" id="search1" value="search" ></h2>
								</form>
									
							</div>
							
							
					 </div>				<hr></hr>
				
				<div class='col-md-12' >
					<?php  
					echo "<div id='page-selection' class='text-center'></div>";
					?> 	

					<form class='form-horizontal row' name="FarmerForm" method="post" action="" id='uploads'>
					
					
					</form>
				</div>
				
			</div>
			
		</div>
		
  <!-- /.content-wrapper -->
 <footer class="main-footer" style="background-color:#ecf0f5; ">
    <div class="pull-right hidden-xs">
      
    </div>
    <em style="color:#512e90;margin-top:-20px;"><h5><b>    <a href="http://w3school.com"></a></b></h5></em>    
	 </footer>
  
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>		
	<script src="autocomplete/jquery.auto-complete.js"></script>	       
		
		<script>		   
				$(document).ready(function() {
				
				let urlAddr = 'vehicledtload.php';
				onClickLoad();			    
				
				$('#search1').on('click', function(){
				 let fname = $('#custname').val();
				// alert(fname);
					let req = $.ajax({
								url : urlAddr,
								data : {value: fname},
								type : 'post',
								cache : false
							});						
						req.done(function(resp) {
						$('#uploads').html(resp);
						console.log(resp);					
				//window.location.assign('custinfo.php');
					});
					req.done(function() {
						saveForm();
					});	
				});
				
				/*	Search items On Paging	*/
				function onClickLoad() {
					let req = $.ajax({
								url : urlAddr,
								data : {page: 1},
								type : 'post',
								cache : false
							});
						req.done(function(resp) {
							$('#uploads').html(resp);
						});
						req.done(function() {
						saveForm();
					});	
						
				}	
                 
			
				/*	Collect Form Data	*/
				function saveForm() {
					
					$('button.edit').on('click', function() {
						
						let id = $(this).prop('id');
						//console.log(id);
						let formVal = [];
						
						$(this).parentsUntil('div[id=col]').find('input').each(function(i) {
							formVal[i] = $(this).val();
							console.log(formVal[i]);
							
						});						
						
						submitForm(formVal, id);
						
					});
					
					$('button.delete').on('click', function() {
						
						let id = $(this).prop('id');
						let formVal = [];
						formVal.push('delete');
						console.log(id);
						submitForm(formVal, id);
						
					});
				}			
				
				/* Submit Form Data	*/
				function submitForm(formData, farmerId) {
					//alert("hiiiiii");
					let req = $.ajax({
								url : urlAddr,
								type : 'post',
								cache : false,
								data : { values : formData, id: farmerId }
							});
					req.done(function(resp) {
						console.log(resp);					
				window.location.assign('vehicledtl.php');
					});
				}
				$('.autofocus').on('shown.bs.modal', function () {
					$('input:text:visible:first').focus();
				});		
				
				$(function() {
				$('#custname').autoComplete({
					minChars: 1,
					source: function(term, response)
					{
						try { xhr.abort(); } catch(e){}
						xhr = $.getJSON('searchvehicle.php', { q : term }, function(data){ response(data); });
					}
				});
			});			
				
		});
				
	 </script>
	</body>
</html>
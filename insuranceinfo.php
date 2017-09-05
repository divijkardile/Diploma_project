<?php 
	include_once('navbar1.php');
	include_once('includes/connection.php');
	include_once("config.php");
	error_reporting('E_ALL');
	
    $sid=$_SESSION['id'];
    date_default_timezone_set('Asia/Calcutta');
	
?>

	<style>
		a
		{
			color:white;
		} 
	</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="margin-top:-20px;border:px solid gray;">
    
    </section> 
	            <?php
				   $sel="select * from tbluser where accid='$sid' ";
				   $sql=mysqli_query($con, $sel);
				   $row=mysqli_fetch_array($sql);							
					$fname=$row['username'];
					$lname=$row['lname'];
					$email=$row['email'];
					$mobile=$row['mobile'];
					$name=$fname." ".$lname;
					
					$sel1="select * from tblcust where accid='$sid' ";
					   $sql1=mysqli_query($con, $sel1);
					   $row1=mysqli_fetch_array($sql1);							
						$address=$row1['address'];
						
					  $sel11="select * from tblvehicle where custaccid='$sid' ";
					   $sql11=mysqli_query($con, $sel11);
					   $row11=mysqli_fetch_array($sql11);							
						$mno=$row11['mno'];
						$regid=$row11['accid'];
						
					$SQLSrNo = "Select CurrentSrNo from tblserialnumber where txnTypeId = ".insid;
						$RESSrNo = mysqli_query($con,$SQLSrNo);
						$ROWSrNo = mysqli_fetch_array($RESSrNo);
						$SrNo = $ROWSrNo['CurrentSrNo'];
						 $Accid = $SrNo + 1;					
					
				?>
			<div class="row" style="margin-left:10px;margin-top:1px;margin-bottom:;">
				  <div class="col-md-12" align="center">
					 <h1>Insurance Details </h1>		  
				  </div>
				  <hr style="border:1px solid gray;"></hr>

			</div>	
		<div class="row" style="margin-left:200px;margin-top:1px;margin-bottom:;">
			  
			 <form action="" method="POST">
				<div class="col-md-11" style="border:px solid gray;margin-left:px;margin-right:px;">					
					<div class="col-md-2 col-md-offset-1">
					<label> Insured_Name: </label>
					</div>	
					<div class="col-md-3" >
					<input type="text" name="iname" class="input-sm" id="iname" value="<?php echo $name;?>" readonly 
					placeholder="Enter Full Name" required />
					</div>	
									
				</div>
				<div class="col-md-11" style="border:px solid gray;margin-top:20px;">
				
					<div class="col-md-2 col-md-offset-1">
					<label> Address :</label>
					</div>	
					<div class="col-md-3" >			
					<textarea name="address" id="address" class="input-sm" placeholder="Enter Address" 
					cols="26" rows="" readonly required ><?php echo $address;?></textarea>
					</div>					
				</div>
				
				<div class="col-md-11" style="border:px solid gray;margin-top:20px;">
				
					<div class="col-md-2 col-md-offset-1">
					<label> Period_Of_Cover: </label>
					</div>	
					<div class="col-md-3">			
						<select name="date1" id="date1" class="input-sm" style="width:180px;">
						  <option value="6 Months">6 Months</option>
						  <option value="1 Year">1 Year</option>
						  <option value="3 Year">3 Year</option>
						 </select> 
					</div> 
					 <div class="col-md-5">			
						&nbsp;&nbsp;&nbsp;&nbsp;From&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="date" name="date2" id="date2" value="<?php echo date('Y-m-d'); ?>" class="input-sm" style="width:180px;" required />
						 
						 </select> 
					</div>					
				</div>
				
				<div class="col-md-11" style="border:px solid gray;margin-top:20px;">
				
					<div class="col-md-2 col-md-offset-1">
					<label> Policy_No. : </label>
					</div>	
					<div class="col-md-3" >			
						<input type="text" name="pno" id="pno" class="input-sm" placeholder="Enter Policy_No." required />
					</div>					
				</div>
				<div class="col-md-11" style="border:px solid gray;margin-top:20px;">
				
					<div class="col-md-2 col-md-offset-1">
						<label> Area : </label>
					</div>	
					<div class="col-md-3" >			
						<input type="text" name="area" id="area" placeholder="Enter Area Details" class="input-sm" required />
					</div>					
				</div>
				<div class="col-md-11" style="border:px solid gray;margin-top:20px;">
				
					<div class="col-md-2 col-md-offset-1">
					<label> Registration_No.: </label>
					</div>	
					<div class="col-md-3" >			
						<input type="text" name="regi" id="regi" class="input-sm" 
					 placeholder="Enter Registration_No" value="<?php echo $regid; ?>" readonly required />
					</div>					
				</div>
				<div class="col-md-11" style="border:px solid gray;margin-top:20px;">
				
					<div class="col-md-2 col-md-offset-1">
						<label> Contact_No. : </label>
					</div>	
					<div class="col-md-3" >			
						<input type="text" name="contact" id="contact" class="input-sm" value="<?php echo $mobile;?>" readonly required />
					</div>					
				</div>				
				
				<div class="col-md-11" style="border:px solid gray;margin-top:20px;">
				
					<div class="col-md-2 col-md-offset-1">
					<label> Email_id : </label>
					</div>	
					<div class="col-md-3" >			
						<input type="text" name="email" id="email" class="input-sm" 
					 value="<?php echo $email;?>" readonly required />
					</div>					
				</div>
				<div class="col-md-11" style="border:px solid gray;margin-top:20px;">
				
					<div class="col-md-2 col-md-offset-1">
					<label> Model No. : </label>
					</div>	
					<div class="col-md-3" >			
						<input type="text" name="mno" id="mno" class="input-sm" 
					 value="<?php echo $mno ;?>"  readonly required />
					</div>					
				</div>
				<div class="col-md-8 col-md-offset-3" style="border:px solid gray;margin-top:20px;">
											
					<input type="submit" name="submit" id="submit" class="btn btn-info">
							
				</div>
			</form>	
	  </div>         
	<?php	    
		
		if(isset($_POST['submit']))  
		{	
			$iname=$_POST['iname'];					
			$address=$_POST['address'];						
			$date1=$_POST['date1'];			
			$date2=$_POST['date2'];
			$pno=$_POST['pno'];
			$area=$_POST['area'];			
			$regi=$_POST['regi'];			
			$contact=$_POST['contact'];			
			$email=$_POST['email'];			
			$mno=$_POST['mno'];			 
			$status="No";
			
		if (empty($address) || empty($mno) || empty($regi)) 
			{
				?>
					<script>
							function myFunction() {
									alert('Please Inserted Customer And Vehicle Details... ');								
							setTimeout(function(){

							window.location.href = 'insuranceinfo.php'
							});
							}
						   myFunction();
					</script>
						
				<?php
			}
			else
			{							
				 $selected="Select accid from tblcust where accid='$sid' ";
				 $rows1 = mysqli_query($con, $selected);											
				 $rows12 = mysqli_num_rows($rows1);											
				if($rows12 > 0)
				{					
					$selected123="Select accid from tblinsurance where accid='$sid' ";
					$rows123 = mysqli_query($con, $selected123);											
					$rows123 = mysqli_num_rows($rows123);											
					if($rows123 > 0)
					{						
					$sqlsa="UPDATE tblinsurance SET valid='$date1',date2='$date2',pno='$pno',
					area='$area',regino1='$regi', status = '".$status."' where accid='$sid' ";  
					$ressave = mysqli_query($con, $sqlsa);											
					if($ressave > 0)
					{
						?>
						<script>
								function myFunction() {
										alert('Information Update Successfully... ');									
								setTimeout(function(){

								window.location.href = 'insuranceinfo.php'
								});
								}
							   myFunction();
						</script>
							
						<?php	
						
					}
					else
					{							
						?>
						<script>
								function myFunction() {
										alert('Information Not Update Successfully..!');									
								setTimeout(function(){

								window.location.href = 'insuranceinfo.php'
								});
								}
							   myFunction();
						</script>								
					  <?php
					}
					
				}
				else
				{				
				$sqlsa123="insert into tblinsurance (accid,insu_name,address,valid,date2,pno,area,regino,contact,email,mno,status) 
				VALUES ('$sid','$iname','$address','$date1','$date2','$pno','$area','$regi','$contact','$email','$mno','$status') ";  
				$ressave123 = mysqli_query($con, $sqlsa123);											
				if($ressave123 > 0)
				 {
					?>
					<script>
							function myFunction() {
									alert('Information Inserted Successfully... ');									
							setTimeout(function(){

							window.location.href = 'insuranceinfo.php'
							});
							}
						   myFunction();
					</script>
						
					<?php	
					
				}
				else
				{
					
					?>
					<script>
							function myFunction() {
									alert('Information Not Inserted Successfully..!');									
							setTimeout(function(){

							window.location.href = 'insuranceinfo.php'
							});
							}
						   myFunction();
					</script>								
				  <?php
				}
				  
					
		    }
		 }
		 else
		 {
			?>
			<script>
					function myFunction() {
							alert('Please Insert Customer Details..!');									
					setTimeout(function(){

					window.location.href = 'insuranceinfo.php'
					});
					}
				   myFunction();
			</script>								
		  <?php
		 }
		}
	}
						
?>
		 
	  
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
</body>
</html>
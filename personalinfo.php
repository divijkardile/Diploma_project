 <?php 
	include_once('navbar1.php');
	include_once('includes/connection.php');
	include_once("config.php");
	
    $sid=$_SESSION['id'];

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
				error_reporting('E_ALL');
				   $sel="select * from tbluser where accid='$sid' ";
				   $sql=mysqli_query($con, $sel);
				   $row=mysqli_fetch_array($sql);							
					$fname=$row['username'];
					$lname=$row['lname'];
					$email=$row['email'];
					$mobile=$row['mobile'];
					$name=$fname." ".$lname;
					
				   $sel12="select * from tblcust where accid='$sid' ";
				   $sql12=mysqli_query($con, $sel12);
				   $row12=mysqli_fetch_array($sql12);							
					 $address=$row12['address'];
					 $gender=$row12['gender'];
					 $licence=$row12['licence'];
					 $proffession=$row12['proffession'];
					 $dob=$row12['dob'];
					
					
				?>
			<div class="row" style="margin-left:10px;margin-top:1px;margin-bottom:;">
				  <div class="col-md-12" align="center">
					 <h1>Personal information </h1>		  
				  </div>
				  <hr style="border:1px solid gray;"></hr>

			</div>	
		<div class="row" style="margin-left:200px;margin-top:1px;margin-bottom:;">
			  
			 <form action="" method="POST">
				<div class="col-md-11" style="border:px solid gray;margin-left:px;margin-right:px;">					
					<div class="col-md-2 col-md-offset-1">
					<label> Name :</label>
					</div>	
					<div class="col-md-3" >
					<input type="text" name="fname" class="input-sm" id="fname" maxlength="10" value="<?php echo $name; ?>" readonly 
					placeholder="Enter Full Name" required />
					</div>	
									
				</div>
				<div class="col-md-11" style="border:px solid gray;margin-top:20px;">
				
					<div class="col-md-2 col-md-offset-1">
					<label> Address : </label>
					</div>	
					<div class="col-md-3" >			
					<textarea name="address" id="address" class="input-sm" maxlength="100" required 
					placeholder="Enter Customer Address" cols="26" rows=""><?php echo $address; ?></textarea>
					</div>					
				</div>
				
				<div class="col-md-11" style="border:px solid gray;margin-top:20px;">
				
					<div class="col-md-2 col-md-offset-1">
					<label> Gender : </label>
					</div>	
					
					<div class="col-md-4">	
						<?php
						if($gender == '' )
						{						
						?>
							  &nbsp;<input type="radio" name="choice" value="Male" checked>Male</option>
							  &nbsp;&nbsp;<input type="radio" name="choice" value="FeMale">FeMale</option>
							  &nbsp;&nbsp;<input type="radio" name="choice" value="Other">Other</option>
						<?php
						}
						else
						{
						?>
							<input type="text" class="input-sm"
							placeholder="Enter Licence No." required value="<?php echo $gender; ?>" readonly disabled />
						<?php
						}						 
						 ?>
					</div>						
				</div>
				
				<div class="col-md-11" style="border:px solid gray;margin-top:20px;">
				
					<div class="col-md-2 col-md-offset-1">
					<label> Licence_No. : </label>
					</div>	
					<div class="col-md-3" >			
						<input type="text" name="licence" id="licence" class="input-sm" maxlength="20" 
						placeholder="Enter Licence No." required value="<?php echo $licence; ?>"/>
					</div>					
				</div>
				
				<div class="col-md-11" style="border:px solid gray;margin-top:20px;">
				
					<div class="col-md-2 col-md-offset-1">
						<label> Contact_No. : </label>
					</div>	
					<div class="col-md-3" >			
						<input type="text" name="contact" id="contact" class="input-sm" maxlength="10" value="<?php echo $mobile;?>" readonly required />
					</div>					
				</div>
				<div class="col-md-11" style="border:px solid gray;margin-top:20px;">
				
					<div class="col-md-2 col-md-offset-1">
					<label> Proffession : </label>
					</div>	
					<div class="col-md-3" >			
						<input type="text" name="profession" id="profession" class="input-sm" maxlength="20" 
						placeholder="Enter Customer Proffession" required value="<?php echo $proffession; ?>" />
					</div>					
				</div>
				<div class="col-md-11" style="border:px solid gray;margin-top:20px;">
				
					<div class="col-md-2 col-md-offset-1">
					<label> Date_Of_Birth: </label>
					</div>	
					<div class="col-md-3">			
						<input type="date" name="dob" id="dob" class="input-sm" 
						style="width:180px;" required value="<?php echo $dob; ?>" />
					</div>					
				</div>
				<div class="col-md-11" style="border:px solid gray;margin-top:20px;">
				
					<div class="col-md-2 col-md-offset-1">
					<label> Email_id : </label>
					</div>	
					<div class="col-md-3" >			
						<input type="text" name="email" id="email" class="input-sm" maxlength="15" 
					 value="<?php echo $email;?>" readonly required />
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
			$fname=$_POST['fname'];					
			$address=$_POST['address'];
			
			if($gender == '' )
			{				
			$gender=$_POST['choice'];	
			}
			else
			{
				$gender;
			}				
			$licence=$_POST['licence'];			
			$contact=$_POST['contact'];			
			$profession=$_POST['profession'];
			$dob=$_POST['dob'];
			$email=$_POST['email'];			
							
				 $selected="Select accid from tblcust where accid='$sid' ";
				 $rows1 = mysqli_query($con, $selected);											
				 $rows12 = mysqli_num_rows($rows1);											
				if($rows12 > 0)
				{
					    $sqlsa="UPDATE tblcust SET address='$address',gender='$gender',licence='$licence',proffession='$profession',dob='$dob',email='$email' where accid='$sid' ";  
						$ressave = mysqli_query($con, $sqlsa);											
						if($ressave > 0)
						{
							?>
							<script>
									function myFunction() {
											alert('Information Update Successfully... ');									
									setTimeout(function(){

									window.location.href = 'vehicleinfo.php'
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

									window.location.href = 'personalinfo.php'
									});
									}
								   myFunction();
							</script>								
						  <?php
						}
					
				}
				else
				{				
				$sqlsa="insert into tblcust (accid,firstname,address,gender,licence,contact,proffession,dob,email) 
				VALUES ('$sid','$fname','$address','$gender','$licence','$contact','$profession','$dob','$email') ";  
				$ressave = mysqli_query($con, $sqlsa);											
				if($ressave > 0)
				 {
					?>
					<script>
							function myFunction() {
									alert('Information Inserted Successfully... ');									
							setTimeout(function(){

							window.location.href = 'vehicleinfo.php'
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

							window.location.href = 'personalinfo.php'
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
</body>
</html>


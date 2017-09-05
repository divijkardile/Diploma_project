<?php 
	include_once('navbar1.php');
	error_reporting('E_ALL');
	include_once('includes/connection.php');
	include_once("config.php");
	
    $sid=$_SESSION['id'];

?>
<script>
	 function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) 
			{
                $('#blah').attr('src', e.target.result);
            }
             
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp").change(function(){
        readURL(this);
    });
</script>

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
    	<div class="row" style="margin-left:10px;margin-top:1px;margin-bottom:;">
				  <div class="col-md-12" align="center">
					 <h1>Vehicle Deatils </h1>		  
				  </div>
				  <hr style="border:1px solid gray;"></hr>

			</div>
		<div class="row"  style="margin-left:10px;margin-top:1px;margin-bottom:;">
			  
			 <form action="" method="POST" enctype="multipart/form-data"> 
				<div class="col-md-11" style="border:px solid gray;margin-left:px;margin-right:px;">					
					<div class="col-md-2 col-md-offset-1">
					<label>Company Name : </label>
					</div>	
					<div class="col-md-3" >
					<input type="text" name="cname" class="input-sm" id="cname" placeholder="Enter Company Name" required />
					</div>				
					
				</div>
				<div class="col-md-11" style="border:px solid gray;margin-top:20px;">
				
					<div class="col-md-2 col-md-offset-1">
					<label> Vehicle No : </label>
					</div>	
					<div class="col-md-3" >			
					<input type="text" name="vno" id="vno" class="input-sm" placeholder="Enter Vehicle No." >
					</div>							
						
				 </div>
				 <div class="col-md-11" style="border:px solid gray;margin-top: 10px;margin-right:px;">					
					<div class="col-md-2 col-md-offset-1">
					
					</div>	
					<div class="col-md-4 input-lg" >					 
							 State:<select id="listBox" name="listBox" >
							        <option value="Maharashtra">Maharashtra</option>
							        <option value="Gujrat">Gujrat</option>
							        <option value="Andhra Pradesh">Andhra Pradesh</option>
							        <option value="Goa">Goa</option>
							        <option value="Chhattisgarh">Chhattisgarh</option>
							        <option value="Bihar">Bihar</option>
							        <option value="Haryana">Haryana</option>
							 
							 </select>
					</div>
					<div class="col-md-4 input-lg" >
					 City:<select id='secondlist' name="secondlist" >
					        <option value="Pune">Pune</option>
							<option value="Nagpur">Nagpur</option>
							<option value="Mumbai">Mumbai</option>
							<option value="Gandhinaga">Gandhinagar</option>
							<option value="Amaravati">Amaravati</option>
							<option value="Patna">Patna</option>
							<option value="Panaji">Panaji</option>
							<option value="Chandigarh">Chandigarh</option>
					 </select>
					</div>
					
				</div>
					
				<div class="col-md-11" style="border:px solid gray;margin-top:20px;">
				  <div class="col-md-2 col-md-offset-1">
					<label>Buying Date : </label>
					</div>	
					<div class="col-md-3" >
					<input type="date" name="bdate" class="input-sm" id="bdate" style="width:180px;" required />
					</div>
										
				</div>
				
				<div class="col-md-11" style="border:px solid gray;margin-top:20px;">
				
					<div class="col-md-2 col-md-offset-1">
					<label> Price : </label>
					</div>	
					<div class="col-md-3" >			
						<input type="text" name="price" id="price" class="input-sm" placeholder="Enter Price" required />
					</div>	
					<div class="col-md-1 col-md-offset-1">
					<label> Image: </label>
					</div>	
					<div class="col-md-4" >			
						<div class="form-group">
							<div class="col-md-8">
							<div class="input-group">	
							<input type="file" name ="image" id="image" 
							class="input-md" placeholder="Enter Full Name"  onchange="readURL(this);" required />
							</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label"> </label>
							<div class="col-md-8">
							<div class="input-group">	
							<img id="blah" src="#" width="200" height="100"  alt="image" />
							</div>
							</div>
						</div>	
					</div>					
				</div>
				
				<div class="col-md-11" style="border:px solid gray;margin-top:-70px;">
				
					<div class="col-md-2 col-md-offset-1">
					<label> Fuel Type : </label>
					</div>	
					<div class="col-md-3" >			
						<select name="ftype" id="ftype" class="input-sm" style="width:180px;">
							<option value="Diesel">Diesel</option>
							<option value="Petrol">Petrol</option>
							<option value="Gas">Gas</option>
						</select>
					</div>					
				</div>
				<div class="col-md-11" style="border:px solid gray;margin-top:-20px;">
				
					<div class="col-md-2 col-md-offset-1">
					<label> Model_No. : </label>
					</div>	
					<div class="col-md-3" >			
						<input type="text" name="mno" id="mno" class="input-sm" placeholder="Enter Model_No." required />
					</div>					
				</div>
				<div class="col-md-11" style="border:px solid gray;margin-top:20px;">
				
					<div class="col-md-2 col-md-offset-1">
					<label> Chassis/Engine_No.:</label>
					</div>	
					<div class="col-md-3" >	
						<input type="text" name="ceno" id="ceno" class="input-sm" maxlength="13" placeholder="Enter Chassis/Engine_No." required />
					</div>					
				</div>
				<div class="col-md-11" style="border:px solid gray;margin-top:20px;">
				
					<div class="col-md-2 col-md-offset-1">
					<label> Type of Vehicle : </label>
					</div>	
					<div class="col-md-3">			
						<select name="vehiclet" id="vehiclet" class="input-sm" style="width:180px;">
							<option value="Two Wheeler">Two Wheeler</option>
							<option value="Three Wheeler">Three Wheeler</option>
							<option value="Four Wheeler">Four Wheeler</option>
							
						</select>						  
					</div>					
				</div>
				<div class="col-md-11" style="border:px solid gray;margin-top:20px;">
				
					<div class="col-md-3 col-md-offset-1">
					<label> Showroom Details: </label>
					</div>									
				
					<div class="col-md-11 col-md-offset-1" style="border:px solid gray;margin-top:20px;">
					
						<div class="col-md-2">
						<label> Name : </label>
						</div>	
						<div class="col-md-2" >			
							<input type="text" name="sname" id="sname" class="input-sm" placeholder="Enter Showroom Name" required />
						</div>
						<div class="col-md-2 col-md-offset-2">
						<label> Address : </label>
						</div>	
						<div class="col-md-2" >			
							<input type="text" name="saddress" id="saddress" class="input-sm" placeholder="Enter Showroom Address" required />
						</div>
						
										
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
			$cname=$_POST['cname'];			
			$vno=$_POST['vno'];			
		    $listBox=$_POST['listBox'];
			$secondlist=$_POST['secondlist'];			
			$bdate=$_POST['bdate'];			
			$price=$_POST['price'];						
			$ftype=$_POST['ftype'];			
			$mno=$_POST['mno'];			
			$ceno=$_POST['ceno'];			
			$vehiclet=$_POST['vehiclet'];			
			$sname=$_POST['sname'];			
			$saddress=$_POST['saddress'];            
			
				$sel="select accid from tblcust WHERE accid='$sid' ";  
				$run=mysqli_query($con,$sel);		  
			    $row=mysqli_num_rows($run);			 
				if($row > 0)
				{					
					$file = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME).$sid.'.'.pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
					$file_loc = $_FILES['image']['tmp_name'];
					$folder="Images/";
					move_uploaded_file($file_loc,$folder.$file);					
					
					$sel="select custaccid,vno from tblvehicle WHERE custaccid='$sid' && vno='$vno' ";  
					$run=mysqli_query($con,$sel);		  
					$row=mysqli_num_rows($run);			 
					if($row > 0)
					{
						$sqlsa12="UPDATE tblvehicle SET cname='$cname',state='$listBox',city='$secondlist',bdate='$bdate',price='$price',image='$file',ftype='$ftype',mno='$mno',ceno='$ceno',vehiclet='$vehiclet',
						sname='$sname',saddress='$saddress' ";						
						$ressave12 = mysqli_query($con, $sqlsa12);			
						if($ressave12 > 0)
						{
						   ?>
							<script>
								function myFunction() {
										alert('Update Information Successfully... ');									
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
										alert('Update Not Successfully...');									
								setTimeout(function(){

								window.location.href = 'vehicleinfo.php'
								});
								}
							   myFunction();
							</script>
								
							<?php							
						}					
					}
					else
					{					
					
					$SQLSrNo = "Select CurrentSrNo from tblserialnumber where txnTypeId = ".insid;
					$RESSrNo = mysqli_query($con,$SQLSrNo);
					$ROWSrNo = mysqli_fetch_array($RESSrNo);
					$SrNo = $ROWSrNo['CurrentSrNo'];
					$Accid = $SrNo + 1;				
			         
					$sqlsa="insert into tblvehicle (custaccid,accid,cname,vno,state,city,bdate,price,image,ftype,mno,
					ceno,vehiclet,sname,saddress)
					VALUES ('$sid','$Accid','$cname','$vno','$listBox','$secondlist','$bdate','$price','$file',
					'$ftype','$mno','$ceno','$vehiclet','$sname','$saddress') ";  
					
					$ressave = mysqli_query($con, $sqlsa);									
					if($ressave > 0)
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
						
						$SQLCrntSrNo = "Update tblserialnumber SET CurrentSrNo = '".$Accid."' WHERE txnTypeId =".insid;
						$RESCrntSrNo = mysqli_query($con,$SQLCrntSrNo);
				   }
				   else
					{
						?>
						<script>
								function myFunction() {
										alert('Information Not Inserted... ');									
								setTimeout(function(){

								window.location.href = 'vehicleinfo.php'
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
									alert('Please Insert Your Account Information First...');									
							setTimeout(function(){

							window.location.href = 'personalinfo.php'
							});
							}
						   myFunction();
					</script>
						
					<?php	
						
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

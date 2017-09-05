<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Vehicle Management System</title>
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <style>
  
 	div,label,h1,h2,h3
	{
		font-family:cambria;
		
		color:white;
	}
	input
	{
		border-color: #fff;
		color:blue";
	}
	body
	{
		background-image: url("image/car6.jpg");
		 background-repeat: no-repeat;
		 width:100%;
 	}
	.tab-group li a 
	{ 
		padding: 10px;
		min-width:50%;
	}
	input
	{
		color:white; 
	}
  </style>
</head>
<?php
	include("includes/connection.php");
	 include_once("config.php");
	 
		if(isset($_POST['signup1']))  
		{	
			$fname=$_POST['fname'];			
			$lname=$_POST['lname'];			
			$email=$_POST['email'];
			$mobile=$_POST['mobile'];
			$pwd=$_POST['pwd'];			
			
				$sel="select email,mobile,password from tbluser WHERE mobile='$mobile' or email='$email' and password='$pwd' ";  
				$run=mysqli_query($con, $sel); 
				$row=mysqli_affected_rows($con);			 
				   if($row > 0)
				   {
						?>
						<script>
								function myFunction() {
										alert('Mobile_No Or Email_Id And Password is Already Exist in our Database, Please Try Another..!');									
								setTimeout(function(){

								window.location.href = 'index.php'
								});
								}
							   myFunction();
						</script>								
					  <?php
				  }
					else
					{
						$SQLSrNo = "Select CurrentSrNo from tblserialnumber where txnTypeId = ".userid;
						$RESSrNo = mysqli_query($con,$SQLSrNo);
						$ROWSrNo = mysqli_fetch_array($RESSrNo);
						$SrNo = $ROWSrNo['CurrentSrNo'];
						 $Accid = $SrNo + 1;
						
						$sqlsa="insert into tbluser (accid,username,lname,email,mobile,password) VALUES ('$Accid','$fname','$lname','$email','$mobile','$pwd')";  
						$ressave = mysqli_query($con, $sqlsa);
						if($ressave > 0)
						{
							?>
							<script>
									function myFunction() {
												alert('Registration Successfully Completed');									
									setTimeout(function(){

									window.location.href = 'index.php'
									});
									}
								   myFunction();
							</script>
								
							<?php
								
								$Message="Hi Vehicle Mgnt System User_Name! ".$email." OR ".$mobile." And Password is ".$pwd."";	
		
								$xml_data ='<?xml version="1.0"?> 
												<parent>
                                                    <child>
                                                        <user>revatech</user>
                                                        <key>0f016dca70XX</key>
                                                        <mobile>'.$mobile.'</mobile>
                                                        <message>'.$Message.'</message>
                                                        <accusage>2</accusage>
                                                         <senderid>TYDJPK</senderid>
														 <unicode>1</unicode>
														<smstype>Normal</smstype>
                                                    </child>
                                                   
                                                </parent> ';  
  

									$URL = "http://mobicomm.dove-sms.com/mobicomm//submitsms.jsp?";

									$ch = curl_init($URL);
									curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
									curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
									curl_setopt($ch, CURLOPT_POST, 1);
									curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
									curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
									curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
									curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
									$output = curl_exec($ch);
									curl_close($ch);
									

							
							$SQLCrntSrNo = "Update tblserialnumber SET CurrentSrNo = '".$Accid."' WHERE txnTypeId =".userid;
							$RESCrntSrNo = mysqli_query($con,$SQLCrntSrNo);					
							
						}
						else
							{
							  ?>
								<script>
									function myFunction() {
											alert("Registration Not Completed..!");
											
									setTimeout(function(){

									window.location.href = 'index.php'
									});
									}
								   myFunction();
								</script>
								
							 <?php
							}							 
					}
			}
 ?>
 


<body>
	  <div class="form" style="border:1px solid green;margin-top:1px;background-color:rgba(70, 85, 103,0.5);">
	  
			<div class="row" style="border:px solid black;margin-top:-38px;">	
			
				<div class="col-md-12 col-md-offset-2" style="border:px solid black;">	  
				  <font style="color:white;"><h2>Vehicle Management System</h2></font>
				</div>
			</div>		  
		  
			  <div class="tab-content">
			  
					<div id="login">   
					 <font color="white"><h1>LOGIN</h1></font>
					  
					  <form action="" method="post">
					    
						   <div class="row" style="margin-bottom:20px;border:px solid black;">
						  
						  <div class="col-md-12" align="center" style="border:px solid black;"> 
						
						    <select name="acct" id="acct" class="input-lg" style="color:black;">								
								<option value="1">User</option>
								<option value="2">Admin</option>
								
							</select>									
						 
						  </div>						  
						  </div>
					  
						 <div class="field-wrap">					
							<label>
							  Email ID / Mobile No<span class="req"  >*</span>
							</label>
						  </div>
						  <div class="field-wrap" style="margin-top:70px;">
							
							<input type="text" name="email" required/>
							</div>
						  
						  <div class="field-wrap">							
							
							<label>
							  Password<span class="req">*</span>
							</label>
						  </div>	  
						    <div class="field-wrap" style="margin-top:90px;">
							
							 <input type="password" name="password" />
							</div>	  
						  
							</br>
							<div class="col-md-12">
								<div class="col-md-6">
								
								  <input type="submit" name="login" value="LogIn" 
								  class="button" style=" text-transform: none;background-color:#512e90"/>
								 
								</div>
								<div class="col-md-6">
								
								  <input type="submit" name="forgot" value="Forgot_Password" 
								  class="button button-block" 
								  style=" text-transform: none;background-color:#179b77"/>
								 
								</div>							
							</div>							
								<br>
								<br>
								<br>
							<div class="field-wrap" style="float:right">
								<li type="none" class="tab active" style="color:white;"><font size="5">
								New User&nbsp;
								<a href="#signup" style="color:white;">Sign Up</a></font></li>
							</div>
							
					  </form>

				</div>
				
					
					
					
					<div id="signup">   
					  <font color="white" ><h1>Sign Up</h1></font>
					  
					  <form action="" method="post">		 
						  
						  <div class="row" style="margin-bottom:35px;border:px solid black;">
						  
						  <div class="col-md-6" style="border:px solid black;"> 
						
						  
						  <input type="text" name="fname" id="fname" required  />		
						 <label>
							First Name<span class="req">*</span>
						  </label>
						  </div>
						  <div class="col-md-6" style="border:px solid black;"> 
						
						  
						  <input type="text" name="lname" id="lname" required  />		
						 <label>
							Last Name<span class="req">*</span>
						  </label>
						  </div>
						  
						  </div>						  
						
						  <div class="field-wrap">
							
							<input type="email"  name="email" id="email" required />
							<label>
							  Email_Id<span class="req">*</span>
							</label>
						  </div>
						  
						  <div class="field-wrap">
							
							<input type="tel"  name="mobile" id="mobile" maxlength="10" pattern="[0-9]{10}" required />
							<label>
							  Mobile NO<span class="req">*</span>
							</label>
						  </div>
						  
						  <div class="field-wrap">
							
							<input type="password"  name="pwd" id="pwd" maxlength="16" pattern="[0-9a-zA-Z@]{8,16}" required />
							<label>
							  Enter Password<span class="req">*</span>
							</label>
						  </div>
						  
						  <input type="submit" name="signup1" value="SIGN_UP" class="button button-block" 
						   style=" text-transform: none;background-color:#179b77"/>
					 
					<br>
							<div class="field-wrap" style="float:right">
							<li type="none" class="tab" style="color:white;"><font size="5">
							Already User&nbsp;
							<a href="#login" style="color:white">Log In</a></font></li>
							</div>
							
					  </form>

				 </div>			
				
			  </div><!-- tab-content -->
		  
		</div> <!-- /form -->
		<?php
		
		if(isset($_POST['forgot']))
		{		 
			$email=$_POST['email'];
			$acct=$_POST['acct'];
			
			if(!empty($email))
			{			  
				if($acct == 2)
					{	 
						echo $admin="SELECT mobile,password FROM tbllogin where mobile='$email' ";
						$sql5=mysqli_query($con, $admin);                  
						$row5=mysqli_fetch_array($sql5);
											
						if($row5 > 0)
						{
							$password=$row5['password'];
							
							?>
							<script>
								var password="<?php echo $password; ?>";
								function myFunction() 
								{
									alert("Send Admin PassWord Successfully..."+password);							
								setTimeout(function(){

									window.location.href = 'index.php'
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
									function myFunction() 
									{
										alert("Not Send PassWord Successfully..Admin.");							
									setTimeout(function(){

										window.location.href = 'index.php'
										});
									}
								   myFunction();
								</script>
						
								<?php	
						}
					  
					  
					}
					else
					{					
						echo $user111="SELECT mobile,password FROM tbluser where mobile='$email' ";
						$sql111=mysqli_query($con,$user111);					  
						$row12=mysqli_fetch_array($sql111);						
										
						if($row12 > 0)
						{
							echo $password1=$row12['password'];
							
							?>
								<script>
								   var password123="<?php echo $password1; ?>";
									function myFunction() 
									{
										alert("Send User PassWord Successfully..."+password123);							
									setTimeout(function(){

										window.location.href = 'index.php'
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
									function myFunction() 
									{
										alert("Not Send PassWord Successfully..User.");							
									setTimeout(function(){

										window.location.href = 'index.php'
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
							alert("Please Enter Mobile_No OR Email_Id...");
							
					setTimeout(function(){

					window.location.href = 'index.php'
					});
					}
				   myFunction();
				</script>
				
		    <?php
		    }
		
		
	}
		
	
	if(isset($_POST['login']))
	{		 
		$email=$_POST['email'];
		$pass=$_POST['password'];
		$acct=$_POST['acct'];
         
		  if($acct == 2)
			{	 
			    $admin="SELECT email,mobile,password FROM tbllogin where (mobile='$email' or email='$email') && password='$pass' ";
				$sql5=mysqli_query($con, $admin);                  
				$row5=mysqli_num_rows($sql5);
									
					if($row5 > 0)
					{     
						 $admin="Admin";
						$_SESSION["admin"]=$admin;
						?>
							<script>
							function myFunction() {
									alert("LogIn Successfully...");
									
							setTimeout(function(){

							window.location.href = 'admin_dashboard.php'
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
									alert("UserName And Password Not Available...");
									
							setTimeout(function(){

							window.location.href = 'index.php'
							});
							}
						   myFunction();
							</script>
							
						 <?php
					}					
						
				}		  
			  else if($acct == 1)
				{
					$user="SELECT accid,username,lname,email,mobile,password FROM tbluser where (mobile='$email' or email='$email') && password='$pass' ";
					$sql=mysqli_query($con, $user);                  
					$row=mysqli_fetch_array($sql);
									
					if($row > 0)
					{
					    $ab=$row['accid'];
						$_SESSION['id']=$ab;
						$fname=$row['username'];
						$lname=$row['lname'];
						$name=$fname." ".$lname;
						$_SESSION['name']=$name;
						
						?>
							<script>
							function myFunction() {
										alert("Login Successfully...");
										
								setTimeout(function(){

								window.location.href = 'user_dashboard.php'
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
									alert("UserName And Password Not Available...");
									
							setTimeout(function(){

							window.location.href = 'index.php'
							});
							}
						   myFunction();
							</script>
							
						 <?php
					}					
				
				}
				else
				{ 
				?>
					<script>
						function myFunction() {
								alert("You Enter Wrong Username OR Password...");
								
						setTimeout(function(){

						window.location.href = 'index.php'
						});
						}
					   myFunction();
					</script>							
				<?php
			   }				
	  
	   }
	
 ?>
  <script src='js/jquery.min.js'></script>
    <script src="js/index.js"></script>
	
	<script type=text/javascript>
    $(document).ready(function() {
        $('input').click(function(){
            $(this).css({'color': '#fff'});
        });
		
		$('.button').click(function(){		
			
            $('input').css({'color': '#fff'});
      
        });
		
    });
</script>

</body>
</html>

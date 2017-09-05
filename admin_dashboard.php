<?php
 include('navbar.php'); 
 
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
    <section class="content-header">
     
    </section>   
		<div class="row" style="margin-left:10px;">
				<div class="col-lg-4 col-md-6 col-md-4 col-lg-6  col-sm-4 col-sm-6">
						<div class="panel" style="background-color:#395cc6">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3" style="color:#ffffff">
										<i class="fa fa-tasks fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><font color="white">1</font></div>
										<div><a href="admin2_dashboard.php"><font color="white" size="5">Admin</font></a></div>
									</div>
								</div>
							</div>
							<a href="admin2_dashboard.php">
								<div class="panel-footer" style="color:#397BB6">
									<b><span class="pull-left">View Detail</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></b>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
                </div>
				
				<div class="col-lg-4 col-md-6 col-md-4 col-lg-6  col-sm-4 col-sm-6">
						<div class="panel" style="background-color:#395cc6">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3" style="color:#ffffff">
										<i class="fa fa-tasks fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><font color="white">2</font></div>
										<div><a href="cust2_dashboard.php"><font color="white" size="5">Customer</font></a></div>
									</div>
								</div>
							</div>
							<a href="cust2_dashboard.php">
								<div class="panel-footer" style="color:#397BB6">
									<b><span class="pull-left">View Detail</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></b>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
                </div>
				
						<?php
						
						include("includes/connection.php");
							
						$sel="select * from tblinsurance where status != 'Yes' ";
						$run=mysqli_query($con,$sel);
						 
						while($row=mysqli_fetch_array($run))
						{
							 
							if($row > 0)
							{
								$validity=$row['valid'];
								$date=$row['date2'];
								$mobile=$row['contact'];
								$status="Yes";
								
								if($validity === '6 Months')
								{
									$valid=date('Y-m-d', strtotime('6 months', strtotime($date)));					
										
										date_default_timezone_set("Asia/Kolkata");
				  
										$accessTime = $_SERVER['REQUEST_TIME'];

										$time=date('Y-m-d', $accessTime); 
									
									if($valid === $time)
									{										
																				
										$Message="Hi Vehicle Mgnt System Your Vehicle Insurance Date Is Expire";	
		
										$xml_data ='<?xml version="1.0"?> 
												<parent>
                                                    <child>
                                                        <user>revatech</user>
                                                        <key>0f016dca70XX</key>
                                                        <mobile>'.$mobile.'</mobile>
                                                        <message>'.$Message.'</message>
                                                        <accusage>2</accusage>
                                                         <senderid>INFOSM</senderid>
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
												
									$sqlsa="UPDATE tblinsurance SET status = '".$status."' where date2='$date' ";  
											$ressave = mysqli_query($con, $sqlsa);	
										
									}
									else
									{
										//echo "No Date Expire1";
									}
										
										
								}
								else if($validity === '1 Year')
								{
										$valid=date('Y-m-d', strtotime('1 Year', strtotime($date)));
										
										date_default_timezone_set("Asia/Kolkata");
				  
										$accessTime = $_SERVER['REQUEST_TIME'];

										$time=date('Y-m-d', $accessTime);
										
									if($valid === $time)
									{									
										$Message="Hi Vehicle Mgnt System Your Vehicle Insurance Date Is Expire";	
		
										$xml_data ='<?xml version="1.0"?> 
												<parent>
                                                    <child>
                                                        <user>revatech</user>
                                                        <key>0f016dca70XX</key>
                                                        <mobile>'.$mobile.'</mobile>
                                                        <message>'.$Message.'</message>
                                                        <accusage>2</accusage>
                                                         <senderid>INFOSM</senderid>
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
												
										$sqlsa="UPDATE tblinsurance SET status = '".$status."' where date2='$date' ";  
												$ressave = mysqli_query($con, $sqlsa);												
										
									}
									else
									{
										//echo "No Date Expire2";
									}	
									
								}
								else
								{
										$valid=date('Y-m-d', strtotime('3 Year', strtotime($date)));
									
										date_default_timezone_set("Asia/Kolkata");
				  
										$accessTime = $_SERVER['REQUEST_TIME'];

										$time=date('Y-m-d', $accessTime);
										
									if($valid === $time)
									{
										$Message="Hi Vehicle Mgnt System Your Vehicle Insurance Date Is Expire";	
		
										$xml_data ='<?xml version="1.0"?> 
												<parent>
                                                    <child>
                                                        <user>revatech</user>
                                                        <key>0f016dca70XX</key>
                                                        <mobile>'.$mobile.'</mobile>
                                                        <message>'.$Message.'</message>
                                                        <accusage>2</accusage>
                                                         <senderid>INFOSM</senderid>
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
												
									$sqlsa="UPDATE tblinsurance SET status = '".$status."' where date2='$date' ";  
											$ressave = mysqli_query($con, $sqlsa);		
												
									}
									else
									{
										//echo "No Date Expire3";
									}	
										
								}
							}
							else
							{
								echo "<script>alert('Please Login..!');</script>";

							}
						}	
						?>		
				
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

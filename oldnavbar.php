<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Vehicle Management System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons >
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<style>
div,h4,h1,h2,h5,h3{
font-family:cambria;
}
a
{
	color:white;
}
</style>
<script>/*
		function getUserNamePassword()
		{
			var LogIdPwd = document.getElementById("LogIdPwd").value;	
			alert("Account Number: "+LogIdPwd);
		}*/
	</script>	
 
</head>
<body class="hold-transition skin-blue sidebar-mini" style="background-color:#4663b9;"style="margin-top:0px;" >
<div class="wrapper" >

  <header class="main-header" style="background-color:#4663b9;">
    <!-- Logo -->
    <a href="user_dashboard.php" class="logo" style="background-color:#4663b9;" >
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b></b></span>
      <!-- logo for regular state and mobile devices -->
      <img src="image/logo.png" class="img-circle" alt="logo" style="border:1px solid black;width:70%;height:60px;" >
      
	 </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background-color:#4663b9;">
      <!-- Sidebar toggle button-->
			<h2 style="margin-top:-35px;">
			  <a href="user_dashboard.php" class="sidebar-toggle" data-toggle="offcanvas" role="button" style="background-color:#4663b9;">
				<span style="margin-top:-35px;margin-left:200px">Vehicle Management System</span>		
			  </a>
			</h2>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="abc dropdown user user-menu">
            <a href="index2.php" class="dropdown-toggle"  title="Logout">
				<h4><i class="fa fa-sign-out "></i>
              <span class="hidden-xs"><em>Log Out</em></h4></span>
            </a>
           
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar" style="margin-top:30px;background-color:#4663b9;"  >
    <em><!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
       
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header" style="background-color:#4663b9;color:white;">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="user_dashboard.php" style="background-color:#4663b9;">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a>
            <i class="fa fa-user"></i>
            <span><em>Customer</em></span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
				<li><a href="#"><i class="fa fa-info "></i>&nbsp;Customer Information</a></li>				
          </ul>
        </li>	
        
      </ul>
    </section>
    <!-- /.sidebar -->
	</em>
  </aside>
  <script src="js/jquery.min.js"></script>
  <script>
$(document).ready(function(){

    $(".abc").mouseover(function(){
        $(".abc").css("background-color", "#a3b1dc");       
    });
    $(".abc").mouseout(function(){
        $(".abc").css("background-color", "#4663b9");
    });
});
</script>

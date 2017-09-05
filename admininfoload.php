  <?php 
			error_reporting('E_ALL');

	include_once('includes/connection.php');	
	session_start();
     $sid=$_SESSION['admin'];	
	
	$sql = "SELECT * FROM tbllogin";	
	
   $res = mysqli_query($con,$sql);            							
				
					?>        
		<table class="table table-bordered" id="dataTable">
				<tr bgcolor="#E6E6FA">	 
					<th >Id</th>
					<th >Contact_No</th>
					<th >Email_Id</th>
					<th >Password</th>					
					
					<th class="text-center" colspan="2" >Options</th>
			    </tr>				
				
				<?php	
	  
				  while($row=mysqli_fetch_array($res))
						{
						?>
						<tr>
						
						<td ><?php echo $row['0'];?></td>
						<td ><?php echo $row['1'];?></td>
						<td ><?php echo $row['2'];?></td>
						<td ><?php echo $row['3'];?></td>
						<td class="text-center">
						
						<input type="button" class="btn btn-info btn-sm" name="Edit" value="Update" 
						 data-toggle="modal" data-target="#myModal_<?php echo $row['id'];?>" ></td>
						</tr>	
	

             <!-- Edit Modal -->
  <div class="modal fade" id="myModal_<?php echo $row['id'];?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Admin Updation </h4>
        </div>
        <div class="modal-body" id='col'>
          
		<form name="CustomerForm" method="POST" enctype="multipart/form-data" action="">
			<div class="log">										
										
					<div class="row" style="margin-top:15px;">				
					<div class="col-sm-offset-3 col-sm-3" >
					<label class="lsideindex">Mobile_No.</label>
					</div>	
					<div class="col-sm-6">
					<input type="text" class="check2 rside" name="accid" id="accid"
					value="<?php echo $row['1']?>" readonly />
					</div>
					</div>

					<div class="row" style="margin-top:10px;">				
					<div class="col-sm-offset-3 col-sm-3" >
					<label class="lsideindex">Email_Id</label>
					</div>	
					<div class="col-sm-6">
					<input type="text" class="check2 rside" name="cname" id="cname" 
					value="<?php echo $row['2']?>" required />
					</div>
					</div>								

					<div class="row" style="margin-top:10px;">

					<div class="col-sm-offset-3 col-sm-3" >
					<label class="lsideindex">Password</label>
					</div>	
					<div class="col-sm-6">
					<input type="text" class="check2 rside" name="add" id="add"
					value="<?php echo $row['3']?>" required />
					</div>
					</div>								

					<div class="row text-center" style="margin-top:10px;">
						<div class="col-sm-offset-3 col-sm-6" style="margin-top:;">
							<button type="button" class="btn btn-info input-sm" data-dismiss="modal">Cancel</button>
							<button type="button" class="edit btn btn-success input-sm" id="<?php echo $row['id'];?>" data-dismiss="modal">Edit</button>
						</div>	
					</div>				
				
					</div>
            </form>					
										
					
		        </div>
         
		 <div class="modal-footer"> 
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
	   
      </div>
      <!-- / Modal Content -->
    </div>
  </div>
  <!-- /Edit Modal -->  
      
  </tr>
                 <?php 
						}
						
					?>
						
</table>

         <?php
	if(isset($_POST['values'])) 
	{	
		 $values = $_POST['values'];
		 $id= $_POST['id'];		
		
		 $mobile = $values[0];	 
		 $email = $values[1];		 
		 $password = $values[2];		 
		 
		echo $sqlUpdate = "UPDATE tbllogin SET mobile = '".$mobile."', email = '".$email."', 
		password = '".$password."' WHERE id = ".$id;

		mysqli_query($con, $sqlUpdate);
	}	
		
?>

		
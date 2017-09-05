 <?php 
	
	error_reporting('E_ALL');
		
		session_start();
		$sid=$_SESSION['admin'];	
		 
	include_once('includes/connection.php');	
	
	if(isset($_POST['value']))
	{
		$fname=$_POST['value'];

	 $sql = "SELECT * FROM tblinsurance where insu_name = '$fname' ";		
	
	}
	else
	{
		$sql = "SELECT * FROM tblinsurance";
	}
   $res = mysqli_query($con,$sql);            							
					
	?> 
					
		<table class="table table-bordered" id="dataTable">
				<tr bgcolor="#E6E6FA">	 
					<th >Account Id</th>
					<th >Insured Name</th>
					<th >Address</th>
					<th >Validity</th>
					<th >Insurance Date</th>
					<th >Contact</th>
					<th >Email_ID</th>
					<th >Model No.</th>
					
					<th class="text-center" colspan="2" >Options</th>
			    </tr>
				
				
				<?php	
	  
				  while($row=mysqli_fetch_array($res))
						{
						?>
						<tr>
						
						<td ><?php echo $row['1'];?></td>
						<td ><?php echo $row['2'];?></td>
						<td ><?php echo $row['3'];?></td>
						<td ><?php echo $row['4'];?></td>
						<td ><?php echo $row['5'];?></td>
						<td ><?php echo $row['9'];?></td>
						<td ><?php echo $row['10'];?></td>
						<td ><?php echo $row['11'];?></td>
						<td class="text-center">
						
						<input type="button" class="btn btn-info btn-sm" name="Edit" value="Update" 
						 data-toggle="modal" data-target="#myModal_<?php echo $row['id'];?>" >
						 </td>
						 <td class="text-center">
						
						<input type="button" class="btn btn-danger btn-sm" name="Delete" value="Delete" 
						data-toggle="modal" data-target="#myModalD_<?php echo $row['id'];?>" >
					</td>	
					
	<div class="modal fade" id="myModalD_<?php echo $row['id'];?>" role="dialog">
     <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Insurance Details </h4>
        </div>
        <div class="modal-body">
          
		<form name="CustomerForm" method="POST" action="" enctype="multipart/form-data">
		<div class="form-group">
			<div class="text-center">					
				
				<input type="hidden" value="<?php echo $row['id'];?>" name="id" >
				<?php echo "<b>Do You Want To Delete Selected Insured_Name Details ?</b>"?>
								
				</div>
				<BR>
				<BR>
				<div class="text-center">
					<button type="button" class="btn btn-info input-sm" data-dismiss="modal">Cancel</button>
					<button type="button" class="delete btn btn-success input-sm" id="<?php echo $row['id'];?>" data-dismiss="modal">OK</button>
										
				</div>
				 </div>	
				 </form>
         </div>
		<div class="modal-footer"> 
		 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
	   
      </div>
      
    </div>
  </div>	
	

             <!-- Edit Modal -->
  <div class="modal fade" id="myModal_<?php echo $row['id'];?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Insurance Updation Form</h4>
        </div>
        <div class="modal-body" id='col'>
          
		<form name="CustomerForm" method="POST" enctype="multipart/form-data" action="">
			<div class="log">										
							
					<div class="row" style="margin-top:5px;">				
					<div class="col-sm-offset-3 col-sm-3" >
					<label class="lsideindex">Account Id.</label>
					</div>	
					<div class="col-sm-6">
					<input type="text" class="check2 rside" name="cname" id="cname" 
					value="<?php echo $row['1']?>" readonly />
					</div>
					</div>								

					<div class="row" style="margin-top:5px;">

					<div class="col-sm-offset-3 col-sm-3" >
					<label class="lsideindex">Insured Name</label>
					</div>	
					<div class="col-sm-6">
					<input type="text" class="check2 rside" name="add" id="add"
					value="<?php echo $row['2']?>" required />
					</div>
					</div>										
					
					<div class="row" style="margin-top:5px;">
					<div class="col-sm-offset-3 col-sm-3" >
					<label class="lsideindex">Address</label>
					</div>	
					<div class="col-sm-6">
					<input type="text" class="check2 rside" value="<?php  Echo $row['3']?>" required>						
					</div>
					</div>
					
					<div class="row" style="margin-top:5px;">
					<div class="col-sm-offset-3 col-sm-3" >
					<label class="lsideindex">Validity</label>
					</div>	
					<div class="col-sm-6">
					<input type="text" class="check2 rside" name="lno" id="lno"
					value="<?php echo $row['4']?>"  readonly />
					</div>
					</div>

					<div class="row" style="margin-top:5px;">

					<div class="col-sm-offset-3 col-sm-3" >
					<label class="lsideindex">Insurance Date</label>
					</div>	
					<div class="col-sm-6">
					<input type="text" class="check2 rside" name="contact" maxlength="10" 
					id="contact" value="<?php echo $row['5']?>" readonly />
					</div>
					</div>

					<div class="row" style="margin-top:5px;">
					<div class="col-sm-offset-3 col-sm-3" >
					<label class="lsideindex">Contact</label>
					</div>	
					<div class="col-sm-6">
					<input type="text" class="check2 rside" maxlength="10" name="prof" id="prof" 
					 value="<?php echo $row['9']?>" >
					 </div>
					</div>
					
					<div class="row" style="margin-top:5px;">

					<div class="col-sm-offset-3 col-sm-3" >
					<label class="lsideindex">Email_ID	</label>
					</div>	
					<div class="col-sm-6">
					<input type="text" class="check2 rside" name="dob" id="dob" 
					 value="<?php echo $row['10']?>" >
					 </div>
					</div>
					<div class="row" style="margin-top:5px;">

					<div class="col-sm-offset-3 col-sm-3" >
					<label class="lsideindex">Model No.</label>
					</div>	
					<div class="col-sm-6">
					<input type="text" class="check2 rside" name="email" id="email" 
					 value="<?php echo $row['11']?>" >
					 </div>
					</div>				
					
					<div class="row text-center" style="margin-top:5px;">
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
		
		if($values[0]=='delete' )
		{
			echo $del="Delete from tblinsurance where id='$id' ";
			mysqli_query($con, $del );				
				
		} 
		else
		{
		// $aid = $values[0];	 
		 $cname = $values[1];		 
		 $address = $values[2];
		// $bdate = $values[3];		
		 //$price = $values[4];
		 $contact = $values[5];		
		 $email = $values[6];
		$mno = $values[7];				
		$status="No";
		
		echo $sqlUpdate = "UPDATE tblinsurance SET insu_name = '".$cname."', address = '".$address."', 
				contact = '".$contact."', status = '".$status."', email = '".$email."', mno = '".$mno."' 
				WHERE id = '".$id."' ";

		mysqli_query($con, $sqlUpdate);
	}	
	}	
?>

		
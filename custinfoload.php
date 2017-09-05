 <?php 
	
	error_reporting('E_ALL');

	include_once('includes/connection.php');	
	
	if(isset($_POST['value']))
	{
		$fname=$_POST['value'];

	 $sql = "SELECT * FROM tblcust where firstname = '$fname' ";		
	
	}
	else
	{
		$sql = "SELECT * FROM tblcust";
	}
   $res = mysqli_query($con,$sql);            							
				
					?>        
		<table class="table table-bordered" id="dataTable">
				<tr bgcolor="#E6E6FA">	 
					<th >Id</th>
					<th >Accid</th>
					<th >Name</th>
					<th >Address</th>
					<th >Gender</th>

					<th >Licence_No</th>
					<th >Contact</th>
					<th >Proffession</th>
					<th >DOB</th>
					<th >Email</th>

					
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
						<td ><?php echo $row['4'];?></td>
						<td ><?php echo $row['5'];?></td>
						<td ><?php echo $row['6'];?></td>
						<td ><?php echo $row['7'];?></td>
						<td ><?php echo $row['8'];?></td>
						<td ><?php echo $row['9'];?></td>
						<td class="text-center">
						
						<input type="button" class="btn btn-info btn-sm" name="Edit" value="Update" 
						 data-toggle="modal" data-target="#myModal_<?php echo $row['id'];?>" ></td>
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
          <h4 class="modal-title text-center">Customer </h4>
        </div>
        <div class="modal-body">
          
		<form name="CustomerForm" method="POST" action="" enctype="multipart/form-data">
		<div class="form-group">
			<div class="text-center">					
				
				<input type="hidden" value="<?php echo $row['id'];?>" name="id" >
				<?php echo "<b>Do You Want To Delete Selected Customer ?</b>"?>
								
				</div>
				<BR>
				<BR>
				<div class="text-center">
					<button type="button" class="btn btn-info input-sm" data-dismiss="modal">Cancel</button>
					<button type="button" class="delete btn btn-success input-sm" id="<?php echo $row['id'];?>" data-dismiss="modal"> Ok</button>
										
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
          <h4 class="modal-title text-center">Customer Updation Form</h4>
        </div>
        <div class="modal-body" id='col'>
          
		<form name="CustomerForm" method="POST" enctype="multipart/form-data" action="">
			<div class="log">										
										
					<div class="row" style="margin-top:5px;">				
					<div class="col-sm-offset-3 col-sm-3" >
					<label class="lsideindex">Accid</label>
					</div>	
					<div class="col-sm-6">
					<input type="text" class="check2 rside" name="accid" id="accid"
					value="<?php echo $row['1']?>" readonly />
					</div>
					</div>

					<div class="row" style="margin-top:5px;">				
					<div class="col-sm-offset-3 col-sm-3" >
					<label class="lsideindex">Cutomer Name</label>
					</div>	
					<div class="col-sm-6">
					<input type="text" class="check2 rside" name="cname" id="cname" 
					value="<?php echo $row['2']?>" readonly />
					</div>
					</div>								

					<div class="row" style="margin-top:5px;">

					<div class="col-sm-offset-3 col-sm-3" >
					<label class="lsideindex">Address</label>
					</div>	
					<div class="col-sm-6">
					<input type="text" class="check2 rside" name="add" id="add"
					value="<?php echo $row['3']?>" required />
					</div>
					</div>										
					
					<div class="row" style="margin-top:5px;">
					<div class="col-sm-offset-3 col-sm-3" >
					<label class="lsideindex">Gender</label>
					</div>	
					<div class="col-sm-6">
					<input class="check2 rside" value="<?php  Echo $row['4']?>" readonly>						
					</div>
					</div>
					
					<div class="row" style="margin-top:5px;">
					<div class="col-sm-offset-3 col-sm-3" >
					<label class="lsideindex">Licence_No.</label>
					</div>	
					<div class="col-sm-6">
					<input type="text" class="check2 rside" name="lno" id="lno"
					value="<?php echo $row['5']?>"  readonly />
					</div>
					</div>

					<div class="row" style="margin-top:5px;">

					<div class="col-sm-offset-3 col-sm-3" >
					<label class="lsideindex">Contact</label>
					</div>	
					<div class="col-sm-6">
					<input type="text" class="check2 rside" name="contact" maxlength="10" 
					id="contact" value="<?php echo $row['6']?>" />
					</div>
					</div>

					<div class="row" style="margin-top:5px;">
					<div class="col-sm-offset-3 col-sm-3" >
					<label class="lsideindex">Proffession</label>
					</div>	
					<div class="col-sm-6">
					<input type="text" class="check2 rside" name="prof" id="prof" 
					 value="<?php echo $row['7']?>" >
					 </div>
					</div>
					
					<div class="row" style="margin-top:5px;">

					<div class="col-sm-offset-3 col-sm-3" >
					<label class="lsideindex">DOB</label>
					</div>	
					<div class="col-sm-6">
					<input type="date" class="check2 rside" name="dob" id="dob" 
					 value="<?php echo $row['8']?>" readonly>
					 </div>
					</div>
					<div class="row" style="margin-top:5px;">

					<div class="col-sm-offset-3 col-sm-3" >
					<label class="lsideindex">Email_Id</label>
					</div>	
					<div class="col-sm-6">
					<input type="email" class="check2 rside" name="email" id="email" 
					 value="<?php echo $row['9']?>" readonly>
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
			$sel2="select * from tblcust where id='$id' ";
			$run=mysqli_query($con, $sel2);
			$rows=mysqli_fetch_array($run);
			$id123=$rows['accid'];

			$del="Delete from tblcust where id='$id' ";
			mysqli_query($con, $del );
					
			$del1="Delete from tbluser where accid='$id123' ";
			mysqli_query($con, $del1);
			
			$del2="Delete from tblinsurance where accid='$id123' ";
			mysqli_query($con, $del2);
			
			$del3="Delete from tblvehicle where custaccid='$id123' ";
			mysqli_query($con, $del3);		
		} 
		else
		{
		 $accid = $values[0];	 
		 $name = $values[1];		 
		 $address = $values[2];
		 $gender = $values[3];		
		 $lno = $values[4];
		 $contact = $values[5];		
		 $prof = $values[6];
		$bdate = $values[7];
		$email = $values[8];	
	
		echo $sqlUpdate = "UPDATE tblcust SET firstname = '".$name."', address = '".$address."', 
		gender = '".$gender."',contact = '".$contact."',proffession = '".$prof."',dob = '".$bdate."'
		,email = '".$email."'	WHERE id = ".$id;

		mysqli_query($con, $sqlUpdate);
	}	
	}	
?>

		
 <?php 
	
	error_reporting('E_ALL');
		
		session_start();
		$sid=$_SESSION['admin'];	
		 
	include_once('includes/connection.php');	
	
	if(isset($_POST['value']))
	{
		$fname=$_POST['value'];

	 $sql = "SELECT * FROM tblvehicle where vno = '$fname' ";		
	
	}
	else
	{
		$sql = "SELECT * FROM tblvehicle";
	}
   $res = mysqli_query($con,$sql);            							
					
	?> 
<script>
	 function readURL(input) {
		
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) 
			{
                $('.blah').attr('src', e.target.result);
				
            }
             
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $(".imgInp").change(function(){
        readURL(this);
		
    });
</script>					
		<table class="table table-bordered" id="dataTable">
				<tr bgcolor="#E6E6FA">	 
					<th >Account Id</th>
					<th >Company Name</th>
					<th >Vehicle No.</th>
					<th >Buying Date</th>
					<th >Price</th>
					<th >Image</th>
					<th >Fuel Type</th>
					<th >Model No.</th>
					<th >Chassis/ Engine No.</th>
					<th >Vehicle Type</th>
					
					<th class="text-center" colspan="2" >Options</th>
			    </tr>
				
				
				<?php	
	  
				  while($row=mysqli_fetch_array($res))
						{
						?>
						<tr>
						
						<td ><?php echo $row['1'];?></td>
						<td ><?php echo $row['3'];?></td>
						<td ><?php echo $row['4'];?></td>
						<td ><?php echo $row['7'];?></td>
						<td ><?php echo $row['8'];?></td>
						<td ><img src="Images/<?php echo $row['9'];?>" height="50" width="100" ></td>
						<td ><?php echo $row['10'];?></td>
						<td ><?php echo $row['11'];?></td>
						<td ><?php echo $row['12'];?></td>
						<td ><?php echo $row['13'];?></td>
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
          <h4 class="modal-title text-center">Vehicle Details </h4>
        </div>
        <div class="modal-body">
          
		<form name="CustomerForm" method="POST" action="" enctype="multipart/form-data">
		<div class="form-group">
			<div class="text-center">					
				
				<input type="hidden" value="<?php echo $row['id'];?>" name="id" >
				<?php echo "<b>Do You Want To Delete Selected Customer Vehicle Details ?</b>"?>
								
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
          <h4 class="modal-title text-center">Vehicle Updation Form</h4>
        </div>
        <div class="modal-body" id='col'>
          
		<form name="CustomerForm" method="POST" enctype="multipart/form-data" action="">
			<div class="log">										
							
					<div class="row" style="margin-top:5px;">				
					<div class="col-sm-offset-3 col-sm-3" >
					<label class="lsideindex">Account No.</label>
					</div>	
					<div class="col-sm-6">
					<input type="text" class="check2 rside" name="cname" id="cname" 
					value="<?php echo $row['1']?>" readonly />
					</div>
					</div>								

					<div class="row" style="margin-top:5px;">

					<div class="col-sm-offset-3 col-sm-3" >
					<label class="lsideindex">Company Name</label>
					</div>	
					<div class="col-sm-6">
					<input type="text" class="check2 rside" name="add" id="add"
					value="<?php echo $row['3']?>" required />
					</div>
					</div>										
					
					<div class="row" style="margin-top:5px;">
					<div class="col-sm-offset-3 col-sm-3" >
					<label class="lsideindex">Vehicle No</label>
					</div>	
					<div class="col-sm-6">
					<input type="text" class="check2 rside" value="<?php  Echo $row['4']?>" readonly>						
					</div>
					</div>
					
					<div class="row" style="margin-top:5px;">
					<div class="col-sm-offset-3 col-sm-3" >
					<label class="lsideindex">Buying Date.</label>
					</div>	
					<div class="col-sm-6">
					<input type="text" class="check2 rside" name="lno" id="lno"
					value="<?php echo $row['7']?>"  readonly />
					</div>
					</div>

					<div class="row" style="margin-top:5px;">

					<div class="col-sm-offset-3 col-sm-3" >
					<label class="lsideindex">Price</label>
					</div>	
					<div class="col-sm-6">
					<input type="text" class="check2 rside" name="contact" maxlength="10" 
					id="contact" value="<?php echo $row['8']?>" />
					</div>
					</div>

					<div class="row" style="margin-top:5px;">
					<div class="col-sm-offset-3 col-sm-3" >
					<label class="lsideindex">Image</label>
					</div>	
					<div class="col-sm-6">
					<input type="text" class="check2 rside" name="prof" id="prof" 
					 value="<?php echo $row['9']?>" readonly>
					 </div>
					</div>
					
					<div class="row" style="margin-top:5px;">

					<div class="col-sm-offset-3 col-sm-3" >
					<label class="lsideindex">Fuel Type	</label>
					</div>	
					<div class="col-sm-6">
					<input type="text" class="check2 rside" name="dob" id="dob" 
					 value="<?php echo $row['10']?>" readonly>
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

					<div class="row" style="margin-top:5px;">

					<div class="col-sm-offset-3 col-sm-3" >
					<label class="lsideindex">Chassis/Engine_No.</label>
					</div>	
					<div class="col-sm-6">
					<input type="text" class="check2 rside" name="email" id="email" 
					 value="<?php echo $row['12']?>" >
					 </div>
					</div>

					<div class="row" style="margin-top:5px;">

					<div class="col-sm-offset-3 col-sm-3" >
					<label class="lsideindex">Vehicle Type	</label>
					</div>	
					<div class="col-sm-6">
					<input type="text" class="check2 rside" name="email" id="email" 
					 value="<?php echo $row['13']?>" readonly>
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
			echo $del="Delete from tblvehicle where id='$id' ";
			mysqli_query($con, $del );				
				
		} 
		else
		{
		 $aid = $values[0];	 
		 $cname = $values[1];		 
		 $vno = $values[2];
		 $bdate = $values[3];		
		 $price = $values[4];
		 $image1 = $values[5];		
		 $ftype = $values[6];
		$mno = $values[7];
		$ceno = $values[8];		
	
		echo $sqlUpdate1 = "UPDATE tblvehicle SET cname = '".$cname."', vno = '".$vno."', 
				bdate = '".$bdate."',price= '".$price."',image = '".$image1."',ftype = '".$ftype."'
				,mno = '".$mno."',ceno = '".$ceno."' WHERE id = ".$id;

		mysqli_query($con, $sqlUpdate1);
	}	
	}	
?>

		
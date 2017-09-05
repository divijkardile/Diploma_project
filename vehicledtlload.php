 <?php 
	
	error_reporting('E_ALL');

	include_once('navbar.php');	
	include_once('includes/connection.php');	
	session_start();
    echo $sid=$_SESSION['admin'];	
	
	$sql = "SELECT * FROM tblvehicle";	
	
   $res = mysqli_query($con,$sql);            							
				
	?> 
<script>
	 function readURL(input) {
		 alert(input);
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
		<table class="table table-bordered" id="dataTable">
				<tr bgcolor="#E6E6FA">	 
					<th >Id</th>
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
						
						<td ><?php echo $row['0'];?></td>
						<td ><?php echo $row['3'];?></td>
						<td ><?php echo $row['4'];?></td>
						<td ><?php echo $row['7'];?></td>
						<td ><?php echo $row['8'];?></td>
						<td ><img src="Images/<?php echo $row['9'];?>" height="100" width="200" ></td>
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
		 $_POST['file'];
		if($values[0]=='delete' )
		{

		 $del="Delete from tblcust where id='$id' ";
		mysqli_query($con, $del );
		
		} 
		else
		{

			$aid = $values[0];	 
			$cname = $values[1];		 
			$vno = $values[2];
			$bdate = $values[3];		
			$price = $values[4];
			$image = $values[5];		
			$image1 = $values[6];		
			$ftype = $values[7];
			$mno = $values[8];
			$ceno = $values[9];	
			$vtype = $values[10];	  
			
			echo $a=$_FILES['file'];
			/*
			if($image == '')
			{				
				echo $sqlUpdate = "UPDATE tblcust SET cname = '".$cname."', vno = '".$vno."', 
				bdate = '".$bdate."',price= '".$price."',image = '".$image1."',ftype = '".$ftype."'
				,mno = '".$mno."',ceno = '".$ceno."',vehiclet = '".$vtype."'	WHERE id = ".$id;

				//mysqli_query($con, $sqlUpdate);
			}
			else
			{
					
				echo $file = pathinfo($_FILES['$image1']['name'], PATHINFO_FILENAME);
				echo $name=addslashes($_FILES['image']['name']);
				$file_loc = $_FILES[$image1]['tmp_name'];
				$folder="Images/";
				move_uploaded_file($file_loc,$folder.$file);	

				echo $sqlUpdate = "UPDATE tblcust SET cname = '".$cname."', vno = '".$vno."', 
				bdate = '".$bdate."',price= '".$price."',image = '".$a."',ftype = '".$ftype."'
				,mno = '".$mno."',ceno = '".$ceno."',vehiclet = '".$vtype."'	WHERE id = ".$id;

				//mysqli_query($con, $sqlUpdate);
			}*/
		}				
	}				
?>

		
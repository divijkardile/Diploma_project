<?php
	include_once('includes/connection.php');

	header('Content-Type: application/json');

	$q = strtolower($_GET["q"]);
	if (!$q) return;

	 $SQLIsMember = "select vno from tblvehicle where vno LIKE '%$q%'";
				$ResIsMember = mysqli_query($con, $SQLIsMember);
				
	$ResIsMember = mysqli_query($con, $SQLIsMember);

	$json=array();

	while($rs = mysqli_fetch_array($ResIsMember)) {
		array_push($json, trim($rs['vno']));
	}
	echo json_encode($json);
?>
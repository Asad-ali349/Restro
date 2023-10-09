<?php
include_once('session.php');
$response=['error'=>true];
if (isset($_POST['id'])) {
	$iD=$_POST['id'];
	$query="DELETE FROM cart WHERE id=".$iD;
	$delete=mysqli_query($conn,$query);
	if ($delete==true) {
		$response['error']=false;
		$response['msg']="Deleted Successfully";
		header('content-Type:application/json');
        echo json_encode($response);
	}else{
		$response['msg']="Unable to Delete";
		header('content-Type:application/json');
        echo json_encode($response);
	}	
}


?>
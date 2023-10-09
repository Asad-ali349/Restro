<?php
include_once('../db/conn.php');
$response=array('error' =>false);
if ($_POST['hotel_id']&&$_POST['old_password']&& $_POST['new_password'] ) 
{
	$hotelid = $_POST['hotel_id'];
	$reponse['id']=$hotelid;
	$old_password = $_POST['old_password'];
	$new_password = $_POST['new_password'];
	
	$check = "SELECT * FROM hotel WHERE id = '$hotelid'";	
	$result = mysqli_query($conn,$check);

	if (mysqli_num_rows($result)>0) 
	{
		$data = $result->fetch_array();


		
		if($old_password == $data['password'])
		{
         // return userdata
			$sql = "UPDATE hotel SET password='$new_password' WHERE id='$hotelid'";
			$result_sql=mysqli_query($conn,$sql);
			if ($result_sql) {
				$response['success_msg']="Password Changed Successfully";
				header('content-Type:application/json');
				echo json_encode($response);

			}else{
				$response['error']=true;
				$response['error_msg']="Cannot Change Password";
				header('content-Type:application/json');
				echo json_encode($response);
			}

				
        }
        else
        {
        	//Wrong old_password
        	$response['error']=true;
			$response['error_msg']="Incorrect old_password";
			header('content-Type:application/json');
			echo json_encode($response);
        }
	}
	else
	{
		//email not found
		$response['error']=true;
		$response['error_msg']="User not found";
		header('content-Type:application/json');
		echo json_encode($response);

	}

}
else
{
// parameters missings
	$response['error']=true;
	$response['error_msg']="parameters not found";
	header('content-Type:application/json');
	echo json_encode($response);
}

?>
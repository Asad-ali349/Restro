<?php
include_once('../db/conn.php');
$response=array('error' =>false);
if ($_POST['email']) 
{
	$email = $_POST['email'];
	
	
// 	$check = "SELECT * FROM hotel WHERE email = '$email'";	
// 	$result = mysqli_query($conn,$check);

// 	if (mysqli_num_rows($result)>0) 
// 	{
// 		$data = $result->fetch_array();
// 		$msg="hello! Asad";
// 		mail("asadking066@gmail.com","reset",$msg);
// 		$response['sucess_msg']="sent";
// 		header('content-Type:application/json');
// 		echo json_encode($response);


// 	}
// 	else
// 	{
// 		//email not found
// 		$response['error']=true;
// 		$response['error_msg']="email not found";
// 		header('content-Type:application/json');
// 		echo json_encode($response);

// 	}
        
		$msg="hello! Asad";
		$msg = wordwrap($msg, 70, "\r\n");
		$success=mail("asadking066@gmail.com","reset password",$msg);
    	if (!$success) {
            $response['msg'] = error_get_last()['message'];
        }else{
            $response['success_msg']="sent";
        }
		
		header('content-Type:application/json');
		echo json_encode($response);

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
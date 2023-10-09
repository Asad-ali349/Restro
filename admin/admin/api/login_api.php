<?php
include_once('../db/conn.php');
$response=array('error' =>false);
if ($_POST['email']&&$_POST['password']) 
{
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$check = "SELECT * FROM hotel WHERE email = '$email'";	
	$result = mysqli_query($conn,$check);

	if (mysqli_num_rows($result)>0) 
	{
		$data = $result->fetch_array();


		
		if($password == $data['password'])
		{
         // return userdata
			if ($data['status']=="1") {
				$response['error']=false;
				$response['success_msg']="Logged In Successfully";
				
				$response['id']=$data['id'];
				$response['name']=$data['name'];
				$response['email']=$data['email'];
				$response['email']=$data['email'];
				$response['status']=$data['status'];
				$response['token']=$data['token'];
				$response['expiry']=$data['expiry'];
				if ($data['logo']=="") {
					$response['logo']="0";
				}else{
					$response['logo']=$data['logo'];
				}
				$t=strtotime($data['created_at']);

				$response['created_at']=date('y/m/d',$t);
				$t=strtotime($data['updated_at']);
				$response['updated_at']=date('y/m/d',$t);

				header('content-Type:application/json');
				echo json_encode($response);
			}
			else
			{
				$response['error']=true;
				$response['error_msg']="You are blocked";
				header('content-Type:application/json');
				echo json_encode($response);
			}	

			

        }
        else
        {
        	//Wrong password
        	$response['error']=true;
			$response['error_msg']="Incorrect Password";
			header('content-Type:application/json');
			echo json_encode($response);
        }
	}
	else
	{
		//email not found
		$response['error']=true;
		$response['error_msg']="email not found";
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
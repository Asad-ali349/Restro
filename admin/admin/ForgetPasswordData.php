<?php
include_once ('db/conn.php');
session_start();
if (isset($_POST['submit'])) {
	$email=$_POST['email'];

	$sql="SELECT * FROM hotel WHERE email='$email'";
	$result_sql=mysqli_query($conn,$sql);
	if (mysqli_num_rows($result_sql)>0) {
		 $data = $result_sql->fetch_array();
		// header("Location: ChangePassword?id=".$data['id']);
		$_SESSION['f_id'] = $data['id'];
		$msg="http://restro.cert-pro.net/admin/ChangePassword.php?id=".$data['id'];
		$msg = wordwrap($msg, 70, "\r\n");
		$success=mail($email,"reset password",$msg);
    	if (!$success) {
            $response = error_get_last()['message'];
            echo $response;
        }else{
           
            echo "sent";
        }
	}
	else
	{
		$msg = "Enter valid email...!"; 
		echo "<script type='text/javascript'>alert('$msg');</script>";
        header("Location: forget-password.php? error=".$msg); 
        
	}
}
?>
<?php
include_once ('session.php');

$response=array('error' =>false);


	$orderId=$_SESSION['order_number'];
	// echo "<script> console.log(".$orderId.")</script>";
	if($orderId!=""){ 

	    $query_check_permission = "SELECT IF(TIMESTAMPDIFF(MINUTE,created_at,now())>10, 'FALSE', 'TRUE') as permission FROM orders WHERE id = '$orderId'";
    	$result_permission = mysqli_query($conn,$query_check_permission);
    	$permission = mysqli_fetch_assoc($result_permission);
    	
    	if($permission['permission'] == 'TRUE')
    	{      
    	    $remove_order_details="DELETE FROM order_detail WHERE order_id='$orderId'";
            $result_remove_order_details=mysqli_query($conn,$remove_order_details);

            $remove_order="DELETE FROM orders WHERE id='$orderId'";
            $result_remove=mysqli_query($conn,$remove_order);
            // echo $remove_order;
            if($result_remove_order_details==true && $result_remove){
            	$response['msg']="Order Canceled";
            	$_SESSION['order_number']="";

	        	header('content-Type:application/json');
	        	echo json_encode($response);
	        	
            }else{
            	$response['error']=true;
            	$response['msg']=$conn->error;
	        	header('content-Type:application/json');
	        	echo json_encode($response);
            }
    	}
    	else
    	{
    	    $response['error']=true;
        	$response['msg']="You can't delete your order now";
        	header('content-Type:application/json');
        	echo json_encode($response);
    	}
    	
	}else{
          	$response['error']=true;
        	$response['msg']="Order id not found";
        	header('content-Type:application/json');
        	echo json_encode($response);
    }

?>

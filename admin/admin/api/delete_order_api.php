<?php
include_once ('../db/conn.php');

$response=array('error' =>false);

if ($_POST['table_id'] && $_POST['hotel_id']) {

	$tableId = $_POST['table_id'];
	$hotelId = $_POST['hotel_id'];
	
	$get_order = "SELECT order_id FROM cart WHERE table_id='$tableId' limit 1";
	$result_get_order = mysqli_query($conn,$get_order);
	$data = mysqli_fetch_assoc($result_sql);
	
	
	$orderId=$data['order_id'];
	if($data['order_id']!=0)
	{   
	    
        $orderId=$data['order_id'];

	    $query_check_permission = "SELECT IF(TIMESTAMPDIFF(MINUTE,created_at,now())>2, 'FALSE', 'TRUE') as permission FROM orders WHERE order_number = '$orderId'";
    	$result_permission = mysqli_query($conn,$query_check_permission);
    	$permission = mysqli_fetch_assoc($result_permission);
    	
    	if($permission['permission'] == 'TRUE')
    	{   
            $remove_cart="DELETE FROM cart WHERE  order_id='$orderId'";
            $result_remove_cart=mysqli_query($conn,$remove_cart);
               
    	    $remove_order_details="DELETE FROM order_detail WHERE  order_id='$orderId'";
            $result_remove=mysqli_query($conn,$remove_order_details);

            $remove_order="DELETE FROM orders WHERE  order_id='$orderId'";
            $result_remove=mysqli_query($conn,$remove_order);
    	}
    	else
    	{
    	    $response['error']=true;
        	$response['error_msg']="Cant delete your order now";
        	header('content-Type:application/json');
        	echo json_encode($response);
    	}
    	
	}else{
         
    }
}    
else
{
	$response['error']=true;
	$response['error_msg']="parameters not found";
	header('content-Type:application/json');
	echo json_encode($response);
}
?>
<?php
include_once ('../db/conn.php');

$response=array('error' =>false);

if ($_POST['table_id']&&$_POST['order_id']) {
	
	$tableId=$_POST['table_id'];
	$orderId=$_POST['order_id'];

	$update_order_id="UPDATE cart SET order_id='$orderId' WHERE table_id='$tableId' AND food_id='$foodId' AND hotel_id='$hotelId' ";
	$result_update_order_id=mysqli_query($conn,$update_order_id);

	$remove_order_details="DELETE FROM order_detail WHERE  order_id='$orderId'";
	$result_remove=mysqli_query($conn,$remove_order_details);

	$remove_order="DELETE FROM orders WHERE  order_id='$orderId'";
	$result_remove=mysqli_query($conn,$remove_order);

}else{
	$response['error']=true;
	$response['error_msg']="parameters not found";
	header('content-Type:application/json');
	echo json_encode($response);
}
?>

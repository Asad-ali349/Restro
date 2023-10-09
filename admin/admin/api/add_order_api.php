<?php
include_once ('../db/conn.php');

$response=array('error' =>false);

if ($_POST['table_id']&&$_POST['order_id']) {
	$sumTotal=0;
	$sumDiscount=0;
	$tableId=$_POST['table_id'];
	$orderId=$_POST['order_id'];


	if ($orderId=="0") {
		$orderId=uniqid();
	}

	$get_cart_query="SELECT *From cart WHERE table_id='$tableId'";
	$result=mysqli_query($conn,$get_cart_query);
	if (mysqli_num_rows($result)>0) {
		while ($data=mysqli_fetch_array($result)) {
		
			$foodId=$data['food_id'];
			$quantity=$data['quantity'];
			$totalPrice=$data['total_price'];
		    $sumTotal=$sumTotal+floatval($totalPrice);
			$discountPrice=$data['discount_price'];
			$sumDiscount=$sumDiscount+floatval($discountPrice);
			$sql="INSERT INTO order_detail (order_id,food_id,quantity,total_amount,discount) VALUES ('$orderId','$foodId','$quantity','$totalPrice','$discountPrice')";
			$result_sql=mysqli_query($conn,$sql);
		}

		$percentage=($sumDiscount/$sumTotal)*100;
		$percentage=100-$percentage;
		$order="INSERT INTO orders (order_number,table_id,total_amount,discounted_amount,discount) VALUES ('$orderId','$tableId','$sumTotal','$sumDiscount','$percentage')";
		$result_order=mysqli_query($conn,$order);
		
		// $remove="DELETE FROM cart WHERE table_id='$tableId'";
		// $result_remove=mysqli_query($conn,$remove);
		$response['success_msg']="order replaced";
		$response['order_id']=$orderId;
		header('content-Type:application/json');
		echo json_encode($response);
	}else{
	    $response['error']=true;
		$response['error_msg']="NO table found with this hotel id";
		header('content-Type:application/json');
		echo json_encode($response);
	}
	
	

}else{
	$response['error']=true;
	$response['error_msg']="parameters not found";
	header('content-Type:application/json');
	echo json_encode($response);
}
?>
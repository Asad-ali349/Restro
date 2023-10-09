<?php
include_once ('../db/conn.php');
session_start();
$response=array('error' =>false);

if ($_POST['table_id']&&$_POST['food_id']&&$_POST['quantity']&&$_POST['hotel_id']&&$_POST['order_id']) {

	$tableId=$_POST['table_id'];
	$foodId=$_POST['food_id'];
	$quantity=$_POST['quantity'];
	$hotelId=$_POST['hotel_id'];
	$orderId=$_POST['order_id'];
	
	$sql="SELECT * FROM cart WHERE table_id='$tableId' AND food_id='$foodId' AND hotel_id='$hotelId'";
	$result_sql=mysqli_query($conn,$sql);
	
	
	$get_price="SELECT * FROM food WHERE id='$foodId' AND hotel_id='$hotelId'";
	$result_get_price=mysqli_query($conn,$get_price);
	$result=mysqli_fetch_array($result_get_price);
	
	if (mysqli_num_rows($result_sql)>0) {
		while ($data=mysqli_fetch_array($result_sql)) {
			if ($data['table_id']==$tableId&&$data['food_id']==$foodId) {
				 $qua=$quantity+$data['quantity'];
				$totalprice=$qua*$result['price'];
				$disPrice=$qua*$result['discount_price'];
				//echo $hotelId; 
				$update_quantity="UPDATE cart SET quantity='$qua',total_price='$totalprice',discount_price='$disPrice' WHERE table_id='$tableId' AND food_id='$foodId' AND hotel_id='$hotelId' AND order_id='$orderId'";
				$result_update_quantity=mysqli_query($conn,$update_quantity);
				//echo $hotelId; 
				$response['success_msg']="updated";
				header('content-Type:application/json');
				echo json_encode($response);
			}
		}
	}else{
		$totalprice=$quantity*$result['price'];
		$disPrice=$quantity*$result['discount_price'];
		echo $hotelId; 
		$insert="INSERT INTO cart( table_id, food_id, quantity,total_price,discount_price,hotel_id,order_id) VALUES ('$tableId','$foodId','$quantity','$totalprice','$disPrice','$hotelId','$orderId')";
		$result_insert=mysqli_query($conn,$insert);
		$response['success_msg']="added";
		header('content-Type:application/json');
		echo json_encode($response);
	}

}else{
	$response['error']=false;
	$response['error_msg']="parameters not found";
	header('content-Type:application/json');
	echo json_encode($response);
}
?>
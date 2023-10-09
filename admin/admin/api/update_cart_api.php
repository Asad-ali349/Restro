<?php
include_once ('../db/conn.php');

$response=array('error' =>false);

if ($_POST['table_id']&&$_POST['food_id']&&$_POST['quantity']&&$_POST['hotel_id']&&$_POST['order_id']) {

	$tableId=$_POST['table_id'];
	$foodId=$_POST['food_id'];
	$quantity=$_POST['quantity'];
	$hotelId=$_POST['hotel_id'];
	$orderId=$_POST['order_id'];
	
	$sql="SELECT * FROM cart WHERE table_id='$tableId' AND food_id='$foodId' AND hotel_id='$hotelId' AND order_id='$orderId'";
	$result_sql=mysqli_query($conn,$sql);
	
	
	$get_price="SELECT * FROM food WHERE id='$foodId' AND hotel_id='$hotelId'";
	$result_get_price=mysqli_query($conn,$get_price);
	$result=mysqli_fetch_array($result_get_price);
	
	if (mysqli_num_rows($result_sql)>0) {
		while ($data=mysqli_fetch_array($result_sql)) {
			if ($data['table_id']==$tableId&&$data['food_id']==$foodId) {
				
				$totalprice=$quantity*$result['price'];
				$disPrice=$quantity*$result['discount_price'];
				//echo $hotelId; 
				$update_quantity="UPDATE cart SET quantity='$quantity',total_price='$totalprice',discount_price='$disPrice' WHERE table_id='$tableId' AND food_id='$foodId' AND hotel_id='$hotelId' AND order_id='$orderId'";
				$result_update_quantity=mysqli_query($conn,$update_quantity);
				//echo $hotelId; 
				
			}
		}
	}
    $response['success_msg']="updated";
	$get_cart_query="SELECT cart.id, cart.table_id, cart.quantity, cart.total_price,cart.discount_price,food.name,food.price,cart.food_id FROM cart INNER JOIN food  ON cart.food_id=food.id WHERE table_id='$tableId' AND order_id='$orderId'";
	$result_get_cart_query=mysqli_query($conn,$get_cart_query);
	$food=[];
	$foods=[];
	$key=0;
	if (mysqli_num_rows($result_get_cart_query)>0) {
		while ($data=mysqli_fetch_array($result_get_cart_query)) {
			$food['id']=$data['id'];
			$food['table_id']=$data['table_id'];
			$food['food_name']=$data['name'];
			$x=$data['food_id'];
			$food['food_id']=$x;
			
			$images=[];
			$img=[];
			$count=0;
			
			$get_image="SELECT * FROM food_images WHERE food_id='$x'";
			$result_get_image=mysqli_query($conn,$get_image);
			while ($image=mysqli_fetch_array($result_get_image)) {
				$img['food_image']='http://restro.cert-pro.net/admin/foodImages/'.$image['food_image'];
				$images[$count]=$img;
				$count++;
			}
			$food['food_images']=$images;
			$food['quantity']=$data['quantity'];
			$food['single_item_price']=$data['price'];
			$food['total_price']=$data['total_price'];
			$food['discount_price']=$data['discount_price'];
			$foods[$key]=$food;
			$key++;
		}
		$response['foods']=$foods;
	}
	
	header('content-Type:application/json');
	echo json_encode($response);

}else{
	$response['error']=true;
	$response['error_msg']="parameters not found";
	header('content-Type:application/json');
	echo json_encode($response);
}
?>
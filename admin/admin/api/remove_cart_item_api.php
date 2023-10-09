<?php
include_once ('../db/conn.php');

$response=array('error' =>false);

if ($_POST['table_id']&&$_POST['food_id']&&$_POST['hotel_id'] && isset($_POST['order_id'])) {

	$tableId=$_POST['table_id'];
	$foodId=$_POST['food_id'];
	$hotelId=$_POST['hotel_id'];
	$orderId=$_POST['order_id'];
 	
 	//-------------------delete query----------------------------------------------//
 	$update_quantity="DELETE FROM cart WHERE table_id='$tableId' AND food_id='$foodId' AND hotel_id='$hotelId' AND order_id='$orderId'";
 	$result_update_quantity=mysqli_query($conn,$update_quantity);

    $response['success_msg']="Removed";
    
    $get_cart_query="SELECT cart.id, cart.table_id, cart.quantity, cart.total_price,cart.discount_price,food.name,food.price,cart.food_id FROM cart INNER JOIN food  ON cart.food_id=food.id WHERE table_id='$tableId'AND order_id='$orderId'";
	$result_get_cart_query=mysqli_query($conn,$get_cart_query);
	$food=[];
	$foods=[];
	$key=0;
	if (mysqli_num_rows($result_get_cart_query)>0) {
		while ($data=mysqli_fetch_array($result_get_cart_query)) {
			$food['cart_id']=$data['id'];
			$food['table_id']=$data['table_id'];
			$x=$data['food_id'];
			$food['food_id']=$x;
			$food['food_name']=$data['name'];
			
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
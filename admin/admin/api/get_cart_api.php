<?php
include_once ('../db/conn.php');

$response=array('error' =>false);
//  echo "hhhhhhh"
if ($_POST['table_id']&&$_POST['order_id']) {

	$tableId=$_POST['table_id'];
	$orderId=$_POST['order_id'];
	$get_cart_query="SELECT cart.id, cart.table_id, cart.quantity, cart.total_price,cart.discount_price,food.name,food.price,cart.food_id FROM cart INNER JOIN food  ON cart.food_id=food.id WHERE table_id='$tableId' AND order_id='$orderId'" ;
	$result=mysqli_query($conn,$get_cart_query);
	$food=[];
	$foods=[];
	$key=0;
    $totalSum=0;
    $disSum=0;
	if (mysqli_num_rows($result)>0) {
		while ($data=mysqli_fetch_array($result)) {
		    $food['cart_id']=$data['id'];
			$food['table_id']=$data['table_id'];
			$foodId=$data['food_id'];
			$food['food_id']=$foodId;
			$food['food_name']=$data['name'];
			

			$images=[];
		
			$img=[];
		
			$count=0;
			$get_image="SELECT * FROM food_images WHERE food_id='$foodId'";
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
			$totalPrice=$data['total_price'];
		    $totalSum=$totalSum+floatval($totalPrice);
			$food['discount_price']=$data['discount_price'];
			$discountPrice=$data['discount_price'];
			$disSum=$disSum+floatval($discountPrice);
			
			$foods[$key]=$food;
			$key++;
		}
		$response['foods']=$foods;
		$response['Sum_of_total']=$totalSum;
		$response['Sum_of_discount']=$disSum;
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
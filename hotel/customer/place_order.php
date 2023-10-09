<?php

include_once('session.php');


$response=['error'=>true];

if (isset($_POST['tableid'])) {
	$table_id=$_POST['tableid'];

	$get_cart= mysqli_query($conn,"SELECT * FROM cart WHERE table_id='$table_id'");

	if (mysqli_num_rows($get_cart)>0) {
		$get_total=mysqli_fetch_array(mysqli_query($conn,"SELECT SUM(total_price) as totalprice,SUM(discount_price) as totaldis FROM cart WHERE table_id='$table_id'"));
		$total_amount=$get_total['totalprice'];
		$total_dis=$get_total['totaldis'];
		$order_number=date("Ymd-His");
		$place_order=mysqli_query($conn,"INSERT INTO orders(order_number,table_id,total_amount,discounted_amount) VALUES('$order_number','$table_id','$total_amount','$total_dis')");
		$get_order_id=mysqli_fetch_array(mysqli_query($conn,"SELECT id FROM orders WHERE order_number= '$order_number'"));
		$order_id=$get_order_id['id'];
		if ($place_order==true) {

			while($data=mysqli_fetch_array($get_cart)){
				$foodId=$data['food_id'];
				$quantity=$data['quantity'];
				$total_amount=$data['total_price'];
				$discount=$data['discount_price'];

				$add_order_detail=mysqli_query($conn,"INSERT INTO order_detail(`order_id`, `food_id`, `table_id`, `quantity`, `total_amount`, `discount`) VALUES ('$order_id','$foodId','$table_id','$quantity','$total_amount','$discount')");
			}
			if ($add_order_detail==true) {
				$empty_cart=mysqli_query($conn,"DELETE FROM cart WHERE table_id='$table_id'");

				$response['error']=false;
				$response['msg']="Order Added";
				$_SESSION['order_number']=$order_id;
				header('content-Type:application/json');
				echo json_encode($response);	
			}else{
				$response['msg']=$conn->error;
				header('content-Type:application/json');
				echo json_encode($response);
			}

			
		}else{
			$response['msg']=$conn->error;
			header('content-Type:application/json');
			echo json_encode($response);
		}
	}else{
		$response['msg']="Add Item to place order";
		header('content-Type:application/json');
		echo json_encode($response);

	}
		

}

?>
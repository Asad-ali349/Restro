<?php
include_once('../db/conn.php');
$response=array('error' =>false);
// $id=isset($_POST['hotel_id']);
// echo $id;
 
if (isset($_POST['hotel_id'])) {
	$hotelId=$_POST['hotel_id'];
		
	
		
	$food_query="SELECT food.id, food.name,food.price,food.discount_price,food.discount,food.descprition,food.category_id ,COUNT(order_detail.food_id) as count_of_food FROM order_detail INNER JOIN food ON food.id = order_detail.food_id  where order_detail.hotel_id = 1 GROUP BY order_detail.food_id ORDER BY COUNT(order_detail.food_id) DESC";
	$result_food_query=mysqli_query($conn,$food_query);

	if (mysqli_num_rows($result_food_query)>0) 
	{	
		$food=[];
		$x=0;
		while ($data = $result_food_query->fetch_array()) {

            $food['food_id']=$data['id'];
			$food['food_name']=$data['name'];
			$food['category_id']=$data['category_id'];
			$food['food_description']=$data['descprition'];
			$food['food_price']=$data['price'];
			$food['discount_price']=$data['discount_price'];
			$foodId=$data['id'];
			$food_image_query="SELECT food_image FROM food_images WHERE food_id='$foodId' limit 1";
			$result_food_image_query=mysqli_query($conn,$food_image_query);
			if (mysqli_num_rows($result_food_image_query)>0) 
			{
				$image=mysqli_fetch_array($result_food_image_query);
				$food['food_image']='http://restro.cert-pro.net/admin/foodImages/'.$image['food_image'];
				
			}
			else
			{
				$food['food_image']="no image found";
			}

			$food_video_query="SELECT food_video FROM food_videos WHERE food_id='$foodId' limit 1";
			$result_food_video_query=mysqli_query($conn,$food_video_query);
			if (mysqli_num_rows($result_food_video_query)>0) 
			{
				$video=mysqli_fetch_array($result_food_video_query);
				$food['food_video']='http://restro.cert-pro.net/admin/foodVideos/'.$video['food_video'];
				
			}
			else
			{
				$food['food_video']="no video found";
			}

			$food_ingredient_query="SELECT * FROM ingredients WHERE food_id='$foodId' ";
			$result_food_ingredient_query=mysqli_query($conn,$food_ingredient_query);
			if (mysqli_num_rows($result_food_ingredient_query)>0) 
			{
				$y=0;
				$ingredients=[];
				$s=[];
				while ($ingredientsdata = $result_food_ingredient_query->fetch_array()) {
					$ingredients['name']=$ingredientsdata['name'];
					$ingredients['descprition']=$ingredientsdata['quantity'];
					$s[$y]=$ingredients;
					$y++;
				}	
				$food['food_ingredients']=$s;
			}
			else
			{
				$food['food_ingredients']="no ingredients are found";
			}
				$categories['food_item'][$x] = $food;
				$x++;
			
		}
			$response['food']=$categories;
			header('content-Type:application/json');
			echo json_encode($response);
	}
	else
	{
		//hotel id not found
		$response['error']=true;
		$response['errro_msg']="hotel id not found";
		header('content-Type:application/json');
		echo json_encode($response);
	}

						


}else{
	//missing params
	$response=array('error' =>true);
	$response['error_msg']="missing params";
	header('content-Type:application/json');
	echo json_encode($response);
}
?>
<?php
include_once('../db/conn.php');
$response=array('error' =>false);
if (isset($_POST['hotel_id'])) {
	$hotelId=$_POST['hotel_id'];
	$food_query="SELECT * FROM food WHERE hotel_id='$hotelId'";
	$result_food_query=mysqli_query($conn,$food_query);

	if (mysqli_num_rows($result_food_query)>0) 
	{	
		$food=[];
		$key=0;
		while ($data = $result_food_query->fetch_array()) {

			$food['food_name']=$data['name'];
			$food['hotel_id']=$data['hotel_id'];
			$food['category_id']=$data['category_id'];
			$food['food_description']=$data['descprition'];
			$food['food_price']=$data['price'];
			$food['discount_price']=$data['discount_price'];
			$food['food_status']=$data['status'];


			$foodId=$data['id'];
			$food_image_query="SELECT food_image FROM food_images WHERE food_id='$foodId' limit 1";
			$result_food_image_query=mysqli_query($conn,$food_image_query);
			if (mysqli_num_rows($result_food_image_query)>0) 
			{
				$image=mysqli_fetch_array($result_food_image_query);
				$food['food_image']=$image['food_image'];
				
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
				$food['food_video']=$video['food_video'];
				
			}
			else
			{
				$food['food_video']="no video found";
			}

			$food_ingredient_query="SELECT * FROM ingredients WHERE food_id='$foodId' ";
			$result_food_ingredient_query=mysqli_query($conn,$food_ingredient_query);
			if (mysqli_num_rows($result_food_ingredient_query)>0) 
			{
				$count=0;
				$ingredients=[];
				while ($ingredientsdata = $result_food_ingredient_query->fetch_array()) {
					$ingredients['name']['count']=$ingredientsdata['name'];
					$ingredients['descprition']['count']=$ingredientsdata['quantity'];
					$count++;
				}	
				$food['food_ingredients']=$ingredients;
			}
			else
			{
				$food['food_ingredients']="no ingredients are found";
			}
				$response['food_item'][$key] = $food;
				$key++;
			

		}
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

}
else
{
	$response['error']=true;
	$response['errro_msg']="missing parameters";
	header('content-Type:application/json');
	echo json_encode($response);
}

?>
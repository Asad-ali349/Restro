<?php
include_once('../db/conn.php');
$response=array('error' =>false);
// $id=isset($_POST['hotel_id']);
// echo $id;
 
if (isset($_POST['hotel_id'])) {
	$hotelId=$_POST['hotel_id'];
	
	$table_query="SELECT * FROM table_number WHERE hotel_id='$hotelId' AND status!='0'";
	$result=mysqli_query($conn,$table_query);
	
	if (mysqli_num_rows($result)>0) {
	    $table=[];
	    $key=0;
	    $tables=[];
		while ($data=mysqli_fetch_array($result)) {
			$table['id']=$data['id'];
			$table['name']=$data['name'];
		    $tables[$key]=$table;
		    $key++;
		}	
	}
    $response['tables']=$tables;

	
	
	$cat_id_query="SELECT DISTINCT category_id FROM food WHERE hotel_id='$hotelId'";
	$result_cat_id_query=mysqli_query($conn,$cat_id_query);	
		if (mysqli_num_rows($result_cat_id_query)>0) {
				$key=0;
				while ($data=$result_cat_id_query->fetch_array()) {
					$catId=$data['category_id'];
					$cat_query=mysqli_query($conn,"SELECT * FROM category WHERE id='$catId'");
					$count=0;
					if (mysqli_num_rows($cat_query)>0) {
						$categories = [];
						while ($cat=$cat_query->fetch_array()) {
							$categories['id']=$cat['id'];
							$categories['name']=$cat['name'];
							$categories['img']='http://restro.cert-pro.net/admin/db_images/'.$cat['cat_img'];
							
							$c=$cat['id'];
							$food_query="SELECT * FROM food WHERE category_id='$c'";
							$result_food_query=mysqli_query($conn,$food_query);

							if (mysqli_num_rows($result_food_query)>0) 
							{	
								$food=[];
								$x=0;
								while ($data = $result_food_query->fetch_array()) {

                                    $food['food_id']=$data['id'];
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
						$response['categories'][$key] = $categories;
						$key++;
					}

				}
				
				header('content-Type:application/json');
				echo json_encode($response);
				
			
		}else{
			// not category found
			$response=array('error' =>true);
			$response['error_msg']="No Category Found";
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
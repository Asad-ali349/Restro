<?php
include_once('../db/conn.php');
$response=array('error' =>false);

if (isset($_POST['hotel_id'])) {
	$hotelId=$_POST['hotel_id'];
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
							$categories['id'][$count]=$cat['id'];
							$categories['name'][$count]=$cat['name'];
							$categories['img'][$count]=$cat['cat_img'];
							$count++; 
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
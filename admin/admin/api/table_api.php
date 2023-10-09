<?php
include_once ('../db/conn.php');
session_start();
$response=array('error' =>false);

if ($_POST['hotel_id']) {

	$hotelId=$_POST['hotel_id'];

	$table_query="SELECT * FROM table_number WHERE hotel_id='$hotelId' AND status!='0'";
	$result=mysqli_query($conn,$table_query);
// 	print_r($result);
	
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
	    $response['tables']=$tables;
	   
		header('content-Type:application/json');
		echo json_encode($response);
	}else{
	    $response['error']=true;
		$response['error_msg']="No table found with this hotel id";
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
<?php
include_once('session.php');
// $tableId=$_GET['id'];
// echo $tableId;

	$tableId=$_GET['id'];

	$setStatus=0;
    

	$insert_query="UPDATE table_number SET status='0' WHERE id='$tableId'";
	$result=mysqli_query($conn,$insert_query);
	if ($result === TRUE) {
		echo "helo";
  		header("Location: Tables.php");	
	} else {
  		echo "Error: " . $result . "<br>" . $conn->error;
	}

	$conn->close();


?>
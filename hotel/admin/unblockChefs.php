<?php
include_once('session.php');


	$id=$_GET['id'];
	$status=1;
	$sql="UPDATE chefs SET status='$status' WHERE id='$id'";
	$result=mysqli_query($conn,$sql);

	if ($result==true) {
	 	header("Location: ViewChefs.php");
	} else {
 	 	echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

?>
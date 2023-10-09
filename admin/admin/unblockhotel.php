<?php
include_once ('db/conn.php');


	$id=$_GET['id'];
	
	$status=1;
	$sql="UPDATE hotel SET status='$status' WHERE id='$id'";
	$result=mysqli_query($conn,$sql);

	if ($result==true) {
	 	header("Location: ViewAllMembers.php");
	} else {
 	 	echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

?>
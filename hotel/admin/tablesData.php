<?php
include_once('session.php');

if (isset($_POST['submit'])){
	$hotelId=$_SESSION['User_id'];
    foreach($_POST['table'] as $key=>$val){
		$table= $_POST['table'][$key];
		$insert_query=mysqli_query($conn,"INSERT INTO table_number (name,hotel_id)VALUES ('$table','$hotelId')");
 }
 if ($insert_query === TRUE) {	
  header("Location: Tables.php");
} else {
  echo "Error: " . $insert_query . "<br>" . $conn->error;
}

	$conn->close();
}

?>
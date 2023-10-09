<?php
include_once('session.php');

$iD=$_GET['id'];
$table=$_GET['table'];
$page=$_GET['page'];


$query="DELETE FROM ".$table." WHERE id=".$iD;
var_dump($query);
$delete=mysqli_query($conn,$query);
if ($delete==true) {
	$_SESSION['success']="Deleted";
	$_SESSION['error']="";
	header("Location: ".$page);
}else{
	$_SESSION['success']="";
	$_SESSION['error']="You cannot delete because this data is used somewhere";
	header("Location: ".$page);
}
?>
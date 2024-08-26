<?php 
session_start();
include '../connection.php';
$sql="update account set status='1' where id='".$_GET['id']."'";
$query=mysqli_query($con,$sql);
if ($query) {
	header("Location:activate.php");
	
}
else{
	header("Location:activate.php");
	
}

 ?>
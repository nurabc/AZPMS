<?php 
session_start();
include '../connection.php';
$sql="update admin_message set status=1 where id='".$_GET['id']."'";
$query=mysqli_query($con,$sql);
if ($query) {
	header("Location:inbox1.php");
}
else{
	header("Location:inbox1.php");
}	
 ?>
seen

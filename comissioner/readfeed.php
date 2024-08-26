<?php 
include '../connection.php';
$sql="UPDATE `feedback` SET `status`='1' WHERE id='".$_GET['id']."'";
$query=mysqli_query($con,$sql);
if ($query) {
	header("Location:readfeedback.php");
}
else{
header("Location:readfeedback.php");
}

 ?>
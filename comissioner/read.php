<?php 
include '../connection.php';
$sql="UPDATE `comissioner_message` SET `status`='1' WHERE id='".$_GET['id']."'";
$query=mysqli_query($con,$sql);
if ($query) {
	header("Location:inbox1.php");
}
else{
echo "no";
}

 ?>
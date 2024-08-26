<?php 
session_start();
include '../connection.php';
$sql="update account set status='0' where id='".$_GET['id']."'";
$query=mysqli_query($con,$sql);
if ($query) {
	header("Location:deactivate.php");
	echo "<font style='color:red; font-size:25px;'>please wait.........</font>";
}
else{
	header("Location:deactivate.php");
	echo "<font style='color:red; font-size:25px;'>not deactivated account.........</font>";
}

 ?>
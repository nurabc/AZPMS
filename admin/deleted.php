<?php
session_start();

if(isset($_SESSION["username"]))
{
 if((time() - $_SESSION['last_time']) > 1940) // Time in Seconds
 {
 header("location:logout.php");
 }
 else
 {
 $_SESSION['last_time'] = time();
 }
}
else
{
 header('Location:login.php');
}
?>








<?php 
include '../connection.php';


	$sql1="SELECT * FROM `account` WHERE serial_no='".$_GET['id']."'";
	$query1=mysqli_query($con,$sql1);
	$num=mysqli_num_rows($query1);
	if ($num>0) {
	while ($row=mysqli_fetch_array($query1)) {
		$user=$row['account_type'];
if ($user=="policeofficer") {
	$sql2="delete from prisoner_information where serial_no='".$_GET['id']."'";
	$query2=mysqli_query($con,$sql2);
	if ($query2) {
		$sql3="delete from account where serial_no='".$_GET['id']."'";
	$query3=mysqli_query($con,$sql3);
	if ($query3) {


	header("Location:delete.php");
	echo	"<script type=\"text/javascript\">".
        "alert('success');".
        "</script>";
	}
	else{
		echo "unknown serial_number";
	}
	}
	else{

		echo "unknown serial_no";
	}
}
if ($user=="comissioner") {
	$sql2="delete from comissioner_information where serial_no='".$_GET['id']."'";
	$query2=mysqli_query($con,$sql2);
	if ($query2) {
		$sql3="delete from account where serial_no='".$_GET['id']."'";
	$query3=mysqli_query($con,$sql3);
	if ($query3) {
		
	header("Location:header'delete.php'");
	echo "<script>alert('deleted');

	</script>";
	}
	else{
		echo "unknown serial_number";
	}
	}
	else{

		echo "unknown serial_no";
	}
}
if ($user=="adminstrator") {
	$sql2="delete from comissioner_information where serial_no='".$_GET['id']."'";
	$query2=mysqli_query($con,$sql2);
	if ($query2) {
		$sql3="delete from account where serial_no='".$_GET['id']."'";
	$query3=mysqli_query($con,$sql3);
	if ($query3) {
		
	header("Location:header'delete.php'");
	echo "<script>alert('deleted');

	</script>";
	}
	else{
		echo "unknown serial_number";
	}
	}
	else{

		echo "unknown serial_no";
	}
}

if ($user=="inspector") {
	$sql2="delete from inspector_information where serial_no='".$_GET['id']."'";
	$query2=mysqli_query($con,$sql2);
	if ($query2) {
		$sql3="delete from account where serial_no='".$_GET['id']."'";
	$query3=mysqli_query($con,$sql3);
	if ($query3) {
	
	header("Location:delete.php");
	echo "<script>alert('deleted');

	</script>";
	}
	else{
		echo "unknown serial_number";
	}
	}
	else{

		echo "unknown serial_no";
	}
}
else{
	header("Location:delete.php");
}


	}
	}
	else{
		echo " the serial number is not presented";
	}


 ?>
<?php 
include '../connection.php';
$sql="select *from forgive WHERE id='".$_GET['id']."'";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
$serial_no=$fetch['serial_no'];
$sql1="INSERT INTO `policeofficer_message`(`id`, `sender`, `reciver`, `message`, `Date`, `status`) VALUES ('','comissioner','".$serial_no."','your forgive is not accepted!','".date("Y-m-d")."','0')";
$query1=mysqli_query($con,$sql1);
if ($query1) {
	
$sql="UPDATE `forgive` SET `status`='1' WHERE id='".$_GET['id']."'";
$query=mysqli_query($con,$sql);
if ($query) {
	header("Location:readforgive.php");
}
else{
header("Location:readforgive.php");
}


}

else{
	header("Location:readforgive.php");
}	
 ?>





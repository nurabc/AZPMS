<?php 
$con=mysqli_connect("localhost","root","","adddate");
$sql="INSERT INTO `date`(`date`) VALUES (adddate('".date("Y-m-d")."',interval 10 day))";
$query=mysqli_query($con,$sql);
if ($query) {
	echo "inserted";
}
else{
echo "try agin";
}


 ?>
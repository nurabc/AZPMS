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
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
        <link rel="stylesheet" href="../decoration/css/bootstrap.min.css">

        <script src="../decoration/js/jquery.min.js"></script>
        <script src="../decoration/js/bootstrap.min.js"></script>
        <style type="text/css">
        	
body{
	font-family: Times News Roman;
}

ul li a{
	font-size: 20px;


}

 </style>
     
	<title>prisoner managment system</title>
</head>
<body>

	<div class="container" style="background-color: lightsteelblue; border-radius: 16px; box-shadow: 0px 0px 10px blue;">
	<img src="../log1.png" style="width: 100%; height: 90px ; box-shadow: 0px 0px 10px 0px green; border-radius: 0px; margin-top: 0px;">
<table class="table table-bordered ">
  <tr>

            <td style="width: 150px;" class="text-justify" rowspan="3">
              <table class="table table-bordered"><tr><th class="text-center" style="background-color: lightgray; font-size: 15px; font-family: comic sans ms;" colspan="2">ASSOSA ZONE</th></tr>
                  <tr><td style="font-family: comic sans ms;">Total male Prisoner Register </td><td>        
                    <?php 
$sql="select count(serial_no) as total from prisoner_information where zone='assosa' and sex='male'";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
if ($query) {
 echo "<font style='color:red; font-family:comic sans ms; font-size:20px;'>".$fetch['total']."</font>";
}
else{
  echo "<font>0</font>";
}

                 ?></td></tr>
                  <tr><td style="font-family: comic sans ms;">total female Prisoner Register </td><td>
                    
                    
                    <?php 
$sql="select count(serial_no) as total from prisoner_information where zone='assosa' and sex='female'";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
if ($query) {
 echo "<font style='color:red; font-family:comic sans ms; font-size:20px;'>".$fetch['total']."</font>";
}
else{
  echo "<font>0</font>";
}

                 ?></td></tr>
                <tr><td style="font-family: comic sans ms;">Total Prisoner Register</td><td>
                    
                    
                    <?php 
$sql="select count(serial_no) as total from prisoner_information where zone='assosa'";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
if ($query) {
 echo "<font style='color:red; font-family:comic sans ms; font-size:20px;'>".$fetch['total']."</font>";
}
else{
  echo "<font>0</font>";
}

                 ?></td></tr>
<!--                  
<th class="text-center" style="background-color: lightgray; font-size: 15px; font-family: comic sans ms;" colspan="2">METEKEL ZONE</th></tr>
              
              <tr><td style="font-family: comic sans ms;">Total male Prisoner Register </td><td><?php 
$sql="select count(serial_no) as total from prisoner_information where zone='metekel' and sex='male'";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
if ($query) {
 echo "<font style='color:red; font-family:comic sans ms; font-size:20px;'>".$fetch['total']."</font>";
}
else{
  echo "<font>0</font>";
}

                 ?></td></tr>
              <tr><td style="font-family: comic sans ms;">Total female Prisoner Register </td><td><?php 
$sql="select count(serial_no) as total from prisoner_information where zone='metekel' and sex='female' and tsp='".date("Y-m-d")."'";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
if ($query) {
 echo "<font style='color:red; font-family:comic sans ms; font-size:20px;'>".$fetch['total']."</font>";
}
else{
  echo "<font>0</font>";
}

                 ?></td></tr>
                <tr><td style="font-family: comic sans ms;">Total Prisoner Register </td><td><?php 
$sql="select count(serial_no) as total from prisoner_information where zone='metekel'";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
if ($query) {
 echo "<font style='color:red; font-family:comic sans ms; font-size:20px;'>".$fetch['total']."</font>";
}
else{
  echo "<font>0</font>";
}

          ?></td></tr>
                 <th class="text-center" style="background-color: lightgray; font-size: 15px; font-family: comic sans ms;" colspan="2">KAMATCH ZONE</th></tr>

<tr><td style="font-family: comic sans ms;">Total male Prisoner Register </td><td><?php 
$sql="select count(serial_no) as total from prisoner_information where zone='kamatch' and sex='male'";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
if ($query) {
 echo "<font style='color:red; font-family:comic sans ms; font-size:20px;'>".$fetch['total']."</font>";
}
else{
  echo "<font>0</font>";
}

                 ?></td></tr>
<tr><td style="font-family: comic sans ms;">Total female Prisoner Register</td><td><?php 
$sql="select count(serial_no) as total from prisoner_information where zone='kamatch' and sex='female'";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
if ($query) {
 echo "<font style='color:red; font-family:comic sans ms; font-size:20px;'>".$fetch['total']."</font>";
}
else{
  echo "<font>0</font>";
}

                 ?></td></tr>
                <tr><td style="font-family: comic sans ms;">Total Prisoner Register Today</td><td><?php 
$sql="select count(serial_no) as total from prisoner_information where zone='kamatch'";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
if ($query) {
 echo "<font style='color:red; font-family:comic sans ms; font-size:20px;'>".$fetch['total']."</font>";
}
else{
  echo "<font>0</font>";
}
                 ?> </td></tr>
                <th class="text-center" style="background-color: lightgray; font-size: 15px; font-family: comic sans ms;" colspan="2">from all zone</th></tr>
<tr><td style="font-family: comic sans ms;">Total female Prisoner Register</td><td><?php 
$sql="select count(serial_no) as total from prisoner_information where sex='female'";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
if ($query) {
 echo "<font style='color:red; font-family:comic sans ms; font-size:20px;'>".$fetch['total']."</font>";
}
else{
  echo "<font>0</font>";
}

                 ?></td></tr>
<tr><td style="font-family: comic sans ms;">Total male Prisoner Register</td><td><?php 
$sql="select count(serial_no) as total from prisoner_information where sex='male'";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
if ($query) {
 echo "<font style='color:red; font-family:comic sans ms; font-size:20px;'>".$fetch['total']."</font>";
}
else{
  echo "<font>0</font>";
}

                 ?></td></tr>
                <tr><td style="font-family: comic sans ms;">Total Prisoner Register in all zone</td><td><?php 
$sql="select count(serial_no) as total from prisoner_information";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
if ($query) {
 echo "<font style='color:red; font-family:comic sans ms; font-size:20px;'>".$fetch['total']."</font>";
}
else{
  echo "<font>0</font>";
}

                 ?> </td></tr>                -->
            
<script>window.print()</script>
                         
  
 </table>
</div>
</div>
</body>
</html>
<html>
<body>
</body>
</html>


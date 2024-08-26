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
$zone=$_SESSION['zone'];
if (!isset($_SESSION['inspector_logged'])) {
    header("location:../login.php");
  }
  include '../connection.php';


  



 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../decoration/css/bootstrap.min.css">

        <script src="../decoration/js/jquery.min.js"></script>
        <script src="../decoration/js/bootstrap.min.js"></script>
        <style type="text/css">

body{
  font-family: Times News Roman;
}

ul li a{
  font-size: 25px;


}

 </style>
     
  <title>prisoner managment system</title>
</head>
<body>

  <div class="container" style="background-color: LightSteelBlue; border-radius: 10px; box-shadow: 0px 0px 10px blue;">
  <img src="../log1.png" style="width: 100%; height: 110px ; box-shadow: 0px 0px 10px 0px green; border-radius: 10px; margin-top: 3px;">
  
<div class="jumbotron" style="margin-top: 5px; box-shadow: 0px 0px 30px 0px white;">
<table class="table table-bordered text-center">
  
              
<?php 


$sql="select *from prisoner_information where serial_no='".$_GET['id']."'";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);

echo "
  <form action='' method='post'>
       <tr><td colspan='2' style='font-family:Agency fb; font-size:30px;color:red; width:350px; ' class='text-left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Prisoners confirming the duration of their imprisonment</td></tr>  
      
       <tr><td colspan='2'><img src='../upload/image/".$fetch['photo']."' style='width:150px; height:200px;' class='img-rounded'></td></tr>  
   <tr><td style='color:black; font-size:25px;'>FULL NAME<span style='color: red;'>*</span></td><td><input type='text' name='fname' class='form-control' style='border:1px solid gray; color:black; font-size:16px; font-family:Agency fb; font-size:25px; text-align:center; width:350px;' value='".$fetch['fname']." ".$fetch['mname']." ".$fetch['lname']."' disabled></td></tr>

    <tr><td style='color:black; font-size:25px;'>ID_NO<span style='color: red;'>*</span></td><td><input type='text' name='fname' class='form-control' style='border:1px solid gray; color:black; font-size:16px;font-family:Agency fb; font-size:25px; text-align:center; width:350px;' value='".$fetch['serial_no']." ' disabled></td></tr>

               

<tr><td style='color:black; font-size:25px;'>AGE<span style='color: red;'>*</span></td><td><input type='number' name='age' class='form-control' style='border:1px solid gray; font-family:Agency fb; font-size:25px; text-align:center; width:350px;' value='".$fetch['age']."' disabled></td></tr>

<tr><td style='color:black; font-size:25px;'>SEX<span style='color: red;'>*</span></td><td><input type='text' name='age' class='form-control' style='border:1px solid gray; font-family:Agency fb; font-size:25px; text-align:center; width:350px;' value='".$fetch['sex']."' disabled></td></tr>


<tr><td style='color:black; font-size:25px;'>ENTERING DATE<span style='color: red;'>*</span></td><td><input type='text' name='age' class='form-control' style='border:1px solid gray; font-family:Agency fb; font-size:25px; text-align:center; width:350px;' value='".$fetch['tsp']."' disabled></td></tr>


<tr><td style='color:black; font-size:25px;'>LEAVE DATE<span style='color: red;'>*</span></td><td><input type='text' name='age' class='form-control' style='border:1px solid gray; font-family:Agency fb; font-size:25px; text-align:center; width:350px;' value='".$fetch['tcp']."' disabled></td></tr>

<tr><td style='color:black; font-size:20px; text-align:center; font-family:Agency fb; color:red' colspan='2'>".$zone." Zone</td></tr>
<tr><td style='color:black; font-size:20px; text-align:center; font-family:Agency fb; color:red' colspan='2'>signiture__________</td></tr>
</form>";

echo "<script>window.print()</script>";
              ?>
 

  </table>
           
</div>
</body>
</html>
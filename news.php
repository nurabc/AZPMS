<?php 
session_start();
include 'connection.php';
if (isset($_POST['login'])) {
   $username=$_POST['username'];
   $password=$_POST['password'];
   if (empty($username) || empty($password)) {
 echo "<script>alert('please fill the form!')</script>";
}
else{
    $sql="select *from account where username='".$username."' and password='".$password."' and status='1'";
    $query=mysqli_query($con,$sql);
$report=mysqli_num_rows($query);
if ($report>0) {
   while ($row=mysqli_fetch_array($query)) {
       $user_type=$row['account_type'];
       if ($user_type=="prisoner") {
    $_SESSION['id']=$row['id'];
    $_SESSION['serial_no']=$row['serial_no'];
    $_SESSION['username']=$row['username'];
    $_SESSION['password']=$row['password'];
     $_SESSION['zone']=$row['zone'];
     header("Location:prisoner/index.php");
       }
else if ($user_type=="adminstrator") {
    $_SESSION['id']=$row['id'];
    $_SESSION['serial_no']=$row['serial_no'];
    $_SESSION['username']=$row['username'];
    $_SESSION['password']=$row['password'];
     $_SESSION['zone']=$row['zone'];
     header("Location:admin/index.php");
}
else if ($user_type=="inspector") {
    $_SESSION['id']=$row['id'];
    $_SESSION['serial_no']=$row['serial_no'];
    $_SESSION['username']=$row['username'];
    $_SESSION['password']=$row['password'];
     $_SESSION['zone']=$row['zone'];
     header("Location:inspector/index.php");
}
else if ($user_type=="policeofficer") {
    $_SESSION['id']=$row['id'];
    $_SESSION['serial_no']=$row['serial_no'];
    $_SESSION['username']=$row['username'];
    $_SESSION['password']=$row['password'];
     $_SESSION['zone']=$row['zone'];
     header("Location:policeofficer/index.php");
     
}
else if ($user_type=="visitor") {
    $_SESSION['id']=$row['id'];
    $_SESSION['serial_no']=$row['serial_no'];
    $_SESSION['username']=$row['username'];
    $_SESSION['password']=$row['password'];
     $_SESSION['zone']=$row['zone'];
     header("Location:visitor/index.php");
}

else if ($user_type=="comissioner") {
    $_SESSION['id']=$row['id'];
    $_SESSION['serial_no']=$row['serial_no'];
    $_SESSION['username']=$row['username'];
    $_SESSION['password']=$row['password'];
     $_SESSION['zone']=$row['zone'];
     header("Location:comissioner/index.php");
}
else{
    echo "<script>alert('incorrect username and password!')</script>";
   }
}
}
else{
 echo "<script>alert('incorrect username and password!')</script>"; 
}
}

}
 ?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
li a {
  display: block;
  color: black;
  padding: 8px 16px;
  text-decoration: none;
}

/* Change the link color on hover */
li a:hover {
  background-color: darkgreen;
  color: red ;
}
</style>
<style>
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #c0c0c0;
  min-width: 210px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
</head>
<body>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="decoration/css/bootstrap.min.css">

        <script src="decoration/js/jquery.min.js"></script>
        <script src="decoration/js/bootstrap.min.js"></script>
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
<?php /*
$sql="SELECT * FROM `news`";
$query=mysqli_query($con,$sql);
$report=mysqli_num_rows($query);
if ($report>0) {
    echo "<table class='table table-bordered' style='margin-top:20px;'><tr><th style='text-align:center;'>Date</th> <th style='text-align:center;'>Description</th></tr>";
while ($row=mysqli_fetch_array($query)) {
$date=$row['date'];
if ($date==date("Y-m-d")) {
    echo "<tr style='background-color:green;'><td >".$row['date']."</td> <td>".$row['description']."</td></tr>";
}
else{
    echo "<tr style='background-color:gray;'><td >".$row['date']."</td> <td>".$row['description']."</td></tr>";
}
}
echo "</table>";
}
else{
    echo "new information is not posted until now";
}
*/
         ?>

        </div>

-->

    <div class="container" style="background-color: LightSteelBlue; border-radius: 10px; box-shadow: 0px 0px 10px blue;">
    <img src="log1.png" style="width: 100%; height: 150px ; box-shadow: 0px 0px 10px 0px green; border-radius: 10px; margin-top: 3px;">
    <nav>

    <div class="navbar navbar-inverse" style="margin-top: 7px;">
        
        <ul class="nav navbar-nav">
            <li ><a href="index.php">Home</a></li>
             <li><a href="cafteria_schedule.php">Cafteria Schedule</a></li>
    
                          
 </li>
            
<!--
                 <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Servies<span class="caret"></span></a>
<ul class="dropdown-menu" style="background-color: gray;">
                            <li><a href="#"><span style="color: black; font-size: 20px;">Training</span></a></li>
                            <li><a href="#"><span style="color: black; font-size: 20px;">Education</span></a></li>
                            <li><a href="#"><span style="color: black; font-size: 20px;">Clinic</span></a></li>
                            </ul>
 </li>-->
            
                            <li><a href="aboutorganization.php">About us</a></li>


<li><a href="contact.php">Contact</a></li>
</ul>
<ul class="nav navbar-nav navbar-right">
  
</ul>
    </div>
         
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center" style="font-family: comic sans ms; color:red;">LOGIN PAGE </h4>
        </div>
        <div class="modal-body">
        <form action="" method="post">  
            <table class="table table-bordered"><tr><td style="font-family: comic sans ms; font-size: 25px;">username</td> <td><input type="text" name="username" class="form-control" style="border:2px solid green"></td></tr>

<tr><td style="font-family: comic sans ms; font-size: 25px;">password</td> <td><input type="password" name="password" class="form-control" style="border:2px solid green"></td></tr>
<tr><td colspan="2"><input type="submit" name="login" class="btn btn-info form-control"  value="login" style="font-size: 30px; height: 45px;"></td></tr>

          </table>
      </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

</nav>
<div class="jumbotron" style="margin-top: 5px; box-shadow: 0px 0px 30px 0px white;">
<table class="table table-bordered ">
    <tr><td colspan="3" style="text-align: center; font-family: Comic sans Ms; background-color: #708090; color: white; border-radius: 10px; font-size: 20px; ">Welcome to News and Events page</td></tr>
    <tr style="text-align: center;"><td style="font-size: 20px; background-color: LightSteelBlue; color: white; font-family: comic sans Ms;"></td>
        <td style="font-size: 20px; background-color: LightSteelBlue; color: black; font-family: comic sans Ms;" colspan="2">News and Events</td>
        </tr>
        <tr><td style="font-size: 14px; width: 40px;background-color:lightcyan"><ul>
                   <li class="dropdown"><a href="How to login in the systemm.pdf">Help</a></li><br>
  <li class="dropdown"><a href="news.php">News(<?php 
$sql="select count(description) as news from news where date='".date("Y-m-d")."'";
$query=mysqli_query($con,$sql);
$report=mysqli_num_rows($query);
$fetch=mysqli_fetch_array($query);
if ($report>0) {
echo "<font style='color:red;'>".$fetch['news']."</font>";
}
else{
   echo "<font style='color:red'>0</font>";
}


?>)</a></li><br>
  
                </ul>
    <a href="https://www.email.com"><img src="email.jpg" alt=""width="35%" height="29%"></a><br>&nbsp;&nbsp;<br>
    <a href="https://www.facebook.com"><img src="fb.png" alt="" width="34%" height="25%"/></a> <br>&nbsp;&nbsp;<br>
    <a href="https://www.yahoo.com"><img src="yahoo.png" alt=""width="34%" height="35%"/></a><br>&nbsp;&nbsp;<br>
  </td>  

            <td style="width: 300px;" class="text-justify" colspan="2">
                
<div style="width: 850px; height: 300px; overflow: auto;">
           <div>
            <p style="font-family: lucida calligraphy; text-align: center;"><br>
           </p>

           </div> 
<?php 
$sql="SELECT * FROM `news` ORDER BY `news`.`date` DESC";
$query=mysqli_query($con,$sql);
$report=mysqli_num_rows($query);
if ($report>0) {
    echo "<table class='table table-bordered' style='margin-top:20px;'><tr><th style='text-align:center;'>Date</th> <th style='text-align:center;'>Description</th></tr>";
while ($row=mysqli_fetch_array($query)) {
$date=$row['date'];
if ($date==date("Y-m-d")) {
    echo "<tr style='background-color:green; color:black;'><td >".$row['date']."</td> <td>".$row['description']."</td></tr>";
}
else{
    echo "<tr style='background-color:HoneyDew  ;'><td >".$row['date']."</td> <td>".$row['description']."</td></tr>";
}
}
echo "</table>";
}
else{
    echo "new information is not posted until now";
}

         ?>

        </div>



            </td> 

           </tr>
            <tr><td style="text-align: center; font-size: 20px; background-color: LightSteelBlue; color: black;" >Mission</td> <td style="text-align: center;font-size: 20px;background-color: LightSteelBlue;color: black;">Vission</td> <td style="text-align: center;font-size: 20px; background-color: LightSteelBlue; color: black;"> Calender</td></tr>
            <tr><td class="text-justify" style="width: 250px;">Assosa Zone prison is with participation of the people and developing highly secured information system center in order to prevent crime. Shape the prisoner to have good social interaction with people and to make the prisoner creative and fighting against crime as other good citizen do</td> <td class="text-justify"  style="width: 350px;">
                <ul class="text-justify">
                <li>Assosa Zone  prison has the vision of creating citizen who are patriotic, fight against crime and reduce crime.     </li>
                <li>To build where the rule of law approved.</li>
                   <li>To give guaranteed human right.</li>
                       <li>To provided quick service.</li>
            </ul></td> <td><script src="decoration/calander.js" type="text/javascript" language="javascript"></script></td></tr>

</table>
<div style="background-color: #E6E6FA;border-radius: 5px; box-shadow: 0px 0px 10px 0px green;"><center><font style="font-size: 20px;">Copyright © is Reserved ASU CS G-4 2024</font></center></div>

</div>
</div>
</body>
</html>
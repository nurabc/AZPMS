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
    echo "<div style='position:absolute; top:680px; left:790px;'><font style='margin-left:30px; font-family:times new roman; font-size:19px; color:red;'>please enter correct password <br> and username!</font></div>"; ;
   }
}
}
else{
 echo "<div style='position:absolute; top:680px; left:790px;'><font style='margin-left:85px; font-family:times new roman; font-size:19px; color:red;'>incorrect password and username!</font></div>";  
}
}

}
 ?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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

.dropdown-content a:hover {background-color:#8FBC8F;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
</head>
<body>
</body>
</html>
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
<script>
function show_password() {
    var x = document.getElementById("Pass");
    if (x.type === "password") {
        x.type = "text";
    }
    else {
        x.type = "password";
    }
}

 </script>
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

	<div class="container" style="background-color:LightSteelBlue; border-radius: 10px; box-shadow: 0px 0px 10px blue;">
	<img src="logo2.png" style="width: 100%; height: 150px ; box-shadow: 0px 0px 10px 0px green; border-radius: 10px; margin-top: 3px;">
	<nav>

	<div class="navbar navbar-inverse" style="margin-top: 7px;">
		
		<ul class="nav navbar-nav">
			<li><a href="index.php">Home</a></li>
                        <li><a href="cafteria_schedule.php">Cafteria Schedule</a></li>
    
                          
 </li>

             <!--

 </li>-->
 <li><a href="aboutorganization.php">About us</a></li>
   


<li><a href="contact.php">Contact</a></li>

</ul>


	</div>

</nav>
<div class="jumbotron" style="margin-top: 5px; box-shadow: 0px 0px 30px 0px white;">
<table class="table table-bordered ">
	<tr><td colspan="3" style="text-align: center; font-family: Comic sans Ms; background-color: #708090   ; color: white; border-radius: 10px; font-size: 20px; ">welcome to prison information managment system</td></tr>
      
         <?php 
include 'connection.php';
if (isset($_POST['forget'])) {
  $username=$_POST['username'];
  $secured=$_POST['serial_no'];
  $sql="select *from account where username='".$username."' and serial_no='".$secured."'";
  $query=mysqli_query($con,$sql);
  $report=mysqli_num_rows($query);
  $row=mysqli_fetch_array($query);
  if ($report>0) {
   $_SESSION['username']=$row['username'];
   header("Location:forget.php");
}
  else{
    echo "<script>alert('incorrect username or Id_number')</script>";
  }
}


 ?>

        <tr>
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
    <a href="https://www.email.com"><img src="email.jpg" alt=""width="39%" height="29%"></a><br>&nbsp;&nbsp;<br>
    <a href="https://www.facebook.com"><img src="fb.png" alt="" width="39%" height="25%"/></a> <br>&nbsp;&nbsp;<br>
    <a href="https://www.yahoo.com"><img src="yahoo.png" alt=""width="39%" height="25%"/></a><br>&nbsp;&nbsp;<br>
  </td>          
            
            <td class="text-justify" style="font-size: 14px; width: 300px;"> 
<html lang="en">
<head>
  <title>forget password page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

      <!-- Modal content-->
      <div >
        <div>
  
          <h4 class="modal-title" style="text-align: center;background-color:lightsteelblue; font-family: Comic Sans Ms; font-size: 25px;">forget password</h4>
        </div>
          <form action="" method="post" style="background-color:LightSteelBlue" ><div class="modal-body">
                <input type="text" name="username" placeholder="Enter your username" style="text-align: center; font-family: comic sans ms; font-size: 20px; border:1px buttonface;" class="form-control" required=""><br>
                <input type="password" name="serial_no" placeholder="Enter your identification Number" style="text-align: center; font-family: comic sans ms; font-size: 20px; border:1px solid gray;" class="form-control" required="">
        </div>
        <div class="modal-footer">
<a href="index.php" style="color: red; font-size: 25px; font-family: comic sans ms;"> cancel</a>
                  <input type="submit" name="forget" class="btn btn-info" value="forget password">
        </div></form>
      </div>
      
    </div>

  </td> <td style="width: 300px;" class="text-justify"><img src="pris2.jpg" width="100%">benshangul-gumuz region prison office is located in assosa city. It gives services for civil prisoners of the region. the organization uses manual file system managment, we prefer to change this application to online based system inorder to make easy file managment</td> 
</div>

</body>
</html>
            <td class="text-justify">
       
            </td></tr>
            <tr><td style="text-align: center; font-size: 20px; background-color: LightSteelBlue; color: black;" >Mission</td> <td style="text-align: center;font-size: 20px;background-color: LightSteelBlue;color: black;">Vission</td> <td style="text-align: center;font-size: 20px; background-color: LightSteelBlue; color: black;">calender</td></tr>
            <tr><td style="width: 200px;" class="text-justify">Benishangul-gumuz Region prison is with participation of the people and developing highly secured information system center in order to prevent crime. Shape the prisoner to have good social interaction with people and to make the prisoner creative and fighting against crime as other good citizen do</td> <td  class="text-justify">
                <ul class="text-justify">
                <li>Benishangul-gumuz Region prison has the vision of creating citizen who are patriotic, fight against crime and reduce crime.     </li>
                <li>To build where the rule of law approved.</li>
                   <li>To give guaranteed human right.</li>
                       <li>To provided quick service.</li>
            </ul></td> <td><script src="decoration/calander.js" type="text/javascript" language="javascript"></script></td></tr>

</table>
    <div>
        
    </div>
    <div style="background-color: #E6E6FA;border-radius:1300px; box-shadow: 0px 0px 10px 0px green;"><center><font style="font-size: 20px;">Copyright © is reserved by BGRS in 2019</font></center></div>

</div>
</div>
</body>
</html>








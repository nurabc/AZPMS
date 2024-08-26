<?php 
session_start();
include 'connection.php';
if (isset($_POST['login'])){
  $_SESSION["username"] = $_POST["username"];
 $_SESSION["password"] = $_POST["password"];
 $_SESSION['last_time'] = time();
 {
 if(!empty($_POST['username']) && !empty($_POST['password'])){
 $username = $_POST['username'];
//  $password = md5($_POST['password']);
 $password = $_POST['password'];
 $username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($con,$username);
$password = mysqli_real_escape_string($con,$password); 
   if (empty($username) || empty($password)) {
 echo "<script>alert('please fill the form!')</script>";
}
else{
    $sql="select *from account where username='$username' and password='$password' and status='1'";
    $query=mysqli_query($con,$sql);
$report=mysqli_num_rows($query);
if ($report>0) {
   while ($row= mysqli_fetch_assoc($query)) {
       $user_type=$row['account_type'];
       /*if ($user_type=="prisoner") {
    $_SESSION['id']=$row['id'];
    $_SESSION['serial_no']=$row['serial_no'];
    $_SESSION['username']=$row['username'];
    $_SESSION['password']=$row['password'];
     $_SESSION['zone']=$row['zone'];
     header("Location:prisoner/index.php");
       }
else*/ if ($user_type=="adminstrator") {
    	$_SESSION["admin_logged"] = "true";
    $_SESSION['id']=$row['id'];
    $_SESSION['serial_no']=$row['serial_no'];
     $usernamee=$row['username'];
 $passwordd=$row['password'];
     $_SESSION['zone']=$row['zone'];
     if($usernamee == $username && $passwordd == $password)
 {
     header("Location:admin/index.php");
}
echo "<div style='position:absolute; top:360px; left:790px;'><font style='margin-left:30px; font-family:times new roman; font-size:19px; color:red;'>please enter correct password <br>and username!</font></div>"; ;
  
 }
else if ($user_type=="inspector") {
    	$_SESSION["inspector_logged"] = "true";
    $_SESSION['id']=$row['id'];
    $_SESSION['serial_no']=$row['serial_no'];
     $usernamee=$row['username'];
 $passwordd=$row['password'];
     $_SESSION['zone']=$row['zone'];
     if($usernamee == $username && $passwordd == $password)
 {
     header("Location:inspector/index.php");
}
echo "<div style='position:absolute; top:360px; left:790px;'><font style='margin-left:30px; font-family:times new roman; font-size:19px; color:red;'>please enter correct password <br>and username!</font></div>"; ;
  
 }
else if ($user_type=="policeofficer") {
    	$_SESSION["policeofficer_logged"] = "true";
    $_SESSION['id']=$row['id'];
    $_SESSION['serial_no']=$row['serial_no'];
     $usernamee=$row['username'];
 $passwordd=$row['password'];
     $_SESSION['zone']=$row['zone'];
     if($usernamee == $username && $passwordd == $password)
 {
     header("Location:policeofficer/index.php");
     
}
echo "<div style='position:absolute; top:360px; left:790px;'><font style='margin-left:30px; font-family:times new roman; font-size:19px; color:red;'>please enter correct password <br>and username!</font></div>"; ;
  
 }


else if ($user_type=="comissioner") {
    	$_SESSION["comissioner_logged"] = "true";
    $_SESSION['id']=$row['id'];
    $_SESSION['serial_no']=$row['serial_no'];
     $usernamee=$row['username'];
 $passwordd=$row['password'];
     $_SESSION['zone']=$row['zone'];
     if($usernamee == $username && $passwordd == $password)
 {
     header("Location:comissioner/index.php");
}
echo "<div style='position:absolute; top:360px; left:790px;'><font style='margin-left:30px; font-family:times new roman; font-size:19px; color:red;'>please enter correct password <br>and username!</font></div>"; ;
  
 }
else{
    echo "<div style='position:absolute; top:370px; left:790px;'><font style='margin-left:30px; font-family:times new roman; font-size:19px; color:red;'>please enter correct password <br>and username!</font></div>"; ;
   }
}
}
else{
 echo "<div style='position:absolute; top:518px; left:790px;'><font style='margin-left:85px; font-family:times new roman; font-size:19px; color:red;'>incorrect password and username!</font></div>";  
}
}
 }}
}
 ?>			
<script>
var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
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

.dropdown-content a:hover {background-color:white;}
.dropdown:hover .dropdown-content {display: block;}
.ul li:hover{background-color:white;}
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
	<img src="log1.png" style="width: 100%; height: 150px ; box-shadow: 0px 0px 10px 0px green; border-radius: 10px; margin-top: 3px;">
	<nav>
	<div class="navbar navbar-inverse" style="margin-top: 7px;">
		
		<ul class="nav navbar-nav">
			<li><a href="index.php">Home</a></li>
                   <li><a href="cafteria_schedule.php">Cafteria Schedule</a></li>
    
			  <li><a href="aboutorganization.php">About us</a></li>
<li><a href="contact.php">Contact us</a></li>
</ul>


	</div>

</nav>
<div class="jumbotron" style="margin-top: 5px; box-shadow: 0px 0px 30px 0px white;">
<table class="table table-bordered ">
	<tr><td colspan="5" style="text-align: center; font-family: Comic sans Ms; background-color: Lavender ; color:black ; border-radius: 10px; font-size: 20px; ">Welcome to Assosa Zone prison  managment system</td></tr>
    <tr style="text-align: center;"><td colspan="4" style="font-size: 20px; background-color: LightSteelBlue; color: white; font-family: comic sans Ms;">Do  you know about Assosa Zone </td>
        
        <td style="font-size: 20px; background-color: LightSteelBlue; color: white; font-family: times new roman;">login here</td>
    </tr>
        <tr><td style="font-size: 14px; width: 40px;background-color:lightcyan"><ul>
                    <li class="dropdown"><a href="help.doc">Help</a></li><br>
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
    <!-- <a href="https://www.email.com"><img src="email.jpg" alt=""width="39%" height="29%"></a><br>&nbsp;&nbsp;<br>
    <a href="https://www.facebook.com"><img src="fb.png" alt="" width="39%" height="25%"/></a> <br>&nbsp;&nbsp;<br>
   <a href="https://www.yahoo.com"><img src="yahoo.png" alt=""width="39%" height="25%"/></a><br>&nbsp;&nbsp;<br> -->
  </td>
  <td colspan="3" style="width: 300px;" class="text-justify"><img src="pmm.jpg" width="100%">Assosa Zone  prison office is located in  Benishangul-Gumuz region in Assosa city. It gives services for civil prisoners of the region. the organization uses manual file system managment, we prefer to change this application to online based system inorder to make easy file managment</td> 
   
            <td class="text-justify">
         <table class="table table-condensed table-bordered">
  
    <tr>
        <td style="width: 400px;">
<div style="width: 300px; margin-left: 10px; background-color: gray; height: 300px; border-radius: 10px; box-shadow: 0px 0px 10px green;">
<form action="" method="post"><br>


<font style="color: black; font-size: 20px; margin-left: 15px;">User Name</font></font></span>
 <input type="text" name="username" class="form-control" style="width: 250px; margin-left: 15px; border:2px solid black;" required="">
            <font style="color: black; font-size: 20px; margin-left: 15px;">Password</font></font></span>
            <input type="password" name="password" id="Pass" class="form-control" style="width: 250px; margin-left: 15px; border:2px solid black;" required=""><br>

            <input type="submit" name="login" value="login" class="btn btn-success form-control" style="width: 250px; margin-left: 15px; background-color: #54381e; font-size: 20px; font-family: comic sans Ms; height: 50px; border:2px solid brown;">
           <br><input type="checkbox"  name="checkbox" id="cb" onClick="show_password();">
<span style="color: black; font-size: 17px"><b>Show Characters<b></span></center><br>
             <a href="forgetpassword.php" style="color: black; font-family: times new roman; font-size: 20px;">forget password</a>
 
        </form>
       

    </div>

        </td>

    </tr>
</table>
            </td></tr>
        <tr><td colspan="2" style="text-align: center; font-size: 20px; background-color: LightSteelBlue; color: black;" >Mission</td> <td colspan="2" style="text-align: center;font-size: 20px;background-color: LightSteelBlue;color: black;">Vission</td> <td style="text-align: center;font-size: 20px; background-color: LightSteelBlue; color: black;">Calender</td></tr>
            <tr><td colspan="2" class="text-justify">Assosa Zone  Prison is with participation of the people and developing highly secured information system center in order to prevent crime. Shape the prisoner to have good social interaction with people and to make the prisoner creative and fighting against crime as other good citizen do</td> <td class="text-justify">
                <ul class="text-justify">
                <li>Assosa Zone Prison has the vision of creating citizen who are patriotic, fight against crime and reduce crime.     </li>
                <li>To build where the rule of law approved.</li>
                   <li>To give guaranteed human right.</li>
                       <li>To provided quick service.</li>
                </ul></td> <td colspan="3"><script src="decoration/calander.js" type="text/javascript" language="javascript"></script></td></tr>
<TR >
               <!-- <TD colspan="3"> <a href="https://www.facebook.com"><img src="fb.png" alt="" width="4%" height="5%"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   <a href="https://www.youtube.com"><img src="youtube.jpg" alt="" width="4%" height="5%"/></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="https://www.instagram.com"><img src="instagram.jpg" alt="" width="4%" height="5%"/></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://www.linkedin.com"><img src="LinkedIn.jpg" alt=""width="6%" height="7%"/></a>
              
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="https://www.email.com"><img src="email.jpg" alt=""width="4%" height="5%"></a>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="https://www.yahoo.com"><img src="yahoo.png" alt=""width="4%" height="5%"></a>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="https://www.amazon.com"><img src="amazon.png" alt=""width="8%" height="9%"></a>
                      
                
                
                </td>
            -->
            </TR>
</table>
    <div>
        
    </div>
    <div style="background-color: #E6E6FA;border-radius:1300px; box-shadow: 0px 0px 10px 0px green;"><center><font style="font-size: 20px;">Copyright © is Reserved ASU CS G-4 2024</font></center></div>

</div>
</div>
</body>
</html>
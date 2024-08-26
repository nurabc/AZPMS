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
    echo "<div style='position:absolute; top:680px; left:790px;'><font style='margin-left:30px; font-family:times new roman; font-size:19px; color:red;'>please enter correct password <br>and username!</font></div>"; ;
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
  
li a {
  display: block;
  color: white;
  padding: 8px 16px;
  text-decoration: none;
}

/* Change the link color on hover */
li a:hover {
  background-color: white;
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

	<div class="container" style="background-color: LightSteelBlue; border-radius: 10px; box-shadow: 0px 0px 10px blue;">
	<img src="log1.png" style="width: 100%; height: 150px ; box-shadow: 0px 0px 10px 0px green; border-radius: 10px; margin-top: 3px;">
	<nav>

	<div class="navbar navbar-inverse" style="margin-top: 7px;">
		
		<ul class="nav navbar-nav">
			<li><a href="index.php">Home</a></li>
                        <li><a href="cafteria_schedule.php">Cafteria Schedule</a></li>
    
                          
 </li>
			<li><a href="news.php">News(<?php 
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


             ?>)</a></li>
             <!--
				 <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Servies<span class="caret"></span></a>
<ul class="dropdown-menu" style="background-color: gray;">
                            <li><a href="#"><span style="color: black; font-size: 20px;">Training</span></a></li>
                            <li><a href="#"><span style="color: black; font-size: 20px;">Education</span></a></li>
                            <li><a href="#"><span style="color: black; font-size: 20px;">Clinic</span></a></li>
                            </ul>
             class="active"
 </li>-->
			 <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">About<span class="caret"></span></a>

    <ul class="dropbtn" style="background-color: gray;">
    <div class="dropdown-content">
                            <li><a href="aboutdeveloper.php"><span style="color: black; font-size: 20px;">Developer</span></a></li>
                            <li><a href="aboutorganization.php"><span style="color: black; font-size: 20px;">Organization</span></a></li>
    </div>
</ul>
</li>
<li><a href="contact.php">Contact</a></li>
<li><a href="help.doc">Help</a></li>
</ul>


	</div>

</nav>
<div class="jumbotron" style="margin-top: 5px; box-shadow: 0px 0px 30px 0px white;">
<table class="table table-bordered ">
    <tr><td colspan="3" style="text-align: center; font-family: Comic sans Ms; background-color: #708090; color: white; border-radius: 10px; font-size: 20px; ">welcome to prison information managment system</td></tr>
    <tr style="text-align: center;"><td style="font-size: 20px; background-color: LightSteelBlue; color: white; font-family: comic sans Ms;">do you know about BG</td>
        <td style="font-size: 20px; background-color: LightSteelBlue; color: black; font-family: comic sans Ms;">Benishangul-gumuz Region(BG) prison comission</td>
        <td style="font-size: 20px; background-color: LightSteelBlue; color: white; font-family: comic sans Ms;"></td></tr>
        <tr><td class="text-justify" style="font-size: 14px; width: 300px;">  Benishangul-Gumuz (Amharic: ቤንሻንጉል ጉሙዝ), also known as Benshangul/Gumuz, is one of the nine ethnic divisions (kililoch) of Ethiopia. It was previously known as Region 6.The region's capital is Assosa<br>
     <script type="text/javascript">
      $(document).ready(function(){
    $("#btnt").click(function(){
        $("#demo").toggle(1000);
        $("#demo1").hide(1000);
         $("#demo2").hide(1000);
          $("#demo3").hide(1000);
    });
});
  $(document).ready(function(){
    $("#btn1").click(function(){
        $("#demo1").toggle(1000);
        $("#demo").hide(1000);
         $("#demo2").hide(1000);
          $("#demo3").hide(1000);
    });
});
  $(document).ready(function(){
    $("#btn2").click(function(){
        $("#demo2").toggle(1000);
        $("#demo").hide(1000);
         $("#demo1").hide(1000);
          $("#demo3").hide(1000);
    });
});
  $(document).ready(function(){
    $("#btn3").click(function(){
        $("#demo3").toggle(1000);
        $("#demo2").hide(1000);
         $("#demo1").hide(1000);
          $("#demo").hide(1000);
    });
});


    </script>
 <div style="width: 450px; height: 200px;">               
<p id="btnt" class="glyphicon glyphicon-play" style="">  
    how to view cafteria schedule <br>
</p>
<div id="demo" class="collapse out" ><p style="color:blueviolet" class="glyphicon glyphicon-hand-right">&nbsp;find the cafteria schedule in the task bar </p><br>
<p style="color:blueviolet"  class="glyphicon glyphicon-hand-right">&nbsp;Press on cafteria schedule links</p><br>
  <br>
</div>

 <p id="btn1" class="glyphicon glyphicon-play" style="">
     how to login <br>
</p>
<div id="demo1" class="collapse out" ><p style="color:blueviolet" class="glyphicon glyphicon-hand-right">&nbsp;open the sytem first</p><br>
<p style="color:blueviolet"  class="glyphicon glyphicon-hand-right">&nbsp;fill the user name and password correctly</p>
<br>
<p style="color:blueviolet"  class="glyphicon glyphicon-hand-right">&nbsp;press login button</p>
<br>
</div>

  <p id="btn2" class="glyphicon glyphicon-play">
      How to View about organization<br>
</p> 
<div id="demo2" class="collapse out" ><p style="color:blueviolet"  class="glyphicon glyphicon-hand-right">&nbsp;press on about organization on task bar</p><br>
<p  style="color:blueviolet" class="glyphicon glyphicon-hand-right">&nbsp;read the about organization  e</p><br>
  <br>
</div>
<p id="btn3" class="glyphicon glyphicon-play">
how to get contacts<br>
</p>
<div id="demo3" class="collapse out" ><p style="color:blueviolet"  class="glyphicon glyphicon-hand-right">&nbsp;press on contact</p><br>
<p style="color:blueviolet" class="glyphicon glyphicon-hand-right">you can get the contact </p><br>
  <br>
  
</div>

    
    
            </td> <td style="width: 300px;" class="text-justify"><img src="pris2.jpg" width="100%">benshangul-gumuz region prison office is located in assosa city. It gives services for civil prisoners of the region. the organization uses manual file system managment, we prefer to change this application to online based system inorder to make easy file managment</td> 

            <td class="text-justify">
         <table class="table table-condensed table-bordered">
 
    </div>

        </td>


    </tr>
</table>
            </td></tr>
            <tr><td style="text-align: center; font-size: 20px; background-color: #556B2F; color: white;" >Mission</td> <td style="text-align: center;font-size: 20px;background-color: #556B2F;color: white;">Vission</td> <td style="text-align: center;font-size: 20px; background-color: #556B2F; color: white;">calender</td></tr>
            <tr><td class="text-justify">Benishangul-gumuz Region prison is with participation of the people and developing highly secured information system center in order to prevent crime. Shape the prisoner to have good social interaction with people and to make the prisoner creative and fighting against crime as other good citizen do</td> <td class="text-justify">
                <ul class="text-justify">
                <li>Benishangul-gumuz Region prison has the vision of creating citizen who are patriotic, fight against crime and reduce crime.     </li>
                <li>To build where the rule of law approved.</li>
                   <li>To give guaranteed human right.</li>
                       <li>To provided quick service.</li>
            </ul></td> <td><script src="decoration/calander.js" type="text/javascript" language="javascript"></script></td></tr>

</table>
<div style="background-color: #E6E6FA;border-radius: 5px; box-shadow: 0px 0px 10px 0px green;"><center><font style="font-size: 20px;">Copyright © is reserved by GROUP 3 in 2019</font></center></div>

</div>
</div>
</body>
</html>


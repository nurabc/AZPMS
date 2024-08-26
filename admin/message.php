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
if (!isset($_SESSION['admin_logged'])) {
    header("location:../login.php");
  }
  if (isset($_POST['sendmsg'])) {
$msgtext=$_POST['msgtxt'];
$reciver=$_POST['reciver'];
$zone=$_POST['zone'];
if (empty($msgtext)) {
 echo "<script>alert('please enter your message')</script>";
}
else{
if ($reciver=="inspector") {
  $sql="INSERT INTO `inspector_message`(`id`,`sender`, `message`, `zone`, `status`, `date`) VALUES ('','adminstrator','".$msgtext."','".$zone."','0','".date("Y-m-d")."')";
  $query=mysqli_query($con,$sql);
  if ($query) {
    echo "<font style='color:red; font-size:20px; position:absolute;left:600px; top:400px;'> message sent sucessfully</font>";
  }
  else{
      echo "<font style='color:red; font-size:20px; position:absolute;left:600px; top:400px;'> failed try agin!</font>";
  }
}
else if ($reciver=="policeofficer") {
  $sql="INSERT INTO `policeofficer_message`(`id`,`sender`, `message`, `zone`, `status`, `date`) VALUES ('','adminstrator','".$msgtext."','".$zone."','0','".date("Y-m-d")."')";
  $query=mysqli_query($con,$sql);
  if ($query) {
    echo "<font style='color:red; font-size:20px; position:absolute;left:600px; top:400px;'> message sent sucessfully</font>";
  }
  else{
      echo "<font style='color:red; font-size:20px; position:absolute;left:600px; top:400px;'> failed try agin!</font>";
  }
}
else if ($reciver=="comissioner") {
  $sql="INSERT INTO `comissioner_message`(`sender`, `message`, `zone`, `status`, `date`) VALUES ('adminstrator','".$msgtext."','".$zone."','0','".date("Y-m-d")."')";
  $query=mysqli_query($con,$sql);
  if ($query) {
    echo "<font style='color:red; font-size:20px; position:absolute;left:600px; top:400px;'> message sent sucessfully</font>";
  }
  else{
      echo "<font style='color:red; font-size:20px; position:absolute;left:600px; top:400px;'> failed try agin!</font>";
  }
}}
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

.dropdown-content a:hover {background-color: teal;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
</head>
<body>
</body>
</html>
<script>
    function confirmation()
    {
        var x =confirm("do you want to send message ");
        if (x==true)
        {
            return true;
            
        }
       else
           return false;
    }
</script>
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
	<img src="../logo2.png" style="width: 100%; height: 150px ; box-shadow: 0px 0px 10px 0px green; border-radius: 10px; margin-top: 3px;">
	<nav>

	<div class="navbar navbar-inverse" style="margin-top: 7px;">
		
		<ul class="nav navbar-nav">
			<li><a href="index.php">Home</a></li>
		<li><a href="sendmessage.php">send message</a></li>
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> Inbox message(<?php 
$sql="select count(id) as total  from admin_message where status=0";
$query=mysqli_query($con,$sql);
$report=mysqli_num_rows($query);
$total=mysqli_fetch_array($query);
if ($report>0) {
  echo "<font style='color:red;'>".$total['total']."</font>";
}
else{
    echo "<font style='color:red;'>0</font>";
}


       ?>)<span class="caret"></span></a>
<ul class="dropbtn" style="background-color: gray;">
    <div class="dropdown-content">
			<li><a href="inbox1.php"><span style="color: black; font-size: 20px;">new message(<?php 
$sql="select count(id) as total  from admin_message where status=0";
$query=mysqli_query($con,$sql);
$report=mysqli_num_rows($query);
$total=mysqli_fetch_array($query);
if ($report>0) {
  echo "<font style='color:red;'>".$total['total']."</font>";
}
else{
    echo "<font style='color:red;'>0</font>";
}


?>)</span></a></li>
                        <li><a href="inbox.php"><span style="color: black; font-size: 20px;">old message</span></a></li>
   </div>
</ul>
	<li><a href="view_report.php">View report</a></li>
         <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">report generate<span class="caret"></span></a>
<ul class="dropbtn" style="background-color: gray;">
    <div class="dropdown-content">
        <li><a href="reportgerenate.php"><span style="color: black; font-size: 20px;">today report</span></a></li>
        <li><a href="reportgeneration.php"><span style="color: black; font-size: 20px;">general report</span></a></li>
                           
    </div>
</ul>
</li>
			 <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Manage Account<span class="caret"></span></a>
<ul class="dropbtn" style="background-color: gray;">
    <div class="dropdown-content">
              <li><a href="create.php"><span style="color: black; font-size: 20px;">create account</span></a></li>
                      <li><a href="delete.php"><span style="color: black; font-size: 20px;">delete account</span></a></li>
                     <li><a href="update.php"><span style="color: black; font-size: 20px;">update account</span></a></li>
                       <li><a href="activate.php"><span style="color: black; font-size: 20px;">activate account</span></a></li>
                      <li><a href="deactivate.php"><span style="color: black; font-size: 20px;">deactivate account</span></a></li>
    </div>
</ul>
</li>

</ul>
<ul class="nav navbar-nav navbar-right">
 <li>
                           <!-- login modal form-->
                           <a href="logout.php"> <button type="button" class="btn btn-success" style=" margin-top: -5px; width: 80px;">logout</button></a>
                       <!-- Modal -->
                                

                    </li>


                </ul>
	</div>

</nav>
<div class="jumbotron" style="margin-top: 5px; box-shadow: 0px 0px 30px 0px white;">
<table class="table table-bordered ">
    <tr><td colspan="3" style="text-align: center; font-family: Comic sans Ms; background-color: #708090; color: white; border-radius: 10px; font-size: 20px; ">welcome to admin message page</td></tr>
    <tr style="text-align: center;"><td style="font-size: 20px; background-color: LightSteelBlue; color: white; font-family: comic sans Ms;">do you know about BG</td>
        <td style="font-size: 20px; background-color: LightSteelBlue; color: black; font-family: comic sans Ms;" colspan="2">Message for admin</td>
        </tr>
        <tr><td class="text-justify" style="font-size: 14px; width: 300px;"><br>
            <img src="../assosa 1.jpg" width="100%"></td>

            <td style="width: 300px;" class="text-justify" colspan="2">
                
<div style="width: 750px; height: 300px; overflow: auto;">
          
<?php 
$sql="SELECT * FROM `admin_message`";
$query=mysqli_query($con,$sql);
$report=mysqli_num_rows($query);
if ($report>0) {
    echo "<table class='table table-bordered' style='margin-top:20px;'><tr><th>sender</th> <th>Message</th> <th>zone</th> <th>date</tr>";
while ($row=mysqli_fetch_array($query)) {
   echo "<tr><td>".$row['sender']."</td> <td>".$row['message']."</td> <td>".$row['zone']."</td> <td>".$row['date']."</td> </tr>";
}
echo "</table>";
}
else{
    echo "not generated until know";
}

         ?>

        </div>



            </td> 

           </tr>
            <tr><td style="text-align: center; font-size: 20px; background-color: LightSteelBlue; color: black;" >Mission</td> <td style="text-align: center;font-size: 20px;background-color: LightSteelBlue;color: black;">Vission</td> <td style="text-align: center;font-size: 20px; background-color: LightSteelBlue; color: black;">calender</td></tr>
            <tr><td class="text-justify">Benishangul-gumuz Region prison is with participation of the people and developing highly secured information system center in order to prevent crime. Shape the prisoner to have good social interaction with people and to make the prisoner creative and fighting against crime as other good citizen do</td> <td class="text-justify"  style="width: 300px;">
                <ul class="text-justify">
                <li>Benishangul-gumuz Region prison has the vision of creating citizen who are patriotic, fight against crime and reduce crime.     </li>
                <li>To build where the rule of law approved.</li>
                   <li>To give guaranteed human right.</li>
                       <li>To provided quick service.</li>
            </td> <td><script src="../decoration/calander.js" type="text/javascript" language="javascript"></script></td></tr>

</table>
<div style="background-color: #E6E6FA;border-radius: 5px; box-shadow: 0px 0px 10px 0px green;"><center><font style="font-size: 20px;">Copyright © is Reserved ASU CS G-4 2024</font></center></div>

</div>
</div>
</body>
</html>


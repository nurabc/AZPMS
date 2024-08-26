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
if (!isset($_SESSION['comissioner_logged'])) {
    header("location:../login.php");
  }
  if (isset($_POST['post'])) {
    $new=$_POST['news'];
    $sql="INSERT INTO `news`(`id`, `description`, `date`) VALUES ('','".$new."','".date('Y-m-d')."')";
    $query=mysqli_query($con,$sql);
    if ($query) {
     echo "<font style='position:absolute; top:350px; left:600px; color:red; font-family:comic sans Ms; font-size:25px;'>posted successfully!</font>";
    }
    else{
      echo "not inserted";
    }
  }
 ?>
<!DOCTYPE html>
<script>
    function confirmation()
    {
        var x =confirm("do you want to post news ");
        if (x==true)
        {
            return true;
            
        }
       else
           return false;
    }
</script>
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
	<title>prisoner managment system</title>
</head>
<body>

	<div class="container" style="background-color: LightSteelBlue; border-radius: 10px; box-shadow: 0px 0px 10px blue;">
	<img src="../log1.png" style="width: 100%; height: 150px ; box-shadow: 0px 0px 10px 0px green; border-radius: 10px; margin-top: 3px;">
	<nav>

	<div class="navbar navbar-inverse" style="margin-top: 7px;">
		
		<ul class="nav navbar-nav">
			<li><a href="index.php">Home</a></li>
			 <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> Inbox message(<?php 
$sql="SELECT COUNT(message) as total FROM comissioner_message where status=0";
 $query=mysqli_query($con,$sql);
$report=mysqli_num_rows($query);
$fetch=mysqli_fetch_array($query);
if ($report>0) {
echo "<font style='color:red;'>".$fetch['total']."</font>";
}
else{
  echo "<font style='color:red;'>0</font>";
}

       ?>)<span class="caret"></span></a>
<ul class="dropbtn" style="background-color: gray;">
    <div class="dropdown-content">
     <li><a href="inbox1.php"><span style="color: black; font-size: 20px;">new message(<?php 
$sql="SELECT COUNT(message) as total FROM comissioner_message where status=0";
 $query=mysqli_query($con,$sql);
$report=mysqli_num_rows($query);
$fetch=mysqli_fetch_array($query);
if ($report>0) {
echo "<font style='color:red;'>".$fetch['total']."</font>";
}
else{
  echo "<font style='color:red;'>0</font>";
}

?>)</span></a></li>
     <li><a href="inbox.php"><span style="color: black; font-size: 20px;">old message</span></a></li>
     </div>
</ul>
		<li><a href="sendmessage.php">send message</a></li>
			<li><a href="postnew.php">Post news</a></li>
			<li><a href="readfeedback.php">see feedback</a></li>
			 <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">More<span class="caret"></span></a>
<ul class="dropbtn" style="background-color: gray;">
      <div class="dropdown-content">                         
                          
                             <li><a href="readforgive.php"><span style="color: black; font-size: 20px;">read Request</span></a></li>
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
<table class="table table-bordered" style="font-size: 30px;">
  <!-- <form action="search.php" method="post"><tr><td></td> <td><input type="text" name="serial" class="form-control" style="width: 400px; font-size: 20px; font-family: comic sans ms; border: 3px solid black; border-radius: 5px;" placeholder="search prisoner using ID Number"></td> <td><input type="submit" name="search" value="search" class="btn btn-info form-control"></td> </tr></form> -->
	<tr><td colspan="3" style="text-align: center;">  

</td>
            </tr>
	<tr><td><img src="../news.jfif" class="img-rounded" style="width: 267px; height: 396px;" id="img"></td>   <td style="font-family: Comic sans Ms;"><br><br>
<b><form action="" method="post">
        <textarea class="form-control" placeholder="Enter your news and events" style="width: 600px; height: 200px; border:2px solid gray; border-radius: 10px;" name="news" required=""></textarea> <input type="submit" name="post" value="post" class="btn btn-success form-control" style="height: 45px;font-size: 25px; width: 200px; margin-left: 200px;"onclick="return confirmation ();"></form></b>
  </td></tr>

</table>
<div style="background-color: #E6E6FA;border-radius: 5px; box-shadow: 0px 0px 10px 0px green;"><center><font style="font-size: 20px;">Copyright © is Reserved ASU CS G-4 2024</font></center></div>

</div>
</div>
</body>
</html>
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
  if(isset($_POST['create'])){
    $serial_no=$_POST['serial_no'];
   
    $password=$_POST['password'];
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $sex=$_POST['sex'];
    $age=$_POST['age'];
    $zone=$_POST['zone'];
    $password1=$_POST['password1'];
    $account_type=$_POST['user_type'];
if (empty($fname) || empty($mname) || empty($serial_no)) {
  echo "<font style='position:absolute; top:650px; left:900px;color:red; font-size:20px;'>please fill the form</font>";
}
else{

    if ($password==$password1) {
    $sql="INSERT INTO `account`(`id`, `serial_no`, `username`, `password`, `zone`, `account_type`, `status`) VALUES ('','".$serial_no."','". $fname."','".$password."','".$zone."','".$account_type."','1')";
    $query=mysqli_query($con,$sql);
    if ($query) {
      if ($account_type=="comissioner") {
        $sql1="INSERT INTO `commisioner_information`(`fname`, `serial_no`, `lname`, `sex`, `age`, `zone`) VALUES ('".$fname."','".$serial_no."','".$mname."','".$sex."','".$age."','".$zone."')";
     $query1=mysqli_query($con,$sql1);
     if ($query1) {
      echo "<font style='position:absolute; top:650px; left:900px;color:red; font-size:20px;'>sucessfully created</font>";
     }
     else{
      echo "<font style='position:absolute; top:650px; left:900px;color:red; font-size:20px;'>Error Occoure! may be due to<br> serial no,username,and password deplication</font>";
     }
      }
      else if ($account_type=="inspector") {
       $sql1="INSERT INTO `inspector_information`(`fname`, `lname`, `serial_no`, `sex`, `age`, `zone`) VALUES ('".$fname."','".$mname."','".$serial_no."','".$sex."','".$age."','".$zone."')";
     $query1=mysqli_query($con,$sql1);
     if ($query1) {
      echo "<font style='position:absolute; top:650px; left:900px;color:red; font-size:20px;'>sucessfully created</font>";
     }
     else{
      echo "<font style='position:absolute; top:650px; left:900px;color:red; font-size:20px;'>Error Occoure! may be due to<br> serial no,username,and password deplication</font>";
     }
      }
     
    }
    else{
     echo "<font style='position:absolute; top:650px; left:900px;color:red; font-size:20px;'>Error Occoure! may be due to<br> serial no,username,and password deplication</font>"; 
    }
    }
    else{
  echo "<font style='position:absolute; top:650px; left:900px;color:red; font-size:20px;'>conformation password <br>is incorrect try again!</font>";
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

.dropdown-content a:hover {background-color: teal;}

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
	<img src="../log1.png" style="width: 100%; height: 150px ; box-shadow: 0px 0px 10px 0px green; border-radius: 10px; margin-top: 3px;">
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
     <li> <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="margin-right: 15px;">change password</button></a>
                             </li>
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
  <tr>

    <td colspan="3" style="text-align: center; font-family: Comic sans Ms; background-color: #708090; color: white; border-radius: 10px; font-size: 20px; ">welcome to adminstrator page</td></tr>
    <tr style="text-align: center;"><td style="font-size: 20px; background-color: LightSteelBlue; color: white; font-family: comic sans Ms;">Do you know about Assosasa Zone</td>
        <td style="font-size: 20px; background-color: LightSteelBlue; color: black; font-family: comic sans Ms;" >read message page</td>
        <td style="font-size: 20px; background-color: LightSteelBlue; color: white; font-family: comic sans Ms;"></td></tr>
        <tr><td class="text-justify" style="font-size: 14px; width: 300px;">  Assosa Zone located in  Benshangul/Gumuz, is one of the 11 ethnic divisions (kililoch) of Ethiopia. It was previously known as Region 6.The region's capital is Assosa<br>
            <img src="../mesold.jfif" width="100%"></td> 
            <td style="width: 400px;" class="text-justify" rowspan="5" colspan="5">
         <div style="overflow: auto; width: 500px;">
             
                <?php 
$sql="select *from admin_message";
$query=mysqli_query($con,$sql);
$report=mysqli_num_rows($query);
if ($report>0) {
  echo "<table class='table table-bordered'><tr><th>sender</th> <th>message</th> <th>zone</th> <th>date</th></tr>";
  while ($row=mysqli_fetch_array($query)) {
  echo "<tr><td>".$row['sender']."</td> <td>".$row['message']."</td> <td>".$row['zone']."</td> 
  <td>".$row['date']."</td></tr>";
  }
  echo "</table>";
}
else{
  echo "<font style='color:red;font-size:20px;'>no new in box message</font>";
}


               ?>


         </div>
            </td> 

            <tr><td style="text-align: center; font-size: 20px; background-color: LightSteelBlue; color: black;" >what can i help you?</td>  </tr>
            <tr>
              <td class="text-justify" >
    <!--help-->
    <div style="width: 350px; height: 200px;">
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
    
       <p id="btnt" class="glyphicon glyphicon-play" style="">
How to send message
</p>
<div id="demo" class="collapse out" ><p class="glyphicon glyphicon-hand-right">&nbsp;Enter the message</p>
<p class="glyphicon glyphicon-hand-right">&nbsp;Press on send button</p>
  <br>
</div>

 <p id="btn1" class="glyphicon glyphicon-play" style="">
How to read message
</p>
<div id="demo1" class="collapse out" ><p class="glyphicon glyphicon-hand-right">&nbsp;press inbox message</p>
<p class="glyphicon glyphicon-hand-right">&nbsp;read the message that sent to you</p>
  <br>
</div>

  <p id="btn2" class="glyphicon glyphicon-play">
How to View report
</p> 
<div id="demo2" class="collapse out" ><p class="glyphicon glyphicon-hand-right">&nbsp;press on view report</p>
<p class="glyphicon glyphicon-hand-right">&nbsp;read the report that sent from each zone</p>
  <br>
</div>
<p id="btn3" class="glyphicon glyphicon-play">
How to Mng account
</p>
<div id="demo3" class="collapse out" ><p class="glyphicon glyphicon-hand-right">&nbsp;press on manage account</p>
<p class="glyphicon glyphicon-hand-right">youcan create,delete,update,activate and deactivate</p>
  <br>
  
</div>
</td> </tr>

</table>
<div style="background-color: #E6E6FA;border-radius: 5px; box-shadow: 0px 0px 10px 0px green;"><center><font style="font-size: 20px;">Copyright © is Reserved ASU CS G-4 2024</font></center></div>

</div>
</div>
</body>
</html>
<?php 

if (isset($_POST['update'])) {
	$username=$_POST['username'];
	$current=$_POST['cpassword'];
	$new=$_POST['npassword'];
        $copassword=$_POST['copassword'];
        if ($new==$copassword) {
	$sql="SELECT * FROM `account` WHERE `username`='".$username."' AND `password`='".$current."' ";
$q=mysqli_query($con,$sql);
$report=mysqli_num_rows($q);
if ($report>0) {
    
	$sql1="UPDATE `account` SET `password`='".$new."' WHERE username='".$username."'";
	$query=mysqli_query($con,$sql1);
	if ($query) {
		echo "<script>alert('password is updated successfully')</script>";
	}
	else{

		echo "<script>alert('not updated please try again!!')</script>";
	}
}
else{
echo "<script>alert('username or password is not correct please enter correct password and username!!')</script>";
}
        }
        else{
 echo "<script>alert('coniformation password is incorrect!')</script>";
        }
}	

 ?>
    </div>
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center" style="font-family: comic sans ms; color:red;">change password </h4>
        </div>
        <div class="modal-body">
       <form action="" method="post">  
            <table class="table table-bordered"><tr><td style="font-family: comic sans ms; font-size: 25px;">username</td> <td><input type="text" name="username" class="form-control" style="border:2px solid green"></td></tr>

<tr><td style="font-family: comic sans ms; font-size: 25px;">password</td> <td><input type="password" name="cpassword"  required="" id="Pass" class="form-control" style="border:2px solid green"></td></tr>
<tr><td style="font-family: comic sans ms; font-size: 25px;">new password</td> <td><input type="password" name="npassword"   required="" id="Pass" class="form-control" style="border:2px solid green"></td></tr>
<tr><td style="font-family: comic sans ms; font-size: 25px;">confirm password</td> <td><input type="password" name="copassword"   required="" id="Pass" class="form-control" style="border:2px solid green"></td></tr>

<tr><td colspan="2"><input type="submit" name="update" class="btn btn-info form-control"  value="change password" style="font-size: 20px; height: 45px;"></td></tr>

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
form{
    width:500px;
    margin: auto;
    padding: 20px;
    background:#E6E6FA;
    font-size: 16px;
}

ul li a{
	font-size: 25px;


}

 </style>
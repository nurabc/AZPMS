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
    echo "<font style='color:red; font-size:20px; position:absolute;left:900px; top:450px;'> message sent sucessfully</font>";
  }
  else{
      echo "<font style='color:red; font-size:20px; position:absolute;left:600px; top:400px;'> failed try agin!</font>";
  }
}
else if ($reciver=="policeofficer") {
  $sql="INSERT INTO `policeofficer_message`(`id`,`sender`, `message`, `zone`, `status`, `date`) VALUES ('','adminstrator','".$msgtext."','".$zone."','0','".date("Y-m-d")."')";
  $query=mysqli_query($con,$sql);
  if ($query) {
    echo "<font style='color:red; font-size:20px; position:absolute;left:900px; top:450px;'> message sent sucessfully</font>";
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
  <tr><td colspan="2" style="text-align: center; font-family: Comic sans Ms; background-color: #708090; color: white; border-radius: 10px; font-size: 20px; ">Welcome to adminstrator page</td></tr>
    <tr style="text-align: center;"><td style="font-size: 20px; background-color: LightSteelBlue; color: white; font-family: comic sans Ms;">Do you know about Assosa Zone</td>
        <td style="font-size: 20px; background-color: LightSteelBlue; color: black; font-family: comic sans Ms;" >send message to inspector,policeofficer and comissioner</td>
        </tr>
        <tr><td class="text-justify" style="font-size: 14px; width: 300px;">  Assosa Zone locaed in  Benshangul/Gumuz, is one of the 11 ethnic divisions (kililoch) of Ethiopia. It was previously known as Region 6.The region's capital is Assosa<br>
            <img src="../send.png" width="100%"></td> 

            <td style="width: 300px;" class="text-justify" rowspan="3">
              <!-- send message form-->
              <form action="" method="post">
                <br><br>
              <textarea class="form-control" style="border:2px solid gray; margin-top: 30px; height: 150px;" name="msgtxt" placeholder="please enter the message" required></textarea>
              <p>Reciver<span style="color: red;">*</span></p>
              <select name="reciver" class="form-control">
                <option value="inspector">Inspector</option>
                 <option value="policeofficer">policeofficer</option>
   <option value="comissioner">Comissioner</option>
              </select>
              <p>Zone<span style="color: red;">*</span></p>
              <select name="zone" class="form-control">
                 <option value="assosa">Assosa</option>
                <!-- <option value="metekel">Metekel</option>
   <option value="kamash">Kamash</option> -->
              </select>

              <br>
     <input type="submit" name="sendmsg" value="send" class="btn btn-success form-control" style="background-color: #3e8e41; color: white;" onclick="return confirmation ();">
              </form>
               <!-- send message form-->
            </td> 
<td style="font-size: 25px; color: red; font-family: agency fb;"><table><tr>
 


 



</tr></table></td>
            </tr>
            <tr><td style="text-align: center; font-size: 20px; background-color:LightSteelBlue; color: black;" >What can i help you?</td>  
            <tr><td class="text-justify" >
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
<p class="glyphicon glyphicon-hand-right">&nbsp;Read the message that sent to you</p>
  <br>
</div>

  <p id="btn2" class="glyphicon glyphicon-play">
How to View report
</p> 
<div id="demo2" class="collapse out" ><p class="glyphicon glyphicon-hand-right">&nbsp;Press on view report</p>
<p class="glyphicon glyphicon-hand-right">&nbsp;Read the report that sent from each zone</p>
  <br>
</div>
<p id="btn3" class="glyphicon glyphicon-play">
How to Mng account
</p>
<div id="demo3" class="collapse out" ><p class="glyphicon glyphicon-hand-right">&nbsp;press on manage account</p>
<p class="glyphicon glyphicon-hand-right">you can create,delete,update,activate and deactivate</p>
  <br>
</div>
</td> 
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
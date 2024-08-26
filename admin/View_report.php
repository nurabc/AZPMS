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
    $photo=$_FILES["photo"]["name"];
$photofile= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
$photofile_name= addslashes($_FILES['photo']['name']);
move_uploaded_file($_FILES["photo"]["tmp_name"],"../upload/image/" . $_FILES["photo"]["name"]);
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
        $sql1="INSERT INTO `comissioner_information`(`fname`, `serial_no`, `lname`, `sex`, `age`, `zone`,`photo`) VALUES ('".$fname."','".$serial_no."','".$mname."','".$sex."','".$age."','".$zone."','".$photo."')";
     $query1=mysqli_query($con,$sql1);
     if ($query1) {
      echo "<script>alert('registered sucessfully')</script>";
     }
     else{
   echo "<script>alert('not registered')</script>";
     }
      }
      else if ($account_type=="inspector") {
       $sql1="INSERT INTO `inspector_information`(`fname`, `lname`, `serial_no`, `sex`, `age`, `zone`,`photo`) VALUES ('".$fname."','".$mname."','".$serial_no."','".$sex."','".$age."','".$zone."','".$photo."')";
     $query1=mysqli_query($con,$sql1);
     if ($query1) {
      echo "<script>alert('registered sucessfully')</script>";
     }
     else{
      echo "<script>alert('not registered')</script>";
     }
      }

      else if ($account_type=="adminstrator") {
        $sql1="INSERT INTO `admin_info`(`serial_no`, `fname`, `lname`, `sex`, `age`, `photo`) VALUES ('".$serial_no."','".$fname."','".$mname."','".$sex."','".$age."','".$photo."')";
       
     $query1=mysqli_query($con,$sql1);
     if ($query1) {
       echo "<script>alert('sucessfully registered')</script>";
     }
     else{
      echo "<script>alert('not registered')</script>";
     }
      }
     
    }
    else{
        echo "<script>alert('not registered')</script>";
    }
    }
    else{
    echo "<script>alert('coniformation password is not correct!')</script>";
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

    <td colspan="4" style="text-align: center; font-family: Comic sans Ms; background-color: #708090; color: white; border-radius: 10px; font-size: 20px; ">welcome to adminstrator page</td></tr>
    <tr style="text-align: center;">
        <td colspan="3" style="font-size: 20px; background-color: LightSteelBlue; color: black; font-family: comic sans Ms;" >view report prisoner information</td>
        <td style="font-size: 20px; background-color: LightSteelBlue; color: white; font-family: comic sans Ms;"></td></tr>
        <tr><td style="width: 300px;" class="text-justify" rowspan="1">
        <table class="table table-bordered"><tr><th class="text-center" style="background-color: lightgray; font-size: 20px; font-family: comic sans ms;" colspan="2">ASSOSA ZONE</th></tr>
                <tr><td style="font-family: comic sans ms;">Total female Prisoner Register Today</td><td><?php 
$sql="select count(serial_no) as total from prisoner_information where zone='assosa' and sex='female' and tsp='".date("Y-m-d")."'";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
if ($query) {
 echo "<font style='color:red; font-family:comic sans ms; font-size:30px;'>".$fetch['total']."</font>";
}
else{
  echo "<font>0</font>";
}

                 ?></td></tr>
                 <tr><td style="font-family: comic sans ms;">Total male Prisoner Register Today</td><td><?php 
$sql="select count(serial_no) as total from prisoner_information where zone='assosa'  and sex='male' and tsp='".date("Y-m-d")."'";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
if ($query) {
 echo "<font style='color:red; font-family:comic sans ms; font-size:30px;'>".$fetch['total']."</font>";
}
else{
  echo "<font>0</font>";
}

                 ?></td></tr>

<!-- 
<th class="text-center" style="background-color: lightgray; font-size: 20px; font-family: comic sans ms;" colspan="2">METEKEL ZONE</th></tr>
                <tr><td style="font-family: comic sans ms;">Total female Prisoner Register Today</td><td><?php 
$sql="select count(serial_no) as total from prisoner_information where zone='metekel' and sex='female' and tsp='".date("Y-m-d")."'";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
if ($query) {
 echo "<font style='color:red; font-family:comic sans ms; font-size:30px;'>".$fetch['total']."</font>";
}
else{
  echo "<font>0</font>";
}

                 ?></td></tr>
                 <tr><td style="font-family: comic sans ms;">Total male Prisoner Register Today </td><td><?php 
$sql="select count(serial_no) as total from prisoner_information where zone='metekel' and sex='female' and tsp='".date("Y-m-d")."'";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
if ($query) {
 echo "<font style='color:red; font-family:comic sans ms; font-size:30px;'>".$fetch['total']."</font>";
}
else{
  echo "<font>0</font>";
}

                 ?></td></tr>


                 <th class="text-center" style="background-color: lightgray; font-size: 20px; font-family: comic sans ms;" colspan="2">KAMATCH ZONE</th></tr>
                <tr><td style="font-family: comic sans ms;">Total female Prisoner Register Today</td><td><?php 
$sql="select count(serial_no) as total from prisoner_information where zone='kamatch' and sex='female' and tsp='".date("Y-m-d")."'";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
if ($query) {
 echo "<font style='color:red; font-family:comic sans ms; font-size:30px;'>".$fetch['total']."</font>";
}
else{
  echo "<font>0</font>";
}

                 ?></td></tr>
                 <tr><td style="font-family: comic sans ms;">Total male Prisoner register today</td><td><?php 
$sql="select count(serial_no) as total from prisoner_information where zone='kamatch' and sex='male' and tsp='".date("Y-m-d")."'";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
if ($query) {
 echo "<font style='color:red; font-family:comic sans ms; font-size:30px;'>".$fetch['total']."</font>";
}
else{
  echo "<font>0</font>";
}

                 ?></td></tr> -->

                 <!-- <th class="text-center" style="background-color: lightgray; font-size: 20px; font-family: comic sans ms;" colspan="2">all ZONE</th></tr>
                <tr><td style="font-family: comic sans ms;">Total female Prisoner Register Today</td><td><?php 
$sql="select count(serial_no) as total from prisoner_information where sex='female' and tsp='".date("Y-m-d")."'";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
if ($query) {
 echo "<font style='color:red; font-family:comic sans ms; font-size:30px;'>".$fetch['total']."</font>";
}
else{
  echo "<font>0</font>";
}

                 ?></td></tr>
                 <tr><td style="font-family: comic sans ms;">Total male Prisoner register today</td><td><?php 
$sql="select count(serial_no) as total from prisoner_information where sex='male' and tsp='".date("Y-m-d")."'";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
if ($query) {
 echo "<font style='color:red; font-family:comic sans ms; font-size:30px;'>".$fetch['total']."</font>";
}
else{
  echo "<font>0</font>";
}

                 ?></td></tr>
         -->

</tr></table>

</td>
     
            <td style="width: 300px;" class="text-justify" rowspan="2">
              <table class="table table-bordered"><tr><th class="text-center" style="background-color: lightgray; font-size: 20px; font-family: comic sans ms;" colspan="2">ASSOSA ZONE</th></tr>
                <tr><td style="font-family: comic sans ms;">Total Prisoner Register Today</td><td><?php 
$sql="select count(serial_no) as total from prisoner_information where zone='assosa' and tsp='".date("Y-m-d")."'";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
if ($query) {
 echo "<font style='color:green; font-family:comic sans ms; font-size:30px;'>".$fetch['total']."</font>";
}
else{
  echo "<font>0</font>";
}

                 ?></td></tr>
                 <tr><td style="font-family: comic sans ms;">Total Prisoner</td><td><?php 
$sql="select count(serial_no) as total from prisoner_information where zone='assosa' ";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
if ($query) {
 echo "<font style='color:green; font-family:comic sans ms; font-size:30px;'>".$fetch['total']."</font>";
}
else{
  echo "<font>0</font>";
}

                 ?></td></tr>

<!-- 
<th class="text-center" style="background-color: lightgray; font-size: 20px; font-family: comic sans ms;" colspan="2">METEKEL ZONE</th></tr>
                <tr><td style="font-family: comic sans ms;">Total Prisoner Register Today</td><td><?php 
$sql="select count(serial_no) as total from prisoner_information where zone='metekel' and tsp='".date("Y-m-d")."'";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
if ($query) {
 echo "<font style='color:green; font-family:comic sans ms; font-size:30px;'>".$fetch['total']."</font>";
}
else{
  echo "<font>0</font>";
}

                 ?></td></tr>
                 <tr><td style="font-family: comic sans ms;">Total Prisoner</td><td><?php 
$sql="select count(serial_no) as total from prisoner_information where zone='metekel' ";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
if ($query) {
 echo "<font style='color:green; font-family:comic sans ms; font-size:30px;'>".$fetch['total']."</font>";
}
else{
  echo "<font>0</font>";
}

                 ?></td></tr> -->


                 <!-- <th class="text-center" style="background-color: lightgray; font-size: 20px; font-family: comic sans ms;" colspan="2">KAMATCH ZONE</th></tr>
                <tr><td style="font-family: comic sans ms;">Total Prisoner Register Today</td><td><?php 
$sql="select count(serial_no) as total from prisoner_information where zone='kamatch' and tsp='".date("Y-m-d")."'";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
if ($query) {
 echo "<font style='color:green; font-family:comic sans ms; font-size:30px;'>".$fetch['total']."</font>";
}
else{
  echo "<font>0</font>";
}

                 ?></td></tr>
                 <tr><td style="font-family: comic sans ms;">Total Prisoner</td><td><?php 
$sql="select count(serial_no) as total from prisoner_information where zone='kamatch' ";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
if ($query) {
 echo "<font style='color:green; font-family:comic sans ms; font-size:30px;'>".$fetch['total']."</font>";
}
else{
  echo "<font>0</font>";
}

                 ?></td></tr>

                 <th class="text-center" style="background-color: lightgray; font-size: 20px; font-family: comic sans ms;" colspan="2">all ZONE</th></tr>
                <tr><td style="font-family: comic sans ms;">Total Prisoner Register Today</td><td><?php 
$sql="select count(serial_no) as total from prisoner_information where tsp='".date("Y-m-d")."'";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
if ($query) {
 echo "<font style='color:green; font-family:comic sans ms; font-size:30px;'>".$fetch['total']."</font>";
}
else{
  echo "<font>0</font>";
}

                 ?></td></tr>
                 <tr><td style="font-family: comic sans ms;">Total Prisoner</td><td><?php 
$sql="select count(serial_no) as total from prisoner_information";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
if ($query) {
 echo "<font style='color:green; font-family:comic sans ms; font-size:30px;'>".$fetch['total']."</font>";
}
else{
  echo "<font>0</font>";
}

                 ?></td></tr> -->
        

</tr></table>

</td>
     
            <td style="width: 300px;" class="text-justify" rowspan="2">
              <table class="table table-bordered"><tr><th class="text-center" style="background-color: lightgray; font-size: 20px; font-family: comic sans ms;" colspan="2">ASSOSA ZONE</th></tr>
                <tr><td style="font-family: comic sans ms;">Total female Prisoner Register </td><td><?php 
$sql="select count(serial_no) as total from prisoner_information where zone='assosa' and sex='female'";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
if ($query) {
 echo "<font style='color:blue; font-family:comic sans ms; font-size:30px;'>".$fetch['total']."</font>";
}
else{
  echo "<font>0</font>";
}

                 ?></td></tr>
                 <tr><td style="font-family: comic sans ms;">Total male Prisoner</td><td><?php 
$sql="select count(serial_no) as total from prisoner_information where zone='assosa' and sex='male' ";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
if ($query) {
 echo "<font style='color:blue; font-family:comic sans ms; font-size:30px;'>".$fetch['total']."</font>";
}
else{
  echo "<font>0</font>";
}

                 ?></td></tr>

<!-- 
<th class="text-center" style="background-color: lightgray; font-size: 20px; font-family: comic sans ms;" colspan="2">METEKEL ZONE</th></tr>
                <tr><td style="font-family: comic sans ms;">Total female Prisoner Register </td><td><?php 
$sql="select count(serial_no) as total from prisoner_information where zone='metekel' and sex='female'";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
if ($query) {
 echo "<font style='color:blue; font-family:comic sans ms; font-size:30px;'>".$fetch['total']."</font>";
}
else{
  echo "<font>0</font>";
}

                 ?></td></tr>
                 <tr><td style="font-family: comic sans ms;">Total male Prisoner</td><td><?php 
$sql="select count(serial_no) as total from prisoner_information where zone='metekel' and sex='male' ";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
if ($query) {
 echo "<font style='color:blue; font-family:comic sans ms; font-size:30px;'>".$fetch['total']."</font>";
}
else{
  echo "<font>0</font>";
}

                 ?></td></tr> -->


                 <!-- <th class="text-center" style="background-color: lightgray; font-size: 20px; font-family: comic sans ms;" colspan="2">KAMATCH ZONE</th></tr>
                <tr><td style="font-family: comic sans ms;">Total female Prisoner Register </td><td><?php 
$sql="select count(serial_no) as total from prisoner_information where zone='kamatch' and sex='female'";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
if ($query) {
 echo "<font style='color:blue; font-family:comic sans ms; font-size:30px;'>".$fetch['total']."</font>";
}
else{
  echo "<font>0</font>";
}

                 ?></td></tr>
                 <tr><td style="font-family: comic sans ms;">Total male Prisoner</td><td><?php 
$sql="select count(serial_no) as total from prisoner_information where zone='kamatch' and sex='male' ";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
if ($query) {
 echo "<font style='color:blue; font-family:comic sans ms; font-size:30px;'>".$fetch['total']."</font>";
}
else{
  echo "<font>0</font>";
}

                 ?></td></tr> -->

                 <!-- <th class="text-center" style="background-color: lightgray; font-size: 20px; font-family: comic sans ms;" colspan="2">all ZONE</th></tr>
                <tr><td style="font-family: comic sans ms;">Total female Prisoner Register </td><td><?php 
$sql="select count(serial_no) as total from prisoner_information where sex='female'";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
if ($query) {
 echo "<font style='color:blue; font-family:comic sans ms; font-size:30px;'>".$fetch['total']."</font>";
}
else{
  echo "<font>0</font>";
}

                 ?></td></tr>
                 <tr><td style="font-family: comic sans ms;">Total male Prisoner</td><td><?php 
$sql="select count(serial_no) as total from prisoner_information where sex='male'";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
if ($query) {
 echo "<font style='color:blue; font-family:comic sans ms; font-size:30px;'>".$fetch['total']."</font>";
}
else{
  echo "<font>0</font>";
}

                 ?></td></tr> -->
        

</tr></table>
            </tr>
            <tr><td rospan="3"></td> </tr>
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
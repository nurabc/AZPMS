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

  ////////
  $rand=str_shuffle("abcdefghijklmnopqrstuvwxyz");
$rand1=str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ");
$rand2=str_shuffle("0123456789");

$sub=substr($rand, 0,2);
$sub1=substr($rand1, 0,2);
$sub2=substr($rand2, 0,2);
$for=substr($rand2, 0,4);
$combine="$sub$sub1$sub2";
$all1=str_shuffle($combine);
$combine1=substr($all1, 0,8);
$all2=str_shuffle($combine1);
$combine2=substr($all2, 0,8);

//////////////////
if (isset($_POST['register'])) {
 $x=2/3;
  $serial_no=$_POST['serial_no'];
  $fname=$_POST['fname'];
  $mname=$_POST['mname'];
  $lname=$_POST['lname'];
  $sex=$_POST['sex'];//
  $age=$_POST['age'];
  //$zone=$_POST['zone'];
  $height=$_POST['height'];
  $face=$_POST['face'];
$education=$_POST['education'];
$region=$_POST['region'];
$crimetype=$_POST['crimetype'];

$parent_phone=$_POST['parent_phone'];
$stay=$_POST['stay'];
$year=$_POST['year'];
$stayy=$stay*$x;
 if ($_FILES['photo']['size'] != 0 ){
   $photo=$_FILES["photo"]["name"];
$photofile= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
$photofile_name= addslashes($_FILES['photo']['name']);
move_uploaded_file($_FILES["photo"]["tmp_name"],"../upload/image/" . $_FILES["photo"]["name"]);
  //$sql="INSERT INTO `prisoner_information`(`serial_no`, `fname`, `mname`, `lname`, `sex`, `age`, `zone`, `height`, `face_color`, `education_level`, `region`, `parent_phone`, `tsp`, `tcp`, `dorm_no`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14],[value-15])";
if ($age<18) {
  echo "<script>alert('please enter age greater than 18')</script>";
}
else{

  if ($stay<0 || $height<0) {
echo "<script>alert('please enter valid phone number or stay in prison')</script>";
  }
  else{
/*$sql="INSERT INTO `account`(`id`, `serial_no`, `username`, `password`, `zone`, `account_type`, `status`) VALUES ('','".$serial_no."','".$fname."','".$combine2."','".$zone."','prisoner','1')";
$query=mysqli_query($con,$sql);*/
  $sql="INSERT INTO `t`(`id`, `serial_no`, `username`, `password`,`status`) VALUES ('','".$serial_no."','".$fname."','".$combine2."','0')";
$query=mysqli_query($con,$sql);    
if ($query) {
if ($year=="month") {
    $i=1;
$sql="select *from prisoner_information where zone='".$zone."'";
$query=mysqli_query($con,$sql);
$row=mysqli_num_rows($query);
if ($row>0) {
  $sql="select max(dorm_no) as maximum from prisoner_information where zone='".$zone."'";
  $query=mysqli_query($con,$sql);
  $fetch=mysqli_fetch_array($query);
  $row=mysqli_num_rows($query);
  if ($row>0) {
    $maximum=$fetch['maximum'];
    $sql1="select count(dorm_no) as total from prisoner_information where dorm_no='".$maximum."' and zone='".$zone."'";
    $query1=mysqli_query($con,$sql1);
  $fetch=mysqli_fetch_array($query1);
  $row1=mysqli_num_rows($query1);
  if ($row1>0) {
      $total= $fetch['total'];
      if ($total=='6') {
        $plus=$maximum+1;
     
      $sql="INSERT INTO `prisoner_information`(`serial_no`, `fname`, `mname`, `lname`, `sex`, `age`, `zone`, `height`, `face_color`,`photo`, `education_level`, `region`,`crimetype`, `parent_phone`, `tsp`, `tcp`, `dorm_no`) VALUES ('".$serial_no."','".$fname."','".$mname."','".$lname."','".$sex."','".$age."','".$zone."','".$height."','".$face."','".$photo."','".$education."','".$region."','".$crimetype."','".$parent_phone."','".date("Y-m-d")."',adddate('".date("Y-m-d")."',interval ".$stayy." MONTH),'".$plus."')" ;
      $query=mysqli_query($con,$sql);
      if ($query) {
        echo "<script>alert('sucessfully registered')</script>";
      }
      else{
      echo "<script>alert('not registered')</script>";
      }
              }

      else{
       $sql="INSERT INTO `prisoner_information`(`serial_no`, `fname`, `mname`, `lname`, `sex`, `age`, `zone`, `height`, `face_color`,`photo`, `education_level`, `region`,`crimetype`, `parent_phone`, `tsp`, `tcp`, `dorm_no`) VALUES ('".$serial_no."','".$fname."','".$mname."','".$lname."','".$sex."','".$age."','".$zone."','".$height."','".$face."','".$photo."','".$education."','".$region."','".$crimetype."','".$parent_phone."','".date("Y-m-d")."',adddate('".date("Y-m-d")."',interval ".$stayy." MONTH),'".$maximum."')" ;
      $query=mysqli_query($con,$sql);
      if ($query) {
     echo "<script>alert('sucessfully registered')</script>";
      }
      else{
       echo "<script>alert('not registered')</script>";
      }
      }
  }
  }
}
else{

   $sql="INSERT INTO `prisoner_information`(`serial_no`, `fname`, `mname`, `lname`, `sex`, `age`, `zone`, `height`, `face_color`,`photo`, `education_level`, `region`,`crimetype`,`parent_phone`, `tsp`, `tcp`, `dorm_no`) VALUES ('".$serial_no."','".$fname."','".$mname."','".$lname."','".$sex."','".$age."','".$zone."','".$height."','".$face."','".$photo."','".$education."','".$region."','".$crimetype."','".$parent_phone."','".date("Y-m-d")."',adddate('".date("Y-m-d")."',interval ".$stayy." month),'".$i."')" ;
  $query=mysqli_query($con,$sql);
  if ($query) {
   echo "<script>alert('sucessfully registered')</script>";
  }
  else{
echo "<script>alert('not registered')</script>";

  }
  
}
}
else{
  $i=1;
$sql="select *from prisoner_information where zone='".$zone."'";
$query=mysqli_query($con,$sql);
$row=mysqli_num_rows($query);
if ($row>0) {
  $sql="select max(dorm_no) as maximum from prisoner_information where zone='".$zone."'";
  $query=mysqli_query($con,$sql);
  $fetch=mysqli_fetch_array($query);
  $row=mysqli_num_rows($query);
  if ($row>0) {
    $maximum=$fetch['maximum'];
    $sql1="select count(dorm_no) as total from prisoner_information where dorm_no='".$maximum."' and zone='".$zone."'";
    $query1=mysqli_query($con,$sql1);
  $fetch=mysqli_fetch_array($query1);
  $row1=mysqli_num_rows($query1);
  if ($row1>0) {
      $total= $fetch['total'];
      if ($total=='2') {
        $plus=$maximum+1;
     
      $sql="INSERT INTO `prisoner_information`(`serial_no`, `fname`, `mname`, `lname`, `sex`, `age`, `zone`, `height`, `face_color`,`photo`, `education_level`, `region`,`crimetype`, `parent_phone`, `tsp`, `tcp`, `dorm_no`) VALUES ('".$serial_no."','".$fname."','".$mname."','".$lname."','".$sex."','".$age."','".$zone."','".$height."','".$face."','".$photo."','".$education."','".$region."','".$crimetype."','".$parent_phone."','".date("Y-m-d")."',adddate('".date("Y-m-d")."',interval ".$stayy." year),'".$plus."')" ;
      $query=mysqli_query($con,$sql);
      if ($query) {
        echo "<script>alert('sucessfully registered')</script>";
      }
      else{
      echo "<script>alert('not registered')</script>";
      }
              }

      else{
       $sql="INSERT INTO `prisoner_information`(`serial_no`, `fname`, `mname`, `lname`, `sex`, `age`, `zone`, `height`, `face_color`,`photo`, `education_level`, `region`,`crimetype`, `parent_phone`, `tsp`, `tcp`, `dorm_no`) VALUES ('".$serial_no."','".$fname."','".$mname."','".$lname."','".$sex."','".$age."','".$zone."','".$height."','".$face."','".$photo."','".$education."','".$region."','".$crimetype."','".$parent_phone."','".date("Y-m-d")."',adddate('".date("Y-m-d")."',interval ".$stayy." year),'".$maximum."')" ;
      $query=mysqli_query($con,$sql);
      if ($query) {
     echo "<script>alert('sucessfully registered')</script>";
      }
      else{
       echo "<script>alert('not registered')</script>";
      }
      }
  }
  }
}
else{

   $sql="INSERT INTO `prisoner_information`(`serial_no`, `fname`, `mname`, `lname`, `sex`, `age`, `zone`, `height`, `face_color`,`photo`, `education_level`, `region`,`crimetype`, `parent_phone`, `tsp`, `tcp`, `dorm_no`) VALUES ('".$serial_no."','".$fname."','".$mname."','".$lname."','".$sex."','".$age."','".$zone."','".$height."','".$face."','".$photo."','".$education."','".$region."','".$crimetype."','".$parent_phone."','".date("Y-m-d")."',adddate('".date("Y-m-d")."',interval ".$stayy." year),'".$i."')" ;
  $query=mysqli_query($con,$sql);
  if ($query) {
   echo "<script>alert('sucessfully registered')</script>";
  }
  else{
echo "<script>alert('not registered')</script>";

  }
  
}



}
}
else{
  echo "<script>alert('data not inserted sucessfully')</script>";
}



  }
}



}
else{
    echo "<script>alert('image canot empty')</script>";
}


}


 ?>

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
        var x =confirm("do you want to register prisoner ");
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

	<div class="container" style="background-color: LightSteelBlue; border-radius: 3px; box-shadow: 0px 0px 10px blue;">
	<img src="../log1.png" style="width: 100%; height: 150px ; box-shadow: 0px 0px 10px 0px green; border-radius: 10px; margin-top: 3px;">
	<nav>

	<div class="navbar navbar-inverse" style="margin-top: 7px;">
		
		<ul class="nav navbar-nav" >
			<li><a href="index.php">Home</a></li>
			<li><a href="index.php">Register prisoner</a></li>
		        <li><a href="sendmessage.php">send message</a></li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> Inbox message(<?php 
$sql="select count(message)as total from inspector_message where status=0 and zone='".$zone."'";
$query=mysqli_query($con,$sql);
$number=mysqli_num_rows($query);
$fetch=mysqli_fetch_array($query);
if ($number>0) {
echo "<font style='color:red'>".$fetch['total']."</font>";
}
else{
  echo "<font style='color:red'>0</font>";
}

       ?>) <span class="caret"></span></a>
<ul class="dropbtn" style="background-color: gray;">
    <div class="dropdown-content">
		
			<li><a href="inbox.php"><span style="color: black; font-size: 20px;">new message(<?php 
$sql="select count(message)as total from inspector_message where status=0 and zone='".$zone."'";
$query=mysqli_query($con,$sql);
$number=mysqli_num_rows($query);
$fetch=mysqli_fetch_array($query);
if ($number>0) {
echo "<font style='color:red'>".$fetch['total']."</font>";
}
else{
  echo "<font style='color:red'>0</font>";
}

?>)</span></a></li>
                        <li><a href="inbox1.php"><span style="color: black; font-size: 20px;">old message</span></a></li>
                        
    </div>
</ul>
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">report generate<span class="caret"></span></a>
<ul class="dropbtn" style="background-color: gray;">
    <div class="dropdown-content">
        <li><a href="reportgerenate.php"><span style="color: black; font-size: 20px;">today report</span></a></li>
        <li><a href="reportgeneration.php"><span style="color: black; font-size: 20px;">general report</span></a></li>
                           
    </div>
</ul>
</li>                     

			 <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">prisoner<span class="caret"></span></a>
<ul class="dropbtn" style="background-color: gray;">
    <div class="dropdown-content">
   <li ><a href="search.php"><span style="color: black; font-size: 20px;">View prisoner info</span></a></li>
                            <li><a href="transfer.php"><span style="color: black; font-size: 20px;">Transfer prisoner</span></a></li>
                           
                            <li><a href="update.php"><span style="color: black; font-size: 20px;">update prisoner</span></a></li>
                            <li><a href="generate.php"><span style="color: black; font-size: 20px;">Approve clearance</span></a></li>
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
                       <!-- Modal pattern="[+]{1}[2]{1}[5]{1}[1]{1}[0-9]{9}" -->
                                

                    </li>


                </ul>
	</div>

</nav>
<div class="jumbotron" style="margin-top: 5px; box-shadow: 0px 0px 30px 0px white;">
<table class="table table-bordered ">
<form action="searched.php" method="post"><tr><td></td> <td><input type="text" name="serial" class="form-control" style="width: 400px; font-size: 20px; font-family: comic sans ms; border: 3px solid black; border-radius: 5px;" placeholder="search prisoner using id Number"></td> <td><input type="submit" name="search" value="search" class="btn btn-info form-control"></td> </tr></form>
  <tr>

    <td colspan="3" style="text-align: center; font-family: Comic sans Ms; background-color: #708090; color: white; border-radius: 10px; font-size: 20px; ">welcome to inspector page</td></tr>
    <tr style="text-align: center;"><td style="font-size: 20px; background-color: LightSteelBlue; color: white; font-family: comic sans Ms;">Do you know about Assosa Zone</td>
        <td style="font-size: 20px; background-color: LightSteelBlue; color: black; font-family: comic sans Ms;" >Register New Prisoner</td>
        <td style="font-size: 20px; background-color: LightSteelBlue; color: white; font-family: comic sans Ms;"></td></tr>
        <tr><td class="text-justify" style="font-size: 14px; width: 300px;">  Assosa Zonelocated in  Benshangul/Gumuz, is one of the nine ethnic divisions (kililoch) of Ethiopia. It was previously known as Region 6.The region's capital is Assosa<br>
            <img src="../locaton.jfif" width="100%"></td> 
            <td style="width: 300px;" class="text-justify" rowspan="3">

<!--register new user-->
              <form action="" method="post" enctype="multipart/form-data">
              <table class="table table-bordered">
                <tr><td>First Name<span style="color: red;">*</span></td><td><input type="text" name="fname" pattern="^[A-Za-z'.\s]{1,40}$" class="form-control" style="border:1px solid gray; " required=""></td></tr>
                 <tr><td>Middle Name<span style="color: red;">*</span></td><td><input type="text" name="mname" pattern="^[A-Za-z'.\s]{1,40}$" class="form-control" style="border:1px solid gray;" required=""></td></tr>
                 <tr><td>Last Name<span style="color: red;">*</span></td><td><input type="text" name="lname" pattern="^[A-Za-z'.\s]{1,40}$" class="form-control" style="border:1px solid gray;" required=""></td></tr>

     <tr><td>ID_no<span style="color: red;">*</span></td><td><input type="text" name="serial_no" class="form-control" style="border:1px solid gray;" required=""></td></tr>

<tr><td>Age<span style="color: red;">*</span></td><td><input  name="age" min="18" step="1"  class="form-control" style="border:1px solid gray;" pattern=\d{2} required=""></td></tr>
<tr><td>Sex<span style="color: red;">*</span></td><td><select name="sex" class="form-control" style="border:1px solid gray;" required="">
  <option value="male">Male</option>
  <option value="female">FeMale</option>
</select></td></tr>
<tr><td>Height<span style="color: red;">*</span></td><td><input type="double" name="height" class="form-control" style="border:1px solid gray;" required=""></td></tr>

<tr><td>Face color<span style="color: red;">*</span></td><td>
  <select name="face" class="form-control" style="border:1px solid gray;" required="">
    <option value="black">Black</option>
    <option value="white">White</option>
    <option value="white-black">White-Black</option>
  </select>

</td></tr>
<tr><td>Education level<span style="color: red;">*</span></td><td><input type="text" name="education" class="form-control" style="border:1px solid gray;" required=""></td></tr>
<tr><td>Region<span style="color: red;">*</span></td><td><select name="region" class="form-control" style="border:1px solid gray;" required="">
  <option value="tigray">Tigray</option>
 <option value="amhara">Amhara</option>
  <option value="oromia">Oromia</option>
   <option value="snnr">SNNR</option>
    <option value="harar">Harar</option>
     <option value="bgrs">BGRS</option>
      <option value="somali">somali</option>
       <option value="afar">afar</option>
        <option value="gambela">gambela</option>
</select>
    </td></tr>
<tr><td>crime type<span style="color: red;">*</span></td>
    <td><input name="crimetype" class="form-control" style="border:1px solid gray;" required></td></tr>
</td></tr>
<tr><td>parent phone<span style="color: red;">*</span></td>
    <td><input name="parent_phone" class="form-control" style="border:1px solid gray;" value="+251" pattern="[+]{1}[2]{1}[5]{1}[1]{1}[0-9]{9}" required=""></td></tr>

<tr><td rowspan="2">Time to stay in prison<span style="color: red;">*</span></td><td><input type="number" name="stay" class="form-control" style="border:1px solid gray;" required=""></td></tr>
<tr><td>
  <select name="year" class="form-control" style="border:1px solid gray;" required="">
    <option value="month">Month</option>
<option value="year">Year</option>
  </select>

</td></tr>
<tr><td colspan="2"><input type="file" name="photo" class="form-control" required=""></td></tr>
              </table>
     <input type="submit" name="register" value="Register Prisoner" class="btn btn-success form-control" onclick="return confirmation ();">
              </form>
              <!--register new user-->
            </td> 
<td style="font-size: 25px; color: red; font-family: agency fb;"> you are login as inspector!
<table><tr>
  <?php 
$serial_no=$_SESSION['serial_no'];
$sql="select *from inspector_information where serial_no='".$serial_no."'";
  $query=mysqli_query($con,$sql);
  $report=mysqli_num_rows($query);

  if ($report>0) {
   
    while ($row=mysqli_fetch_array($query)) {
  echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../upload/image/'.$row['photo'].'" style="width:150px; border-radius:20px; border:2px solid green;" class="img-rounded" title="profile picture"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font style="color:green;">Name:&nbsp;&nbsp;&nbsp;&nbsp;'.$row['fname'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row['lname'].'</font> ';
    }
  
}


 ?>



 



</tr></table>



</td>
            </tr>
            <tr><td style="text-align: center; font-size: 20px; background-color: LightSteelBlue; color: black;" >what can i help you?</td>  <td style="text-align: center;font-size: 20px; background-color: LightSteelBlue; color: black;">calender</td></tr>
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

  <p id="btn2" class="glyphicon glyphicon-play" style="">
How  register prisoner
</p>
<div id="demo2" class="collapse out" ><p class="glyphicon glyphicon-hand-right">&nbsp;fill all the given form</p>
<p class="glyphicon glyphicon-hand-right">&nbsp;press register form</p>
  <br>
</div>
<p id="btn3" class="glyphicon glyphicon-play" style="">
How generate clearance
</p>
<div id="demo3" class="collapse out" ><p class="glyphicon glyphicon-hand-right">&nbsp;fill all the given form</p>
<p class="glyphicon glyphicon-hand-right">&nbsp;press generate button</p>
  <br>
</div>
<!--help-->

  </div>

</div>
</td> 

<td><script src="../decoration/calander.js" type="text/javascript" language="javascript"></script></td></tr>

</table>
<div style="background-color: #E6E6FA;border-radius: 5px; box-shadow: 0px 0px 10px 0px green;"><center><font style="font-size: 20px;">Copyright © is Reserved ASU CS G-4 2024 </font></center></div>

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
    width:390px;
    margin: auto;
    padding: 20px;
    background:#E6E6FA;
    font-size: 16px;
}

ul li a{
	font-size: 25px;


}

 </style>
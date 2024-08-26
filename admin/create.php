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
    // $password=md5($_POST['password']);
    $password=$_POST['password'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $sex=$_POST['sex'];
    $age=$_POST['age'];
    $zone=$_POST['zone'];
    // $password1=md5($_POST['password1']);
    $password1=$_POST['password1'];
    $account_type=$_POST['user_type'];
    $photo=$_FILES["photo"]["name"];
    if ($_FILES['photo']['size'] != 0 ){
$photofile= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
$photofile_name= addslashes($_FILES['photo']['name']);
move_uploaded_file($_FILES["photo"]["tmp_name"],"../upload/image/" . $_FILES["photo"]["name"]);

if (empty($fname) || empty($lname) || empty($serial_no)) {
  echo "<font style='position:absolute; top:650px; left:900px;color:red; font-size:20px;'>please fill the form</font>";
}
else{

  if ($age<21) {
   echo "<script>alert('please Enter Valid Age Age must be greater 21')</script>";
  }
  else{  if ($password==$password1) {
    $sql="INSERT INTO `account`(`id`, `serial_no`, `username`, `password`, `zone`, `account_type`, `status`) VALUES ('','".$serial_no."','". $fname."','".$password."','".$zone."','".$account_type."','1')";
    $query=mysqli_query($con,$sql);
    if ($query) {
      if ($account_type=="comissioner") {
        $sql1="INSERT INTO `comissioner_information`(`fname`, `serial_no`, `lname`, `sex`, `age`, `zone`,`photo`) VALUES ('".$fname."','".$serial_no."','".$lname."','".$sex."','".$age."','".$zone."','".$photo."')";
     $query1=mysqli_query($con,$sql1);
     if ($query1) {
      echo "<script>alert('registered sucessfully')</script>";
     }
     else{
   echo "<script>alert('not registered')</script>";

     }
      }
      else if ($account_type=="inspector") {
       $sql1="INSERT INTO `inspector_information`(`serial_no`, `fname`, `lname`, `sex`, `age`, `zone`,`photo`) VALUES ('".$serial_no."','".$fname."','".$lname."','".$sex."','".$age."','".$zone."','".$photo."')";
     $query1=mysqli_query($con,$sql1);
     if ($query1) {
      echo "<script>alert('registered sucessfully')</script>";
     }
     else{
      echo "<script>alert('not registered')</script>";
     }
      }
else if ($account_type=="policeofficer") {
       $sql1="INSERT INTO `policeofficer_information`(`fname`, `lname`, `serial_no`, `sex`, `age`, `zone`,`photo`) VALUES ('".$fname."','".$lname."','".$serial_no."','".$sex."','".$age."','".$zone."','".$photo."')";
     $query1=mysqli_query($con,$sql1);
     if ($query1) {
      echo "<script>alert('registered sucessfully')</script>";
     }
     else{
      echo "<script>alert('not registered')</script>";
     }
      }
   
      else if ($account_type=="adminstrator") {
        $sql1="INSERT INTO `admin_info`(`serial_no`, `fname`, `lname`, `sex`, `age`, `photo`) VALUES ('".$serial_no."','".$fname."','".$lname."','".$sex."','".$age."','".$photo."')";
       
     $query1=mysqli_query($con,$sql1);
     if ($query1) {
       echo "<script>alert('sucessfully registered')</script>";
     }
     else{
      echo "<script>alert('not registered')</script>";
     }
      }
 //    else if ($account_type=="visitor") {
  //     $sql1="INSERT INTO `visitor_information`(`fname`, `lname`, `serial_no`, `sex`, `age`, `zone`,`photo`) VALUES ('".$fname."','".$mname."','".$serial_no."','".$sex."','".$age."','".$zone."','".$photo."')";
 //    $query1=mysqli_query($con,$sql1);
 //    if ($query1) {
 //     echo "<script>alert('registered sucessfully')</script>";
  //   }
  //   else{
 //     echo "<script>alert('not registered')</script>";
  //   }
 //     }   
    }
    else{
        echo "<script>alert('not registered')</script>";
    }
    }
    else{
    echo "<script>alert('coniformation password is not correct!')</script>";
    }
    }}

  }
  else{

    echo "<script>alert('image can not empty')</script>";
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
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
/* Style all input fields */
input {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
}

/* Style the submit button */
input[type=submit] {
  background-color: #4CAF50;
  color: white;
}

/* Style the container for inputs */
.container {
  background-color: #f1f1f1;
  padding: 20px;
}

/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
</style>
</head>
<body>
<div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
				
<script>
var myInput = document.getElementById("psw");
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

</body>
</html>

<script>
    function confirmation()
    {
        var x =confirm("do you want to create account ");
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
  <tr>

    <td colspan="3" style="text-align: center; font-family: Comic sans Ms; background-color: #708090; color: white; border-radius: 10px; font-size: 20px; ">welcome to adminstrator page</td></tr>
    <tr style="text-align: center;"><td style="font-size: 20px; background-color: LightSteelBlue; color: white; font-family: comic sans Ms;">do you know about BG</td>
        <td style="font-size: 20px; background-color: LightSteelBlue; color: black; font-family: comic sans Ms;" >create new user account</td>
        <td style="font-size: 20px; background-color: LightSteelBlue; color: white; font-family: comic sans Ms;"></td></tr>
        <tr><td class="text-justify" style="font-size: 14px; width: 300px;">  Assosa Zone located in  Benshangul/Gumuz, is one of the 11 ethnic divisions (kililoch) of Ethiopia. It was previously known as Region 6.The region's capital is Assosa and Prison also here <br>
            <img src="../acc.jfif" width="100%"></td> 
            <td style="width: 300px;" class="text-justify" rowspan="3">
              <form action="" method="post" enctype="multipart/form-data">
              <p>Fname<span style="color: red;">*</span></p>
              <input type="text" name="fname" class="form-control" style="border:2px solid gray;" required="">
              <p>Lname<span style="color: red;">*</span></p>
              <input type="text" name="lname" class="form-control" style="border:2px solid gray;" required="">
              <p>ID_no<span style="color: red;">*</span></p>
              <input type="text" name="serial_no" class="form-control" style="border:2px solid gray;" required="">
              <p>Sex<span style="color: red;">*</span></p>
             <select name="sex" class="form-control" style="border:2px solid gray;" required="">
               <option value="male" required="">Male</option>
<option value="female">Female</option>
             </select>
              <p>Age<span style="color: red;">*</span></p>
               <input name="age" class="form-control" style="border:2px solid gray;" required="">
              <p>User type<span style="color: red;">*</span></p>
              <select name="user_type" class="form-control" style="border:2px solid gray;" required="">
               <option value="inspector">Inspector</option>
<option value="comissioner">Comissioner</option>
<option value="adminstrator">Adminstrator</option>
<option value="policeofficer">policeofficer</option>

             </select>
<p>Zone<span style="color: red;" >*</span></p>
             <select name="zone" class="form-control" style="border:2px solid gray;" required="">
               <option value="assosa">Assosa</option>
<!-- <option value="kamatch">Kamatch</option>
<option value="metekel">Metekel</option> -->
             </select>
 <p>Password<span style="color: red;">*</span></p>
   <input type="password" name="password" class="form-control" style="border:2px solid gray;" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
  <p>Confirm password<span style="color: red;">*</span></p>
     <input type="password" name="password1" class="form-control" style="border:2px solid gray;" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
     <p>photo<span style="color: red;">*</span></p>
     <input type="file" name="photo" class="form-control"><br>
     <input type="submit" name="create" value="Create Account" class="btn btn-success form-control" onclick="return confirmation ();">
              </form>
            </td> 
<td style="font-size: 25px; color: red; font-family: agency fb; text-align: center;"> you are login as adminstrator!
<table><tr>
  <?php 
$serial_no=$_SESSION['serial_no'];
$sql="select *from admin_info where serial_no='".$serial_no."'";
  $query=mysqli_query($con,$sql);
  $report=mysqli_num_rows($query);

  if ($report>0) {
   
    while ($row=mysqli_fetch_array($query)) {
  echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../upload/image/'.$row['photo'].'" style="width:150px; border-radius:20px; border:2px solid green;" class="img-rounded" title="profile picture"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font style="color:green;">Name:&nbsp;&nbsp;&nbsp;&nbsp;'.$row['fname'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row['lname'].'</font> ';
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
how to send message
</p>
<div id="demo" class="collapse out" ><p class="glyphicon glyphicon-hand-right">&nbsp;Enter the message</p>
<p class="glyphicon glyphicon-hand-right">&nbsp;Press on send button</p>
  <br>
</div>

 <p id="btn1" class="glyphicon glyphicon-play" style="">
how to read message
</p>
<div id="demo1" class="collapse out" ><p class="glyphicon glyphicon-hand-right">&nbsp;press inbox message</p>
<p class="glyphicon glyphicon-hand-right">&nbsp;read the message that sent to you</p>
  <br>
</div>

  <p id="btn2" class="glyphicon glyphicon-play">
how to View report
</p> 
<div id="demo2" class="collapse out" ><p class="glyphicon glyphicon-hand-right">&nbsp;press on view report</p>
<p class="glyphicon glyphicon-hand-right">&nbsp;read the report that sent from each zone</p>
  <br>
</div>
<p id="btn3" class="glyphicon glyphicon-play">
how to Mng account
</p>
<div id="demo3" class="collapse out" ><p class="glyphicon glyphicon-hand-right">&nbsp;press on manage account</p>
<p class="glyphicon glyphicon-hand-right">youcancreate,delete,update,activate and deactivate</p>
  <br>
  
</div>
</td> <td><script src="../decoration/calander.js" type="text/javascript" language="javascript"></script></td></tr>

</table>
<div style="background-color: #E6E6FA;border-radius: 2px; box-shadow: 0px 0px 10px 0px green;"><center><font style="font-size: 20px;">Copyright © is Reserved ASU CS G-4 2024</font></center></div>

</div>
</div>
</body>
</html>

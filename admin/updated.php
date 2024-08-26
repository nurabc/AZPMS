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


if (!isset($_SESSION['admin_logged'])) {
    header("location:../login.php");
  }
  include '../connection.php';
 if (isset($_POST['update'])) {

$sql="select *from account where serial_no='".$_GET['id']."'";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
 /* if ($fetch['account_type']=="prisoner") {
	$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$sex=$_POST['sex'];
$age=$_POST['age'];
$height=$_POST['height'];
$face=$_POST['face'];
$education=$_POST['education'];
$region=$_POST['region'];
$parent_phone=$_POST['parent_phone'];
$photo=$_FILES["photo"]["name"];
$photofile= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
$photofile_name= addslashes($_FILES['photo']['name']);
move_uploaded_file($_FILES["photo"]["tmp_name"],"../upload/image/" . $_FILES["photo"]["name"]);
	$sql="UPDATE `prisoner_information` SET `fname`='".$fname."',`mname`='".$mname."',`lname`='".$lname."',`sex`='".$sex."',`age`='".$age."',`height`='".$height."',`face_color`='".$face."',`education_level`='".$education."',`region`='".$region."',`parent_phone`='".$parent_phone."',`photo`='".$photo."' WHERE serial_no='".$_GET['id']."'";
	$query=mysqli_query($con,$sql);
	if ($query) {
		echo "<font style='color:red;position:absolute;top:250px;left:450px; font-size:20px;'>updated sucessfully</font>";
	}
	
}*/
if ($fetch['account_type']=="comissioner") {

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$sex=$_POST['sex'];
$age=$_POST['age'];
$photo=$_FILES["photo"]["name"];
$photofile= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
$photofile_name= addslashes($_FILES['photo']['name']);
move_uploaded_file($_FILES["photo"]["tmp_name"],"../upload/image/" . $_FILES["photo"]["name"]);
	$sql="UPDATE `comissioner_information` SET `fname`='".$fname."',`lname`='".$lname."',`sex`='".$sex."',`age`='".$age."',`photo`='".$photo."' WHERE serial_no='".$_GET['id']."'";
	$query=mysqli_query($con,$sql);
	if ($query) {
		echo "<font style='color:red;position:absolute;top:250px;left:450px; font-size:20px;'>updated sucessfully</font>";
	}
	
}
if ($fetch['account_type']=="policeofficer") {
$fname=$_POST['fname'];

$lname=$_POST['lname'];
$sex=$_POST['sex'];
$age=$_POST['age'];
$photo=$_FILES["photo"]["name"];
$photofile= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
$photofile_name= addslashes($_FILES['photo']['name']);
move_uploaded_file($_FILES["photo"]["tmp_name"],"../upload/image/" . $_FILES["photo"]["name"]);
	$sql="UPDATE `policeofficer_information` SET `fname`='".$fname."',`lname`='".$lname."',`sex`='".$sex."',`age`='".$age."',`photo`='".$photo."' WHERE serial_no='".$_GET['id']."'";
	$query=mysqli_query($con,$sql);
	if ($query) {
		echo "<font style='color:red;position:absolute;top:250px;left:450px; font-size:20px;'>updated sucessfully</font>";
	}
	
}
if ($fetch['account_type']=="inspector") {
	$fname=$_POST['fname'];

$lname=$_POST['lname'];
$sex=$_POST['sex'];
$age=$_POST['age'];
$photo=$_FILES["photo"]["name"];
$photofile= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
$photofile_name= addslashes($_FILES['photo']['name']);
move_uploaded_file($_FILES["photo"]["tmp_name"],"../upload/image/" . $_FILES["photo"]["name"]);
	$sql="UPDATE `inspector_information` SET `fname`='".$fname."',`lname`='".$lname."',`sex`='".$sex."',`age`='".$age."',`photo`='".$photo."' WHERE serial_no='".$_GET['id']."'";
	$query=mysqli_query($con,$sql);
	if ($query) {
		echo "<font style='color:red;position:absolute;top:250px;left:450px; font-size:20px;'>updated sucessfully</font>";
	}
	
}
if ($fetch['account_type']=="adminstrator") {
	$fname=$_POST['fname'];

$lname=$_POST['lname'];
$sex=$_POST['sex'];
$age=$_POST['age'];
$photo=$_FILES["photo"]["name"];
$photofile= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
$photofile_name= addslashes($_FILES['photo']['name']);
move_uploaded_file($_FILES["photo"]["tmp_name"],"../upload/image/" . $_FILES["photo"]["name"]);
	$sql="UPDATE `admin_info` SET `fname`='".$fname."',`lname`='".$lname."',`sex`='".$sex."',`age`='".$age."',`photo`='".$photo."' WHERE serial_no='".$_GET['id']."'";
	$query=mysqli_query($con,$sql);
	if ($query) {
		echo "<font style='color:red;position:absolute;top:250px;left:450px; font-size:20px;'>updated sucessfully</font>";
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
        <td style="font-size: 20px; background-color: LightSteelBlue; color: black; font-family: comic sans Ms;" >update account page</td>
        <td style="font-size: 20px; background-color: LightSteelBlue; color: white; font-family: comic sans Ms;"></td></tr>
        <tr><td class="text-justify" style="font-size: 14px; width: 300px;"> Assosa Zone located in  Benshangul/Gumuz, is one of the 11 ethnic divisions (kililoch) of Ethiopia. It was previously known as Region 6.The region's capital is Assosa and Prison also here <br>
            <img src="../assosa 1.jpg" width="100%"></td> 
            <td style="width: 450px;" class="text-justify" rowspan="3">
            <table class="table table-bordered" style="font-size: 15px; color: black;">
              
<?php 

$sql="select * from account where serial_no='".$_GET['id']."'";
$query=mysqli_query($con,$sql);
$report=mysqli_num_rows($query);
if ($report>0) {
while ($row=mysqli_fetch_array($query)) {
$account=$row['account_type'];
/*if ($account=='prisoner') {
$sql="select *from prisoner_information where serial_no='".$_GET['id']."'";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);

echo "
  <form action='' method='post' enctype='multipart/form-data'>
           
   <tr><td>Fname<span style='color: red;'>*</span></td><td><input type='text' name='fname' class='form-control' style='border:1px solid gray; color:black; font-size:16px;' value='".$fetch['fname']."'></td></tr>

                 <tr><td>Mname<span style='color: red;'>*</span></td><td><input type='text' name='mname' class='form-control' style='border:1px solid gray;' value='".$fetch['mname']."'></td></tr>

                 <tr><td>Lname<span style='color: red;'>*</span></td><td><input type='text' name='lname' class='form-control' style='border:1px solid gray;' value='".$fetch['lname']."'></td></tr>

<tr><td>Age<span style='color: red;'>*</span></td><td><input type='number' name='age' class='form-control' style='border:1px solid gray;' value='".$fetch['age']."'></td></tr>

<tr><td>Sex<span style='color: red;'>*</span></td><td><select name='sex' class='form-control' style='border:1px solid gray;'  >
  <option value='male'>Male</option>
  <option value='female'>FeMale</option>
</select></td></tr>
<tr><td>Height<span style='color: red;'>*</span></td><td><input type='number' name='height' class='form-control' style='border:1px solid gray;' value='".$fetch['height']."'></td></tr>

<tr><td>Face color<span style='color: red;'>*</span></td><td>
  <select name='face' class='form-control' style='border:1px solid gray;'>
    <option value='black'>Black</option>
    <option value='white'>White</option>
    <option value='white-black'>White-Black</option>
  </select>

</td></tr>
<tr><td>Education level<span style='color: red;'>*</span></td><td><input type='text' name='education' class='form-control' style='border:1px solid gray;' value='".$fetch['education_level']."'></td></tr>

<tr><td>Region<span style='color: red;'>*</span></td><td><select name='region' class='form-control' style='border:1px solid gray;'>
  <option value='tigray'>Tigray</option>
 <option value='amhara'>Amhara</option>
  <option value='oromia'>Oromia</option>
   <option value='snnr'>SNNR</option>
    <option value='harar'>Harar</option>
     <option value='bgrs'>BGRS</option>
      <option value='somali'>somali</option>
       <option value='afar'>afar</option>
        <option value='gambela'>gambela</option>
</select></td></tr>
<tr><td>parent phone<span style='color: red;'>*</span></td><td><input type='number' name='parent_phone' class='form-control' style='border:1px solid gray;' value='".$fetch['parent_phone']."'></td></tr>

<tr><td colspan='2'><input type='file' name='photo' class='form-control' required></td></tr>
            
    <tr><td colspan='2'> <input type='submit' name='update' value='update' class='btn btn-success form-control'></td></tr>
              </form>";

}*/
if ($account=="inspector") {
	$sql="select *from inspector_information where serial_no='".$_GET['id']."'";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
echo "
  <form action='' method='post' enctype='multipart/form-data'>
           
   <tr><td>Fname<span style='color: red;'>*</span></td><td><input type='text' name='fname' class='form-control' style='border:1px solid gray; color:black; font-size:16px;' value='".$fetch['fname']."'></td></tr>

                 <tr><td>Lname<span style='color: red;'>*</span></td><td><input type='text' name='lname' class='form-control' style='border:1px solid gray;' value='".$fetch['lname']."'></td></tr>

<tr><td>Age<span style='color: red;'>*</span></td><td><input type='number' name='age' class='form-control' style='border:1px solid gray;' value='".$fetch['age']."'></td></tr>

<tr><td>Sex<span style='color: red;'>*</span></td><td><select name='sex' class='form-control' style='border:1px solid gray;'  >
  <option value='male'>Male</option>
  <option value='female'>FeMale</option>
</select></td></tr>
<tr><td colspan='2'><input type='file' name='photo' class='form-control' required></td></tr>
    <tr><td colspan='2'> <input type='submit' name='update' value='update' class='btn btn-success form-control'></td></tr>
              </form>";
}
else if ($account=="policeofficer") {
	$sql="select *from policeofficer_information where serial_no='".$_GET['id']."'";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
echo "
  <form action='' method='post' enctype='multipart/form-data'>
           
   <tr><td>Fname<span style='color: red;'>*</span></td><td><input type='text' name='fname' class='form-control' style='border:1px solid gray; color:black; font-size:16px;' value='".$fetch['fname']."'></td></tr>

                 <tr><td>Lname<span style='color: red;'>*</span></td><td><input type='text' name='lname' class='form-control' style='border:1px solid gray;' value='".$fetch['lname']."'></td></tr>

<tr><td>Age<span style='color: red;'>*</span></td><td><input type='number' name='age' class='form-control' style='border:1px solid gray;' value='".$fetch['age']."'></td></tr>

<tr><td>Sex<span style='color: red;'>*</span></td><td><select name='sex' class='form-control' style='border:1px solid gray;'  >
  <option value='male'>Male</option>
  <option value='female'>FeMale</option>
</select></td></tr>
<tr><td colspan='2'><input type='file' name='photo' class='form-control' required></td></tr>
    <tr><td colspan='2'> <input type='submit' name='update' value='update' class='btn btn-success form-control'></td></tr>
              </form>";
}
else if ($account=="adminstrator") {
	$sql="select *from admin_info where serial_no='".$_GET['id']."'";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
echo "
  <form action='' method='post' enctype='multipart/form-data'>
           
   <tr><td>Fname<span style='color: red;'>*</span></td><td><input type='text' name='fname' class='form-control' style='border:1px solid gray; color:black; font-size:16px;' value='".$fetch['fname']."'></td></tr>

                 <tr><td>Lname<span style='color: red;'>*</span></td><td><input type='text' name='lname' class='form-control' style='border:1px solid gray;' value='".$fetch['lname']."'></td></tr>

<tr><td>Age<span style='color: red;'>*</span></td><td><input type='number' name='age' class='form-control' style='border:1px solid gray;' value='".$fetch['age']."'></td></tr>

<tr><td>Sex<span style='color: red;'>*</span></td><td><select name='sex' class='form-control' style='border:1px solid gray;'  >
  <option value='male'>Male</option>
  <option value='female'>FeMale</option>
</select></td></tr>
<tr><td colspan='2'><input type='file' name='photo' class='form-control' required></td></tr>
    <tr><td colspan='2'> <input type='submit' name='update' value='update' class='btn btn-success form-control'></td></tr>
              </form>";
}

else if ($account=="comissioner") {
$sql="select *from comissioner_information where serial_no='".$_GET['id']."'";
$query=mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($query);
echo "
  <form action='' method='post' enctype='multipart/form-data'>
           
   <tr><td>Fname<span style='color: red;'>*</span></td><td><input type='text' name='fname' class='form-control' style='border:1px solid gray; color:black; font-size:16px;' value='".$fetch['fname']."'></td></tr>

                 <tr><td>Lname<span style='color: red;'>*</span></td><td><input type='text' name='lname' class='form-control' style='border:1px solid gray;' value='".$fetch['lname']."'></td></tr>

<tr><td>Age<span style='color: red;'>*</span></td><td><input type='number' name='age' class='form-control' style='border:1px solid gray;' value='".$fetch['age']."'></td></tr>

<tr><td>Sex<span style='color: red;'>*</span></td><td><select name='sex' class='form-control' style='border:1px solid gray;'  >
  <option value='male'>Male</option>
  <option value='female'>FeMale</option>
</select></td></tr>
<tr><td colspan='2'><input type='file' name='photo' class='form-control' required></td></tr>
    <tr><td colspan='2'> <input type='submit' name='update' value='update' class='btn btn-success form-control'></td></tr>
              </form>";
}


}
}
else{
	
}


 ?>

  </table>
            </td> 
<td style="font-size: 25px; color: red;"> you are login<br> &nbsp; &nbsp;as <br><br> adminstrator!</td>
            </tr>
            <tr><td style="text-align: center; font-size: 20px; background-color: LightSteelBlue; color: black;" >what can i help you?</td>  <td style="text-align: center;font-size: 20px; background-color: LightSteelBlue; color: black;">Calender</td></tr>
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
<div style="background-color: #E6E6FA;border-radius: 5px; box-shadow: 0px 0px 10px 0px green;"><center><font style="font-size: 20px;">Copyright © is Reserved ASU CS G-4 2024</font></center></div>

</div>
</div>
</body>
</html>







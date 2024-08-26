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
include '../connection.php';
if (!isset($_SESSION['comissioner_logged'])) {
    header("location:../login.php");
  }
 ?>
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
		<li><a href="sendmessage.php">send message</a></li> -->
			<li><a href="postnew.php">Post news</a></li>
			<li><a href="readfeedback.php">see feedback</a></li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="index.php">More<span class="caret"></span></a>
<ul class="dropbtn" style="background-color: gray;">
      <div class="dropdown-content">                       
                             <li><a href="readforgive.php"><span style="color: black; font-size: 20px;">read Request</span></a></li>
      </div>

</ul>
</li>

</ul>
<ul class="nav navbar-nav navbar-right">
 <li>
                           <!-- login modal form
                           <!-- <a href="logout.php"> <button type="button" class="btn btn-success" style=" margin-top: -5px; width: 80px;">logout</button></a>
                       Modal -->
                                

                    </li>


                </ul>
	</div>

</nav>
<div class="jumbotron" style="margin-top: 5px; box-shadow: 0px 0px 30px 0px white;">
<table class="table table-bordered ">
  <form action="search.php" method="post"><tr><td></td> <td><input type="text" name="serial" class="form-control" style="width: 400px; font-size: 20px; font-family: comic sans ms; border: 3px solid black; border-radius: 5px;" placeholder="search prisoner using ID Number"></td> <td><input type="submit" name="search" value="search" class="btn btn-info form-control"></td> </tr></form>
  <tr>

    <td colspan="3" style="text-align: center; font-family: Comic sans Ms; background-color: #708090; color: white; border-radius: 10px; font-size: 20px; ">welcome to comissioner page</td></tr>
    <tr style="text-align: center;"><td style="font-size: 20px; background-color: LightSteelBlue; color: white; font-family: comic sans Ms;">Do you know about Assosa zone </td>
        <td style="font-size: 20px; background-color: LightSteelBlue; color: black; font-family: comic sans Ms;" >search prisoner</td>
        <td style="font-size: 20px; background-color: LightSteelBlue; color: white; font-family: comic sans Ms;"></td></tr>
        <tr><td class="text-justify" style="font-size: 14px; width: 300px;">  Assosa zone located in Benshangul/Gumuz, is one of the 11 ethnic divisions (kililoch) of Ethiopia. It was previously known as Region 6.The region's capital is Assosa<br>
            <img src="../tasari.jfif" width="100%"></td> 
            <td style="width: 450px;" class="text-justify" rowspan="3">
              
                <?php 

if (isset($_POST['search'])) {
   $serial=$_POST['serial'];
$sql="select *from prisoner_information where serial_no='".$serial."'";
$query=mysqli_query($con,$sql);
$report=mysqli_num_rows($query);
$fetch=mysqli_fetch_array($query);
if ($report>0) {
echo "<table class='table table-bordered'>
<tr><th>ID number</th> <th>fname</th> <th>lname</th> <th>more info</th></tr>
<tr><td>".$fetch['serial_no']."</td> <td>".$fetch['fname']."</td> <td>".$fetch['lname']."</td> <td> <a href='more.php?id=".$fetch['serial_no']."'><button class='btn btn-info' style='width:100%'>more</button></a></td>

</tr>
<tr><td colspan='4'> <a href='index.php'><button class='btn btn-danger' >Back</button></a></td></tr>
 </table>";
}


else{
  echo "<font style='color:red;'>please enter correct Id no</font>";
  echo "<table class='table table-bordered'>

<tr><td colspan='4'> <a href='index.php'><button class='btn btn-danger' >Back</button></a></td></tr>
 </table>";
}

}
else{
$sql="select *from prisoner_information where zone='".$zone."'";
$query=mysqli_query($con,$sql);
$report=mysqli_num_rows($query);
if ($report>0) {
   echo "<table class='table table-bordered'>
<tr><th>ID number</th> <th>fname</th> <th>lname</th> <th>more info</th></tr>";
while ( $row=mysqli_fetch_array($query)) {
  echo "<tr><td>".$row['serial_no']."</td> <td>".$row['fname']."</td> <td>".$row['lname']."</td> 
<td> <a href='more.php?id=".$row['serial_no']."'><button class='btn btn-info' style='width:100%'>more</button></a></td>
  </tr>";
}
echo "</table>";
}



}
?>
          
<?php 


?>
</td> 
<td style="font-size: 25px; color: red; font-family: agency fb;"> you are login as  comissioner!<table><tr>
  <?php 
$serial_no=$_SESSION['serial_no'];
$sql="select *from comissioner_information where serial_no='".$serial_no."'";
  $query=mysqli_query($con,$sql);
  $report=mysqli_num_rows($query);

  if ($report>0) {

    while ($row=mysqli_fetch_array($query)) {
  echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../upload/image/'.$row['photo'].'" style="width:150px; border-radius:20px; border:2px solid green;" class="img-rounded" title="profile picture"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font style="color:green;">Name:&nbsp;&nbsp;&nbsp;&nbsp;'.$row['fname'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row['lname'].'</font> ';
    }
  
}


 ?>



 



</tr></table></td>
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

  <p id="btn2" class="glyphicon glyphicon-play" style="">
how to post news
</p>
<div id="demo2" class="collapse out" ><p class="glyphicon glyphicon-hand-right">&nbsp;press on post news</p>
<p class="glyphicon glyphicon-hand-right">&nbsp;enter the news and press post button</p>
  <br>
</div>
<p id="btn3" class="glyphicon glyphicon-play" style="">
search prisoner
</p>
<div id="demo3" class="collapse out" ><p class="glyphicon glyphicon-hand-right">&nbsp;press on more button</p>
<p class="glyphicon glyphicon-hand-right">&nbsp;press on search prisoner</p>
<p class="glyphicon glyphicon-hand-right">&nbsp;Enter prisoner id and press search</p>
  <br>
</div>
<!--help-->

  </div>
</td> <td><script src="../decoration/calander.js" type="text/javascript" language="javascript"></script></td></tr>

</table>
<div style="background-color: #E6E6FA;border-radius: 5px; box-shadow: 0px 0px 10px 0px green;"><center><font style="font-size: 30px;">Copyright © is reserved by BGRS in 2019</font></center></div>

</div>
</div>
</body>
</html>
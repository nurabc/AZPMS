<?php 
session_start();
include 'connection.php';
if (isset($_POST['forget'])) {
  $username=$_SESSION['username'];
  $pass1=$_POST['pass1'];
  $pass2=$_POST['pass2'];
  if ($pass1==$pass2) {
   $sql="UPDATE `account` SET `password`='".$pass1."' WHERE username='".$username."'";
$query=mysqli_query($con,$sql);
if ($query) {
   echo "<script>alert('your password is successfully changed !')</script>";
   
}

else{
    echo "<script>alert('not forgotten try agin !')</script>";
}
  }
  else{
    echo "<script>alert('coniformation password is incorrect!')</script>";
  }
}


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>forget password page</title>
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="decoration/css/bootstrap.min.css">

        <script src="decoration/js/jquery.min.js"></script>
        <script src="decoration/js/bootstrap.min.js"></script>
</head>
<body style="background-color: buttonface;">

<div class="container">
  
  <!-- Trigger the modal with a button -->
  

  <!-- Modal -->
  
    <div class="modal-dialog" style="margin-top: 200px;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        
          <h4 class="modal-title" style="text-align: center; font-family: Comic Sans Ms; font-size: 25px;">forget password</h4>
        </div>
        <form action="" method="post"><div class="modal-body">
       <input type="password" name="pass1" placeholder="Enter your new password" style="text-align: center; font-family: comic sans ms; font-size: 25px; border:1px solid gray;" class="form-control"><br>
          <input type="password" name="pass2" placeholder="conifirm your new password" style="text-align: center; font-family: comic sans ms; font-size: 25px; border:1px solid gray;" class="form-control">
        </div>
        <div class="modal-footer">
          <a href="index.php" style="color: red; font-size: 25px; font-family: comic sans ms;"> cancel</a>
          <input type="submit" name="forget" class="btn btn-info" value="forget">
        </div></form>
      </div>
      
    </div>

  
</div>

</body>
</html>

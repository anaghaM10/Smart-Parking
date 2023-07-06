<?php
session_start();
require 'update_slots.php';
require 'mysqlConnect.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">

    <title>Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet"> 
  <style>
    hr{
      position: absolute;
  margin-left: 30vw;
  margin-top: 29vh;
  width: 70vw;
  color: #000;
}
    .heading{
      position: absolute;
  margin-left: 70vw;
  margin-top:20vh;
  white-space: nowrap;
  font-size: 3em;
  color: white;

}
    .form-login{
  width: 33vw;
  height: 100vh;
 margin-left: -7vw;
  margin-top: 0;
  padding: 20px 22px;
  background: linear-gradient(90deg, rgba(6, 6, 6, 0.84) 0%,rgba(56, 56, 56, 0.559) 100%);
    }
.admin-input{
  width: 19.5vw;
  border: 1px solid;
  border-bottom-color: rgba(255,255,255,.5);
  border-right-color: rgba(60,60,60,.35);
  border-top-color: rgba(60,60,60,.35);
  border-left-color: rgba(80,80,80,.45);
  background-color: rgba(0,0,0,.2);
  background-repeat: no-repeat;
  padding: 8px 24px 8px 10px;
  font: bold .875em/1.25em "Open Sans Condensed", sans-serif;
  letter-spacing: .075em;
  color: #fff;
  text-shadow: 0 1px 0 rgba(0,0,0,.1);
  margin-bottom: 19px;
}
.admin-input:focus{
  background-color: rgba(0,0,0,.4);
  border: 2px solid white;
}
    </style>
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
      <h1 class=" heading">SMART PARKING</h1>
      <hr style="color: white">
		      <form class="form-login" action="admin_login.php" method="post">
		        <h2 class="form-login-heading">Admin login</h2>
		        <div class="login-wrap">
		            <input type="text" name="email" class="form-control admin-input" placeholder="Email" autofocus>
		            <br>
		            <input type="password" name="password"  class="form-control admin-input" placeholder="Password">
              </br>
            </br>
		            <button class="btn btn-theme btn-block" href="index.php" name='admin_login'  type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
		          <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          <button class="btn btn-theme" type="button">Submit</button>
		                      </div>
                         
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->

		      </form>

	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/bg1.jpg", {speed: 500});
    </script>
    <?php
  if(isset($_POST['admin_login'])){
  $password=mysqli_real_escape_string($con,$_POST['password']);
  $email=mysqli_real_escape_string($con,$_POST['email']);

  $sel="select * from admin where email='$email' AND password='$password'";
  $run=mysqli_query($con,$sel);
  $check=mysqli_num_rows($run);
  if($check==0)
  {
  	echo"<script>alert('password or email is not correct,try again!')</script>";
  	exit();
  }
  else{
  	$_SESSION['email']=$email;
  	echo"<script>window.open('admin.php','_self')</script>";
  }
  }
  ?>

  </body>
</html>

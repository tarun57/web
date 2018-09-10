<?php
session_start();
		 include("db_config.php");
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $password = $_POST['password'];
 //Checking Login Detail
 $result=mysql_query("SELECT * FROM login2 WHERE name='$name' AND password='$password'");
 $row=mysql_fetch_assoc($result);
$count=mysql_num_rows($result);
  if ($count==1) {
  $_SESSION['id'] = $row['id'];
 $_SESSION['name'] = $row['name'];
	echo '<script>window.location="course.php"</script>';
	} else {
  echo "<script>alert('You are not registerd Click on SIGN UP?');</script>";
}
}
?>
<?php
		 include("db_config.php");
if(isset($_POST['submit'])){
	$email = $_POST['name'];
	$password = $_POST['password'];
	$current_date = date("y-m-d");
$date =  date_default_timezone_set('Asia/Kolkata');
$date = date(' H:i:s');
	$query = mysql_query("INSERT INTO `login`( `name`, `password`,`date`,`time`) VALUES ('$email' ,'$password','$current_date','$date')");
	  $result = mysql_query($query);

}
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Pizone</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="css1/style5.css" rel="stylesheet" type="text/css">
<br><br><br />
</head>
 <body>
<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>

		<div class="login-form">

			<form method="post">
			<div class="sign-in-htm">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="name" name="name" type="text" class="input" required="required">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="myinput" name="password" type="password" class="input" data-type="password" required="required">
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" >
					<!--<label for="check"><span class="icon"></span> Keep me Signed in</label>-->
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign In" id="submit" name="submit">
				</div>
				<div class="group">
					<a href="<?= htmlspecialchars( $loginURL ); ?>"><img src="api/assets/image/login-google.png" class="fbbutton" alt="Login With Google"></a>
				</div>
				<div class="group">
				<div class="g-signin2" data-onsuccess="onSignIn"></div>
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="forget.php">Forgot Password?</a>

				</div><br><br><br><br><br><br>
			<label for="tab-2" style="margin-left:140px;">Join us?</a>
			</div>
			</form>


			<form method="post">
			<div class="sign-up-htm">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="username" name="username" type="text" class="input" required="required">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="password" name="password" type="password" class="input" data-type="password" required="required">
				</div>
				<div class="group">
					<label for="pass" class="label">Repeat Password</label>
					<input id="confirm" name="confirm" type="password" class="input" data-type="password" required="required">
				</div>
				<div class="group">
					<label for="pass" class="label">Email Address</label>
					<input id="email" name="email" type="text" class="input" required="required">
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign Up" name="set" id="set" >
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
				<label for="tab-1">Already Member?</a>

				</div>
			</div>
			</form>

		</div>
	</div>
</div>
<?php

		 include("db_config.php");
if(isset($_POST['set']))
        {
	   $username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
$confirm = $_POST['confirm'];
$current_date = date("y-m-d");
$date =  date_default_timezone_set('Asia/Kolkata');
$date = date(' H:i:s');
$query = mysql_query("INSERT INTO `login2`(`name`,`email`, `password`,`confirm password`,`register_date`,`registered_time`) VALUES ('$username','$email','$password','$confirm','$current_date','$date')");
 $result = mysql_query($query);
   echo "value insert";
		}



?>
<br><br><br><br>
<!--Start footer-->
</body>
</html>

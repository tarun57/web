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

<a href="https://accounts.google.com/o/oauth2/auth?response_type=code&redirect_uri=http%3A%2F%2Flocalhost%2Fweb%2Fcourse.php&client_id=315037280783-12ibuerluffi892kc24a2bohufihfobp.apps.googleusercontent.com&scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.profile+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email&access_type=offline&approval_prompt=force"><img src="api/assets/image/login-google.png" style="height:90px;width:400px;" class="fbbutton" alt="Login With Google"></a>
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
// $current_date = date("y-m-d");
// $date =  date_default_timezone_set('Asia/Kolkata');
// $date = date(' H:i:s');
$query = mysql_query("INSERT INTO `login2`(`name`,`email`, `password`,`confirm password`) VALUES ('$username','$email','$password','$confirm')");
 $result = mysql_query($query);
   echo "value insert";
		}
?>
<br><br><br><br>
<!--Start footer-->
</body>
</html>
<!-- <script>
function mobile(mobile)
{
var filter = /^\(?(\d{3})\)?[-\. ]?(\d{3})[-\. ]?(\d{4})$/;
  return filter.test(mobile);

}
</script>
<script>
function ValidateEmail(email) {
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return expr.test(email);
    };
</script>
<script>
$('form').on('submit', function (e) {
       var focusSet = false;
       var re = /^\w+([-+.'][^\s]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
       var emailFormat = re.test($("#email").val());// this return result in boolean type

       if (!ValidateEmail($("#email").val())) {
           if ($("#email").parent().next(".validation").length == 0) // only add if not added
           {
               $("#email").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter email address</div>");
           }
           e.preventDefault(); // prevent form from POST to server
           $('#email').focus();
           focusSet = true;
       } else {
           $("#email").parent().next(".validation").remove(); // remove it
       }
			 if (!mobile($("#password").val())) {
           if ($("#password").parent().next(".validation").length == 0) // only add if not added
           {
               $("#password").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter password</div>");
           }
           e.preventDefault(); // prevent form from POST to server
           if (!focusSet) {
               $("#password").focus();
           }
       } else {
           $("#password").parent().next(".validation").remove(); // remove it
       }
       if (!mobile($("#mobile").val())) {
           if ($("#mobile").parent().next(".validation").length == 0) // only add if not added
           {
               $("#mobile").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter mobile</div>");
           }
           e.preventDefault(); // prevent form from POST to server
           $('#mobile').focus();
           focusSet = true;
       } else {
           $("#mobile").parent().next(".validation").remove(); // remove it
       }
			 if (!$('#username').val()) {
	 if ($("#username").parent().next(".validation").length == 0) // only add if not added
	 {
	 $("#username").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter name</div>");
	 }
	 e.preventDefault(); // prevent form from POST to server
	 $('#username').focus();
	 focusSet = true;
	 } else {
	 $("#username").parent().next(".validation").remove(); // remove it
	 }
   if (!$('#name').val()) {
if ($("#name").parent().next(".validation").length == 0) // only add if not added
{
$("#name").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter name</div>");
}
e.preventDefault(); // prevent form from POST to server
$('#name').focus();
focusSet = true;
} else {
$("#name").parent().next(".validation").remove(); // remove it
}
if (!mobile($("#myinput").val())) {
    if ($("#myinput").parent().next(".validation").length == 0) // only add if not added
    {
        $("#myinput").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter password</div>");
    }
    e.preventDefault(); // prevent form from POST to server
    if (!focusSet) {
        $("#myinput").focus();
    }
} else {
    $("#myinput").parent().next(".validation").remove(); // remove it
}
		 });
			 </script> -->

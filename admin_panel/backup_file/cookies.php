	<?php
			 include("db_config.php");
	//Checking Login Detail
 if(isset($_POST['submit']))
 {
	 $email = $_POST['email'];
	 $password = $_POST['password'];
	  $result=mysql_query("SELECT * FROM login2 WHERE email='$email' AND password='$password'");
	// if($email == $myemail and $pass == $mypass){
		 if(isset($_POST['remember'])){
			 setcookie('email',$email,time()+60*60*7);
			 setcookie('password',$password,time()+60*60*7);
			  session_start();
			 $_SESSION['email']=$email;
			 header("location:dashboard.php");
		 }else{
			 echo "clear cookie";
			 if (isset($_COOKIE['email']))
				setcookie('email',$email,time()-60*60*7);
			if(isset($_COOKIE['password']))
				setcookie('password',$password,time()-60*60*7);
		 }

		// }
		 //else
		//	 echo "Email and  password  is wrong  <a href=index.php>Try Again</a>";
		// }
 }
	 else{
		 header("location:index.php");
	 }
 ?>

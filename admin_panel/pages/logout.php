<?php
	session_start();
	if(isset($email));
	session_unset($_SESSION['email']);
	session_destroy();
	header('location:index.php');
	exit;
?>
<?php
session_start();
if(isset($name))
unset($_SESSION['name']);
session_destroy();
header("Location: index.php");
exit();
?>

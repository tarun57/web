

<?php
session_start();
if(isset($email))
unset($_SESSION['name']);
session_destroy();
header("Location: admin.php");
exit;

?>

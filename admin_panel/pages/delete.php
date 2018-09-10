<?php
mysql_connect("localhost","root","");
mysql_select_db("pizone");
if(isset($_GET['id']))
{
  $id=$_GET['id'];
     $sql = mysql_query("DELETE FROM quiz WHERE id='$id'");
     echo "Deleted successfully.";
}
?>

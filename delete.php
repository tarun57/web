<?php
mysql_connect("localhost","root","");
mysql_select_db("pizone2");
$query = mysql_query("DELETE FROM `upload_data` ");
 $result = mysql_query($query);

?>

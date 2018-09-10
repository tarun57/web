<?php
$current_date = date("d-m-y");
$current_time = date("h:i:s");
echo $current_date;?><br><?php
echo $current_time;
?><br><?php
echo time(" H:i:s", time());

?><br><?php
$time =date("h:i");
$time =date("h:i:sa");
echo $time;
?><br><?php
$curr_timestamp = date('Y-m-d H:i:s');
echo $curr_timestamp;
?>
<br><?php
date_default_timezone_set('Asia/Kolkata');
echo date(' H:i:sa');
?>

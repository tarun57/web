<?php
session_start();

		 include("db_config.php");
if(isset($_POST['seconds'])){
$seconds=$_POST['seconds'];
$userid=$_SESSION['id'];
$qid=$_POST['qid'];
$cid=$_POST['cid'];
$sql=mysql_query("SELECT question_id,answer,userid FROM `radio` where question_id='$qid'");
if(mysql_num_rows($sql) > 0){
 $sql=mysql_query("UPDATE `radio` SET `answer`='$seconds',`userid`='$userid' WHERE question_id='$qid'");
 echo "updated Successfully";
}
else {
  $sql = mysql_query("INSERT INTO `radio`( `answer`, `question_id`,`userid`,`course_id`) VALUES ('$seconds','$qid','$userid','$cid')");
  echo('Record Entered Successfully');
}
}
 // while($row=mysql_fetch_array($sql))
 // {
 //  $id=$row['question_id'];
 //  echo $id;
 //  echo $qid;
 //   if($id==$qid)
 //   {
 //     echo "update";
 //
 //   }
 //   else {
 //     echo "insert";
 //   }
 // }
?>

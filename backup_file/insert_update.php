<?php
mysql_connect("localhost","root","");
mysql_select_db("pizone");
if(isset($_POST['seconds'])){
$seconds=$_POST['seconds'];
$qid=$_POST['qid'];
$sql=mysql_query("SELECT question_id,answer FROM `radio` where question_id='$qid'");
if(mysql_num_rows($sql) > 0){
 $sql=mysql_query("UPDATE `radio` SET `answer`='$seconds' WHERE question_id='$qid'");
 echo "updated Successfully";
}
else {
  $sql = mysql_query("INSERT INTO `radio`( `answer`, `question_id`) VALUES ('$seconds','$qid')");

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

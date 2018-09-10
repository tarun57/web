<?php
mysql_connect("localhost","root","");
mysql_select_db("pizone");
//echo $id = $_POST['quest_id'];
//$id=$_POST['quest_id'];
//$res = array();
// echo "<pre>";
 //var_dump($_POST);
// echo "</pre>";
  //foreach($_POST as $val)
  // {
	  // foreach($val as $value){
	 // echo $value;
	 // echo "<br>";
	 //echo $val;
  // }
// }
//print_r($_POST );
$counter = 0;
foreach($_POST as $key=>$value)
{
	//echo $key;
	$id=substr($key,5);
 $value;	
$sql=mysql_query("SELECT * FROM `quiz` WHERE id='$id' and correct='$value'");
while($row=mysql_fetch_array($sql))
{
	if($row['correct']==$value)
	{
		$row['correct'];
		 $counter++;
	}
	else
	{
	echo "false";	
	}	
}  
}
$result = mysql_query("SELECT * FROM quiz ");
$rows = mysql_num_rows($result);
echo "Total question: " . $rows . "";
echo "<br>";
//echo $counter;
?>
<br/>
<?php
echo "Correct answer:".$counter;
?><br/>
<?php
$wrong=$rows-$counter;
echo "Wrong answer:" . $wrong . "";

?>
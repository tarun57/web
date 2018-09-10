<?php
		 include("db_config.php");
$course_id = $_GET['id'];
?>
<br>
<?php
$myanswer=array();
$correctanswer=array();
//echo "SELECT * FROM quiz  WHERE course_id = '$course_id'";
$result = mysql_query("SELECT * FROM  radio  WHERE course_id = '$course_id'");
//$rows = mysql_num_rows($result);
//echo "Total question: " . $rows . "";
while($total=mysql_fetch_array($result))
{
   $myanswer[]=$total['answer'];
}


$result1 = mysql_query("SELECT * FROM  quiz  WHERE course_id = '$course_id'");
$rows = mysql_num_rows($result1);
//echo "Total question: " . $rows . "";
while($total=mysql_fetch_array($result1))
{
  $correctanswer[]=$total['correct'];
  echo "<br />";
}


//print_r($myanswer);

//echo "<br />";

//print_r($correctanswer);



// Get values from arr2 which exist in arr1
$overlap = array_intersect($myanswer, $correctanswer);

// Count how many times each value exists
$counts  = array_count_values($overlap);

//var_export($counts);
$total=sizeof($counts);
echo "Total question:-" . $rows . "";
echo "<br />";

echo "Correct Answer:-".$total;

echo "<br />";


$wrong_answer=array_diff($myanswer,$correctanswer);

$wronganswer=sizeof($wrong_answer);

echo "Wrong Answer:-".$wronganswer;

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Free Responsive Admin Theme - ZONTAL</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
  </head>
<body>
<header>
    <div class="container" style="line-height:1.5px;">
        <div class="row">
            <div class="col-md-12">
                  <div class="col-md-6" style="text-align:center;margin-top:10px;">
                    <div class="g-signin2" data-onsuccess="onSignIn"></div>

<?php
 include("db_config.php");
$query = mysql_query("SELECT `email`,`contact` FROM setting LIMIT 1 ");
while($row = mysql_fetch_array($query))
{echo $row['email'];
?>
&emsp;&emsp;<?php
echo $row['contact'];}?>
</div>
<div class="col-md-6" style="text-align:center;">
<?php
session_start();
if(isset($_SESSION['name'])){
echo $_SESSION['name'];
echo '<a href="logout.php"><span class ="glyphicon glyphicon-user" style="color:white;margin-top:0;margin-left:10px;">    Logout</span></a>';
 }
else
echo '<a href="sign2.php"><span class ="glyphicon glyphicon-log-in" style="color:white;margin-left:10px;">  Login/Register</span></a>';
?>
</div>
</div>
</div>
</header>
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
?>
<form method="post" style="font-size:20px;margin-left:40%;">
	<div>
		Your Score:
	</div><br>
	<?php
	$result = mysql_query("SELECT * FROM  radio  WHERE course_id = '$course_id'");
	$rows = mysql_num_rows($result);
	echo "Attemptted questions:-" . $rows . "";
	echo "<br  /><br  />";
echo "Total question:-" . $rows . "";
echo "<br /><br />";
echo "Correct Answer:-".$total;
echo "<br /><br />";
$wrong_answer=array_diff($myanswer,$correctanswer);
$wronganswer=sizeof($wrong_answer);
echo "Wrong Answer:-".$wronganswer;
echo "<br /><br />";
// $percentage = $total;
// $totalWidth = $rows;
//
// $new_width = ($percentage / 100) * $totalWidth;
// echo "Your score:" . $new_width . "";
?>
</form>
</body>
</html>

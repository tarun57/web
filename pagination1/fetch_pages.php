<?php
//session_start();
include("config.inc.php"); //include config file
//sanitize post value
if(isset($_POST["page"])){
	$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
	if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
	$page_number = 1;
}

//get current starting point of records
$position = (($page_number-1) * $item_per_page);
$id='';
if (isset($_POST['id'])) {
$id= $_POST["id"];
}
$cid = '';
if( isset($_GET['id'])) {
    $cid=$_GET['id'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$results = mysqli_query($connecDB, "SELECT id, question, a1,a2,a3,a4,course_id FROM quiz where course_id='$id' ORDER BY id ASC LIMIT $position, $item_per_page");
}
else {
	$results = mysqli_query($connecDB, "SELECT id, question, a1,a2,a3,a4,course_id FROM quiz where course_id='$cid' ORDER BY id ASC LIMIT $position, $item_per_page");
}
//Limit our results within a specified range.
//$cid=$_SESSION['cid'];
//$results = mysqli_query($connecDB, "SELECT id, question, a1,a2,a3,a4 FROM quiz ORDER BY id ASC LIMIT $position, $item_per_page");

//$results = mysqli_query($connecDB, "SELECT id, question, a1,a2,a3,a4 FROM quiz where course_id='$cid' ORDER BY id ASC LIMIT $position, $item_per_page");
//output results from database
echo '<ul class="page_result ">';
$i=1;
while($row = mysqli_fetch_array($results))
{
	echo $page_number;

	echo ".";
	echo $row['question'];
	?>
	<!--echo '<li id="item_'.$row["id"].'">'.$row["id"].'. <span class="question">'.$row["question"].'</span><br><span class="a1">'.$row["a1"].'</span>&emsp;&emsp;&emsp;&emsp;<span class="a2">'.$row["a2"].'</span><br><span class="a3">'.$row["a3"].'</span>&emsp;&emsp;&emsp;&emsp;<span class="a4">'.$row["a4"].'</span></li>';-->
<br><br>
<input type="radio" name="radio<?php echo $row['id'];?>" value="<?php echo $row['a1']; ?>"><?php echo $row['a1']; ?><br>
<input type="radio" name="radio<?php echo $row['id'];?>" value="<?php echo $row['a2']; ?>"><?php echo $row['a2']; ?> <br>
<input type="radio" name="radio<?php echo $row['id'];?>" value="<?php echo $row['a3']; ?>"><?php echo $row['a3']; ?> <br>
<input type="radio" name="radio<?php echo $row['id'];?>" value="<?php echo $row['a4']; ?>"> <?php echo $row['a4']; ?><br><br><br>
<?php
$page_number++;
}
echo '</ul>';


?>

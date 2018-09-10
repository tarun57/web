<?php
session_start();
include("config.inc.php");
$cid=$_GET['id'];
//$_SESSION['cid']=$id;
$results = mysqli_query($connecDB,"SELECT COUNT(*) FROM quiz WHERE course_id='$cid'");
$get_total_rows = mysqli_fetch_array($results); //total records

//break total records into pages
$pages = ceil($get_total_rows[0]/$item_per_page);

?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ajax Pagination</title>
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/jquery.bootpag.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
var	id=<?php echo $cid;?>
//	$("#results").load("step_02.php?date='+date");  //initial page number to load
	 $('#results').load('fetch_pages.php?id='+id);
	$(".pagination").bootpag({

total: <?php echo $pages; ?>,
 page:1,
maxVisible: 2,
// prev: 'Prev',
// next: 'Next',
	}).on("page", function(e, num){
		e.preventDefault();
	$("#results").prepend('<div class="loading-indication"><img src="ajax-loader.gif" /> Loading...</div>');
	$("#results").load("fetch_pages.php", {'page':num,'id':id});
	});
});
</script>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="tota_page_div">
		<?php
		include("db_config.php");
		$cid='';
 if(isset($_POST['cid']))
 {
 $cid=$_POST['cid'];
}
 $select =mysql_query("SELECT * FROM quiz where course_id='$cid'");
 $total_results=mysql_num_rows($select);
 $row=mysql_fetch_array($select);
 echo $total_results;
 for($i=1;$i<=$total_results;$i++)
 {
   if($i==$total_results){
  echo "<input type='button' value='".$i."' onclick='get_data1(".$i.",".$cid.")'>";
}
else{
  echo "<input type='button' value='".$i."' onclick='get_data(".$i.",".$cid.")'>";
}
 }
 ?>
	</div>
	<form method="post">
		<?php
			$id=$_GET['id'];
			$query = mysqli_query($connecDB,"SELECT * FROM  `course` WHERE id='$id'");
			while($row = mysqli_fetch_array($query)){
			$id=$row['id'];
			$course=$row['course'];
			?>
			<a href="quiz.php?id=<?php echo $id;?>" style="font-size:30px;" class="btn btn-primary"><?php echo  $row['course'];?></a></h1>
			<?php
		}
	?>
	</form>
	<p style="margin-left:40%;font-size:20px;">Remaining Time:-</p>
<div id="divCounter" style="margin-left:40%;font-size:40px;background-color:black;color:white;width:200px;"></div>
<div id="results"></div>
<div class="pagination"></div>
<?php
mysql_connect("localhost","root","");
mysql_select_db("pizone");
$query = mysql_query("SELECT * FROM `time`");
while($row = mysql_fetch_array($query)){
 ?>
<script>
//var hoursleft = 0;
var minutesleft = <?php echo $row['duration'];?>; //give minutes you wish
var secondsleft = <?php echo $row['seconds'];?>; // give seconds you wish
var finishedtext = "Countdown finished!";
var end1;
if(localStorage.getItem("end1")) {
end1 = new Date(localStorage.getItem("end1"));
} else {
end1 = new Date();
end1.setMinutes(end1.getMinutes()+minutesleft);
end1.setSeconds(end1.getSeconds()+secondsleft);
}
var counter = function () {
var now = new Date();
var diff = end1 - now;
diff = new Date(diff);
var milliseconds = parseInt((diff%1000)/100)
    var sec = parseInt((diff/1000)%60)
    var mins = parseInt((diff/(1000*60))%60)
    //var hours = parseInt((diff/(1000*60*60))%24);
if (mins < 10) {
    mins = "0" + mins;
}
if (sec < 10) {
    sec = "0" + sec;
}
if(now >= end1) {
    clearTimeout(interval);
   // localStorage.setItem("end", null);
     localStorage.removeItem("end1");
     localStorage.clear();
    document.getElementById('divCounter').innerHTML = finishedtext;
	 // $(".btnSendMail").attr("disabled", "disabled");
	  //$('[data-toggle="tooltip"]').tooltip()
      //window.location = "quiz_result.php";
	 // $('input[type="submit"]').attr('disabled' , true);
	//$("#submit").css('display','disable');
    // if("confirm("TIME UP!"))
     //window.location.href= "timeup.php";
} else {
    var value = mins + ":" + sec;
    localStorage.setItem("end1", end1);
    document.getElementById('divCounter').innerHTML = value;
}
}
var interval = setInterval(counter, 1000);
</script>
<?php } ?>
</body>
</html>

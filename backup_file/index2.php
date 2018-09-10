<?php
session_start();
include("config.inc.php");
//print_r($_SESSION);
 $cid=$_GET['id'];
$results = mysqli_query($connecDB,"SELECT COUNT(*) FROM quiz WHERE course_id='$cid'");
//$results = mysqli_query($connecDB,"SELECT COUNT(*) FROM quiz");
$get_total_rows = mysqli_fetch_array($results); //total records
//break total records into pages
$pages = ceil($get_total_rows[0]/$item_per_page);
?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pizone</title>
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
 prev: 'Prev',
 next: 'Next',
	}).on("page", function(e, num){
		e.preventDefault();
	$("#results").prepend('<div class="loading-indication"><img src="ajax-loader.gif" /> Loading...</div>');
	$("#results").load("fetch_pages.php", {'page':num,'id':id});
	});
});
</script>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body >

	<form method="post" id="form1" name="mainForm">
	<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
	<?php
			$id=$_GET['id'];
			$query = mysqli_query($connecDB,"SELECT * FROM  `course` WHERE id='$id'");
			while($row = mysqli_fetch_array($query)){
			$id=$row['id'];
			$course=$row['course'];
			 ?>

       <div class="row">
       <div class="col-sm-12">
        <div class="col-sm-6">
<a href="index0.php?id=<?php echo $id;?>" style="font-size:30px;" class="btn btn-primary"><?php echo  $row['course'];?></a></h1>
</div>
 <div class="col-sm-6">
<p style="margin-left:40%;font-size:20px;">Remaining Time:-</p>
<div id="divCounter" style="margin-left:40%;font-size:40px;background-color:black;color:white;width:200px;"></div>
</div>
</div>
</div>

<?php
		 }
	 ?>
<div id="results"></div>
<div class="pagination"></div>
<div id="response"></div>
<!--<a href="result.php?id=<?php echo $id;?>">submit</a>-->
<div id="message"></div>
<span id="result"></span>
</form>
<script>
//var hoursleft = 0;
var minutesleft = 0; //give minutes you wish
var secondsleft = 120; // give seconds you wish
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
</body>
</html>

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
<body>
<div id="results"></div>
<div class="pagination"></div>
</body>
</html>

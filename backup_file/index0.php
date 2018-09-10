<?php
include("config.inc.php");
 $cid=$_GET['id'];
$results = mysqli_query($connecDB,"SELECT COUNT(*) FROM quiz");
//$results = mysqli_query($connecDB,"SELECT COUNT(*) FROM quiz");
$get_total_rows = mysqli_fetch_array($results); //total records
//break total records into pages
$pages = ceil($get_total_rows[0]/$item_per_page);
?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ajax Pagination</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
  id:id,
maxVisible: 2,
 leaps: true,
 firstLastUse: true,
first: 'First',
last: 'Last',
 prev: 'Prev',
 next: 'Next',
 wrapClass: 'pagination',
 activeClass: 'active',
 disabledClass: 'disabled',
 nextClass: 'next',
 prevClass: 'prev',
 lastClass: 'last',
 firstClass: 'first'
	}).on("page", function(e, num){
		e.preventDefault();
	$("#results").prepend('<div class="loading-indication"><img src="ajax-loader.gif" /> Loading...</div>');
	$("#results").load("fetch_pages.php", {'page':num,'id':id});
	});
});
</script>
<link href="style1.css" rel="stylesheet" type="text/css">
</head>
<body style="background-color:#4CC2AF;">
	<form method="post" id="form1" name="mainForm">
	<input type="hidden" name="course_id" value="<?php echo $_GET['id'];?>">
	<?php
			$course_id=$_GET['id'];
			$query = mysqli_query($connecDB,"SELECT * FROM  `course` WHERE course_id='$course_id'");
			while($row = mysqli_fetch_array($query)){
			$course_id=$row['course_id'];
			$course=$row['course'];
			 ?>
<a href="index0.php?id=<?php echo $course_id;?>" class="btn btn-primary" style="width:150px;;margin-top:30px;height:40px;font-size:20px;"><?php echo  $row['course'];?></a></h1>
<?php
		 }
	 ?>
<div id="results"></div>
<div class="pagination"></div>
<input type="submit" name="submit" id="submit" value="Submit">
<div id="response"></div>
<!--<a href="result.php?id=<?php echo $course_id;?>">submit</a>-->
<div id="message"></div>
<span id="result"></span>
</form>
</body>
<script>
$(document).ready(function(){
        $("#form1").submit(function(event){
            event.preventDefault();
		$.ajax({
                    url:'result.php',
                    type:'post',
                    data:$(this).serialize(),
                    success:function(result){
                        $("#response").html(result);
				}
			});
        });
    });
</script>
</html>

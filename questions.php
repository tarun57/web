<?php include("header.php");?>
<?php
		 include("db_config.php");

?>
<div id="page-wrapper">
	<p>Remaining Time:-</p>
	<div style="margin-left:10%;font-size:40px;background-color:black;color:white;width:200px;height:100px;text-align:center;" id="divCounter"></div>
         <form method="post" style="margin-left:35%;margin-top:none;" id="form1">
		    <input type="hidden" name="course_id" value="<?php echo $_GET['id'];?>">
		   <?php
		   $limit = 1;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $limit;
  $cid=$_GET['id'];
 $sql = mysql_query("SELECT `id`, `question`, `a1`, `a2`, `a3`, `a4`, `correct` FROM `quiz` WHERE course_id='$cid' LIMIT $start_from, $limit");
$sno = $page;
while ($fetched_row = mysql_fetch_assoc($sql)) {
echo $sno;
echo " .  ";
echo $fetched_row['question'];
?><br>
&emsp;&emsp;<input type="radio" name="radio<?php echo $fetched_row['id']; ?>" value="<?php echo $fetched_row['a1']; ?>"><?php echo $fetched_row['a1']; ?><br>
&emsp;&emsp;<input type="radio" name="radio<?php echo $fetched_row['id']; ?>" value="<?php echo $fetched_row['a2']; ?>"><?php echo $fetched_row['a2']; ?> <br>
&emsp;&emsp;<input type="radio" name="radio<?php echo $fetched_row['id']; ?>" value="<?php echo $fetched_row['a3']; ?>"><?php echo $fetched_row['a3']; ?> <br>
&emsp;&emsp;<input type="radio" name="radio<?php echo $fetched_row['id']; ?>" value="<?php echo $fetched_row['a4']; ?>"><?php echo $fetched_row['a4']; ?><br><br><br>
<?php
$sno ++;
};
?>
<?php
 $cid=$_GET['id'];
$sql = "SELECT `id`, `question`, `a1`, `a2`, `a3`, `a4`, `correct` FROM quiz WHERE course_id='$cid'";
$rs_result = mysql_query($sql);
$row = mysql_fetch_row($rs_result);
$total_records = $row[0];
$total_pages = ceil($total_records / $limit);
echo "<ul class='pagination'>";
echo "<li><a href='questions.php?id=".$cid. "&page=".($page-1)."'class='button'>Previous</a></li>";
for ($i=1; $i<=$total_pages; $i++) {
  //  echo "<li><a href='questions.php?id=".$cid."&page=".$i."'>".$i."</a></li>";
};
echo "<li><a href='questions.php?id=".$cid."&page=".($page+1)."' class='button'>NEXT</a></li>";
echo "</ul>";
?>
<input type="submit" style="margin-left:50%;margin-bottom:15px; name="result" id="result" value="Submit">
<div id="response"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
	  $(".btnSendMail").attr("disabled", "disabled");
	  $('[data-toggle="tooltip"]').tooltip()
	 // $('input[type="result"]').attr('disabled' , true);
	//$("#result").css('display','disable');
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
					   	</form>
						</div>
<?php include("footer.php");?>

<?php include("header.php");?>
<div style="font-size:20px;background-color:rgb(55,68,160);color:white;">
<div style="margin-left:30%;">
<p>Remaining Time:-</p>
<div style="margin-left:10%;font-size:40px;background-color:black;color:white;width:200px;" id="divCounter"></div>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
				 <form method="post" id="form1"><br><br>

				 <input type="hidden" name="course_id" value="<?php echo $_GET['id'];?>">
				 <?php
								 include("db_config.php");
						 $course_id=$_GET['id'];
						 $query = mysql_query("SELECT * FROM  `course` WHERE course_id='$course_id'");
						 while($row = mysql_fetch_array($query)){
						 $course_id=$row['course_id'];
						 $course=$row['course'];
							?>
<a href="l.php?id=<?php echo $course_id;?>" class="btn btn-primary" style="width:150px;margin-left:10px;height:40px;font-size:20px;"><?php echo  $row['course'];?></a></h1>
<?php
						}
					?>
					<br><br>
						 <?php
						 include("db_config.php");
				       $id=$_GET['id'];
					   //echo "SELECT * FROM quiz WHERE course_id='$id'";
		       		 $query = mysql_query("SELECT `id`, `question`, `a1`, `a2`, `a3`, `a4`, `correct` FROM `quiz` WHERE course_id='$id' LIMIT 1");
					 $i=1;
						while($fetched_row = mysql_fetch_array($query))
						{
	?>
	<?php
echo $i;
$i++;
echo ".";
echo $fetched_row['question'];
?><br>
&emsp;&emsp;<input type="radio" name="radio<?php echo $fetched_row['id']; ?>" value="<?php echo $fetched_row['a1']; ?>"><?php echo $fetched_row['a1']; ?><br>
&emsp;&emsp;<input type="radio" name="radio<?php echo $fetched_row['id']; ?>" value="<?php echo $fetched_row['a2']; ?>"><?php echo $fetched_row['a2']; ?> <br>
&emsp;&emsp;<input type="radio" name="radio<?php echo $fetched_row['id']; ?>" value="<?php echo $fetched_row['a3']; ?>"><?php echo $fetched_row['a3']; ?> <br>
&emsp;&emsp;<input type="radio" name="radio<?php echo $fetched_row['id']; ?>" value="<?php echo $fetched_row['a4']; ?>"> <?php echo $fetched_row['a4']; ?><br><br><br>
	<?php
}
?>
<div class="container" style="color:black;">
  <h2></h2>
  <!-- Trigger the modal with a button -->
  <span class="tool-tip"   data-toggle="tooltip"  data-placement="top" title="I am disable now">
  <button type="submit" class="btn btn-info btn-lg btnSendMail" data-toggle="modal" name="result"  data-target="#result"  style="margin-bottom:20px;margin-left:40%;">Submit</button></span>

  <!-- Modal -->
  <div class="modal fade" id="result" role="dialog" style="margin-top:3%;">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
      <div id="response"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
        </div>
      </div>
	  </div>
  </div>
  </div>
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
<input type="button" value="Next">
<input type="button" value="Pre">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
        $("#form1").button(function(event){
            event.preventDefault();
		$.ajax({
                    url:'a.php',
                    type:'post',
                    data:$(this).serialize(),
                    success:function(result){
                        $("#response").html(result);
				}
			});
        });
    });
</script>

<!--<script>
var sec = 15;
var myTimer = document.getElementById('myTimer');
var btn = document.getElementById('btn');
window.onload = countDown;

function countDown() {
  if (sec < 10) {

    myTimer.innerHTML = "0" + sec;
  } else {
    myTimer.innerHTML = sec;

  }
  if (sec <= 0) {
	    alert("done");
	  // $('input[type="submit"]').attr('disabled' , true);
	 // alert("done");
    // $(".btn").removeAttr("disabled");
    // $(".btn").removeClass().addClass("btnEnable");
    // $("#myTimer").fadeTo(2500, 0);
    // myBtn.innerHTML = "Click Me!";
    // return;
  }
  sec -= 1;
  window.setTimeout(countDown, 1000);
}
</script>-->
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

                       </div>
					   </div>
					   	</form>
					   </div>
					   </div>
					   </div>

<?php include("footer.php");?>

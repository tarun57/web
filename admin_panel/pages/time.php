<?php
session_start();
if(!isset($_SESSION))
{
header('location:start.php');
exit;
}
?>
<?php include("header.php");?>
<?php include("sidebar.php");?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
function validateForm() {
    var x = document.forms["myForm"]["seconds"].value;
      var duration = document.forms["myForm"]["duration"].value;
    if (x == "") {
      $("#seconds_error").css('display','block');
          //alert("Name must be filled out");
      //  $('.alert-danger').html('please fill lastname').fadeIn().delay(3000).fadeOut('slow');
        return false;
    }
    else {
    $("#seconds_error").css('display','none');
    }
    if (duration == "") {
        $("#duration_error").css('display','block');
    //    alert("email must be filled out");
        return false;
    }
    else {
      $("#duration_error").css('display','none');
    }
}
</script>
<div id="page-wrapper">
           <div class="row">
               <div class="col-lg-12">
                 <h1 class="page-header">Starting quiz</h1>
               </div>
               <div class="row">
         <div class="col-lg-12">
             <div class="panel panel-default">
                 <div class="panel-heading">
                   <?php
mysql_connect("localhost","root","");
mysql_select_db("pizone");
if(isset($_POST['submit'])){
  $seconds = $_POST['seconds'];
    $duration = $_POST['duration'];
  $query = mysql_query("UPDATE `time` SET `seconds`='$seconds',`duration`='$duration' WHERE 1");
$result = mysql_query($query);
}
                    ?>
                   <form role="form" method="post" name="myForm"  onsubmit="return validateForm()">
                       <div class="form-group">
                           <label>seconds</label>
                           <input class="form-control" placeholder="Enter seconds" name="seconds" id="seconds">
                           <p id="seconds_error" style="color:red;display:none;">
                             Please enter second.
                           </p>
                       </div>
                       <div class="form-group">
                           <label>Minutes</label>
                           <input class="form-control" placeholder="Enter duration" name="duration" id="duration">
                           <p id="duration_error" style="color:red;display:none;">
                            Please enter minutes.
                           </p>
                       </div>
                       <button type="submit" class="btn btn-primary" name="submit">Submit</button >
                     </form>
                       <p style="margin-left:40%;font-size:20px;">Remaining Time:-</p>
                     <div id="divCounter" style="margin-left:40%;font-size:40px;background-color:black;color:white;width:200px;"></div>
                 </div>
             </div>

           </div>
           <?php
$query = mysql_query("SELECT * FROM `time`");
while($row = mysql_fetch_array($query)){
            ?>
           <script>
           //var hoursleft = 0;
           var minutesleft = <?php echo $row['duration'];?>; //give minutes you wish
           var secondsleft = <?php echo $row['seconds'];?> // give seconds you wish
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
<?php include("footer.php");?>

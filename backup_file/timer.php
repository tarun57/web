<!-- Modify this according to your requirement -->
<!--<h3>
Remaining Time: <span id="countdown"></span>
</h3>-->
<!-- JavaScript part -->
<!--<script type="text/javascript">

    // Total seconds to wait

    var seconds = 10;

    function countdown() {
        seconds = seconds - 1;
        if (seconds < 0) {
            // Chnage your redirection link here
            window.location = "index.php";
        } else {
            // Update remaining seconds
            document.getElementById("countdown").innerHTML = seconds;
            // Count down using javascript
            window.setTimeout("countdown()", 1000);
        }
    }

    // Run countdown function
    countdown();

</script>-->
<p>Remaining Time:-</p>
<div id="divCounter"></div>
<script>
//var hoursleft = 0;
var minutesleft = 0; //give minutes you wish
var secondsleft = 10; // give seconds you wish
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
      window.location = "submit.php";
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

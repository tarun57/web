<?php
mysql_connect("localhost","root","");
mysql_select_db("pizone");
$sql = "SELECT id, cat_image FROM images ";
$resultset = mysql_query( $sql) or die("database error:". mysql_error());
$image_count = 0;
$button_html = '';
$slider_html = '';
$thumb_html = '';
while( $rows = mysql_fetch_assoc($resultset)){
$active_class = "";
if(!$image_count) {
$active_class = 'active';
$image_count = 1;
}
$image_count++;
$thumb_image = "nature_thumb_".$rows['id'].".jpg";
//slider image html
$slider_html.= "<div class='item ".$active_class."'>";
$slider_html.= "<img src='admin_panel/pages/image/".$rows['cat_image']."' alt='1.jpg' class='img-responsive' style='width:100%;height:300px;'>";
$slider_html.= "<div class='carousel-caption'></div></div>";
//Thumbnail html
$thumb_html.= "<li><img src='admin_panel/pages/image/".$thumb_image."' alt='$thumb_image'></li>";
//Button html
$button_html.= "<li data-target='#carousel-example-generic' data-slide-to='".$image_count."' class='".$active_class."'></li>";
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
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
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
	.sticky {
  position:fixed;
  top: 0;
  width: 100%;
}
	</style>
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
			
                    <strong>Email: </strong>Pizone@gmail.com
                    &nbsp;&nbsp;
                    <strong>Support: </strong>+94-14-53-72-75
					&emsp;&emsp;&emsp;&emsp;
					<li class='active' style='float:right;'>
  <?php 
error_reporting(0);
  session_start();
  
  if($_SESSION['name']==true)
{
echo "Welcome"." " . $_SESSION['name'];
echo '<a href="logout.php"><span class ="glyphicon glyphicon-user  " style="color:white;">Logout</span></a></li>';
}
else
{
header('location:loc.php');
}
?>
 
    
 </div>

            </div>
        </div>
    </header>
    <!-- HEADER END-->
	<div>
	
	</div>
    
    <!-- LOGO HEADER END-->
    <section class="menu-section" id="section" style="font-size:20px;padding:10px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a   class="menu-top-active" href="index2.php">Dashboard</a></li>
							    <li><a href="table2.php">Data Tables</a></li>
							<li><a target="_blank" href="admin_panel/pages/index.php">Admin</a></li>
							<li><a  href="tr.php">Training</a></li>
						
                        </ul>
                    </div>
                </div>
				</div>
        </div>
    </section>
	

    <!-- MENU SECTION END-->
	<div class="container" style="width:100%;">
<div id="carousel-example-generic" class="carousel slide"  data-interval="5000" data-ride="carousel" data-interval="false">
  <div class="carousel-caption" style="margin-bottom:2%;">
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">
                <h2><span style="font-size:50px;">Clean & Modern Design Quiz</span></h2>
              </div>
              <div class="col-md-10 col-md-offset-1">
                <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">
                  <p style="font-size:20px;">Lorem ipsum dolor sit amet consectetur adipisicing</p>
                </div>
              </div>
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.9s">
                <form class="form-inline">
                  <div class="form-group">
                    <button type="livedemo" name="Live Demo" class="btn btn-primary btn-lg" required="required">Live Demo</button>
                  </div>
                  <div class="form-group">
                    <button type="getnow" name="Get Now" class="btn btn-primary btn-lg" required="required">Get Now</button>
                  </div>
                </form>
              </div>
            </div>
<ol class="carousel-indicators">
<?php echo $button_html; ?>
</ol>
<div class="carousel-inner">
<?php echo $slider_html; ?>
</div>
<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
</a>
<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
</a>
<ul class="thumbnails-carousel clearfix">
</ul>
</div>
</div>
<script>
window.onscroll = function() {myFunction()};

var section = document.getElementById("section");
var sticky = section.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    section.classList.add("sticky")
  } else {
    section.classList.remove("sticky");
  }
}
</script>
<div style="font-size:20px;background-color:rgb(55,68,160);color:white;">
<div style="margin-left:30%;">
<p>Remaining Time:-</p>
<div style="margin-left:10%;font-size:40px;background-color:black;color:white;width:200px;" id="divCounter"></div>
<br><br><form method="post" id="form1">
<?php
mysql_connect("localhost","root","");
mysql_select_db("pizone");
//echo $id = $_GET['id'];
// $question = $row_get_question['question'];
// $a1 = $row_get_question['a1'];
// $a2 = $row_get_question['a2'];
// $a3 = $row_get_question['a3'];
// $a4 = $row_get_question['a4'];
// $correct = $row_get_question['correct'];
$query = mysql_query("SELECT `id`, `question`, `a1`, `a2`, `a3`, `a4`, `correct` FROM `quiz` ORDER BY RAND() ");
$i=1;
while($fetched_row=mysql_fetch_array($query))
{
	?>
<?php 
echo $i;
$i++;
echo ".";
echo $fetched_row['question'];
?><br>
<br>
 &emsp;&emsp;<input type="radio" name="radio<?php echo $fetched_row['id']; ?>" value="<?php echo $fetched_row['a1']; ?>"><?php echo $fetched_row['a1']; ?><br>
&emsp;&emsp;<input type="radio" name="radio<?php echo $fetched_row['id']; ?>" value="<?php echo $fetched_row['a2']; ?>"><?php echo $fetched_row['a2']; ?> <br>
&emsp;&emsp;<input type="radio" name="radio<?php echo $fetched_row['id']; ?>" value="<?php echo $fetched_row['a3']; ?>"><?php echo $fetched_row['a3']; ?> <br>
&emsp;&emsp;<input type="radio" name="radio<?php echo $fetched_row['id']; ?>" value="<?php echo $fetched_row['a4']; ?>"> <?php echo $fetched_row['a4']; ?><br><br><br>
<?php }
?>

<input type="submit" id="submit" name="submit" value="Submit">
<div id="response"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<script>
$(document).ready(function(){
        $("#form1").submit(function(event){
            event.preventDefault();
		$.ajax({
                    url:'submit.php',
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
	$("#submit").css('display','none');
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
<?php inclue('footer.php');?>
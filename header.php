<?php
session_start();
include("db_config.php");
$sql = "SELECT id, cat_image, cat_desc FROM images ";
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
$slider_html.= "<img src='admin_panel/pages/images/".$rows['cat_image']."' alt='1.jpg' class='img-responsive' style='width:100%;height:300px;'>";
$slider_html.= "<div class='carousel-caption' style='margin-bottom:7%;font-size:40px;'>".$rows['cat_desc']. "</div></div>";
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
        <div class="container" style="line-height:1.5px;">
            <div class="row">
                <div class="col-md-12">
				              <div class="col-md-6" style="text-align:center;margin-top:10px;">
                        <div class="g-signin2" data-onsuccess="onSignIn"></div>

  <?php
		 include("db_config.php");
  $query = mysql_query("SELECT `email`,`contact` FROM setting LIMIT 1 ");
  while($row = mysql_fetch_array($query))
  {echo $row['email'];
  ?>
  &emsp;&emsp;<?php
   echo $row['contact'];}?>
</div>
 <div class="col-md-6" style="text-align:center;">
    <?php
    if(isset($_SESSION['name'])){
    echo $_SESSION['name'];
    echo '<a href="logout.php"><span class ="glyphicon glyphicon-user" style="color:white;margin-top:0;margin-left:10px;">    Logout</span></a>';
     }
    else
    echo '<a href="sign2.php"><span class ="glyphicon glyphicon-log-in" style="color:white;margin-left:10px;">  Login/Register</span></a>';
    ?>
  </div>
	</div>
	</div>
  </header>
  </div>
	</div>
  <section class="menu-section" id="section" style="font-size:15px;padding:10px;line-height:2px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
<?php
		 include("db_config.php");
$query = mysql_query("SELECT * FROM menu");
while($row = mysql_fetch_array($query)){
?>
      <li><a href="<?php echo $row['link'];?>"><?php echo $row['name']?></a></li>
      <?php
        }
        ?>
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

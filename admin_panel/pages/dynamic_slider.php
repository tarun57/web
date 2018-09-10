<?php include("db_config.php");?>
<?php
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
// slider image html
$slider_html.= "<div class='item ".$active_class."'>";
$slider_html.= "<img src='image/".$rows['cat_image']."' alt='1.jpg' class='img-responsive' style='width:100%;height:500px;'>";
$slider_html.= "<div class='carousel-caption'></div></div>";
// Thumbnail html
$thumb_html.= "<li><img src='image/".$thumb_image."' alt='$thumb_image'></li>";
// Button html
$button_html.= "<li data-target='#carousel-example-generic' data-slide-to='".$image_count."' class='".$active_class."'></li>";
}
?>
<!DOCTYPE>
<html>
<head>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
<link href="css/style.css" rel="stylesheet">
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script src="js/carousel-slider.js"></script>
</head>
<body>
<div class="container" style="width:100%;">
<div id="carousel-example-generic" class="carousel slide"  data-interval="5000" data-ride="carousel" data-interval="false">
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
</body>
</html>

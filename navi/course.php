  <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
				<h4 class="page-head-line">Select your course</h4>
				</div>
				</div>
        <div class="alert alert-success" style="font-size:20px;">
        <strong style="margin-left:35%;">WE!</strong> Provide quiz question with select course.
        </div>
				<div>
				<br><br>
						 <?php
						 mysql_connect("localhost","root","");
						 mysql_select_db("pizone");
						 $query = mysql_query("SELECT * FROM  course");
						 while($row = mysql_fetch_array($query))
{
	$course_id=$row['id'];
	   $course_name=$row['course'];
?>
 <form method="post" action="pagination.php">
 <input type="hidden" name="course_id" value="<?php echo $course_id;?>">
<input type="hidden" name="course_name" value="<?php echo $course_name;?>">
<input type="submit" name="submit" value="<?php echo $course_name;?>">
</form>
	<?php
}
	 ?>
				</div>

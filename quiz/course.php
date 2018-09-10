<?php
include("header.php");
if(!isset($_SESSION['name'])){echo '<script>window.location="sign2.php"</script>';;}
?>
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
				 <form method="post"><br><br>
						 <table style="width:50%;padding:100px;align-center;margin-left:405px;margin-top:-60px;" >
						 <tr>
						 <th style="font-size:20px;color:#F0677C">Courses</th>
						 <th style="font-size:20px;color:#F0677C">Marks</th>
						 </tr>
						 <?php
								 include("db_config.php");
						 $query = mysql_query("SELECT * FROM  course");
						 while($row = mysql_fetch_array($query))
{
	$id=$row['id'];
	   $course=$row['course'];
	 ?>
	<tr>
	<td style="padding:3px;">
  	<a href="index0.php?id=<?php echo $id;?>" class="btn btn-primary" style="width:100px;"><?php echo  $course;?></a></td>
<td><?php echo $row['marks'];?></td>
<?php
}
?>
</table>
<div>
</div>
 </form>
				</div>
				</div>
				</div>
<?php include("footer.php");?>

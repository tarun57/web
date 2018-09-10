		<?php
	session_start();
	if(!isset($_SESSION))
	{
		header('location:course.php');
		exit;
	}
?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
<div id="page-wrapper">
  <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header">COURSE</h1>
            </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           SELECT COURSE
						   <form method="post"><br><br>
						 <table style="width:60%;padding:100px;align-center;" >
						 <tr>
						 <th>ID</th>
						 <th>Courses</th>
						 <th>Marks</th>
						 <th colspan="3" width="20%" style="text-align:center;">Action</th>
						 </tr>
<?php
		 include("db_config.php");
 $query = mysql_query("SELECT * FROM  course");
 $i=1;
 while($row = mysql_fetch_array($query))
{
	$id=$row['id'];
	   $course=$row['course'];
	 ?>
	<tr>
		<td>
<?php
echo $i;
$i++;
echo ".";
?>
		</td>
	<td style="padding:3px;">
	<a href="subject.php?id=<?php echo $id;?>" class="btn btn-primary" style="width:100px;"><?php echo  $course;?></a></td>
<td><?php echo $row['marks'];?></td>
<td style="padding:3px;"><a href="update2.php?id=<?php echo $row['id'];?>"><button type="button" class ="btn btn-info">Edit</button></a></td>
<td><a onClick="return confirm('Are you sure you want to delete?')" href='course.php?id=<?php echo $row['id'];?>' type='button' class='btn btn-danger'>Delete</a></td>
<!--<td><a href="course.php?id=<?php echo $row['id'];?>"><button type="button" class ="btn btn-warning">Delete</button></a></td>-->
	<!--<td><a href="update2.php?id=<?php echo $row['id'];?>"><span class ="glyphicon glyphicon-edit"></span></a></td>
	<td><a href="course.php?id=<?php echo $row['id'];?>"><span class ="glyphicon glyphicon-trash"></span></a></td>-->
</>
<?php
}
?>
</table>
<?php
if(isset($_GET['id']))
        {
		$id = $_GET['id'];
$query = mysql_query("DELETE FROM `course` WHERE id='$id'");
 $result = mysql_query($query);
 echo '<script>window.location="course.php";</script>';
 }
		?>
						 </form>
             </div>
					   </div>
					   </div>
					   </div>
					   </div>
<?php include('footer.php');?>

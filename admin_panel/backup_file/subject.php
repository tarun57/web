		<?php
	session_start();
	if(!isset($_SESSION))
	{
		header('location:subject.php');
		exit;
	}
	?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
<div id="page-wrapper">
            <div class="row">
            <div class="col-lg-12">
				 <form method="post"><br><br>
				 <?php
								 include("db_config.php");
						 $id = $_GET['id'];
						 $query = mysql_query("SELECT * FROM  `course` WHERE id='$id'");
						 while($row = mysql_fetch_array($query)){
						 $id=$row['id'];
						 $course=$row['course'];
							?>
<h1 class="page-header"><a href="course.php" style="color:black;">COURSE </a><a href="subject.php?id=<?php echo $id;?>" class="btn btn-primary" style="width:150px;margin-left:10px;height:40px;font-size:20px;"><?php echo  $row['course'];?></a></h1>
<button class="btn btn-primary" name="add" type="button" style="margin-left:40%;margin-bottom:5px;height:40px;font-size:20px;"><a href="add_records.php?id=<?php echo $id;?>" style="color:white;">ADD MORE QUESTION</a></button>
<?php
}
?>
			</div>
                <!-- /.col-lg-12 -->
</div>
            <!-- /.row -->
  <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
						   <table width="100%;">
						 <tr>
					  <th style="border:1px solid black;text-align:center;"><br>ID</th>
						 <th style="border:1px solid black;text-align:center;"><br>Question</th>
						 <th style="border:1px solid black;text-align:center;"><br>Option A</th>
						 <th style="border:1px solid black;text-align:center;"><br>Option B</th>
						 <th style="border:1px solid black;text-align:center;"><br>Option C</th>
						 <th style="border:1px solid black;text-align:center;"><br>Option C</th>
						 <th style="border:1px solid black;text-align:center;"><br>Correct</th>
						 <th colspan="3" style="border:1px solid black;text-align:center;"><br>Action</th>
						 </tr>
						 <?php
						 mysql_connect("localhost","root","");
						 mysql_select_db("pizone");
				       $id = $_GET['id'];
					   //echo "SELECT * FROM quiz WHERE course_id='$id'";
		       		 $query = mysql_query("SELECT * FROM quiz WHERE course_id='$id'");
							 $i=1;
						while($row = mysql_fetch_array($query))
						{
	?>
	<tr><td style="border:1px solid black;text-align:center;">
<?php
echo $i;
$i++;
echo ".";
?></td>
<td style="border:1px solid black;text-align:center;"><br><?php echo $row['question'];?></td>
<td style="border:1px solid black;text-align:center;"><br><?php echo $row['a1'];?></td>
<td style="border:1px solid black;text-align:center;"><br><?php echo $row['a2'];?></td>
<td style="border:1px solid black;text-align:center;"><br><?php echo $row['a3'];?></td>
<td style="border:1px solid black;text-align:center;"><br><?php echo $row['a4'];?></td>
<td style="border:1px solid black;text-align:center;"><br><?php echo $row['correct'];?></td>
<td style="border:1px solid black;text-align:center;"><a href="update.php?id=<?php echo $row['id'];?>&course_id=<?php echo $row['course_id'];?>"><button type="button" class ="btn btn-info">Edit</button></a></td>
<!--<td style="border:1px solid black;text-align:center;"><a href="subject.php?id=<?php echo $row['id'];?>"><button type="button" class ="btn btn-warning">Delete</button></a></td>-->
<td style="border:1px solid black;text-align:center;"><a onClick="return confirm('Are you sure you want to delete?')" href='subject.php?id=<?php echo $row['id'];?>' type='button' class='btn btn-danger'>Delete</a></td>
	</tr>
	<?php
}
?>
</table>
<?php
if(isset($_GET['id']))
        {
		$id = $_GET['id'];
$query = mysql_query("DELETE FROM `quiz` WHERE id='$id'");
 $result = mysql_query($query);
 //echo '<script>window.location="subject.php?id='.$id.'";</script>';
}
		?>
    </div>
					   </div>
					   	</form>
					   </div>
					   </div>
					   </div>
<?php include('footer.php');?>

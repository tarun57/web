 <?php
						include("config.inc.php");
						$query = mysqli_query($connecDB,"SELECT * FROM  course");
						while($row = mysqli_fetch_array($query))
         {
	   $id=$row['id'];
	   $course=$row['course'];
	 ?>
	<tr>
	<td style="padding:3px;">
  	<a href="start.php?id=<?php echo $id;?>" class="btn btn-primary" style="width:100px;"><?php echo  $course;?></a></td>
<td><?php echo $row['marks'];?></td>
<?php
}
?>
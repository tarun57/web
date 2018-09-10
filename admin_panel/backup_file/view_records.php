		<?php
	session_start();

	if(!isset($_SESSION))
	{
		header('location:view_records.php');
		exit;
	}

?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
  <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">QUESTIONS</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">

			<form method="post">
			<table style="width:100%;height:100px;padding:100%;border:1px solid black;border-collapse:collapse;">
<tr>
	<td style="border:1px solid black;text-align:center;"><br>ID</th>
	<th style="border:1px solid black;text-align:center;"><br>Question</th>
	<th style="border:1px solid black;text-align:center;"><br>Option A</th>
	<th style="border:1px solid black;text-align:center;"><br>Option B</th>
	<th style="border:1px solid black;text-align:center;"><br>Option C</th>
	<th style="border:1px solid black;text-align:center;"><br>Option D</th>
	<th style="border:1px solid black;text-align:center;"><br>Correct</th>


	<th colspan="3" style="border:1px solid black;"><br>Action</th>
	</tr>
<br>

<?php
		 include("db_config.php");

$query = mysql_query("SELECT * FROM `quiz` ");

while($row = mysql_fetch_array($query))

{
	?>
	<tr>
	<td style="border:1px solid black;text-align:center;"><br><?php echo $row['id'];?></td>
	<td style="border:1px solid black;text-align:center;"><br><?php echo $row['question'];?></td>
	<td style="border:1px solid black;text-align:center;"><br><?php echo $row['a1'];?></td>
	<td style="border:1px solid black;text-align:center;"><br><?php echo $row['a2'];?></td>
	<td style="border:1px solid black;text-align:center;"><br><?php echo $row['a3'];?></td>
	<td style="border:1px solid black;text-align:center;"><br><?php echo $row['a4'];?></td>
	<td style="border:1px solid black;text-align:center;"><br><?php echo $row['correct'];?></td>

	<td style="border:1px solid black;text-align:center;"><br><a href="update.php?id=<?php echo $row['id'];?>"><span class ="glyphicon glyphicon-edit"></span></a></td>
	<td style="border:1px solid black;text-align:center;"><br><a href="view_records.php?id=<?php echo $row['id'];?>"><span class ="glyphicon glyphicon-trash"></span></a></td>

	</tr>

	<?php
}
?>
</table>
<?php
if(isset($_GET['id']))
        {
		$id = $_GET['id'];
$query = mysql_query("DELETE FROM `Quiz` WHERE id='$id'");
 $result = mysql_query($query);
   echo "value remove";
}
		?>

						  </form>
                       </div>
					   </div>
					   </div>
					   </div>
					   </div>

<?php include('footer.php');?>

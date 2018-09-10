<?php
	session_start();

	if(!isset($_SESSION))
	{
		header('location:update4.php');
		exit;
	}

?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
<script>
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 500);
</script>
<?php
		 include("db_config.php");
$id=$_GET['id'];
$query1 = mysql_query("SELECT * FROM login2 WHERE id='$id'");
while($row1 = mysql_fetch_array($query1))
	{
$name=$row1['name'];
$email=$row1['email'];
	}
	?>
<div id="page-wrapper">
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">UPDATE USER INFO</h1>
</div>
<!-- /.col-lg-12 -->
</div>
<div class="row">
<div class="col-lg-12">
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<div class="form-group">
</div>
</div>
<div class="panel-body">
<div class="row">
<div class="col-lg-6">
<form role="form" method="post">
<div class="form-group">
<label>Your Name:</label>
<?php
                  if(isset($_POST['submit'])){
										$name = $_POST['name'];
									    $email = $_POST['email'];
										$id=$_GET['id'];
										$query=mysql_query("update login2 set name='$name',email='$email' where id='$id'");
										if($query==true)
										{
												echo '<div class="alert alert-success" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<strong>Success!</strong> User has been updated successfully!
												</div>';
										//echo '<script>window.location="course.php";</script>';
										echo "<script>setTimeout(\"location.href = 'tables.php';\",1000);</script>";
										}
										else
										{
										echo "something is going wroong";
										}

										}

										 ?>
<input class="form-control" name="name" id="name" value="<?php echo  $name; ?>" placeholder="Enter text">
</div>
<div class="form-group">
<label>Your Email Address:</label>
<input class="form-control" name="email" id="email" value="<?php echo  $email; ?>" placeholder="Enter text">
</div>
<button type="submit" class="btn btn-success" name="submit" id="submit" >Submit Button</button>
<button type="reset" class="btn btn-warning">Reset Button</button><br><br>
<button type="submit" class="btn btn-danger" style="margin-left:80px;"><a href="tables.php" style="color:white;">Cancel</a></button>
</div>

</form>
</div>
<!-- /.col-lg-6 (nested) -->
</div>
<!-- /.row (nested) -->
</div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
</div>
</div>
<!-- /#page-wrapper -->
<?php
										// move_uploaded_file($tmp_img,"../images/$cat_image");
		// $query=mysql_query("update quiz set question='$question',a1='$a1', a2='$a2', a3='$a3', a4='$a4', correct='$correct'where id='$id'");
										// }
										// else
										// {

		// $query=mysql_query("update quiz set question='$question',a1='$a1', a2='$a2',a3='$a3',a4='$a4',correct='$correct', where id='$id'");

										// }

// 										if($query==true)
// 										{
// 												echo '<div class="alert alert-success alert-dismissable" id="flash-msg">
// <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
// <h4><i class="icon fa fa-check"></i>Success!</h4>
// </div>';
// 													echo '<script>window.location="tables.php";</script>';
// 										}
// 										else
// 										{
// 										echo "something is going wroong";
// 										}
?>

<?php include('footer.php');?>

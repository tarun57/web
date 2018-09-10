<?php
	session_start();
	if(!isset($_SESSION))
	{
		header('location:update2.php');
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
}, 300);
</script>
<?php
		 include("db_config.php");
										$id=$_GET['id'];
										 $query1 = mysql_query("SELECT * FROM course WHERE id='$id'");
											while($row1 = mysql_fetch_array($query1))
											{
													$course=$row1['course'];
												$marks=$row1['marks'];
												}
												?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">UPDATE COURSE</h1>
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
          Your Question
              </div>
            <div class="panel-body">
                <div class="row">
            <div class="col-lg-6">
                <form role="form" method="post">
					<div class="form-group">
						<?php
				          if(isset($_POST['submit'])){
										$course = $_POST['course'];
										$marks = $_POST['marks'];
											$id=$_GET['id'];
											$query=mysql_query("update course set course='$course',marks='$marks' where id='$id'");
											if($query==true)
											{
													echo '<div class="alert alert-success" role="alert">
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													  <strong>Success!</strong> New course has been added successfully!
													</div>';
						//echo '<script>window.location="course.php";</script>';
	echo "<script>setTimeout(\"location.href = 'course.php';\",1000);</script>";
						}
					else
					{
				echo "something is going wroong";
				}
				  }
				?>
        <label>Your Course:</label>
      <input class="form-control" name="course" id="course" value="<?php echo  $course; ?>" placeholder="Enter text">
      </div>
        <div class="form-group">
        <label>Your Course Marks:</label>
            <input class="form-control" name="marks" id="marks" value="<?php echo  $marks; ?>" placeholder="Enter text">
          </div>
		<button type="submit" class="btn btn-success" name="submit" id="submit" >Submit Button</button>
      <button type="reset" class="btn btn-warning">Reset Button</button>
			<button type="submit" class="btn btn-danger"><a href="course.php" style="color:white;">Cancel</a></button>
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
?>
<?php include('footer.php');?>

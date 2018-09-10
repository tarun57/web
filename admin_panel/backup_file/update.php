<?php
	session_start();

	if(!isset($_SESSION))
	{
		header('location:update.php');
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
											$query1 = mysql_query("SELECT * FROM quiz WHERE id='$id'");
											while($row1 = mysql_fetch_array($query1))
											{
											  $question=$row1['question'];
												$a1=$row1['a1'];
												$a2=$row1['a2'];
												$a3=$row1['a3'];
												$a4=$row1['a4'];
												$correct=$row1['correct'];
											}
												?>
					<div id="page-wrapper">
					<div class="row">
					<div class="col-lg-12">
                    <h1 class="page-header">UPDATE QUESTION</h1>
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
                                <div class="col-lg-12">
                                    <form role="form" method="post">
									<div class="form-group">
                                            <label>Write question here.</label>
                                            <input class="form-control" name="a" id="a" value="<?php echo  $question; ?>"placeholder="Enter text" required="required">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Your Option A:</label>
                                            <input class="form-control" name="b" id="b" value="<?php echo  $a1; ?>" placeholder="Enter text" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label>Your Option B:</label>
                                            <input class="form-control" name="c" id="c" value="<?php echo  $a2; ?>" placeholder="Enter text" required="required">
                                        </div>
										<div class="form-group">
                                            <label>Your Option C:</label>
                                            <input class="form-control" name="d" id="d" value="<?php echo  $a3; ?>" placeholder="Enter text" required="required">
                                        </div>
										<div class="form-group">
                                            <label>Your Option D:</label>
                                            <input class="form-control" name="e" id="e" value="<?php echo  $a4; ?>" placeholder="Enter text" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label>File input</label>
                                            <input type="file">
                                        </div>
										<div class="form-group">
                                      <label>Answer:</label>
      <input class="form-control" name="f" id="f" value="<?php echo  $correct; ?>" placeholder="Enter text" required="required">
                                        </div>
			<button type="submit" class="btn btn-success" name="submit" id="submit">Submit Button</button>
                                        <button type="reset" class="btn btn-warning">Reset Button</button>
			<button type="submit" class="btn btn-danger"><a href="subject.php?id=<?php echo $id;?>" style="color:white;">Cancel</a></button>
										</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php
                    if(isset($_POST['submit'])){
										$course_id = $_GET['course_id'];
										$question = $_POST['a'];
										$a1 = $_POST['b'];
									  $a2 = $_POST['c'];
										$a3 = $_POST['d'];
										$a4 = $_POST['e'];
										$correct = $_POST['f'];
										$id=$_GET['id'];
										$query=mysql_query("update quiz set question='$question',a1='$a1',a2='$a2',a3='$a3',a4='$a4',correct='$correct' where id='$id'");
										if($query==true)
										{
											echo '<div class="alert alert-success" role="alert">
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											  <strong>Success!</strong> New course has been added successfully!
											</div>';
echo '<script>window.location="subject.php?id='.$course_id.'"</script>';
//echo "<script>setTimeout(\"location.href ='course.php?id=.$course_id.;\",1000);</script>";
										}
										else
										{
										echo "something is going wrong";
										}
										}
										?>
										<?php include('footer.php');?>

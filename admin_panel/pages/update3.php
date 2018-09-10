<?php
	session_start();

	if(!isset($_SESSION))
	{
		header('location:update3.php');
		exit;
	}

?>
<?php include('header.php');?>
<?php include('sidebar.php');?>

											<?php
											 include("db_config.php");
											$id=$_GET['id'];
											$query1 = mysql_query("SELECT * FROM setting WHERE id='$id'");
											while($row1 = mysql_fetch_array($query1))
											{
											   $email=$row1['email'];
												$contact=$row1['contact'];

											}
												?>
					<div id="page-wrapper">
					<div class="row">
					<div class="col-lg-12">
                    <h1 class="page-header">Update Setting</h1>
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
					Your Setting
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="post">
									<div class="form-group">
                                            <label>Setting</label>
                                            <input class="form-control" name="email" id="email" value="<?php echo  $email; ?>" required="required">
                                            <p class="helpSetting-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Your Option A:</label>
                                            <input class="form-control" name="contact" id="contact" value="<?php echo  $contact; ?>" required="required">
                                        </div>
                                      	<button type="submit" class="btn btn-success" name="submit" id="submit">Submit Button</button>
                                        <button type="reset" class="btn btn-warning">Reset Button</button><br><br>
																				<button type="submit" class="btn btn-danger" style="margin-left:80px;"><a href="setting.php" style="color:white;">Cancel</a></button>
										</div>
                                <!-- /.col-lg-6 (nested) -->

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
                                        if(isset($_POST['submit'])){
										$id = $_GET['id'];
										$email = $_POST['email'];
										$contact = $_POST['contact'];

			$query=mysql_query("update setting set email='$email',contact='$contact' where id='$id'");
										// move_uploaded_file($tmp_img,"../images/$cat_image");
		// $query=mysql_query("update quiz set question='$question',a1='$a1', a2='$a2', a3='$a3', a4='$a4', correct='$correct'where id='$id'");
										// }
										// else
										// {
										// $query=mysql_query("update quiz set question='$question',a1='$a1', a2='$a2',a3='$a3',a4='$a4',correct='$correct', where id='$id'");
										// }
										if($query==true)
										{

											echo '<div class="alert alert-success alert-dismissable" id="flash-msg">
<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
<h4><i class="icon fa fa-check"></i>Success!</h4>
</div>';
echo '<script>window.location="setting.php?id='.$id.'"</script>';

										}
										else
										{
										echo "something is going wroong";
										}
										}
										?>
										<?php include('footer.php');?>

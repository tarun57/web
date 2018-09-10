		<?php
	session_start();
	if(!isset($_SESSION))
	{
		header('location:add_records.php');
		exit;
	}
?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 2000);
</script>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ADD Question</h1><button class="btn btn-danger" style="margin-left:90%;margin-bottom:5px;"><a href="course.php" style="color:white;">Go BACK</a></button>
										<?php
												 include("db_config.php");
										if(isset($_POST['insert'])){
											 $q = $_POST['q'];
										 $a = $_POST['a'];
										  $b = $_POST['b'];
										  $c = $_POST['c'];
										  $d = $_POST['d'];
										  $e = $_POST['e'];
										  $f = $_POST['f'];
										$query = mysql_query("INSERT INTO `quiz`(`course_id`, `question`, `a1`, `a2`, `a3`, `a4`, `correct`) VALUES ('$q','$a','$b','$c','$d','$e','$f')");
										$result = mysql_query($query);
										if($query == true){
										echo '<div class="alert alert-success" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<strong>Success!</strong> New question has been added successfully!
										</div>';
										}
										else{
										echo "<script>alert('Something going wrong');</script>";
										}
										}
										?>
								</div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
					<div class="panel-heading">
						 <div class="form-group">
						     <form role="form" method="post" enctype="multipart/form-data" name="myForm"  onsubmit="return validateForm()">
                                             <label>Selects</label>
                                            <select  id="q" name="q" class="form-control">
											<option>Select course</option>
											<?php
											$id=$_GET['id'];
											 include("db_config.php");
											 $query = mysql_query("SELECT * FROM course ");
											 while($row=mysql_fetch_array($query))
											 {
											 ?>
											 <?php if($id==$row["id"]) {?>
					<option <?php if($id==$row["id"]) { echo 'selected'; } ?> value="<?php echo $row["id"]; ?>"><?php echo $row["course"];?></option>
                                            <?php }
												else { ?>
											 <option value="<?php echo $row["id"]; ?>"><?php echo $row["course"];?></option>
											 <?php
											 }
											 }
											 ?>
											</select>
											</div>
                            Your Question
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
								<div class="form-group">
                                        <label>Write question here.</label>
                                        <input class="form-control" name="a" id="a" placeholder="Enter question">
																					<p class="help-block"></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Your Option A:</label>
                                        <input class="form-control" name="b" id="b" placeholder="Option A">
                                    </div>
                                    <div class="form-group">
                                        <label>Your Option B:</label>
                                        <input class="form-control" name="c" id="c" placeholder="Option B">
                                    </div>
								<div class="form-group">
                                        <label>Your Option C:</label>
                                        <input class="form-control" name="d" id="d" placeholder="Option C">
                                    </div>
								<div class="form-group">
                                        <label>Your Option D:</label>
                                        <input class="form-control" name="e" id="e" placeholder="Option D">
                                    </div>
                                    <div class="form-group">
                                        <label>File input</label>
                                        <input type="file" name="file" id="file">
                                    </div>
																		<div class="form-group">
										                  <label>Correct:</label>
										                  <input class="form-control" name="f" id="f" placeholder="Answer">
										                   </div>
                                    <button type="submit" class="btn btn-success" name="insert">Submit Button</button>
                                    <button type="reset" class="btn btn-warning">Reset Button</button>

<?php
$conn=mysql_connect("localhost","root","") or die("Could not connect");
mysql_select_db("pizone",$conn) or die("could not connect database");
if(isset($_POST["insert"])){
		echo $filename=$_FILES["file"]["tmp_name"];
		 if($_FILES["file"]["size"] > 0)
		 {
		  	$file = fopen($filename, "r");
	         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
	          //It wiil insert a row to our subject table from our csv file`
	           $sql = "INSERT into quiz (`course_id`,`question`, `a1`, `a2`, `a3`,`a4`, `correct`)
	            	values('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]')";
	         //we are using mysql_query function. it returns a resource on true else False on error
	          $result = mysql_query( $sql, $conn );
				if(! $result )
				{
					echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"add_records.php\"
						</script>";
				}
			}
	         fclose($file);
	         //throws a message if data successfully imported to mysql database from excel file
	         echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"add_records.php\"
					</script>";
			 //close of connection
			mysql_close($conn);
		 }
	}
?>
</form>
                                </div>
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
				<script type="text/javascript">
				$('form').on('submit', function (e) {
							 var focusSet = false;
							 if (!$('#a').val()) {
					 		if ($("#b").parent().next(".validation").length == 0) // only add if not added
					 		{
					 		$("#a").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter your question</div>");
					 		}
					 		e.preventDefault(); // prevent form from POST to server
					 		$('#a').focus();
					 		focusSet = true;
					 		} else {
					 		$("#a").parent().next(".validation").remove(); // remove it
					 		}
				if (!$('#b').val()) {
				if ($("#b").parent().next(".validation").length == 0) // only add if not added
				{
				$("#b").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter option A</div>");
				}
				e.preventDefault(); // prevent form from POST to server
				$('#b').focus();
				focusSet = true;
				} else {
				$("#b").parent().next(".validation").remove(); // remove it
				}
				if (!$('#c').val()) {
				if ($("#c").parent().next(".validation").length == 0) // only add if not added
				{
				$("#c").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter option B</div>");
				}
				e.preventDefault(); // prevent form from POST to server
				$('#c').focus();
				focusSet = true;
				} else {
				$("#c").parent().next(".validation").remove(); // remove it
				}
				if (!$('#d').val()) {
				if ($("#d").parent().next(".validation").length == 0) // only add if not added
				{
				$("#d").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter option C</div>");
				}
				e.preventDefault(); // prevent form from POST to server
				$('#d').focus();
				focusSet = true;
				} else {
				$("#d").parent().next(".validation").remove(); // remove it
				}
				if (!$('#e').val()) {
				if ($("#e").parent().next(".validation").length == 0) // only add if not added
				{
				$("#e").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter option D</div>");
				}
				e.preventDefault(); // prevent form from POST to server
				$('#e').focus();
				focusSet = true;
				} else {
				$("#e").parent().next(".validation").remove(); // remove it
				}
				if (!$('#f').val()) {
				if ($("#f").parent().next(".validation").length == 0) // only add if not added
				{
				$("#f").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter corect answer</div>");
				}
				e.preventDefault(); // prevent form from POST to server
				$('#f').focus();
				focusSet = true;
				} else {
				$("#f").parent().next(".validation").remove(); // remove it
				}
				});
				</script>
<?php include('footer.php');?>

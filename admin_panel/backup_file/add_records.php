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
function validateForm() {
    var x = document.forms["myForm"]["a"].value;
      var b = document.forms["myForm"]["b"].value;
			  var c = document.forms["myForm"]["c"].value;
				  var d = document.forms["myForm"]["d"].value;
					  var e = document.forms["myForm"]["e"].value;
						  var f = document.forms["myForm"]["f"].value;
    if (x == "") {
      $("#a_error").css('display','block');
          //alert("Name must be filled out");
      //  $('.alert-danger').html('please fill lastname').fadeIn().delay(3000).fadeOut('slow');
        return false;
    }
    else {
    $("#a_error").css('display','none');
    }
    if (b == "") {
        $("#b_error").css('display','block');
    //    alert("email must be filled out");
        return false;
    }
    else {
      $("#b_error").css('display','none');
    }
		if (c == "") {
        $("#c_error").css('display','block');
    //    alert("email must be filled out");
        return false;
    }
    else {
      $("#c_error").css('display','none');
    }
		if (d == "") {
        $("#d_error").css('display','block');
    //    alert("email must be filled out");
        return false;
    }
    else {
      $("#d_error").css('display','none');
    }
		if (e == "") {
        $("#e_error").css('display','block');
    //    alert("email must be filled out");
        return false;
    }
    else {
      $("#e_error").css('display','none');
    }
		if (f == "") {
        $("#f_error").css('display','block');
    //    alert("email must be filled out");
        return false;
    }
    else {
      $("#f_error").css('display','none');
    }
}
</script>
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
                                        <input class="form-control" name="a" placeholder="Enter question">
																				<p id="a_error" style="color:red;display:none;">
																				 Please enter your Question.</p>
																					<p class="help-block"></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Your Option A:</label>
                                        <input class="form-control" name="b" placeholder="Option A">
																				<p id="b_error" style="color:red;display:none;">
																				 Please enter your Option A.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Your Option B:</label>
                                        <input class="form-control" name="c" placeholder="Option B">
																				<p id="c_error" style="color:red;display:none;">
																					Please enter your Option B.</p>
                                    </div>
								<div class="form-group">
                                        <label>Your Option C:</label>
                                        <input class="form-control" name="d" placeholder="Option C">
																				<p id="d_error" style="color:red;display:none;">
																					Please enter your Option C.</p>
                                    </div>
								<div class="form-group">
                                        <label>Your Option D:</label>
                                        <input class="form-control" name="e" placeholder="Option D">
																				<p id="e_error" style="color:red;display:none;">
																				Please enter your Option D.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>File input</label>
                                        <input type="file" name="file" id="file">
                                    </div>
																		<div class="form-group">
										                  <label>Correct:</label>
										                  <input class="form-control" name="f" placeholder="Answer">
																			<p id="f_error" style="color:red;display:none;">
																				Please enter your Correct answer.</p>
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
<?php include('footer.php');?>

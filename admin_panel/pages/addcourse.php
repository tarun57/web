		<?php
	session_start();
	if(!isset($_SESSION))
	{
		header('location:addcourse.php');
		exit;
	}
?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
// function validateForm() {
//     var course = document.forms["myForm"]["course"].value;
//       var marks = document.forms["myForm"]["marks"].value;
//     if (course == "") {
//       $("#name_error").css('display','block');
//           //alert("Name must be filled out");
//       //  $('.alert-danger').html('please fill lastname').fadeIn().delay(3000).fadeOut('slow');
//         return false;
//     }
//     else {
//     $("#name_error").css('display','none');
//     }
//     if (marks == "") {
//         $("#email_error").css('display','block');
//     //    alert("email must be filled out");
//         return false;
//     }
//     else {
//       $("#email_error").css('display','none');
//     }
// }
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
                    <h1 class="page-header">ADD NEW COURSE</h1>
                </div>
            </div>
						<div class="row">
      <div class="col-lg-12">
          <div class="panel panel-default">
              <div class="panel-heading">
                ENTER COURSE HERE
              </div>
              <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
									<?php
							include("db_config.php");
							if(isset($_POST['submit'])){
							$course = $_POST['course'];
							$marks = $_POST['marks'];
							$query = mysql_query("INSERT INTO `course`(`course`, `marks`) VALUES ('$course' ,'$marks')");
							$result = mysql_query($query);
							if($query==true)
	{
	 $success = '<div class="alert alert-success" role="alert">
	 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	 <strong>Success!</strong> New question has been added successfully!
	 </div>';
	}
	else
	{
		 $success = "Message Sending Failed, try again";
	    echo ''.mysql_error();
	}
	echo  $success;
							}
					?>
                    <form role="form" method="post" name="myForm" onsubmit="return validateForm()">
												<div class="form-group">
                            <label>Course</label>
                            <input class="form-control" placeholder="Enter course" name="course" id="course">
														<!-- <p id="name_error" style="color:red;display:none;">
														  Please enter your Course .
														</p> -->
											  </div>
                        <div class="form-group">
                            <label>Marks</label>
                            <input class="form-control" placeholder="Enter marks" name="marks" id="marks">
														<!-- <p id="email_error" style="color:red;display:none;">
														    Please enter your Marks .
														</p> -->
                        </div>
    <input type="submit" class="btn btn-success" name="submit" />
    <button type="reset" class="btn btn-warning">Reset Button</button>
		<button class="btn btn-danger" ><a href="course.php" style="color:white;">Go BACK</a></button>
                </form>
                </div>
                <div class="col-lg-6">
								</div>
								</div>
                </div>
                </div>
                </div>
                </div>
            </div>
        </div>
		</div>
		<script type="text/javascript">
		$('form').on('submit', function (e) {
					 var focusSet = false;
		if (!$('#course').val()) {
		if ($("#course").parent().next(".validation").length == 0) // only add if not added
		{
		$("#course").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter course name</div>");
		}
		e.preventDefault(); // prevent form from POST to server
		$('#course').focus();
		focusSet = true;
		} else {
		$("#course").parent().next(".validation").remove(); // remove it
		}
		if (!$('#marks').val()) {
		if ($("#marks").parent().next(".validation").length == 0) // only add if not added
		{
		$("#marks").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter course marks</div>");
		}
		e.preventDefault(); // prevent form from POST to server
		$('#marks').focus();
		focusSet = true;
		} else {
		$("#marks").parent().next(".validation").remove(); // remove it
		}
		});
		</script>
	<?php include('footer.php');?>

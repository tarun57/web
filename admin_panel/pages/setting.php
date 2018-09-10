<?php
session_start();
if(!isset($_SESSION))
{
header('location:setting.php');
exit;
}
?>
<?php include("header.php");?>
<?php include("sidebar.php");?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
function validateForm() {
      var email = document.forms["myForm"]["email"].value;
        var contact = document.forms["myForm"]["contact"].value;
    if (email == "") {
        $("#email_error").css('display','block');
    //    alert("email must be filled out");
        return false;
    }
    else {
      $("#email_error").css('display','none');
    }
    if (contact == "") {
        $("#contact_error").css('display','block');
    //    alert("email must be filled out");
        return false;
    }
    else {
      $("#contact_error").css('display','none');
    }
}
</script>
<form method="post" name="myForm" onsubmit="return validateForm()">
  <div id="page-wrapper">
             <div class="row">
               <div class="col-lg-12">
                   <h1 class="page-header">Setting</h1>
               </div>
Email:
<input class="form-control" name="email">
<p id="email_error" style="color:red;display:none;">
This field is required.
</p>
Contact:
<input class="form-control" name="contact">
<p id="contact_error" style="color:red;display:none;">
This field is required.
</p>
<br>
<input type="submit" class="btn btn-primary" style="font-size:20px;" name="submit" value="Submit">
<br><br>
<?php
		 include("db_config.php");
if(isset($_POST['submit'])){
$email = $_POST['email'];
  $contact = $_POST['contact'];
$query = mysql_query("UPDATE `setting` SET `email`='$email',`contact`='$contact' WHERE 1");
   $result = mysql_query($query);
}
?>
<table class="table table-striped table-bordered table-hover">
<tr><th>Email</th>
  <th>Contact</th>
  <th>Action</th></tr>
    <?php
mysql_connect("localhost","root","");
mysql_select_db("pizone");
$query = mysql_query("SELECT * FROM setting");
while($row = mysql_fetch_array($query)){
  ?>
<tr><td><?php echo $row['email'];?></td>
<td><?php echo $row['contact'];?></td>
<td><a href="update3.php?id=<?php echo $row['id'];?>"><input type="button" name="button" value="Update" class ="btn btn-info"></a>
<a onClick="return confirm('Are you sure you want to delete?')" href='setting.php' type='button' class='btn btn-danger'>Delete</a></td>
<!--&emsp;<a href="setting.php?id=<?php echo $row['id'];?>"><input type="button" name="button" value="Delete" class ="btn btn-warning"></a></td>-->
</tr>
<?php
}
  ?>
<!--<?php
mysql_connect("localhost","root","");
mysql_select_db("pizone");
if(isset($_POST['submit'])){
  $email = $_POST['email'];
    $contact = $_POST['contact'];
$query = mysql_query("UPDATE `setting` SET `email`= '$email',`contact`= '$contact' ");
if($query)
{
echo "value update";
} else
{ echo "value not update";
}
}
?>-->

  </table>
  <?php
  if(isset($_GET['id']))
          {
  		$id = $_GET['id'];
  $query = mysql_query("DELETE FROM `setting` WHERE id='$id'");
   $result = mysql_query($query);
  }
  		?>

</div>
</div>
</form>
<?php include("footer.php");?>

<?php
session_start();
if(!isset($_SESSION))
{
header('location:profile.php');
exit;
}
?>
<?php include("header.php");?>
<?php include("sidebar.php");?>

<form method="post">
<div id="page-wrapper">
             <div class="row">
               <div class="col-lg-12">
                 <h1 class="page-header">Admin profile</h1>
    <?php
  		 include("db_config.php");
    $query = mysql_query("SELECT * FROM admin LIMIT 1");
    while($row = mysql_fetch_array($query)){
?>
<label>First Name:</label>
<input type="text"  name="first" class="col-md-12" value="<?php echo $row['first'];?>" disabled><br><br>
<label>Last Name:</label>source
<input type="text"  name="last" class="col-md-12" value="<?php echo $row['last'];?>" disabled><br><br>
<label>User Email:</label>
<input type="text"  name="name" class="col-md-12" value="<?php echo $row['email'];?>" disabled><br><br>
<label>Password:</label>
<input type="text" class="col-md-12" name="password" value="<?php echo $row['password'];?>" active><br><br><br><br>
<input type="submit" class="btn btn-primary" name="submit" value="Change password">
<?php
}
    ?>
               </div>
             </div>
           </div>
           <?php
           mysql_connect("localhost","root","");
           mysql_select_db("pizone");
           if(isset($_POST['submit'])){

              $password = $_POST['password'];
           $query = mysql_query("UPDATE `admin` SET `password`= '$password' ");
           if($query)
{
echo "value update";
} else
{ echo "value not update";
}


           }
           ?>
</form>
<?php include("footer.php");?>

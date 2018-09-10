<?php
session_start();
if(!isset($_SESSION))
{
header('location:menu.php');
exit;
}
?>
<?php include("header.php");?>
<?php include("sidebar.php");?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
function validateForm() {
    var x = document.forms["myForm"]["menu"].value;
      var link = document.forms["myForm"]["link"].value;
    if (x == "") {
      $("#menu_error").css('display','block');
          //alert("Name must be filled out");
      //  $('.alert-danger').html('please fill lastname').fadeIn().delay(3000).fadeOut('slow');
        return false;
    }
    else {
    $("#menu_error").css('display','none');
    }
    if (link == "") {
        $("#link_error").css('display','block');
    //    alert("email must be filled out");
        return false;
    }
    else {
      $("#link_error").css('display','none');
    }
}
</script>
<form method="post" onsubmit="return validateForm()" name="myForm">
  <div id="page-wrapper">
             <div class="row">
               <div class="col-lg-12">
<h1 class="page-header">Your menu</h1>
               </div>
              Menu:
               <input class="form-control" class="col-md-6" name="menu">
               <p id="menu_error" style="color:red;display:none;">
                 Menu is required.</p>
               <br>
               Link:
                <input class="form-control" class="col-md-6" name="link">
                <p id="link_error" style="color:red;display:none;">
                Link is required.</p>
                <br>
          <input type="submit" class="btn btn-primary" style="font-size:20px;" name="submit" value="Submit">
             <br><br>
             <?php
            		 include("db_config.php");
              if(isset($_POST['submit'])){
              $menu = $_POST['menu'];
              $link = $_POST['link'];
              $query = mysql_query("INSERT INTO `menu`(`name`,`link`) VALUES ('$menu','$link') ");
              $result = mysql_query($query);
               }
                 ?>
                 <table class="table table-striped table-bordered table-hover">
                   <tr><th>Menu</th>
                      <th>Link</th>
                   <th colspan='3'>Action</th></tr>
<?php
mysql_connect("localhost","root","");
mysql_select_db("pizone");
$query = mysql_query("SELECT * FROM menu");
while($row = mysql_fetch_array($query)){
 ?>
 <tr><td><?php echo $row['name'];?></td>
   <td><?php echo $row['link'];?></td>
<td><a href="editmenu.php?id=<?php echo $row['id'];?>"><input type="button" name="button" value="Update" class ="btn btn-info"></a>
<a onClick="return confirm('Are you sure you want to delete?')" href='menu.php' type='button' class='btn btn-danger'>Delete</a></td>
<!--<a onClick="return confirm('Are you sure you want to delete?')" href='menu.php?id=<?php echo $row['id'];?>' type='button' class='btn btn-danger'>Delete</a></td>-->
                 </tr>
                   <?php
                 }
                     ?>
                   </table>
                   <?php
                   if(isset($_GET['id']))
                           {
                   		$id = $_GET['id'];
                   $query = mysql_query("DELETE FROM `menu` WHERE id='$id'");
                    $result = mysql_query($query);

                   }
                   		?>
             </div>
           </div>
</form>

<?php include("footer.php");?>

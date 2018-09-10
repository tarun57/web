		<?php
	session_start();
	if(!isset($_SESSION))
	{
		header('location:image.php');
		exit;
	}
?>
<?php include("header.php")?>
<?php include("sidebar.php")?>
	<div id="wrap">
	<div class="container">
		<div class="row">
			<div class="span3 hidden-phone"></div>
			<div class="span6" id="form-login">
				<form class="form-inline" method="POST" enctype="multipart/form-data" style="margin-left:10%;height:450px;">
					<fieldset>
						<div class="control-group"style="margin-left:20%;margin-top:%;width:10%;">
							<div class="form-group" style="font-size:20px;">
							<label for="email">Select Image:</label>
							<input type="file" name="cat_image" class="form-control" required="required">
						  </div><br>
						  <br>
						   <br>
							<div class="form-group" style="font-size:20px;">
							<label for="pwd">Description:</label>
							<textarea raw="10" col="80" name="cat_desc" style="width:500px;height:100px;" required="required"></textarea>
						  </div>
						<div class="control-group">
							<div class="controls" style="margin-left:;"><br>
							<button type="submit" id="submit" name="submit" style="font-size:20px;" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
			<div class="span3 hidden-phone"></div>
		</div>
		<?php
											 include("db_config.php");
                    if(isset($_POST['submit'])){
											//echo $cat_name = $_POST['cat_name'];
                    echo $cat_desc = $_POST['cat_desc'];
                    echo $cat_image = $_FILES['cat_image']['name'];
                    $tmp_img = $_FILES['cat_image']['tmp_name'];
                    move_uploaded_file($tmp_img,"image/$cat_image");
                    $query = "insert into images(cat_image,cat_desc)"
                            . " values('$cat_image','$cat_desc')";
                    $run = mysql_query($query);
                    if($run){
                        echo "<script>alert('New Image is Added.')</script>";
                        echo "<script type='text/javascript' language='javascript'>
                                    window.location = 'image.php';
                                   </script>";
                                        }
                                        }
                                        ?>
<div style="margin-left:0%;">
     <?php
mysql_connect("localhost","root","");
mysql_select_db("pizone");
$query=mysql_query("SELECT * FROM images");
                 while($row = mysql_fetch_array($query))
                {
                        ?>
                        <tr >
                        <td >
     <img src="image/<?php echo $row['cat_image'];?>" style="margin-left:17%; margin-top:30px;" height='320px' width='350px'></td>
	<td><a onClick="return confirm('Are you sure you want to delete?')" href="image.php?id=<?php echo $row['id']?>"><span class="glyphicon glyphicon-remove" style="top:-150px;right:20px;"></span>
	 <!--<a onClick="return confirm('Are you sure you want to delete?')" href='image.php?id=<?php echo $row['id'];?>' type='button' class='btn btn-danger'>Delete</a></td>-->

		 </tr>
		 <?php
                }
                ?>
				<?php
if(isset($_GET['id']))
        {
		$id = $_GET['id'];
$query = mysql_query("DELETE FROM `images` WHERE id='$id'");
 $result = mysql_query($query);
}
		?>
</div>
<?php include("footer.php")?>

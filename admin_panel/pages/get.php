
	<?php
	session_start();

	if(!isset($_SESSION))
	{
		header('location:get.php');
		exit;
	}

?><?php include("header.php")?>
<?php include("sidebar.php")?>

<div style="margin-left:20%;">
     <?php
		 include("db_config.php");
$query=mysql_query("SELECT * FROM images");
                 while($row = mysql_fetch_array($query))
                {
                        ?>


                        <tr >

                        <td >
     <img src="image/<?php echo $row['cat_image'];?>" style="margin-left:5%; margin-top:50px;" height='320px' width='350px'></td>
	 <td><a href="get.php?id=<?php echo $row['id']?>"><span class="glyphicon glyphicon-remove"></span>

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

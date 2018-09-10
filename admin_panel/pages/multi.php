<?php
session_start();
if(!isset($_SESSION))
{
header('location:multi.php');
exit;
}
?>
<?php include("header.php");?>
<?php include("sidebar.php");?>

<?php
mysql_connect("localhost","root","");
mysql_select_db("pizone");
if(isset($_FILES['files'])){
    $errors= array();
	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
		$file_name = $key.$_FILES['files']['name'][$key];
      // $img_name= implode(",",$file_name);
		$file_size =$_FILES['files']['size'][$key];
		$file_tmp =$_FILES['files']['tmp_name'][$key];
		$file_type=$_FILES['files']['type'][$key];
        if($file_size > 2097152){
			$errors[]='File size must be less than 2 MB';
        }
        $query="INSERT into images (`cat_image`,`cat_desc`) VALUES('$file_name','$file_size'); ";
        $desired_dir="user_data";
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);		// Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"uploads/".$file_name);
            }else{									//rename the file if another one exist
                $new_dir="user_data/".$file_name.time();
                 rename($file_tmp,$new_dir) ;
            }
            mysql_query($query);
        }else{
                print_r($errors);
        }
    }
	if(empty($error)){
		echo "Success";
	}
}
?>

<div id="page-wrapper">
           <div class="row">
               <div class="col-lg-12">
<form action="" method="POST" enctype="multipart/form-data">
	<input type="file" name="files[]" multiple="" />
  Description:<input type="text" name="cat_desc">
	<input type="submit"/>
</form>
</div>
</div>
</div>
<?php $query=mysql_query("SELECT * FROM images");
                 while($row = mysql_fetch_array($query))
                {
                  ?>
        <img src="uploads/<?php echo $row['cat_image'];?>" style="margin-left:17%; margin-top:30px;" height='320px' width='350px'></td>
            <?php
          }?>
<?php include("footer.php");?>

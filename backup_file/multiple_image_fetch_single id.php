<?php
mysql_connect("localhost","root","");
mysql_select_db("pizone2");
if(isset($_FILES['files'])){
  $errors= array();
   $name=$_FILES['files']['name'];
   $img_name= implode(",",$name);
  $file_tmp =$_FILES['files']['tmp_name'];
  // print_r($file_tmp);
$c=array_combine($name,$file_tmp);
//print_r($c);
   foreach ($c as $key => $value) {
     move_uploaded_file($value,"uploads/".$key);
   }
  $img_name= implode(",",$name);
	//	$file_name = $_FILES['files']['name'];
		 $file_size =$_FILES['files']['size'];
		$file_tmp =$_FILES['files']['tmp_name'];
		 $file_type=$_FILES['files']['type'];
   //move_uploaded_file($file_tmp,"uploads/$cat_image");
   $in_ch=mysql_query("INSERT into upload_data (`FILE_NAME`) VALUES('$img_name')");
           // $desired_dir="user_data";
        // if(empty($errors)==true){
        //     if(is_dir($desired_dir)==false){
        //         mkdir("$desired_dir", 0700);		// Create directory if it does not exist
        //     }
        //     if(is_dir("$desired_dir/".$file_name)==false){
        //         move_uploaded_file($file_tmp,"uploads/".$img_name);
        //     }else{									//rename the file if another one exist
        //         $new_dir="user_data/".$file_name.time();
        //          rename($file_tmp,$new_dir) ;
        //     }
        //     mysql_query($query);
        // }else{
        //         print_r($errors);
        // }
	if(empty($error)){
		echo "Success";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<form action="" method="POST" enctype="multipart/form-data">
	<input type="file" name="files[]" multiple="" />
	<input type="submit"/>
</form>
<!--<?php
$query=mysql_query("SELECT * FROM upload_data");
                 while($row = mysql_fetch_array($query))
                {
                        ?>
     <img src="uploads/<?php echo  $row['FILE_NAME'] ;?>">
<?php
   //echo ( $img_name[0]);
} ?>-->
<?php
$sql=mysql_query("SELECT * FROM `upload_data`");
$result=mysql_fetch_array($sql);
/*$images = explode(",",$result['image']);
if(sizeof($images) > 0 ){
  foreach($images as $image){
   echo '<img src="photo/'.$image.'" height="50" width="50">' ;
   echo "<br />";
  }
}*/
$temp = explode(',',$result['FILE_NAME'] );
foreach($temp as $image){
    $images[]="uploads/".trim( str_replace( array('[',']') ,"" ,$image ) );
}
//now your array of images cotaines to full source to each image
foreach($images as $image){
  echo "<img src='{$image}' height='100' width='200' style='padding:10px;'/>";
  //echo "<a href='up.php?id= id'><span class='glyphicon glyphicon-remove'></span>";
}
?>
<!--<?php
// if(isset($_GET['id']))
//     {
//       $id = $_GET['id'];
//        $res = mysql_query("select * from upload_data where id='1'");
//        $row = mysql_fetch_assoc($res);
//        $image = explode(',',$row['FILE_NAME']);
//        print_r($image);
//    }
   ?>-->
</body>
</html>

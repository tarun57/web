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
<?php
$image=array();
$sql=mysql_query("SELECT * FROM `upload_data`");
while($result=mysql_fetch_array($sql)){
 $image[]=$result['FILE_NAME'];
}

//print_r($image);
$cc=array();
foreach ($image as $bb)
{
$cc[]=$bb;

}
//print_r($cc);

$fff= implode(",",$cc);


$myArray3 = explode(',', $fff);

foreach($myArray3 as $val11)
{
  //echo $val11;
?>
<img src="uploads/<?php echo $val11;?>" width=100; height=100>
<?php
}




// foreach ($image as $b) {
// $c[]=$b;
//
// }
// $s=array();
// foreach ($c as $key1 => $value) {
//   $s[]=$key1;
// }
//print_r($s);

//$xx= implode(",",$s);
//echo chop($xx,"jpg");
//echo $fff= implode(",",$c);
//$myArray3 = explode(',', $fff);


//print_r($myArray3);
//foreach($myArray3 as $val11)
//{
  //echo $val11;
?>
<!--<img src="uploads/<?php //echo $val11;?>" width=100; height=100>-->
<?php
//}





// $image1=array();
// $image2=array();
//  $image1[]=$image[0];
// echo "<br />";
// $image2[]=$image[1];
//
// //print_r($image1);
//
// $image1n= implode(",",$image1);
//
//  $image2n= implode(",",$image2);
//
//
// $myArray1 = explode(',', $image1n);
// //print_r($myArray1);
//
// $myArray2 = explode(',', $image2n);
// //print_r($myArray2);
//
// $final=array_merge($myArray1,$myArray2);
// //print_r($final);
//
// foreach($final as $val)
// {
?>
<!--<img src="uploads/<?php //echo $val;?>" width=100; height=100>-->
<?php
//}


//print_r(array_merge($image1,$image2));

//$fullimage=array_merge($image1,$image2);


//  print_r($fullimage);

//print_r($image);
//  $new=array();
// foreach ($image as $value) {
//
//   echo $new[]=$value;
//   echo "<br />";
//  }

?>

</body>
</html>

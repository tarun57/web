<html>
<head>
<link href="pagination_style.css" type="text/css" rel="stylesheet"/>
<!--<script type="text/javascript" src="jquery.js"></script>-->
</head>
<body>
<div id="wrapper">
<?php
 $host="localhost";
 $username="root";
 $password="";
 $databasename="pizone";
 $connect=mysql_connect($host,$username,$password);
 $db=mysql_select_db($databasename);
 if(isset($_Get['course_id']))
 {
 $course_id=$_Get['course_id'];
 $select =mysql_query("SELECT * FROM quiz where course_id='$course_id'");
 $total_results=mysql_num_rows($select);
 $row=mysql_fetch_array($select);
 }
?>
<form method="post" id="myform">
<div id="pagination_div">
  <?php echo $row['question'];?>
  <br>
  <input type="radio" id="seconds" name="radio<?php echo $row['id'];?>" class="rbtn" value="<?php echo $row['a1']; ?>"><?php echo $row['a1']; ?><br>
  <input type="radio" id="seconds" name="radio<?php echo $row['id'];?>" class="rbtn" value="<?php echo $row['a2']; ?>"><?php echo $row['a2']; ?> <br>
  <input type="radio" id="seconds" name="radio<?php echo $row['id'];?>" class="rbtn" value="<?php echo $row['a3']; ?>"><?php echo $row['a3']; ?> <br>
  <input type="radio" id="seconds" name="radio<?php echo $row['id'];?>" class="rbtn" value="<?php echo $row['a4']; ?>"><?php echo $row['a4']; ?><br><br><br>
</div>
</form>
<div id="tota_page_div">
 <?php
 for($i=1;$i<=$total_results;$i++)
 {
   if($i==$total_results){
  echo "<input type='button' value='".$i."' onclick='get_data1(".$i.",".$course_id.")'>";
}
else{
  echo "<input type='button' value='".$i."' onclick='get_data(".$i.",".$course_id.")'>";
}
 }
 ?>
</div>
</div>
</body>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
function get_data(no,cid)
{
 $.ajax
 ({
  type:'post',
  url:'get_data.php',
  data:{
   row_no:no,
   cid:cid
  },
  success:function(response) {
	 // alert(response);
   document.getElementById("pagination_div").innerHTML=response;
  }
 });
}
</script>
<script type="text/javascript">
function get_data1(no,cid)
{
	//var cid=$("#c_id").val();
	//alert(cid);
 $.ajax
 ({
  type:'post',
  url:'get_data_last.php',
  data:{
   row_no:no,
   cid:cid
  },
  success:function(response) {
	 // alert(response);
   document.getElementById("pagination_div").innerHTML=response;
  }
 });
}
</script>
<script>
$(document).ready(function(){
  var radios = document.getElementsById("seconds");
  var val = localStorage.getItem('seconds');
  for(var i=0;i<radios.length;i++){
    if(radios[i].value == val){
      radios[i].checked = true;
    }
  }
  $('input[name="seconds"]').on('change', function(){
    localStorage.setItem('seconds', $(this).val());

  });
});
</script>
</html>

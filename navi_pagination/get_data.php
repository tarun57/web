<?php
$host="localhost";
$username="root";
$password="";
$databasename="pizone";
$connect=mysql_connect($host,$username,$password);
$db=mysql_select_db($databasename);
$cid='';
if(isset($_POST['row_no']))
{
 $row=$_POST['row_no'];
}
if(isset($_POST['cid']))
{
$cid=$_POST['cid'];
}
 $row=$row-1;
 $select_data=mysql_query("select * from quiz where course_id='$cid' limit $row,1");
 $row=mysql_fetch_array($select_data);
//echo $rows_nums = mysql_num_rows($select_data);
 	echo $row['question'];?>
 <br>
 <input type="radio" name="radio<?php echo $row['id'];?>" class="rbtn" value="<?php echo $row['a1']; ?>"><?php echo $row['a1']; ?><br>
 <input type="radio" name="radio<?php echo $row['id'];?>" class="rbtn" value="<?php echo $row['a2']; ?>"><?php echo $row['a2']; ?> <br>
 <input type="radio" name="radio<?php echo $row['id'];?>" class="rbtn" value="<?php echo $row['a3']; ?>"><?php echo $row['a3']; ?> <br>
 <input type="radio" name="radio<?php echo $row['id'];?>" class="rbtn" value="<?php echo $row['a4']; ?>"><?php echo $row['a4']; ?><br><br><br>

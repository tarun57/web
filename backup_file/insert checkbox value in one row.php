<?php
mysql_connect("localhost","root" ,"");
mysql_select_db("pizone2");
if(isset($_POST['sub']))
{
$checkbox1=$_POST['techno'];
$chk="";
$chk= implode(",",$checkbox1);
// foreach($checkbox1 as $chk1)
//    {
//       $chk .= $chk1.",";
//    }
$in_ch=mysql_query("insert into request_quote(technology) values ('$chk')");
if($in_ch==1)
   {
      echo'<script>alert("Inserted Successfully")</script>';
   }
else
   {
      echo'<script>alert("Failed To Insert")</script>';
   }
}
?>
<html>
<body>
   <form action="" method="post"   >
   <div style="width:200px;border-radius:6px;margin:0px auto">
<table border="1">
   <tr>
      <td colspan="2">Select Technolgy:</td>
   </tr>
   <tr>
      <td>PHP</td>
      <td><input type="checkbox" name="techno[]" value="PHP"></td>
   </tr>
   <tr>
      <td>.Net</td>
      <td><input type="checkbox" name="techno[]" value=".Net"></td>
   </tr>
   <tr>
      <td>Java</td>
      <td><input type="checkbox" name="techno[]" value="Java"></td>
   </tr>
   <tr>
      <td>Javascript</td>
      <td><input type="checkbox" name="techno[]" value="javascript"></td>
   </tr>
   <tr>
      <td colspan="2" align="center"><input type="submit" value="submit" name="sub"></td>
   </tr>
</table>
</div>
</form>

</body>
</html>

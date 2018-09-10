<?php
include("config.inc.php"); //include config file
if(isset($_POST["page"])){
	$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
	if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
	$page_number = 1;
}
 $item_per_page=1;
$position = (($page_number-1) * $item_per_page);
$id='';
if (isset($_POST['id'])) {
$id= $_POST["id"];
}
$cid = '';
if( isset($_GET['id'])) {
    $cid=$_GET['id'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$results = mysqli_query($connecDB, "SELECT id, question, a1,a2,a3,a4,course_id FROM quiz where course_id='$id' ORDER BY id ASC LIMIT $position, $item_per_page");
}
else {
	$results = mysqli_query($connecDB, "SELECT id, question, a1,a2,a3,a4,course_id FROM quiz where course_id='$cid' ORDER BY id ASC LIMIT $position, $item_per_page");
}
?>
 <form method="post" id="form1" action="quiz_result.php?id=<?php echo $id;?>">
	 <?php
echo '<ul class="page_result">';
$i=1;
while($row = mysqli_fetch_array($results))
{
	?>
	<div class="col-sm-12" style="background-color:rgb(145,145,145);">
<div>
<div class="col-sm-6" style="background-color:rgb(162,198,79);height:60px;font-size:20px;text-align:center;">
	<?php
	echo $page_number;
	echo ".";
	echo $row['question'];
	?>
</div>
	<!--echo '<li id="item_'.$row["id"].'">'.$row["id"].'. <span class="question">'.$row["question"].'</span><br><span class="a1">'.$row["a1"].'</span>&emsp;&emsp;&emsp;&emsp;<span class="a2">'.$row["a2"].'</span><br><span class="a3">'.$row["a3"].'</span>&emsp;&emsp;&emsp;&emsp;<span class="a4">'.$row["a4"].'</span></li>';-->
<div class="col-sm-6" style="margin-left:30%">
<br><br>
<input type="radio" name="seconds" cid="<?php echo $row['course_id'];?>" qid="<?php echo $row['id']; ?>" class="rbtn" value="<?php echo $row['a1']; ?>" ><?php echo $row['a1']; ?><br>
<input type="radio" name="seconds" cid="<?php echo $row['course_id'];?>" qid="<?php echo $row['id']; ?>" class="rbtn" value="<?php echo $row['a2']; ?>" ><?php echo $row['a2']; ?> <br>
<input type="radio" name="seconds" cid="<?php echo $row['course_id'];?>" qid="<?php echo $row['id']; ?>" class="rbtn" value="<?php echo $row['a3']; ?>" ><?php echo $row['a3']; ?> <br>
<input type="radio" name="seconds" cid="<?php echo $row['course_id'];?>" qid="<?php echo $row['id']; ?>" class="rbtn" value="<?php echo $row['a4']; ?>" ><?php echo $row['a4']; ?><br><br><br>
<?php
$page_number++;
}
echo '</ul>';
?>
<?php
if(isset($_POST['page']))
{
$select =mysqli_query($connecDB,"SELECT * FROM quiz where course_id='$id'");
$total_results=mysqli_num_rows($select);
if($total_results==$_POST['page'])
{
	?>
	<button type="submit" class="btn btn-primary">GET RESULT</button>
	<?php
}
}
?>
</div>
</div>
</div>
</form>
<script>
$(document).ready(function(){
		 $('input[type="radio"]').click(function(){
					var seconds = $(this).val();
					var qid = $(this).attr('qid');
					var cid = $(this).attr('cid');
					$.ajax({
							 url:"insert.php",
							 method:"POST",
							 data:{seconds:seconds,qid:qid,cid:cid},
							 success:function(data){
										$('#result').html(data);
							 }
					});
		 });
});
</script>
<script>
$(document).ready(function(){
  var radios = document.getElementsByName("seconds");
  var val = localStorage.getItem('seconds');
	//alert(val);
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
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
        $("#form1").submit(function(event){
            event.preventDefault();
		$.ajax({
                    url:'result.php',
                    type:'post',
                    data:$(this).serialize(),
                    success:function(result){
                        $("#response").html(result);
				}
			});
        });
    });
</script>-->

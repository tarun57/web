
<div class="row" id="form1">
    <div class="col-lg-12">
      <?php 
	  include("config.inc.php");
      $id=$_GET['id'];
    $course_id = $_GET['id'];
      $query = mysqli_query($connecDB,"SELECT * FROM  `course` WHERE id='$id'");
      while($row = mysqli_fetch_array($query)){
      ?>
        <h1 class="page-header" style="margin-left:30%;color:green;">Online test series:<?php echo $row['course'];?> test</h1>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
  <ul style="margin-left:30%;font-size:20px;color:grey;">
  <div style="color:green;">Instruction:</div>
<li>Total number of questions : 20.</li>
<li>Time alloted : 20 minutes.</li>
<li>Each question carry 1 mark, no negative marks.</li>
<li>DO NOT refresh the page.</li>
<li>All the best :-).</li>
</ul>
<button type="submit" class="btn btn-primary" style="margin-left:50%;"><a href="index.php?id=<?php echo $id;?>" style="color:white;">Start test</a></button>
<?php } ?>
</div>
</div>
</div>

		<?php
	session_start();
	if(!isset($_SESSION))
	{
		header('location:tables.php');
		exit;
	}
?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tables</h1>
                </div>
            </div>>
            <div class="row">
                <div class="col-lg-12">
                <div class="panel panel-default">
                <div class="panel-heading">
               Registeration Tables
              </div>
            <div class="panel-body">
						<form method="post">
                  <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
								<tr><th>ID</th>
									<th>NAME</th>
									<th>E-mail</th>
									<th>Password</th>
										<th>Registered time</th>
									<th>Registered date</th>
									<th colspan="3" style="text-align:center;">Action</th>
									</tr>
									 </tr>
                 <?php
include("db_config.php");
$query = mysql_query("SELECT * FROM  login2");
$i=1;
while($row = mysql_fetch_array($query))
{
	?>
	<tr><td>
		<?php
		echo $i;
		$i++;
		echo ".";
?></td>
	<td><?php echo $row['name'];?></td>
	<td><?php echo $row['email'];?></td>
	<td><?php echo $row['password'];?></td>
	<td><?php echo $row['registered_time'];?>
	<td><?php echo $row['registerd_date'];?></td>
<td style="text-align:center;"><a href="update4.php?id=<?php echo $row['id'];?>"><button type="button" class ="btn btn-info">Edit</button></a></td>
<td><a onClick="return confirm('Are you sure you want to delete?')" href='tables.php?id=<?php echo $row['id'];?>' type='button' class='btn btn-danger'>Delete</a></td>
<!--<td><a href="tables.php?id=<?php echo $row['id'];?>"><span class ="glyphicon glyphicon-trash"></span></a></td>-->
  <!--<td>
	<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Delete</button>
	<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
	<div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Modal Header</h4>
	        </div>
	        <div class="modal-body">
	          <p>Are you sure you want to delete this.</p>
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal"><a href='tables.php?id=<?php echo $row['id'];?>'>OK</a></button>
</div>
</div>
					</div>
	      </div></td>-->
	</tr>
	<?php
}
?>
</table>
<?php
if(isset($_GET['id']))
        {
		$id = $_GET['id'];
$query = mysql_query("DELETE FROM `login2` WHERE id='$id'");
$result = mysql_query($query);
echo '<script>window.location="tables.php";</script>';
 }
?>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('footer.php');?>
 <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

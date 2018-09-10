<?php include('header.php');?>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Data Tables</h1>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Quiz Login
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
									<tr>
                                            <th>Stu_ID</th>
                                            <th>Stu_Name</th>

                                        </tr>


					<?php
				 include("db_config.php");
					$query = mysql_query("SELECT * FROM login");
					while($row = mysql_fetch_array($query))

{
	?>
	<tr>
	<td><?php echo $row['id'];?></td>
	<td><?php echo $row['name'];?></td>



	</tr>

	<?php
}
?>
</table>
<?php
if(isset($_GET['id']))
        {
		$id = $_GET['id'];
$query = mysql_query("DELETE FROM `login` WHERE id='$id'");
 $result = mysql_query($query);

}
		?>
					          </div>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                </div>


            </div>
                <div class="row">
                <div class="col-md-6">
                     <!--    Hover Rows  -->

                </div>
                <div class="col-md-6">
                     <!--    Context Classes  -->

                    <!--  end  Context Classes  -->
                </div>
            </div>

        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->

    <?php include('footer.php');?>

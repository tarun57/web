<?php include("header.php");?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Dashboard</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success">
                        This is a simple admin template that can be used for your small project or may be large projects. This is free for personal and commercial use.
                    </div>
                </div>
            </div>
            <div class="row">
			<div class="col-md-3 col-sm-3 col-xs-6">
			<div class="dashboard-div-wrapper bk-clr-one">
            <i  class="fa fa-venus dashboard-div-icon" ></i>
						<button type="button" class="btn btn-primary" style="margin-bottom:50px;margin-left:20%;"><span class="badge">NEW</span></button>
            <div class="progress progress-striped active">
						<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
  </div>
  </div>
<?php
						 		 include("db_config.php");
						 $query = mysql_query("SELECT * FROM  course WHERE id='2'");
						 while($row = mysql_fetch_array($query)){
							 $id=$row['id'];
							$course=$row['course'];
							?>
<button type="button" class="btn btn-primary"><span class="badge" style="font-size:15px;"><a href="sign.php?id=<?php echo $id;?>"><?php echo  $course;?></a></span></button>
                    <?php
						 }
						 ?>
					</div>
                </div>
                 <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-two">
                        <i  class="fa fa-edit dashboard-div-icon" ></i>
						<button type="button" class="btn btn-primary" style="margin-bottom:50px;margin-left:20%;"><span class="badge">NEW</span></button>
                        <div class="progress progress-striped active">
  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
  </div>
</div>
          <?php
								 include("db_config.php");
						 $query = mysql_query("SELECT * FROM  course WHERE id='3'");
						 while($row = mysql_fetch_array($query))
{
	$id=$row['id'];
	   $course=$row['course'];
	 ?>
<h5><button type="button" class="btn btn-primary"><span class="badge" style="font-size:15px;"><a href="sign.php?id=<?php echo $id;?>"><?php echo  $course;?></a></span></button></h5>
                    <?php
}
?>
                    </div>
                </div>
                 <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-three">
                        <i  class="fa fa-cogs dashboard-div-icon" ></i>
						<button type="button" class="btn btn-primary" style="margin-bottom:50px;margin-left:20%;"><span class="badge">NEW</span></button>
                        <div class="progress progress-striped active">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
  </div>
</div>
<?php
							 include("db_config.php");
						 $query = mysql_query("SELECT * FROM  course WHERE id='13'");
						 while($row = mysql_fetch_array($query))
{
	$id=$row['id'];
	   $course=$row['course'];
	 ?>
<h5><button type="button" class="btn btn-primary"><span class="badge" style="font-size:15px;"><a href="sign.php?id=<?php echo $id;?>"><?php echo  $course;?></a></span></button></h5>
                    <?php
}
?>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-four">
                        <i  class="fa fa-bell-o dashboard-div-icon" ></i>
						<button type="button" class="btn btn-primary" style="margin-bottom:50px;margin-left:20%;"><span class="badge">NEW</span></button>
                        <div class="progress progress-striped active">
  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
  </div>
</div>
                         <?php
						 include("db_config.php");
						 $query = mysql_query("SELECT * FROM  course WHERE id='4'");
						 while($row = mysql_fetch_array($query))
{
	$id=$row['id'];
	   $course=$row['course'];
	 ?>
<h5><button type="button" class="btn btn-primary"><span class="badge" style="font-size:15px;"><a href="sign.php?id=<?php echo $id;?>"><?php echo  $course;?></a></span></button></h5>
                    <?php
}
?>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                      <div class="notice-board">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                           Active  Notice Panel
                                <div class="pull-right" >
                                    <div class="dropdown">
  <button class="btn btn-success dropdown-toggle btn-xs" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
    <span class="glyphicon glyphicon-cog"></span>
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Refresh</a></li>
    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Logout</a></li>
  </ul>
</div>
                                </div>
                            </div>
                            <div class="panel-body">

                                <ul >

                                     <li>
                                            <a href="#">
                                     <span class="glyphicon glyphicon-align-left text-success" ></span>
                                                  Lorem ipsum dolor sit amet ipsum dolor sit amet
                                                 <span class="label label-warning" > Just now </span>
                                            </a>
                                    </li>
                                     <li>
                                          <a href="#">
                                     <span class="glyphicon glyphicon-info-sign text-danger" ></span>
                                          Lorem ipsum dolor sit amet ipsum dolor sit amet
                                          <span class="label label-info" > 2 min chat</span>
                                            </a>
                                    </li>
                                     <li>
                                          <a href="#">
                                     <span class="glyphicon glyphicon-comment  text-warning" ></span>
                                          Lorem ipsum dolor sit amet ipsum dolor sit amet
                                          <span class="label label-success" >GO ! </span>
                                            </a>
                                    </li>
                                    <li>
                                          <a href="#">
                                     <span class="glyphicon glyphicon-edit  text-danger" ></span>
                                          Lorem ipsum dolor sit amet ipsum dolor sit amet
                                          <span class="label label-success" >Let's have it </span>
                                            </a>
                                    </li>
                                   </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="panel-footer">
                                <a href="#" class="btn btn-default btn-block"> <i class="glyphicon glyphicon-repeat"></i> Just A Small Footer Button</a>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="text-center alert alert-warning">
                        <a href="#" class="btn btn-social btn-facebook">
                            <i class="fa fa-facebook"></i>&nbsp; Facebook</a>
                        <a href="#" class="btn btn-social btn-google">
                            <i class="fa fa-google-plus"></i>&nbsp; Google</a>
                        <a href="#" class="btn btn-social btn-twitter">
                            <i class="fa fa-twitter"></i>&nbsp; Twitter </a>
                        <a href="#" class="btn btn-social btn-linkedin">
                            <i class="fa fa-linkedin"></i>&nbsp; Linkedin </a>
                    </div>
                    <hr />
                     <div class="table-responsive">
					 <!--<form method="post">
					 <h1>Students Online Quiz ID</h1>
                                <table class="table table-striped table-bordered table-hover" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>E-mail</th>
                                        </tr>
                                   <?php

		 include("db_config.php");
$query = mysql_query("SELECT * FROM  login2");
while($row = mysql_fetch_array($query))
{
	?>
	<tr>
	<td><?php echo $row['id'];?></td>
	<td><?php echo $row['name'];?></td>
	<td><?php echo $row['email'];?></td>
	</tr>
	<?php
}
?>
</table>
</form>-->
  </div>
                </div>
                <div class="col-md-6">
                    <div class="alert alert-danger">
                        This is a simple admin template that can be used for your small project or may be large projects. This is free for personal and commercial use.
                    </div>
                    <hr />

                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
   <?php include("footer.php");?>

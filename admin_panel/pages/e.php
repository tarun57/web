<!DOCTYPE html>
<html>
<head>
    <title>PHP mysql confirmation box before delete record using jquery ajax</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <h3 class="text-center">PHP mysql confirmation box before delete record using jquery ajax</h3>
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Email</th>
              <th>Email</th>
            <th width="100px">Action</th>
        </tr>
        <?php
        mysql_connect("localhost","root","");
        mysql_select_db("pizone");

      //echo "SELECT * FROM quiz WHERE course_id='$id'";
        $query = mysql_query("SELECT * FROM quiz");
        //$query = mysql_query("SELECT * FROM `quiz`");
  while($row = mysql_fetch_array($query)){
        ?>
            <tr id="<?php echo $row['id'] ?>">
                <td><?php echo $row['a1'] ?></td>
                <td><?php echo $row['a2'] ?></td>
                <td><button class="btn btn-danger btn-sm remove">Delete</button></td>
            </tr>
        <?php } ?>
    </table>
</div> <!-- container / end -->
</body>
<script type="text/javascript">
    $(".remove").click(function(){
        var id = $(this).parents("tr").attr("id");
          $("#"+id).remove();
        if(confirm('Are you sure to remove this record ?'))
        {
            $.ajax({
               url: 'delete.php',
               type: 'GET',
               data: {id: id},
               // error: function() {
               //    alert('Something is wrong');
               // },
               // success: function(data) {
               //      $("#"+id).remove();
               //      alert("Record removed successfully");
               // }
            });
        }
    });
</script>
</html>

<!--<?php
//insert.php
$host = "localhost";
$username = "root";
$password = "";
$database = "pizone";
try
{
     $connect = new PDO("mysql:host=$host;dbname=$database",$username, $password);
     $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     if(isset($_POST["gender"]))
     {
          $query = "INSERT INTO radio(radio) VALUES (:gender)";
          $statement = $connect->prepare($query);
          $statement->execute(
               array(
                    'gender'     =>     $_POST["gender"]
               )
          );
          $count = $statement->rowCount();
          if($count > 0)
          {
               echo "Gender Inserted Successfully!";
          }
          else
          {
               echo 'Not Inserted';
          }
     }
}
catch(PDOException $error)
{
     echo $error->getMessage();
}
?>-->

<?php
//session_start();
mysql_connect("localhost","root","");
mysql_select_db("pizone");
if(isset($_POST['seconds'])){
$seconds=$_POST['seconds'];
//$userid=$_SESSION['id'];
$query = mysql_query("INSERT INTO `radio` (answer) VALUES ('$seconds')");
$result = mysql_query($query);
}
?>

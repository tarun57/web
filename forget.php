<?php
$con =  mysqli_connect("localhost","root","","pizone");
if (isset($_POST['submit'])) {
    $email = $_POST["email"];

    $result= mysqli_query($con,"SELECT * FROM login2  where email='$email'")or die("database error:". mysqli_error($con));
    $count=mysqli_num_rows($result);
    $row= mysqli_fetch_array( $result);
    {
           if ($count>0) {
            //echo $row['password'];


            require("PHPMailer/PHPMailer.php");
            require("PHPMailer/SMTP.php");
   $mail = new PHPMailer\PHPMailer\PHPMailer();
   //$mail->IsSMTP(); // enable SMTP
   $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
   $mail->SMTPAuth = true; // authentication enabled
   $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
   $mail->Host = "smtp.gmail.com";
   $mail->Port = 465; // or 587
   $mail->IsHTML(true);
   $mail->Username = "tarun79dadhich@gmail.com";
   $mail->Password = "tarundadhich";
   $mail->SetFrom("tarun79dadhich@gmail.com");
   $mail->Subject = "forgat password";
   $mail->Body = "Hi $email your password is {$row['password']}";
   $mail->AddAddress($email);
if(!$mail->Send()) {
       echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
       echo "Password has been sent";
    }
           }
      }

    // $count= mysqli_num_rows($con, $result);
    //
    // echo $count;
  // if ($count>0) {
  //   echo $row['password'];
  //
  // }
}
 ?>
 <!DOCTYPE html>
 <html>
  <head>
   <title>Pizone</title>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <link href="css1/style5.css" rel="stylesheet" type="text/css">
 <br><br><br>
 </head>
  <body>
    <form method="post" style="margin-left:30%;margin-top:10%;font-size:20px;">
      <h1 style="margin-right:5%;">PLEASE ENTER YOUR EMAIL</h1>
      <label style="font-size:20px;">Email:</label>
    <input type="email" id="email" name="email" required="required">
    <br><br>
    <div class="group">
      <input type="submit" class="button" value="Submit" style="margin-left:10%;font-size:20px;" id="submit" name="submit">
    </div>
  </form>
  </body>
</html>

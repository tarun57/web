<?php include("header.php");?>
<?php
  require("PHPMailer/PHPMailer.php");
  require("PHPMailer/SMTP.php");
?>
<?php
//index.php
$error = '';
$name = '';
$email = '';
$subject = '';
$message = '';
function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}
if(isset($_POST["submit"]))
{
 if(empty($_POST["name"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
 }
 else
 {
  $name = clean_text($_POST["name"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$name))
  {
   $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
  }
 }
 if(empty($_POST["email"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
 }
 else
 {
  $email = clean_text($_POST["email"]);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
   $error .= '<p><label class="text-danger">Invalid email format</label></p>';
  }
 }
 if(empty($_POST["subject"]))
 {
  $error .= '<p><label class="text-danger">Subject is required</label></p>';
 }
 else
 {
  $subject = clean_text($_POST["subject"]);
 }
 if(empty($_POST["message"]))
 {
  $error .= '<p><label class="text-danger">Message is required</label></p>';
 }
 else
 {
  $message = clean_text($_POST["message"]);
 }
 if($error == '')
 {
  $mail = new PHPMailer\PHPMailer\PHPMailer();
  //$mail->IsSMTP();        		//Sets Mailer to send message using SMTP
  $mail->Host = 'smtp.gmail.com';  //Sets the SMTP hosts
  $mail->SMTPDebug = 1;		  // debugging: 1 = errors and messages, 2 = messages only
  $mail->Port = 465; 			 // or 587         //Sets the default SMTP server port
  $mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
  $mail->Username = 'tarun79dadhich@gmail.com';     //Sets SMTP username
  $mail->Password = 'tarundadhich';     //Sets SMTP password
  $mail->SMTPSecure = 'ssl';       //Sets connection prefix. Options are "", "ssl" or "tls"
  $mail->From = $_POST["email"];     //Sets the From email address for the message
  $mail->FromName = $_POST["name"];    //Sets the From name of the message
  $mail->AddAddress('tarun79dadhich@gmail.com', 'Name');//Adds a "To" address
  $mail->AddCC($_POST["email"], $_POST["name"]); //Adds a "Cc" address
  $mail->IsHTML(true);       //Sets message type to HTML
  $mail->Subject = $_POST["subject"];    //Sets the Subject of the message
  $mail->Body = $_POST["message"];    //An HTML or plain text message body
  if($mail->Send())        //Send an Email. Return true on success or false on error
  {
   $error = '<label class="text-success">Thank you for contacting us</label>';
  }
  else
  {
   $error = '<label class="text-danger">There is an Error</label>';
  }
  $name = '';
  $email = '';
  $subject = '';
  $message = '';
 }
}
?>
 <body style="background-color:lightyellow;">
 <br />
  <div class="container">
   <div class="row">
    <div class="col-md-8" style="margin:0 auto; float:none;">
     <h3 align="center">GET IN TOUCH</h3>
     <br />
     <?php echo $error; ?>
<form method="post">
<div class="form-group">
<label>Enter Name:</label>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input  type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $name; ?>"/>
</div>
<div class="form-group">
<label>Enter Email:</label>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input  type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $email; ?>"/>
</div>
<div class="form-group">
<label>Enter Subject:</label>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input  type="text" class="form-control" name="subject" placeholder="Subject" value="<?php echo $subject; ?>"/>
</div>
<div class="form-group">
<label>Enter Message:</label>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
<textarea name="message" class="form-control" placeholder="Enter Message"><?php echo $message; ?></textarea>
</div>
</div>
</div>
</div>
</div>
<div class="form-group" align="center">
<input type="submit" name="submit" value="Submit" class="btn btn-info" />
</div>
</form>
</div>
</div>
</div>
</body>
</html>
<?php include("footer.php");?>

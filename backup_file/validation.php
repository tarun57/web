<!DOCTYPE html>
<html>
<head>

</head>
<body>

<form name="myForm" action="/action_page.php"
onsubmit="return validateForm()" method="post">
Name: <input type="text" name="fname">
<p id="name_error" style="color:red;display:none;">
  name is required</p>
email: <input type="text" name="email">
<p id="email_error" style="color:red;display:none;">
  email is required
</p>

<input type="submit" value="Submit">

</form>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
function validateForm() {
    var x = document.forms["myForm"]["fname"].value;
      var email = document.forms["myForm"]["email"].value;
    if (x == "") {
      $("#name_error").css('display','block');
          //alert("Name must be filled out");
      //  $('.alert-danger').html('please fill lastname').fadeIn().delay(3000).fadeOut('slow');
        return false;
    }
    else {
    $("#name_error").css('display','none');
    }
    if (email == "") {
        $("#email_error").css('display','block');
    //    alert("email must be filled out");
        return false;
    }
    else {
      $("#email_error").css('display','none');
    }
}
</script>
</html>

<!DOCTYPE html>
<html>
<head>
<style media="screen">
@charset"utf-8";

/* CSS Document */

/* ---------- FONTAWESOME ---------- */

/* ---------- http://fortawesome.github.com/Font-Awesome/ ---------- */

/* ---------- http://weloveiconfonts.com/ ---------- */
@import url(http://weloveiconfonts.com/api/?family=fontawesome);

/* ---------- ERIC MEYER'S RESET CSS ---------- */

/* ---------- http://meyerweb.com/eric/tools/css/reset/ ---------- */
@import url(http://meyerweb.com/eric/tools/css/reset/reset.css);

/* ---------- FONTAWESOME ---------- */
[class*="fontawesome-"]:before {
  font-family:'FontAwesome', sans-serif;
}
/* ---------- GENERAL ---------- */
body {
  background-color: #C0C0C0;
  color: #000;
  font-family:"Varela Round", Arial, Helvetica, sans-serif;
  font-size: 16px;
  line-height: 1.5em;
}
input {
  border: none;
  font-family: inherit;
  font-size: inherit;
  font-weight: inherit;
  line-height: inherit;
  -webkit-appearance: none;
}
/* ---------- LOGIN ---------- */
#login {
  margin: 50px auto;
  width: 400px;
}
#login h2 {
  background-color: #f95252;
  -webkit-border-radius: 20px 20px 0 0;
  -moz-border-radius: 20px 20px 0 0;
  border-radius: 20px 20px 0 0;
  color: #fff;
  font-size: 28px;
  padding: 20px 26px;
}
#login h2 span[class*="fontawesome-"] {
  margin-right: 14px;
}
#login fieldset {
  background-color: #fff;
  -webkit-border-radius: 0 0 20px 20px;
  -moz-border-radius: 0 0 20px 20px;
  border-radius: 0 0 20px 20px;
  padding: 20px 26px;
}
#login fieldset p {
  color: #777;
  margin-bottom: 14px;
}
#login fieldset p:last-child {
  margin-bottom: 0;
}
#login fieldset input {
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
}
#login fieldset input[type="text"], #login fieldset input[type="password"] {
  background-color: #eee;
  color: #777;
  padding: 4px 10px;
  width: 328px;
}
#login fieldset input[type="submit"] {
  background-color: #33cc77;
  color: #fff;
  display: block;
  margin: 0 auto;
  padding: 4px 0;
  width: 100px;
}
#login fieldset input[type="submit"]:hover {
  background-color: #28ad63;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
  <div id="login">
      	<h2><span class="fontawesome-lock"></span>Sign In</h2>
      <form action="javascript:alert('FORM SUBMITTED');" method="POST">
          <fieldset>
              <p>
                  <label for="email">E-mail address</label>
              </p>
              <p>
                  <input type="text" id="email">
              </p>
              <p>
                  <label for="password">Password</label>
              </p>
              <p>
                  <input type="password" id="password">
              </p>
              <p>
                  <label for="email">mobile</label>
              </p>
              <p>
                  <input type="text" id="mobile" name="mobile">
              </p>
              <!-- JS because of IE support; better: placeholder="Email" -->
              <p>
                  <input type="submit" value="Sign In">
              </p>
          </fieldset>
      </form>
  </div>
  <!-- end login -->
</body>
</html>
<script>
function ValidateEmail(email) {
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return expr.test(email);
    };
</script>
<script>
function mobile(mobile)
{
var filter = /^\(?(\d{3})\)?[-\. ]?(\d{3})[-\. ]?(\d{4})$/;
  return filter.test(mobile);

}
</script>
<script>
$('form').on('submit', function (e) {
       var focusSet = false;
       var re = /^\w+([-+.'][^\s]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
       var emailFormat = re.test($("#email").val());// this return result in boolean type
       if (!ValidateEmail($("#email").val())) {
           if ($("#email").parent().next(".validation").length == 0) // only add if not added
           {
               $("#email").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter email address</div>");
           }
           e.preventDefault(); // prevent form from POST to server
           $('#email').focus();
           focusSet = true;
       } else {
           $("#email").parent().next(".validation").remove(); // remove it
       }
       if (!mobile($("#password").val())) {
           if ($("#password").parent().next(".validation").length == 0) // only add if not added
           {
               $("#password").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter password</div>");
           }
           e.preventDefault(); // prevent form from POST to server
           if (!focusSet) {
               $("#password").focus();
           }
       } else {
           $("#password").parent().next(".validation").remove(); // remove it
       }
       if (!mobile($("#mobile").val())) {
           if ($("#mobile").parent().next(".validation").length == 0) // only add if not added
           {
               $("#mobile").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter mobile</div>");
           }
           e.preventDefault(); // prevent form from POST to server
           $('#mobile').focus();
           focusSet = true;
       } else {
           $("#mobile").parent().next(".validation").remove(); // remove it
       }
   });
</script>

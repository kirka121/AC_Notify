<?php
include("include/session.php");
?>
<html>
  <head>
    <title>Notify - Admin Area</title>
    <link rel="icon" href="/assets/img/favicon.ico" type="image/x-icon"> 
    <link rel="shortcut icon" href="/assets/img/favicon.ico" type="image/x-icon"> 
    <link rel="stylesheet" type="text/css" media="screen" href="/assets/css/index_admin.css">        <!-- most css is here. special exceptions occur. -->
    <link rel="stylesheet" type="text/css" media="screen" href="/assets/css/buttons.css"> 
    <script src="/assets/js/jQuery.js" type="text/javascript" charset="utf-8"></script>               <!-- standard jquery lib -->
    <script src="/assets/js/notification_boxes.js" type="text/javascript" charset="utf-8"></script>  <!-- custom jquery for notification boxes -->
    <script src="/assets/js/jquery.validate.js" type="text/javascript" charset="utf-8"></script>  
    <script>
      $(document).ready(function(){
        $("#admin_login_form").validate({
          rules: {
            user: {
              required: true,
              minlength: 4
            },
            pass: {
              required: true,
              minlength: 5
            }
          },
          messages: {
            user: {
              required: "Please enter a username",
              minlength: "Your username must consist of at least 5 characters"
            },
            pass: {
              required: "Please provide a password",
              minlength: "Your password must be at least 5 characters long"
            }
          }
        });
      });
    </script> 
  </head>
  <body>
    <div id="container">
      <?php 
        if($session->logged_in){ 
          if($session->isAdmin()){ 
            include("include/control_panel.php");
          } else { ?>
            you are not admin. please leave
            [<a href="process.php">Logout</a>]
      <?php 
          } 
        } else { ?>
        <div id="login_block">
          <form action="process.php" method="POST" id="admin_login_form">
            <fieldset>
              <?php if($form->error("user")){ ?>
                <p>
                  <label><font size="2" color="#ff0000">Error</font></label>
                  <?php echo $form->error("user"); ?>
                </p>
              <?php } ?>
                <p>
                  <label for="user"></label>
                  <input id="user" name="user" type="text" placeholder="Username" maxlength="30"/>
                </p>
              <?php if($form->error("pass")){ ?>
                <p>
                  <label><font size="2" color="#ff0000">Error</font></label>
                  <?php echo $form->error("pass"); ?>
                </p>
              <?php } ?>
                <p>
                  <label for="pass"></label>
                  <input id="pass" name="pass" type="password" placeholder="Password" maxlength="30"/>
                </p>
              <input type="hidden" name="sublogin" value="1" />
              <input type="submit" value="Login" class="admin_login_button" />
            </fieldset>
          </form>
        </div>
      <?php } ?>
    </div>
  </body>
</html>























<!--
<html>
<title>Notify - Administration Module</title>
<body>

<table>
<tr>
  <td>


<?php
/**
 * User has already logged in, so display relavent links, including
 * a link to the admin center if the user is an administrator.
 */
if($session->logged_in){
   echo '<h1><img src="images/lock_unlocked.png" width="32" height="32">Logged In</h1>';
   
   echo "Welcome <b>$session->username</b>, you are logged in. <br><br>"
       ."[<a href=\"userinfo.php?user=$session->username\">My Account</a>] &nbsp;&nbsp;"
       ."[<a href=\"useredit.php\">Edit Account</a>] &nbsp;&nbsp;";
   if($session->isAdmin()){
      echo "[<a href=\"admin/admin.php\">Admin Center</a>] &nbsp;&nbsp;";
   }
   echo "[<a href=\"process.php\">Logout</a>]";
}
else{
?>

<h1><img src="images/lock_locked.png" width="32" height="32" alt="Login">Admin Login</h1>
<?php
/**
 * User not logged in, display the login form.
 * If user has already tried to login, but errors were
 * found, display the total number of errors.
 * If errors occurred, they will be displayed.
 */
if($form->num_errors > 0){
   echo "<font size=\"2\" color=\"#ff0000\">".$form->num_errors." error(s) found</font>";
}
?>
<form action="process.php" method="POST">
<table align="left" border="0" cellspacing="0" cellpadding="3">
<tr><td>Username:</td><td><input type="text" name="user" maxlength="30" value="<?php echo "Admin"; ?>"></td><td><?php echo $form->error("user"); ?></td></tr>
<tr><td>Password:</td><td><input type="password" name="pass" maxlength="30" value="<?php echo "vvstgy"; ?>"></td><td><?php echo $form->error("pass"); ?></td></tr>
<tr><td colspan="2" align="left"><input type="checkbox" name="remember" <?php if($form->value("remember") != ""){ echo "checked"; } ?>>
<font size="2">Remember me next time &nbsp;&nbsp;&nbsp;&nbsp;
<input type="hidden" name="sublogin" value="1">
<input type="submit" value="Login"></td></tr>
<tr><td colspan="2" align="left"><br><font size="2">[<a href="forgotpass.php">Forgot Password?</a>]</font></td><td align="right"></td></tr>
<tr><td colspan="2" align="left"><br>Not registered? <a href="register.php">Sign-Up!</a></td></tr>
</table>
</form>

<?php
}

/**
 * Just a little page footer, tells how many registered members
 * there are, how many users currently logged in and viewing site,
 * and how many guests viewing site. Active users are displayed,
 * with link to their user information.
 */
echo "</td></tr><tr><td align=\"center\"><br><br>";
echo "<b>Member Total:</b> ".$database->getNumMembers()."<br>";
echo "There are $database->num_active_users registered members and ";
echo "$database->num_active_guests guests viewing the site.<br><br>";

include("include/view_active.php");

?>


</td></tr>
</table>


</body>
</html>
-->
<?php

session_start();

if(!isset($_SESSION['user_id'])) {

    // header("Location: Login.php");dont use this.
    //use this:
    echo ("<script>
       window.location.assign('Login.php');
       </script>");

    exit;
    
}

else {
    
    /*Logout user after 10 minutes.*/
    if ($_SESSION['timeout'] + 10 * 60 < time()) {
        
        // header("Location: Logout.php");dont use this.
        //use this:
        echo ("<script>
           window.location.assign('Logout.php');
           </script>");


    }
    
    //User did not time out
    else {
        
        $_SESSION['timeout'] = time();
        
    }
    
    
}

?>

<div align="right">
  <a href="PlayerPage.php">See Your Player Info!</a>
  &nbsp;&nbsp;&nbsp;&nbsp;
  <a href="AddUser.php">New? Create a New User</a>
  &nbsp;&nbsp;&nbsp;&nbsp;
  <a href="Login.php">Log On</a>
  &nbsp;&nbsp;&nbsp;&nbsp;
  <a href="Logout.php">Log Off</a>
  &nbsp;&nbsp;&nbsp;&nbsp;
  <a href="ChangePassword.php">Change Password</a>
    &nbsp;&nbsp;&nbsp;&nbsp;
  <a href="../index.php">Home</a>
</div> 
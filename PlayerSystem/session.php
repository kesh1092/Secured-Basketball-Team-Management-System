<?php

session_start();

if(!isset($_SESSION['id'])) {
    
    header("Location: Login.php");
    exit;
    
}

else {
    
    /*Logout user after 10 minutes.*/
    if ($_SESSION['timeout'] + 10 * 60 < time()) {
        
        header("Location: Logout.php");
        
    }
    
    //User did not time out
    else {
        
        $_SESSION['timeout'] = time();
        
    }
    
    
}

?>

<div align="right">
  <a href="hello-world.php">Home</a>
  <a href="AddUser.php">New User</a>
  <a href="Login.php">Log On</a>
  <a href="Logout.php">Log Off</a>
  <a href="TestLoginStatus.php">Test Login Status</a>
</div> 
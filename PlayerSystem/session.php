<?php

session_start();




if(!isset($_SESSION['user_id'])) {

  echo ("<script>
   window.location.assign('Login.php?test2=asdf');
   </script>");

  exit;

}

else {

  if(!isset($_SESSION['timeout']))
  {

    $_SESSION['timeout'] = time() + 99; 

  }

  $_SESSION['session'] = time();

  if ($_SESSION['session'] > $_SESSION['timeout']) {


   unset($_SESSION['session']);
   unset($_SESSION['timeout']);
   unset($_SESSION['user_id']);


   echo ("<script>
    alert('TIMEOUT!');
    window.location.assign('Logout.php?test1=true');
    </script>");

   exit();
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
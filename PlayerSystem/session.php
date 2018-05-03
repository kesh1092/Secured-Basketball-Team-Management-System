<?php
session_start();



if(!isset($_SESSION['user_id'])) {

  echo ("<script>
   window.location.assign('../index.php?redirected');
   </script>");

  exit;

}

else {

  if(!isset($_SESSION['timeout']))
  {

    $_SESSION['timeout'] = time() + 60; 

  }

  $_SESSION['session'] = time();

  if ($_SESSION['session'] > $_SESSION['timeout']) {


   unset($_SESSION['session']);
   unset($_SESSION['timeout']);
   unset($_SESSION['user_id']);

session_unset();

session_destroy();


   echo ("<script>
    alert('TIMEOUT!');
   window.location.assign('../index.php?timeOut');
    </script>");

   exit();
 }




}

?>

<div align="right">

  <a href="ChangePassword.php">Change Password</a>
  &nbsp;&nbsp;&nbsp;&nbsp;
   <a href="Logout.php">Log Off</a>
  &nbsp;&nbsp;&nbsp;&nbsp;
  <!-- <a href="../index.php">Home</a> -->
</div> 
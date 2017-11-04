<?php
include('session.php');
?>


<?php
session_start();

session_unset();

session_destroy();


?>

<html>
  <head>
    <title>Logged Out</title>
  </head>
  
  <body>
    <h1>You are now logged out.</h1>
  </body>
</html>
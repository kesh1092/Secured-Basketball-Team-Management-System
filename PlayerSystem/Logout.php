<?php
session_start();

//DOESNT WORK 
unset($_SESSION['user_id']);
unset($_SESSION['session']);
unset($_SESSION['timeout']);

session_unset();

session_destroy();


  

echo ("<script>
   window.location.assign('../index.php?loggedOut');
 </script>");


 ?>

 <html>
 <head>
  <title>Logged Out</title>
</head>

<body>
  <h1>You are now logged out.</h1>
</body>
</html>
<?php 
session_start();

if(isset($_GET['redirected'])) 
   echo 'Redirected...<br><br>'; 

if(isset($_GET['loggedOut'])) 
{
   echo 'Logged out...<br><br>'; 	
   unset($_SESSION['LoginID']);
}

?>

<html>
<body>
   Manager Sign up:
   <form action="CoachSystem/add_manager.php" method="post">
      <input type="submit" value="Sign Up" />
   </form>
   <br>
   
   Manager log in:
   <form action="login.php" method="post">
      <input type="submit" value="Login" />
   </form>

</body>
</html>

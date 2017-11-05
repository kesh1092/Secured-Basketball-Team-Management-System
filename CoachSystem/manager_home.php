<?php 
session_start();
require_once('SQLFunctions.php');
if(empty($_SESSION['LoginID'])) //THIS MUST BE THE FIRST LINE EXECUTED. otherwise it wont work
{
   header("Location: ../index.php?redirected");  
   exit();
}

if(isset($_GET['redirected'])) 
   echo 'Redirected...<br><br>'; 

if(isset($_GET['accountCreated'])) 
   echo 'account successfully made...' . ".<br>"; 

$LoginID = $_SESSION['LoginID'];
if(isset($_GET['loggedIn'])) 
   echo 'logged in as: '. $LoginID . ".<br>"; 


$ID = $_SESSION['ID'];
// echo 'id: '. $ID. '<br>';
// echo 'LoginID: '. $_SESSION['LoginID'] . ".<br>"; 
// print_r($_SESSION);


?>


<!-- HTML --><!-- HTML --><!-- HTML --><!-- HTML -->
<!-- HTML --><!-- HTML --><!-- HTML --><!-- HTML -->


<html>

<h1 align="center">Manager Home</h1>

<form action="view_manager_info.php" method="post">
   <input type="submit" value="Manager Info"/>
</form>
<form action="request_player_info.php" method="post">
   <input type="submit" value="Request Player Info"/>
</form>
<form action="request_training.php" method="post">
   <input type="submit" value="Training Menu"/>
</form>
<form action="request_games.php" method="post">
   <input type="submit" value="Games Menu"/>
</form>
<form action="playerRequests.php" method="post">
   <input type="submit" value="See Player Requests"/>
</form>
<form action="../index.php?loggedOut" method="post">
   <input type="submit" value="Logout"/>    
</form>


</html>
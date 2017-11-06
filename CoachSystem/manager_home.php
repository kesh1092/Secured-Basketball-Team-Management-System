<?php 
session_start();
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


// $ID = $_SESSION['ID'];
// echo 'id: '. $ID. '<br>';
// echo 'LoginID: '. $_SESSION['LoginID'] . ".<br>"; 
// print_r($_SESSION);


?>


<!-- HTML --><!-- HTML --><!-- HTML --><!-- HTML -->
<!-- HTML --><!-- HTML --><!-- HTML --><!-- HTML -->


<html>
<body style = "Color: #000000; background-color:#afbfff;">
<h1 align="center"><u>Manager Home</u></h1>

<form action="view_manager_info.php" method="post">
   <input type="submit" value="Manager Info"/>
</form>
<form action="player/request_player_info.php" method="post">
   <input type="submit" value="Player Information"/>
</form>
 <form action="training_files/view_trainings.php" method="post">
   <input type="submit" value="Trainings"/>
</form>
<!-- <form action="request_games.php" method="post">
   <input type="submit" value="Games Menu"/>
</form>
 -->
 <!--<h3>approve player login change requests goes here</h3>-->
 <form action="playerRequests.php" method="post">
   <input type="submit" value="View Player Login Requests"/>
 </form>
 <form action="certificates.php" method="post">
   <input type="submit" value="Certificates"/>
 </form>
  <form action="game_files/view_trainings.php" method="post">
   <input type="submit" value="View Games"/>
 </form>

<form action="assignPlayerGames.php" method="post">
   <input type="submit" value="Assign Games to Players"/>
 </form>
 <form action="assignPlayerTraining.php" method="post">
   <input type="submit" value="View and assign trainings to players"/>
 </form>
<form action="../index.php?loggedOut" method="post">
   <input type="submit" value="Logout"/>    
</form>

</body>
</html>
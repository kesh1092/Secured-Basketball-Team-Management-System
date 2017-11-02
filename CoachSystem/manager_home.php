<!--   -->

  <?php 
    // $message = "";
   if(isset($_GET['accountCreated'])) 
      echo 'Account successfully made'; 
  ?>


<html>


<h1 align="center">Manager Home</h1>

<p><?php echo $message; ?>

<form action="view_manager_info.php" method="post">
	<input type="submit" value="View Manager Info"/>
</form>
<form action="edit_manager_info.php" method="post">
	<input type="submit" value="Edit Manager Info"/>
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
<h3>approve player login change requests goes here</h3>
<form action="login.php" method="post">
	<input type="submit" value="Logout"/>
</form>


</html>

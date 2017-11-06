<?php
require_once('../../config.php');
session_start();

$getGameID = filter_var($_POST['GameID'], FILTER_SANITIZE_STRING);

$Name = filter_var($_POST['Name'], FILTER_SANITIZE_STRING);
$TrainingID = filter_var($_POST['Birthday'], FILTER_SANITIZE_STRING);
$Birthday = $_POST['Address'];
$Address = filter_var($_POST['OpponentTeam'], FILTER_SANITIZE_STRING);

// echo "TrainingID: ". $TrainingID. '<br>';


try
{
   $link = connectDB();


// Prepare the sql insert statement
   $sql = "UPDATE Game SET Date = '".$Name."', Result = '".$TrainingID."',  PlayingVenue = '".$Birthday."', OpponentTeam = '".$Address."' WHERE 
   GameID = '".$getGameID."'";
   if (mysqli_query($link, $sql)) {
      $message = 'Edited Manager';
   } else { 
      echo  "<br>Error: " . $sql . "<br>" . mysqli_error($link);
      exit();
   }

}

catch(Exception $e)
{
   $message = 'Unable to process request';
}


//REDIRECT
echo ("<script>
   window.location.assign('edit_particular_training.php?updated=". $getGameID. "');
   </script>");


?> 

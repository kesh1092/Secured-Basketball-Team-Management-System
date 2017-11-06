<?php
session_start(); 
require_once('../../config.php');


//Use filter_var to remove special characters from the inputs 
$TrainingName = $_POST['Date'];
// $_SESSION['LoginID'] = $LoginID;
$Instruction = $_POST['Result'];
$TimePeriodinHour = $_POST['PlayingVenue'];
$OpponentTeam = $_POST['OpponentTeam'];

echo 'test';
try
{
   $link = connectDB();

// Prepare the sql insert statement  
   $sql = "INSERT INTO Game (Date, Result, PlayingVenue, OpponentTeam) VALUES ('".$TrainingName."', '".$Instruction."', '".$TimePeriodinHour."', '".$OpponentTeam."')";

   if (!mysqli_query($link, $sql)) 
      { echo  "<br>Error: " . $sql . "<br>" . mysqli_error($link); exit();  }

   // $getIdQuery = " SELECT GameID FROM Manager WHERE LoginID = '".$LoginID ."';";
   // if (!mysqli_query($link, $getIdQuery))  
   //    echo  "<br>Error: " . $getIdQuery . "<br>" . mysqli_error($link);  

   // $response = $link->query($getIdQuery);

   // if ($response->num_rows) { 
   //    $row = $response->fetch_assoc();
// $_SESSION['GameID'] = $row["GameID"];
   } 
// else
//    $_SESSION['GameID'] = -1;        

   mysqli_close($link);    

//REDIRECT back to view_trainings page
   echo ("<script>
      window.location.assign('view_trainings.php?');
      </script>");

}
catch(Exception $e)
{
   $message = 'Unable to process request';
}


?>


<?php
session_start(); 
require_once('../../config.php');


//Use filter_var to remove special characters from the inputs 
$TrainingName = $_POST['TrainingName'];
// $_SESSION['LoginID'] = $LoginID;
$Instruction = $_POST['Instruction'];
$TimePeriodinHour = $_POST['TimePeriodinHour'];


try
{
   $link = connectDB();


   echo 'TEST 1 <br>';
// Prepare the sql insert statement  
   $sql = "INSERT INTO Training (TrainingName, Instruction, TimePeriodinHour) VALUES ('".$TrainingName."', '".$Instruction."', '".$TimePeriodinHour."')";

   if (!mysqli_query($link, $sql)) 
      { echo  "<br>Error: " . $sql . "<br>" . mysqli_error($link); exit();  }

   echo 'TEST 2 <br>';

   $getIdQuery = " SELECT ID FROM Manager WHERE LoginID = '".$LoginID ."';";
   if (!mysqli_query($link, $getIdQuery))  
      echo  "<br>Error: " . $getIdQuery . "<br>" . mysqli_error($link);  

   $response = $link->query($getIdQuery);

   if ($response->num_rows) { 
      $row = $response->fetch_assoc();
// $_SESSION['ID'] = $row["ID"];
   } 
// else
//    $_SESSION['ID'] = -1;        

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


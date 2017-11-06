<?php
require_once('../../config.php');
session_start();


$Name = filter_var($_POST['Name'], FILTER_SANITIZE_STRING);
$OriginalTrainingName = filter_var($_POST['OriginalTrainingName'], FILTER_SANITIZE_STRING);
$Birthday = $_POST['Birthday'];
$Address = filter_var($_POST['Address'], FILTER_SANITIZE_STRING);

// echo "Name: ". $Name. '<br>';


try
{
   $link = connectDB();


// Prepare the sql insert statement
   $sql = "UPDATE Training SET TrainingName = '".$Name."', Instruction = '".$Birthday."', TimePeriodinHour = '".$Address."' WHERE TrainingName = '".$OriginalTrainingName."'";
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
   window.location.assign('edit_particular_training.php?updated=". $Name. "');
   </script>");


?> 

<?php
require_once('../../config.php');
session_start();


$Name = $_POST['Name'];
$OriginalTrainingName = $_POST['OriginalTrainingName'];
$Birthday = $_POST['Birthday'];
$Address = $_POST['Address'];

// echo "Name: ". $Name. '<br>';


try
{
   $link = connectDB();

   //FULL
      // $sql = "UPDATE Training SET TrainingName = '".$Name."', Instruction = '".$Birthday."', TimePeriodinHour = '".$Address."' WHERE TrainingName = '".$OriginalTrainingName."'";


   if(is_null($Birthday) && is_null($Address))
   $sql = "UPDATE Training SET TrainingName = '".$Name."' WHERE TrainingName = '".$OriginalTrainingName."'";
//METHOD DOESNT SEEM TO WORK
   elseif (!is_null($Birthday)) 
      $sql = "UPDATE Training SET  Instruction = '".$Birthday."' WHERE TrainingName = '".$OriginalTrainingName."'";
   else
      $sql = "UPDATE Training SET  TimePeriodinHour = '".$Address."' WHERE TrainingName = '".$OriginalTrainingName."'";



   if (mysqli_query($link, $sql)) {
      $message = 'Edited Manager';
   } else { 
      // echo  "<br>Error: " . $sql . "<br>" . mysqli_error($link);

      echo ("<script>
         window.location.assign('alter_training.php?modifyError');         
         </script>");


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

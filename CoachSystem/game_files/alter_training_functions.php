<?php
session_start(); 
if(empty($_SESSION['LoginID'])) //THIS MUST BE THE FIRST LINE EXECUTED. otherwise it wont work
{
   header("Location: ../../index.php?redirected");  
   exit();
}

require_once('../../SQLFunctions.php');

$AcceptOption = filter_var($_POST['AcceptOption'], FILTER_SANITIZE_STRING);
$PassedUsername = filter_var($_POST['PASS'], FILTER_SANITIZE_STRING);

// echo 'logged in as: '. $PassedUsername . ".<br>"; 
// echo 'AcceptOption: '. $AcceptOption . ".<br>"; 



try
{
   $link = connectDB();


   if($AcceptOption == 'declineOne'){
      $sql = "DELETE FROM Game WHERE GameID = '".$PassedUsername."'";

      if (mysqli_query($link, $sql)) {
         $message = 'Players accounts have been rejected and/or declined.';
      } else { 
         // echo  "<br>Error: " . $sql . "<br>" . mysqli_error($link);

         echo ("<script>
            window.location.assign('alter_training.php?deleteError');
            </script>");
      }

   }
   // else { echo  "No changes have been made.";  }
   
   mysqli_close($link);

   echo ("<script>
      window.location.assign('alter_training.php');
      </script>");

}

catch(Exception $e)
{
   $message = 'Unable to process request';
}
   mysqli_close($link);


?>




<html>
<head>
   <title>Players Request Submit</title>
</head>
<body>ASDF
   <p><?php echo $message; ?>
   </body>
   </html>

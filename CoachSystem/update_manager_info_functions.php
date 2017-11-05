<?php


require_once('../config.php');
session_start();
$LoginID = $_SESSION['LoginID'];


//Store variables
//Use filter_var to remove special characters from the inputs 
// $LoginID = filter_var($_POST['LoginID'], FILTER_SANITIZE_STRING);
$Name = filter_var($_POST['Name'], FILTER_SANITIZE_STRING);
$Birthday = $_POST['Birthday'];
$Address = filter_var($_POST['Address'], FILTER_SANITIZE_STRING);
$Email = filter_var($_POST['Email'], FILTER_SANITIZE_STRING);
$PhoneNumber = filter_var($_POST['PhoneNumber'], FILTER_SANITIZE_STRING);
$Password = filter_var($_POST['Password'], FILTER_SANITIZE_STRING);

try
{
   $link = connectDB();

// Prepare the sql insert statement
   $sql = "UPDATE Manager SET Name = '".$Name."', Birthday = '".$Birthday."', Address = '".$Address."', Email = '".$Email."', PhoneNumber = '".$PhoneNumber."', Password = '".$Password."' WHERE LoginID = '".$LoginID."'";
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


// REDIRECT back to view_manager_info.php
echo ("<script>
   window.location.assign('view_manager_info.php?altered_info');
   </script>");


?>

<?php
include('session.php');
?>

<?php



require_once('SQLFunctions.php');
session_start();




//Check password length is not more than 8 and not less than 4 
if (strlen( $_POST['NewPassword']) > 8 || strlen($_POST['NewPassword']) < 4)
{
    $message = 'Incorrect Length for Password';
}


else
{

    //Store variables
    //Use filter_var to remove special characters from the inputs 
    $NewPassword = filter_var($_POST['NewPassword'], FILTER_SANITIZE_STRING);
    $ID = $_SESSION['user_id'];

    // Encrypt with password with sha1, a cryptographic hash function   
    // Never store plain text passwords in the database 
    $NewPassword = sha1( $NewPassword );
    
    
    try
    {
        
        //Connect to CRUD Database  mysqli(Server,User,Password,Database) 
        $link = connectDB();


        // Prepare the sql insert statement
        $sql = "UPDATE Player SET Password = '".$NewPassword."' WHERE ID = '".$ID."'";
        if (mysqli_query($link, $sql)) {
            $message = 'Password Changed';
        } else { 
            echo  "<br>Error: " . $sql . "<br>" . mysqli_error($link);
        }
        
    }

    catch(Exception $e)
    {
        $message = 'Unable to process request';
    }
    
    
}




?>

<html>
  <head>
    <title>Password Changed</title>
  </head>
  <body>
    <!-- Message is a variable that was populated previously based on the php above  -->    
    <p><?php echo $message; ?>
  </body>
</html>

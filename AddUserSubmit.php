
<?php



require_once('SQLFunctions.php');
session_start();

// Check that LoginID, and password are populated 
if(!isset( $_POST['LoginID'], $_POST['Password']))
{
    $message = 'Please enter a valid LoginID and password';
}
// Check LoginID length is not more than 16 and not less than 4 
elseif (strlen( $_POST['LoginID']) > 16 || strlen($_POST['LoginID']) < 4)
{
    $message = 'Incorrect Length for LoginID';
}
// Check password length is not more than 8 and not less than 4 
elseif (strlen( $_POST['Password']) > 8 || strlen($_POST['Password']) < 4)
{
    $message = 'Incorrect Length for Password';
}

else
{
    // Store LoginID and Passwords as variable  
    //Use filter_var to remove special characters from the inputs 
    $LoginID = filter_var($_POST['LoginID'], FILTER_SANITIZE_STRING);
    $Password = filter_var($_POST['Password'], FILTER_SANITIZE_STRING);
    $Name = filter_var($_POST['Name'], FILTER_SANITIZE_STRING);
    $Birthday = $_POST['Birthday'];
    

    // Encrypt with password with sha1, a cryptographic hash function   
    // Never store plain text passwords in the database 
    $Password = sha1( $Password );
    
    
    try
    {
         //Connect to CRUD Database  mysqli(Server,User,Password,Database) 
        $link = connectDB();

        // Check that LoginID does not already exist  
        $sql = "SELECT 1 FROM Player WHERE LoginID = '".$LoginID."'";
        if($result=mysqli_query($link,$sql)) 
        {
            if(mysqli_num_rows($result)>=1) {
              $message = "LoginID already exists";
            } else {
              // Prepare the sql insert statement  
              $sql = "INSERT INTO Player (LoginID, Password, Name, Birthday) VALUES ('".$LoginID."', '".$Password."', '".$Name."', '".$Birthday."')";
              if (mysqli_query($link, $sql)) {
                $message = 'New user added';
              } else { echo  "<br>Error: " . $sql . "<br>" . mysqli_error($link);  }
            }
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
    <title>Add New Player</title>
  </head>
  <body>
    <!-- Message is a variable that was populated previously based on the php above  -->    
    <p><?php echo $message; ?>
  </body>
</html>

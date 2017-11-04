
<?php


require_once('SQLFunctions.php');
session_start();

// Check if the user is already logged in  
if(isset( $_SESSION['user_id'] ))
{
    $message = 'User is already logged in';
}
// Check that LoginID and password are populated  
if(!isset( $_POST['LoginID'], $_POST['Password']))
{
    $message = 'Please enter a valid LoginID and password';
}
// Check LoginID length  
elseif (strlen( $_POST['LoginID']) > 16 || strlen($_POST['LoginID']) < 4)
{
    $message = 'Incorrect Length for LoginID';
}
// Check password length  
elseif (strlen( $_POST['Password']) > 8 || strlen($_POST['Password']) < 4)
{
    $message = 'Incorrect Length for Password';
}

else
{
    // Store LoginID and Passwords as variables 
    $LoginID = filter_var($_POST['LoginID'], FILTER_SANITIZE_STRING);
    $Password = filter_var($_POST['Password'], FILTER_SANITIZE_STRING);

    // Encrypt password with sha1 
    $Password = sha1( $Password );
    
    try
    {
         //Connect to CRUD Database  mysqli(Server,User,Password,Database) 
        $link = connectDB();

        // Prep SQL statement which will compare the user credentials with what is stored in the database 
        $sql = "SELECT ID FROM Player WHERE LoginID = '".$LoginID."' AND Password = '".$Password."'";
        //echo $sql."<br>"; 
        
        //Run the query 
        if($result=mysqli_query($link,$sql)) 
        {
          //assign the User_id from the database to the session user_id 
          while($row = mysqli_fetch_assoc($result)) {
            $user_id = $row['ID'];
            //echo "<br>user_id=".$user_id; 

            // Set the session user_id parameter  
            $_SESSION['user_id'] = $user_id;
            $_SESSION['timeout'] = time();
            ob_start();
            header("Location: PlayerPage.php");
            exit();
            $message = 'You are now logged in';
          }        
        }
        if($user_id == false) {
            $message = 'Login Failed';
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
    <title>LoginSubmit</title>
    </head>
    
    <body>
    <p><?php echo $message; ?>
    </body>
</html>

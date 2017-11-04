<?php
include('session.php');
?>


<?php



require_once('SQLFunctions.php');
session_start();

if(!isset($_SESSION['user_id'])) {
    
    $message = 'You must be logged in to access this page';
    
}

else {
    // copy the session user_id to a local variable
    $user_id = $_SESSION['user_id'];
    
    try {
        
         // Connect to CRUD Database
        $link = connectDB();

        // Prep SQL statement to find the user name based on the user_id 
        $sql = "SELECT LoginID FROM Player WHERE ID = ".$user_id;
        
        // execute the sql statement
        if($result=mysqli_query($link,$sql)) {
            
          // from the sql results, assign the LoginID that returned to the $LoginID variable 
          while($row = mysqli_fetch_assoc($result)) {
            $LoginID = $row['LoginID'];
          }        
        }

        // Return Status to User
        if($LoginID == false) {
            $message = 'Access Error';
        }
        else {
            $message = 'Welcome '.$LoginID;
        }
    }
    
    // if something goes wrong, return the following error
    catch (Exception $e) {
        $message = 'Unable to process request.';
    }
}



?>

<html>
    <head>
        <title>Test Login Status</title>
    </head>
    <body>
        <h2><?php echo $message;?></h2>
    </body>
</html>
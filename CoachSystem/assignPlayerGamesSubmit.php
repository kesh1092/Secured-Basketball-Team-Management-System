
<?php



require_once('../SQLFunctions.php');
session_start();


    //Store variables
    //Use filter_var to remove special characters from the inputs 
    $PlayerID = filter_var($_POST['PlayerID'], FILTER_SANITIZE_STRING);
    $GameID = filter_var($_POST['GameID'], FILTER_SANITIZE_STRING);

    try
    {
        
        //Connect to CRUD Database  mysqli(Server,User,Password,Database) 
        $link = connectDB();


        // Prepare the sql insert statement
        $sql = "INSERT INTO Play (PlayerID, GameID) VALUES (".$PlayerID.", ".$GameID .");";
        if (mysqli_query($link, $sql)) {
            $message = 'Edited Player';
        } else { 
            echo  "<br>Error: " . $sql . "<br>" . mysqli_error($link);
        }
        
    }

    catch(Exception $e)
    {
        $message = 'Unable to process request';
    }



?>

<html>
<form action="manager_home.php" method="post">
   <input type="submit" value="Home"/>
</form>
  <head>
    <title>Player has been assigned</title>
  </head>
  <body>
    <!-- Message is a variable that was populated previously based on the php above  -->    
    <p><?php echo $message; ?>
  </body>
</html>

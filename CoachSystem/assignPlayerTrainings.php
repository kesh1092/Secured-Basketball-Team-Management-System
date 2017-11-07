
<?php



require_once('../SQLFunctions.php');
session_start();


    //Store variables
    //Use filter_var to remove special characters from the inputs 
    $PlayerID = filter_var($_POST['PlayerID'], FILTER_SANITIZE_STRING);
    $TrainingName = filter_var($_POST['TrainingName'], FILTER_SANITIZE_STRING);
    $LoginID = $_SESSION['LoginID'];

    try
    {
        
        //Connect to CRUD Database  mysqli(Server,User,Password,Database) 
        $link = connectDB();
    
        // Prep SQL statement to find the user name based on the user_id 
        $sql = "SELECT ID FROM Manager WHERE LoginID = '". $LoginID . "';";
        
        // execute the sql statement
        if($result=mysqli_query($link,$sql)) {
            
          // from the sql results, assign the LoginID that returned to the $LoginID variable 
          while($row = mysqli_fetch_assoc($result)) {
            $ManagerID = $row['ID'];
          }        
        }  

        // Prepare the sql insert statement
        $sql2 = "INSERT INTO AssignTraining (PlayerID, ManagerID, TrainingName) VALUES (".$PlayerID.", ".$ManagerID.", '".$TrainingName."');";
        if (mysqli_query($link, $sql2)) {
            $message = 'Assigned Training to Player';
        } else { 
            echo  "<br>Error: " . $sql2 . "<br>" . mysqli_error($link);
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

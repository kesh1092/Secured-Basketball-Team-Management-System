
<?php



require_once('SQLFunctions.php');
session_start();


    //Store variables
    //Use filter_var to remove special characters from the inputs 
    $Name = filter_var($_POST['Name'], FILTER_SANITIZE_STRING);
    $Birthday = $_POST['Birthday'];
    $Address = filter_var($_POST['Address'], FILTER_SANITIZE_STRING);
    $Email = filter_var($_POST['Email'], FILTER_SANITIZE_STRING);
    $PhoneNumber = filter_var($_POST['PhoneNumber'], FILTER_SANITIZE_STRING);
    $PlayPos = filter_var($_POST['PlayPos'], FILTER_SANITIZE_STRING);

    try
    {
        
        //Connect to CRUD Database  mysqli(Server,User,Password,Database) 
        $link = connectDB();


        // Prepare the sql insert statement
        $sql = "UPDATE Player SET Name = '".$Name."', Birthday = '".$Birthday."', Address = '".$Address."', Email = '".$Email."', PhoneNumber = '".$PhoneNumber."', PlayPos = '".$PlayPos."' WHERE LoginID = 'kricheso'";
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
  <head>
    <title>Add New Player</title>
  </head>
  <body>
    <!-- Message is a variable that was populated previously based on the php above  -->    
    <p><?php echo $message; ?>
  </body>
</html>

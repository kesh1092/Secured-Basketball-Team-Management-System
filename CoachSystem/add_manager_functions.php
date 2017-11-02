
 
  
<?php
// echo "TEST 1";

require_once('SQLFunctions.php');
session_start();

// Check that LoginID, and password are populated 
if(!isset( $_GET['LoginID'], $_GET['Password']))
{
    $message = 'Please enter a valid LoginID and password';

}
// Check LoginID length is not more than 16 and not less than 4 
elseif (strlen( $_GET['LoginID']) > 16 || strlen($_GET['LoginID']) < 4)
{
    $message = 'Incorrect Length for LoginID';
}
// Check password length is not more than 8 and not less than 4 
elseif (strlen( $_GET['Password']) > 8 || strlen($_GET['Password']) < 4)
{
    $message = 'Incorrect Length for Password';
}

else
{
    //Store variables
    //Use filter_var to remove special characters from the inputs 
    $LoginID = filter_var($_GET['LoginID'], FILTER_SANITIZE_STRING);
    $Password = filter_var($_GET['Password'], FILTER_SANITIZE_STRING);
    $Name = filter_var($_GET['Name'], FILTER_SANITIZE_STRING);
    $Birthday = $_GET['Birthday'];
    $Address = filter_var($_GET['Address'], FILTER_SANITIZE_STRING);
    $Email = filter_var($_GET['Email'], FILTER_SANITIZE_STRING);
    $PhoneNumber = filter_var($_GET['PhoneNumber'], FILTER_SANITIZE_STRING);
    // $PlayPos = filter_var($_GET['PlayPos'], FILTER_SANITIZE_STRING);
        
    
    try
    {
         //Connect to CRUD Database  mysqli(Server,User,Password,Database) 
        $link = connectDB();

        // Check that LoginID does not already exist  
        $sql = "SELECT 1 FROM Manager WHERE LoginID = '".$LoginID."'";
        if($result=mysqli_query($link,$sql)) 
          if(mysqli_num_rows($result)>=1) {
            // $message = "LoginID already exists";
            // echo ($LoginID); 
            mysqli_close($link);
            echo ("<script>
                    // alert('LoginID already exists already as ManagerID. Pick a new ID');
                    window.location.assign('add_manager.php?badID');
                   </script>");
// header("Location: javascript:history.go(-1)");

// header("location:javascript://history.go(-1)");
            // header('Location: ' . $_SERVER['HTTP_REFERER']);            
            // exit();
          } 
 
         // Check that LoginID does not already exist  
        $sql = "SELECT 1 FROM Player WHERE LoginID = '".$LoginID."'";
        if($result=mysqli_query($link,$sql)) 
          if(mysqli_num_rows($result)>=1) {
            // $message = "LoginID already exists";
            // echo ($LoginID); 
            mysqli_close($link);
            echo ("<script>
                    alert('LoginID already exists already as PlayerID. Pick a new ID');
                    window.location.assign('add_manager.php?badID');
                   </script>");
          } 


        // Prepare the sql insert statement  
        $sql = "INSERT INTO Manager (LoginID, Password, Name, Birthday, Address, Email, PhoneNumber) VALUES ('".$LoginID."', '".$Password."', '".$Name."', '".$Birthday."', '".$Address."', '".$Email."', '".$PhoneNumber."')";
        if (mysqli_query($link, $sql)) {
          $message = 'New Manager added';
        } else { echo  "<br>Error: " . $sql . "<br>" . mysqli_error($link);  }

        mysqli_close($link);


        mysqli_close($link);
        echo ("<script>
                window.location.assign('manager_home.php?accountCreated');
               </script>");

    }
    catch(Exception $e)
    {
        $message = 'Unable to process request';
    }
}

?>


<!-- <html>
<h1 align="center" 
 <?php echo $message; ?>
</h1>
</html> -->

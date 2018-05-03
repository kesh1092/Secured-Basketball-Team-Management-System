<?php
session_start();
// require_once('config.php');
require_once('SQLFunctions.php');


$LoginID =  'qwer'; //passed on from login.php
// $passAtempt =  $_POST['Password']; //passed on from login.php
$Password =  'qwer'; //passed on from login.php


// $_SESSION['timeout'] = time(); //not implemented
// echo 'Password: '. $passAtempt . ".<br>"; 


//attempt manager login
try
{
 

//PLAYER LOGIN
     
// echo 'loginID: ' .$LoginID. '<br>';
// echo 'Password: ' .$Password. '<br>';

    // Encrypt password with sha1 
    // $Password = sha1( $Password );
    
 
         //Connect to CRUD Database  mysqli(Server,User,Password,Database) 
      $link = connectDB();
      
         // Prep SQL statement which will compare the user credentials with what is stored in the database 
      $sql = "SELECT ID FROM Player WHERE LoginID = '".$LoginID."' AND RequestStatus = 'accepted' AND Password = '".$Password."'";
        //echo $sql."<br>"; 
      
            // echo 'test3';
    //Run the query 
      if($result=mysqli_query($link,$sql)) 
      {
          //assign the User_id from the database to the session user_id 
        while($row = mysqli_fetch_assoc($result)) {
          $user_id = $row['ID'];

// echo '$user_id: '. $user_id. '<br>';


          $_SESSION['user_id'] = $user_id;

          mysqli_close($link);
 
          echo ("<script>
            alert('Player logging In...');
            window.location.assign('PlayerSystem/PlayerPage.php');
            </script>");

          exit();
        }        
      }
      if($user_id == false) {
        $message = 'Login Failed';
      }
     
  


// REDIRECT back to login page
   echo ("<script>
                  // alert('Invalide LoginID or Password...');
      window.location.assign('index.php?invalid2');
      </script>");

}

catch(Exception $e)
{
   $message = 'Unable to process request';
}


?>



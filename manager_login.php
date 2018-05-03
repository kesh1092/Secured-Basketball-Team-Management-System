<?php
ini_set('session.cache_limiter','public');
session_cache_limiter(false);

session_start();
// require_once('config.php');
require_once('SQLFunctions.php');


$LoginID =  'asdf'; //passed on from login.php
// $passAtempt =  $_POST['Password']; //passed on from login.php
$passAtempt =  'asdf'; //passed on from login.php


// $_SESSION['timeout'] = time(); //not implemented
// echo 'Password: '. $passAtempt . ".<br>"; 


//attempt manager login
try
{
   $link = connectDB();

//MANAGER LOGIN
   $sql = "SELECT LoginID FROM Manager WHERE LoginID = '".$LoginID."'";

   if($response=mysqli_query($link,$sql)) 
   {
      if(mysqli_num_rows($response)==1) 
      {
         $getIdQuery = "SELECT ID, Password FROM Manager WHERE LoginID = '".$LoginID."'";

         if ($response =mysqli_query($link, $getIdQuery)) 
         { 
            $row = mysqli_fetch_assoc($response);
            $passReal = $row['Password'];
            $ID = $row['ID'];

            if($passAtempt == $passReal)
            {
               if ($response->num_rows) 
               {   
                  $_SESSION['ID'] = $row["ID"];
                  $ID = $row["ID"];
               } 
               else
                  $_SESSION['ID'] = -1;

               $ID = $_SESSION['ID'];
               // echo 'id2: '. $ID. '<br>';


               $_SESSION['LoginID'] = $LoginID;      

               // echo '<sbr>logged in<br>';
               mysqli_close($link);

               echo ("<script>
                  // alert('Logging In...');
                  window.location.assign('CoachSystem/manager_home.php?loggedIn');
                  </script>");
            }
         }
         else
            { echo  "<br>Error: " . $getIdQuery . "<br>" . mysqli_error($link);  }

      } 
      elseif(mysqli_num_rows($response)!=0) 
      {
         echo 'Theres '. mysqli_num_rows($response). ' identical Manager LoginIDs. Exit app.<br>'; 
         exit();
      }
   }


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



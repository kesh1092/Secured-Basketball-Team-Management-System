<?php
session_start();
require_once('config.php');


$LoginID =  $_POST['LoginID']; //passed on from login.php
$passAtempt =  $_POST['Password']; //passed on from login.php
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
               echo 'id2: '. $ID. '<br>';


               $_SESSION['LoginID'] = $LoginID;      

               echo '<br>logged in<br>';
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
   $sql = "SELECT LoginID FROM Player WHERE LoginID = '".$LoginID."'";

   if($response=mysqli_query($link,$sql)) 
   {
      if(mysqli_num_rows($response)==1) 
      {
         $getIdQuery = "SELECT ID, Password FROM Player WHERE LoginID = '".$LoginID."'";

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
               echo 'id2: '. $ID. '<br>';


               $_SESSION['LoginID'] = $LoginID;      

               echo '<br>logged in<br>';
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
         echo 'Theres '. mysqli_num_rows($response). ' identical Player LoginIDs. Exit app.<br>'; 
         exit();
      }
   }


// REDIRECT back to login page
   echo ("<script>
                  // alert('Invalide LoginID or Password...');
      window.location.assign('login.php?invalid');
      </script>");

}

catch(Exception $e)
{
   $message = 'Unable to process request';
}


?>



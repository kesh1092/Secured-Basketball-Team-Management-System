
<?php
	// echo 'test 2';
	require_once('SQLFunctions.php');
	// session_start();

 

  //Store variables
  //Use filter_var to remove special characters from the inputs 
  $LoginID =  $_POST['LoginID'] ;
  $Password =  $_POST['Password'] ;
      
  
  try
  {
      //Connect to Database  mysqli(Server,User,Password,Database) 
      $link = connectDB();

      $sql = "SELECT 1 FROM Manager WHERE LoginID = '".$LoginID."'";
      if($result=mysqli_query($link,$sql)) 
        if(mysqli_num_rows($result)>=1) {
          mysqli_close($link);
          echo ("<script>
                  alert('Logging In...');
                  window.location.assign('manager_home.php?loggedIn');
                 </script>");
        } 


//PLAYER LOGIN .just redirect to correct page and uncomment
      // $sql = "SELECT 1 FROM Player WHERE LoginID = '".$LoginID."'";
      // if($result=mysqli_query($link,$sql)) 
      //   if(mysqli_num_rows($result)>=1) {
      //     mysqli_close($link);
      //     echo ("<script>
      //             //alert('Logging In...');
      //             window.location.assign('add_manager.php');
      //            </script>");
      //   } 


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



<?php






include('SQLFunctions.php');

if ( !empty($_POST)) {
  // Store data from html form POST action into variables
  $tdTitle = $_POST['Address'];
  $tdDate  = $_POST['Birthday'];
  $tdDescr = $_POST['Email'];
         
/*Open the database connection based on config.php file settings*/
  $link = connectDB();

  /*Prepare the SQL INSERT Statement*/
  $sql = "INSERT INTO Player (Address, Birthday, Email) VALUES ('".$tdTitle."','".$tdDescr."','".$tdDate."');";
  /*Insert values into the database*/
  if (mysqli_query($link, $sql)) {
  /*    echo "<br>New record created successfully";*/
  } else {
      echo  "<br>Error: " . $sql . "<br>" . mysqli_error($link);
  }

/*Close database connection*/
mysqli_close ( $link );

/*Forward User Back to Main View*/  
header("Location: BasketballApp.php");

}











/*


include('SQLFunctions.php');

if ( !empty($_POST)) {
    
  // Store data from html form POST action into variables
  $BballAddress = $_POST['Address'];
  $BballBirthday  = $_POST['Birthday'];
  $BballEmail = $_POST['Email'];
         
  // Open the database connection based on config.php file settings 
  $link = connectDB();

  // Prepare the SQL INSERT Statement 
  $sql = "INSERT INTO Player (Address, Birthday, Email) VALUES ('".$BballAddress."','".$BballBirthday."','".$BballEmail."');";
  
  //Insert values into the database
  if (mysqli_query($link, $sql)) {
  // echo "<br>New record created successfully";
  } else {
      echo  "<br>Error: " . $sql . "<br>" . mysqli_error($link);
  }

// Close database connection
mysqli_close ( $link );

// Forward User Back to Main View
header("Location: BasketballApp.php");

}


*/

?>
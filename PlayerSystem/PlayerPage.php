<?php
include('session.php');

session_start();
require_once('SQLFunctions.php');

if(isset($_GET['Edited'])) 
   echo 'Player Edited<br>'; 


$var = $_SESSION['timeout'] - $_SESSION['session'];
echo 'LOGOUT(function) in '. $var . ' seconds<br>'; 



// echo '$_SESSION["user_id"]: '. $_SESSION["user_id"] . ".<br>"; 
$user_id = $_SESSION["user_id"];


try {

  $link = connectDB();

        // Prep SQL statement to find the user name based on the user_id 
  $sql = "SELECT LoginID, Name, Birthday, Address, Email, PhoneNumber, PlayerPos FROM Player WHERE ID = ".$user_id;

        // execute the sql statement
  if($result=mysqli_query($link,$sql)) {

          // from the sql results, assign the LoginID that returned to the $LoginID variable 
    while($row = mysqli_fetch_assoc($result)) {
      $LoginID = $row['LoginID'];
      $Name = $row['Name'];
      $Birthday = $row['Birthday'];
      $Address = $row['Address'];
      $Email = $row['Email'];
      $PhoneNumber = $row['PhoneNumber'];
      $PlayerPos = $row['PlayerPos'];
    }        
  }


        // Prep SQL statement to find the user name based on the user_id 
  $sql2 = "SELECT Year, TotalPoints, ASPG FROM Stats WHERE PlayerID = ".$user_id;

        // execute the sql statement
  if($result2=mysqli_query($link,$sql2)) {

          // from the sql results, assign the LoginID that returned to the $LoginID variable 
    while($row = mysqli_fetch_assoc($result2)) {
      $Year = $row['Year'];
      $TotalPoints = $row['TotalPoints'];
      $ASPG = $row['ASPG'];
    }        
  }


        // Prep SQL statement
  $sql3 = "SELECT TrainingName FROM AssignTraining WHERE PlayerID = ".$user_id;

        // execute the sql statement
  if($result3=mysqli_query($link,$sql3)) {

    while($row = mysqli_fetch_assoc($result3)) {
      $TrainingName = $row['TrainingName'];
    }        
  }


        // Prep SQL statement
  $sql4 = "SELECT Instruction, TimePeriodinHour FROM Training WHERE TrainingName = '". $TrainingName . "';";

        // execute the sql statement
  if($result4=mysqli_query($link,$sql4)) {

    while($row = mysqli_fetch_assoc($result4)) {
      $Instruction = $row['Instruction'];
      $TimePeriodinHour = $row['TimePeriodinHour'];
    }        
  }

        // Prep SQL statement
  $sql5 = "SELECT ManagerID FROM AssignTraining WHERE PlayerID = ".$user_id;

        // execute the sql statement
  if($result5=mysqli_query($link,$sql5)) {

    while($row = mysqli_fetch_assoc($result5)) {
      $ManagerID = $row['ManagerID'];
    }        
  }

        // Prep SQL statement
  $sql6 = "SELECT Name FROM Manager WHERE ID = ".$ManagerID;

        // execute the sql statement
  if($result6=mysqli_query($link,$sql6)) {

    while($row = mysqli_fetch_assoc($result6)) {
      $ManagerName = $row['Name'];
    }        
  }

        // Return Status to User
  if($LoginID == false) {
    $message = 'Access Error';
  }
  else {
    $NOICE = 'NNNNOIICEEEEEE';
  }
}

    // if something goes wrong, return the following error
catch (Exception $e) {
  $message = 'Unable to process request.';
}

?>


<html>
<head>
  <title>View Player Info</title>
  <link href="styles.css" rel="stylesheet" type="text/css"
</head>

<body>
  <h1><br><center><u>View Player Info</u></center></h1>
  <h2></h2>
  <form action="PlayerPageSubmit.php" method="post">
    <fieldset style = "Color: #000000; border-color: #2645c1; border-width: 10px; border-style: solid;">

      <p>
        <label>Name</label>
        <input type="text" name="Name" value="<?php echo $Name;?>" minlength="4" maxlength="64" required/>
        <i>(4-64 characters)</i>
      </p>
      <p>

        <p>
          <label>Birthday</label>
          <input type="date" name="Birthday" value="<?php echo $Birthday;?>" required/>
        </p>

        <p>
          <label>Address</label>
          <input type="text" name="Address" value="<?php echo $Address;?>" minlength="4" maxlength="128" required/>
          <i>(4-128 characters)</i>
        </p>
        <p>    

          <p>
            <label>Email</label>
            <input type="text" name="Email" value="<?php echo $Email;?>" minlength="4" maxlength="32" required/>
            <i>(4-32 characters)</>
            </p>
            <p>   

              <p>
                <label>Phone Number</label>
                <input type="number" name="PhoneNumber" value="<?php echo $PhoneNumber;?>" min="1000000000" max="9999999999" required/>
                <i>(10 characters, no dashes or parentheses)</i>
              </p>
              <p> 

                <p>
                  <label>Player Position</label>

                  <?php if ($PlayerPos == "center") { ?>  
                  <select name="PlayerPos">
                    <option value="point guard">point guard</option>
                    <option value="shooting guard">shooting guard</option>
                    <option value="small forward">small forward</option>
                    <option value="power forward">power forward</option>
                    <option value="center" selected>center</option>
                  </select> 
                  <?php } ?>  

                  <?php if ($PlayerPos == "power forward") { ?>  
                  <select name="PlayerPos">
                    <option value="point guard">point guard</option>
                    <option value="shooting guard">shooting guard</option>
                    <option value="small forward">small forward</option>
                    <option value="power forward" selected>power forward</option>
                    <option value="center">center</option>
                  </select> 
                  <?php } ?>

                  <?php if ($PlayerPos == "small forward") { ?>  
                  <select name="PlayerPos">
                    <option value="point guard">point guard</option>
                    <option value="shooting guard">shooting guard</option>
                    <option value="small forward" selected>small forward</option>
                    <option value="power forward">power forward</option>
                    <option value="center">center</option>
                  </select> 
                  <?php } ?>  

                  <?php if ($PlayerPos == "shooting guard") { ?>  
                  <select name="PlayerPos">
                    <option value="point guard">point guard</option>
                    <option value="shooting guard" selected>shooting guard</option>
                    <option value="small forward">small forward</option>
                    <option value="power forward">power forward</option>
                    <option value="center">center</option>
                  </select> 
                  <?php } ?>

                  <?php if ($PlayerPos == "point guard") { ?>  
                  <select name="PlayerPos">
                    <option value="point guard" selected>point guard</option>
                    <option value="shooting guard">shooting guard</option>
                    <option value="small forward">small forward</option>
                    <option value="power forward">power forward</option>
                    <option value="center">center</option>
                  </select> 
                  <?php } ?> 

                </p>
                <p>

                  <input type="hidden" name="LoginID" value="<?php echo $LoginID?>">

                  <p> 
                    <input type="submit" value="Submit Changes" />
                  </p>
                  <br>
                  <p>
                    <h3><u>Stats:</u></h3>
                    <label>Year: <?php echo $Year;?> <br> Total Points: <?php echo $TotalPoints;?> <br> ASPG: <?php echo $ASPG;?></label>
                  </p>

                  <p>
                    <h3><u>Trainings:</u></h3>
                    <label>Manager: <?php echo $ManagerName?> <br> Training Name: <?php echo $TrainingName;?> <br> Instruction: <?php echo $Instruction;?> <br> Length: <?php echo $TimePeriodinHour;?> hour(s)</label>
                  </p>


                </fieldset>
              </form>
            </body>
            </html>

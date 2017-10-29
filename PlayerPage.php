<?php

//Begin Session
session_start();
require_once('SQLFunctions.php');


    $user_id = $_SESSION['user_id'];
    try {
        
         // Connect to CRUD Database
        $link = connectDB();

        // Prep SQL statement to find the user name based on the user_id 
        $sql = "SELECT LoginID, Name, Birthday, Address, Email, PhoneNumber, PlayPos FROM Player WHERE ID = ".$user_id;
        
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
            $PlayPos = $row['PlayPos'];
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
        
        
        // Prep SQL statement to find the user name based on the user_id 
        $sql3 = "SELECT TrainingName FROM AssignTraining WHERE PlayerID = ".$user_id;
        
        // execute the sql statement
        if($result3=mysqli_query($link,$sql3)) {
            
          // from the sql results, assign the LoginID that returned to the $LoginID variable 
          while($row = mysqli_fetch_assoc($result3)) {
            $TrainingName = $row['TrainingName'];
          }        
        }
        
        // Prep SQL statement to find the user name based on the user_id 
        $sql4 = "SELECT Instruction, TimePeriodinHour FROM Training WHERE TrainingName = ".$TrainingName;
        
        // execute the sql statement
        if($result4=mysqli_query($link,$sql4)) {
            
          // from the sql results, assign the LoginID that returned to the $LoginID variable 
          while($row = mysqli_fetch_assoc($result4)) {
            $Instruction = $row['Instruction'];
            $TimePeriodinHour = $row['TimePeriodinHour'];
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
</head>

<body>
<h2>View Player Info</h2>
<h2></h2>
<form action="PlayerPageSubmit.php" method="post">
  <fieldset>

    <p>
      <label>Name</label>
      <input type="text" name="Name" value="<?php echo $Name;?>" maxlength="64" required/>
    </p>
    <p>

    <p>
      <label>Birthday</label>
      <input type="date" name="Birthday" value="<?php echo $Birthday;?>" required/>
    </p>
    
    <p>
      <label>Address</label>
      <input type="text" name="Address" value="<?php echo $Address;?>" maxlength="128" required/>
    </p>
    <p>    
    
    <p>
      <label>Email</label>
      <input type="text" name="Email" value="<?php echo $Email;?>" maxlength="32" required/>
    </p>
    <p>   
    
    <p>
      <label>Phone Number</label>
      <input type="text" name="PhoneNumber" value="<?php echo $PhoneNumber;?>" minlength="10" maxlength="10" required/>
    </p>
    <p> 
    
    <p>
      <label>Player Position</label>
      <input type="text" name="PlayPos" value="<?php echo $PlayPos;?>" minlength="4" maxlength="20" required/>
    </p>
    <p> 
    
    <p> 
      <input type="submit" value="Submit Changes" />
    </p>
    
    <p>
        <h3>Stats</h3>
        <label>Year: <?php echo $Year;?> <br> Total Points: <?php echo $TotalPoints;?> <br> ASPG: <?php echo $ASPG;?></label>
    </p>
    
    <p>
        <h3>Trainings</h3>
        <label>Training Name: <?php echo $TrainingName;?> <br> Instruction: <?php echo $Instruction;?> <br> Length: <?php echo $TimePeriodinHour;?> hours</label>
    </p>
    
  </fieldset>
</form>
</body>
</html>

<?php //code handles view and editing of Manager information, but not: loginID + Password
session_start(); 


require_once('../../config.php');
$LoginID = $_SESSION['LoginID'];

$getTrainingID = filter_var($_POST['PASS'], FILTER_SANITIZE_STRING); 

if(isset($_GET['updated'])) 
   $getTrainingID = $_GET['updated']; 

// echo "getTrainingID: ". $getTrainingID. '<br>';



try 
{
// Connect to  Database
   $link = connectDB();

// Prep SQL statement to find the user name based on the LoginID 
   $sql = "SELECT Date, Result, PlayingVenue, OpponentTeam FROM Game WHERE GameID = '" .$getTrainingID. "'";

// execute the sql statement
   if($result=mysqli_query($link,$sql)) {

// from the sql results, assign the LoginID that returned to the $LoginID variable 
      while($row = mysqli_fetch_assoc($result)) {
         $TrainingName = $row['Date'];
         $Instruction = $row['Result'];
         $TimePeriodinHour = $row['PlayingVenue'];
         $OpponentTeam = $row['OpponentTeam'];
      }        
   }
}

// if something goes wrong, return the following error
catch (Exception $e) {
   $message = 'Unable to process request.';
}

?>


<!-- HTML --><!-- HTML --><!-- HTML --><!-- HTML -->
<!-- HTML --><!-- HTML --><!-- HTML --><!-- HTML -->


<html>
<head>
   <title>Edit Games</title>
   <link href="styles.css" rel="stylesheet" type="text/css"
</head>

<body>
   <h1><center><u>Edit Games</u></center></h1>


   <form action="alter_training.php" method="post">
      <p> 
         <input type="submit" value="List All Games" />
      </p>
   </form>



   <form action="edit_particular_training_functions.php" method="post">

      <fieldset style = "Color: #000000; border-color: #2645c1; border-width: 10px; border-style: solid;">


         <input type="hidden" name="GameID" value="<?php echo $getTrainingID;?>">

         <p>
            <label>Date: </label>
            <input type="date" name="Name" value="<?php echo $TrainingName;?>" required>
         </p>


         <p>
            <label>Result: </label>
            <input type="text" name="Birthday" value="<?php echo $Instruction;?>" required/>
         </p>

         <p>
            <label>Playing Venue: </label>
            <input type="text" name="Address" value="<?php echo $TimePeriodinHour;?>" required/>
         </p>

         <p>
            <label>Opponent Team: </label>
            <input type="text" name="OpponentTeam" value="<?php echo $OpponentTeam;?>" required/>
         </p>



         <p> 
            <input type="submit" value="Submit Changes" />
         </p>

      </fieldset>
   </form>



</body>
</html>


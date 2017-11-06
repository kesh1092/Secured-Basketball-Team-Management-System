<?php //code handles view and editing of Manager information, but not: loginID + Password
session_start(); 


require_once('../../config.php');
$LoginID = $_SESSION['LoginID'];

$getTrainingName = filter_var($_POST['PASS'], FILTER_SANITIZE_STRING); 

if(isset($_GET['updated'])) 
   $getTrainingName = $_GET['updated']; 

// echo "getTrainingName: ". $getTrainingName. '<br>';



try 
{
// Connect to  Database
   $link = connectDB();

// Prep SQL statement to find the user name based on the LoginID 
   $sql = "SELECT TrainingName, Instruction, TimePeriodinHour FROM Training WHERE TrainingName = '" .$getTrainingName. "'";

// execute the sql statement
   if($result=mysqli_query($link,$sql)) {

// from the sql results, assign the LoginID that returned to the $LoginID variable 
      while($row = mysqli_fetch_assoc($result)) {
         $TrainingName = $row['TrainingName'];
         $Instruction = $row['Instruction'];
         $TimePeriodinHour = $row['TimePeriodinHour'];
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
   <title>Edit Training</title>
   <link href="styles.css" rel="stylesheet" type="text/css"
</head>

<body>
   <h1><center><u>Edit Training</u></center></h1>


   <form action="alter_training.php" method="post">
      <p> 
         <input type="submit" value="List All Trainings" />
      </p>
   </form>



   <form action="edit_particular_training_functions.php" method="post">

      <fieldset style = "Color: #000000; border-color: #2645c1; border-width: 10px; border-style: solid;">

         <p>
            <label>Training Name: </label>
            <input type="text" name="Name" value="<?php echo $TrainingName;?>" required>
         </p>

            <input type="hidden" name="OriginalTrainingName" value="<?php echo $getTrainingName;?>">

         <p>
            <label>Instruction: </label>
            <input type="date" name="Birthday" value="<?php echo $Instruction;?>" required/>
         </p>

         <p>
            <label>Time (hr): </label>
            <input type="text" name="Address" value="<?php echo $TimePeriodinHour;?>" required/>
         </p>


         <p> 
            <input type="submit" value="Submit Changes" />
         </p>

      </fieldset>
   </form>



</body>
</html>


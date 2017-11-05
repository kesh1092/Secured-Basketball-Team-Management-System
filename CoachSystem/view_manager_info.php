<?php //code handles view and editing of Manager information, but not: loginID + Password
session_start(); 
if(empty($_SESSION['LoginID'])) //THIS MUST BE THE FIRST LINE EXECUTED. otherwise it wont work
{
   header("Location: ../index.php?redirected");  
   exit();
}

require_once('../config.php');
$LoginID = $_SESSION['LoginID'];

$ID = $_SESSION['ID'];
// echo 'id: '. $ID. '<br>';


try {
// Connect to  Database
   $link = connectDB();

// Prep SQL statement to find the user name based on the LoginID 
   $sql = "SELECT LoginID, Name, Birthday, Address, Email, PhoneNumber, Password FROM Manager WHERE ID = ".$ID;

// execute the sql statement
   if($result=mysqli_query($link,$sql)) {

// from the sql results, assign the LoginID that returned to the $LoginID variable 
      while($row = mysqli_fetch_assoc($result)) {
// $LoginID = $row['LoginID']; GET FROM $_SESSION
         $Name = $row['Name'];
         $Birthday = $row['Birthday'];
         $Address = $row['Address'];
         $Email = $row['Email'];
         $PhoneNumber = $row['PhoneNumber'];
         $Password = $row['Password'];
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
   <title>Manager Info</title>
   <link href="styles.css" rel="stylesheet" type="text/css"
</head>

<body>
   <h1><center><u>Manager Info</u></center></h1>
   <h2></h2>

   <form action="manager_home.php" method="post">
      <p> 
         <input type="submit" value="Manager Home" />
      </p>
   </form>





   <form action="update_manager_info_functions.php" method="post">
      <fieldset style = "Color: #000000; border-color: #2645c1; border-width: 10px; border-style: solid;">


<p>
   <label>Name</label>
   <input type="text" name="Name" value="<?php echo $Name;?>" minlength="4" maxlength="64" required/>
   <i>(4-64 characters)</i>
</p>


<p>
   <label>Birthday</label>
   <input type="date" name="Birthday" value="<?php echo $Birthday;?>" required/>
</p>

<p>
   <label>Address</label>
   <input type="text" name="Address" value="<?php echo $Address;?>" minlength="4" maxlength="128" required/>
   <i>(4-12 characters)</i>
</p>

<p>
   <label>Email</label>
   <input type="text" name="Email" value="<?php echo $Email;?>" minlength="4" maxlength="32" required/>
   <i>(4-32 characters)</i>
</p>

<p>
   <label>Phone Number</label>
   <input type="number" name="PhoneNumber" value="<?php echo $PhoneNumber;?>" minlength="10" maxlength="10" required/>
   <i>(10 characters, no dashes or parentheses)</i>
</p>


<p>
   <label>Password</label>
   <input type="text" name="Password" value="<?php echo $Password;?>" required/>
</p>

<br>
<p> 
   <input type="submit" value="Submit Changes" />
</p>

<!--     
<br>
<p>
<h3><u>Stats:</u></h3>
<label>Year: <?php echo $Year;?> <br> Total Points: <?php echo $TotalPoints;?> <br> ASPG: <?php echo $ASPG;?></label>
</p>

<p>
<h3><u>Trainings:</u></h3>
<label>Training Name: <?php echo $TrainingName;?> <br> Instruction: <?php echo $Instruction;?> <br> Length: <?php echo $TimePeriodinHour;?> hours</label>
</p>
-->


</fieldset>
</form>



</body>
</html>


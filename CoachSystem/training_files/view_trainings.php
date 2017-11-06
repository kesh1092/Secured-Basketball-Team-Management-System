<?php //code handles view and editing of Manager information, but not: loginID + Password
session_start(); 
if(empty($_SESSION['LoginID'])) //THIS MUST BE THE FIRST LINE EXECUTED. otherwise it wont work
{
	header("Location: ../../index.php?redirected");  
	exit();
}
?>


<html>

<form action="../manager_home.php" method="post">
	<p> 
		<input type="submit" value="Manager Home" />
	</p>
</form>

<form action="alter_training.php" method="post">
	<p> 
		<input type="submit" value="Alter Trainings" />
	</p>
</form>



<form action="add_training_functions.php" method="post">
	<fieldset style = "Color: #000000; border-color: #2645c1; border-width: 10px; border-style: solid;">

		<h2 align="center">Add New Training </h2>

		<p>
			<label>Training Name</label>
			<input type="text" name="TrainingName" required/>
		</p>

		<p>
			<label>Instruction</label>
			<input type="text" name="Instruction" required/>
		</p>

		<p>
			<label>TimePeriodinHour</label>
			<input type="text" name="TimePeriodinHour" required/>
		</p>
		<br>

		<p> 
			<input type="submit" value="Submit Changes" />
		</p>

	</fieldset>
</form>

<br>



<!-- PHP --><!-- PHP --><!-- PHP --><!-- PHP -->
<!-- PHP --><!-- PHP --><!-- PHP --><!-- PHP -->


<fieldset style = "Color: #000000; border-color: #2645c1; border-width: 10px; border-style: solid;">
	<?php 


	echo ' <h1><center><u>Trainings</u></center></h1><br>';


	require_once('../../config.php');
// $LoginID = $_SESSION['LoginID'];

// $ID = $_SESSION['ID'];
// echo 'id: '. $ID. '<br>';

//VIEW TRAININGS CODE
	try {
// Connect to  Database
		$link = connectDB();

// Prep SQL statement to find the user name based on the LoginID 
		$sql = "SELECT TrainingName, Instruction, TimePeriodinHour FROM Training";

		if($response=mysqli_query($link,$sql)) 
		{
			echo '<table align="left"
			cellspacing="22" cellpadding="8">
			<tr><td align="left"><b>Training Name</b></td>
			<td align="center"><b>Instruction</b></td>
			<td align="center"><b>Hour Amount</b></td></tr>';


			while($row = mysqli_fetch_array($response)) 
			{
// $LoginID = $row['LoginID']; GET FROM $_SESSION
				$TrainingName = $row['TrainingName'];
				$Instruction = $row['Instruction'];
				$TimePeriodinHour = $row['TimePeriodinHour'];

				echo '<tr><td align="left">' .
				$TrainingName . '</td><td align="left">' .
				$Instruction . '</td><td align="left">' .
				$TimePeriodinHour . '</td><td align="left">';
				echo '</tr>';

			}        
		}



	}

// if something goes wrong, return the following error
	catch (Exception $e) {
		$message = 'Unable to process request.';
	}

	?>
</fieldset>



</html>


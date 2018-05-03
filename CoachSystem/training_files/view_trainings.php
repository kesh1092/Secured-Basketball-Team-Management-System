<?php //code handles view and editing of Manager information, but not: loginID + Password
ini_set('session.cache_limiter','public');
session_cache_limiter(false);

session_start(); 
if(empty($_SESSION['LoginID'])) //THIS MUST BE THE FIRST LINE EXECUTED. otherwise it wont work
{
	header("Location: ../../index.php?redirected");  
	exit();
}


?>


<html>

<body  >

<link href="CSS_JS_functions/cssPAGE.css" rel="stylesheet">    


<form action="../manager_home.php" method="post">
	<p> 
		<input type="submit" value="Manager Home" />
	</p>
</form>

<form action="alter_training.php" method="post">
	<p> 
		<input type="submit" value="Alter Specific Trainings" />
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


<fieldset class='destroy-mes' style = "Color: #000000; border-color: #2645c1; border-width: 10px; border-style: solid;">
	
 
  <h1><center><u>Trainings</u></center></h1>


<h4 class="ajax-mes" style="text-align:center; color:red;">(Click GREY Entries Below To Edit, And Then Reload Page To Test Ajax)</h4>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script>
$(function(){
    $(".ajax-mes").fadeOut(2000).fadeIn(500).fadeOut(3500).fadeIn(1000).hide(1111, function(){
    // $(".ajax-mes").hide(333, function(){
$('.destroy-mes').unbind("click"); // disables click function
        });
});


$(".destroy-mes").click(function(){
 // $(".ajax-mes").remove();
     $(".ajax-mes").replaceWith("<h4>&nbsp</h4>");
 
});

</script>
 
 <?php 


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
			<tr>
      <td align="left"><b style="color:black";>Training Name</b></td>
			<td align="center"><b style="color:black";>Instruction</b></td>
			<td align="center"><b style="color:black";>Hour Amount</b></td>
      </tr>';

			$inc = 0;
			while($row = mysqli_fetch_array($response)) 
			{
// $LoginID = $row['LoginID']; GET FROM $_SESSION
				$TrainingName = $row['TrainingName'];
				$Instruction = $row['Instruction'];
				$TimePeriodinHour = $row['TimePeriodinHour'];


        if(is_null($Instruction) || $Instruction == "")
          $Instruction = "-";

				// echo '
				// 	<ul id="checklist">

				// 		<tr><td align="left"> <li><span>' .
				// 		$TrainingName . '</span> <input value="' .$TrainingName. '"/> 
				// 		</li> </td><td align="left"> <li>' .
				// 		$Instruction . '</span> <input value="' .$Instruction. '"/> 
				// 		</li></td><td align="left"> <li>' .
				// 		$TimePeriodinHour . '</span> <input value="' .$TimePeriodinHour. '"/> 
				// 		</li></td><td align="left">
				// 		</tr>

				// 	</ul>';				

				?>

				<!-- HTML CODE resumes again -->


<!-- 						<tr><td align="left"> <li><span>' .
						$TrainingName . '</span> <input value="' .$TrainingName. '"/> 
						</li> </td><td align="left"> <li>' .
						-->
              <tr id="checklist<?php echo $inc;?>">

                <!-- <article id="checklist<?php echo $inc;?>">  -->
 
                  <td align="left" >
                    <li>
                      <span style='color:black;'><?php echo $TrainingName;?></span>
                      <input class="zero" value="<?php echo $TrainingName;?>" />
                    </li>  
                  </td>

                  <td align="left" >
                    <li>
                      <span><?php echo $Instruction;?></span>
                      <input class="one" value="<?php echo $Instruction;?>" />
                    </li>  
                  </td>

                  <td align="left" >
                    <li>
                      <span><?php echo $TimePeriodinHour;?></span>
                      <input class="two" value="<?php echo $TimePeriodinHour;?>" />
                    </li>  
                  </td>       

              <!-- </article>        -->

                </tr>
 
 
           <!--  <input type="text" name="Name" value="<?php echo $TrainingName;?>" required>
            <input type="hidden" name="OriginalTrainingName" value="<?php echo $getTrainingName;?>">
          -->


           <script>

            	var checklist = document.getElementById("checklist<?php echo $inc;?>");
							var items = checklist.querySelectorAll("li");
							var inputs = checklist.querySelectorAll("input");

							for (var i = 1; i < items.length; i++) {
                  items[i].addEventListener("click", editItem);
                  inputs[i].addEventListener("blur", function() { updateItem(this, "<?php echo $TrainingName;?>");  });

                 //Doesnt work either way
               // inputs[i].addEventListener("keypress", itemKeypress);
               // inputs[i].addEventListener("keypress", function() { itemKeypress(this); });
 							}

							function editItem() {
								this.className = "edit";
								var input = this.querySelector("input");
								input.focus();		
								input.setSelectionRange(0, input.value.length);
							}

						//called by 'inputs'
						function updateItem(obj, itemName) { //previousElementSibling refers to span	
  
							var newVal = obj.value;

              if(obj.className == "zero")
                $.ajax({
                  url: "ajax_update.php",
                  type: 'POST',
                  data: {OriginalTrainingName: itemName, Name: newVal}
                });

              if(obj.className == "one")
                $.ajax({
                  url: "ajax_update.php",
                  type: 'POST',
                  data: {OriginalTrainingName: itemName, Birthday: newVal},
                });

              if(obj.className == "two")
                $.ajax({
                  url: "ajax_update.php",
                  type: 'POST',
                  data: {OriginalTrainingName: itemName, Address: newVal},
                });


							obj.previousElementSibling.innerHTML = newVal; 
						  obj.parentNode.className = ""; //refers to li's className "edits"
						}                                 //this comes from
						                          //items = checklist.querySelectorAll("li");

						//for enter key. (doesnt work)
						function itemKeypress(event) { //provides updated fx when enter 
						  if (event.which === 13) { //button is pressed on the input
						  	updateItem.call(obj);
						  }
						}
 
</script>


      <?php   

      $inc++;

    }      

  }

}

// if something goes wrong, return the following error
catch (Exception $e) {
	$message = 'Unable to process request.';
}

?>
</fieldset>



</body>

</html>



<!-- 

				echo '
					<ul id="checklist">

						<tr><td align="left"> <li><span>' .
						$TrainingName . '</span> <input value="' .$TrainingName. '"/> 
						</li> </td><td align="left"> <li>' .
						$Instruction . '</span> <input value="' .$Instruction. '"/> 
						</li></td><td align="left"> <li>' .
						$TimePeriodinHour . '</span> <input value="' .$TimePeriodinHour. '"/> 
						</li></td><td align="left">
						</tr>

					</ul>';

 -->
<html>

<?php
if(isset($_GET['modifyError'])) 
   echo 'Cant modify that training name. its already assigned to a player already.'; 


if(isset($_GET['deleteError'])) 
   echo 'Cant delete. That Training is assigned to a player already.'; 
?>  


<head>
   <title>Accept/Decline Player Pending Accounts</title>
</head>


<h1><center>Trainings</center></h1>


<form action="view_trainings.php" method="post">
   <p> 
      <input type="submit" value="View Training Page" />
   </p>
</form>
<br>



<?php
include('../../SQLFunctions.php');


$link = ConnectDB();
$table = Training;
$SelectedLoginID = 'none';


$sql = "SELECT * from $table";

if($result = mysqli_query($link, $sql)){
   echo"<table border=''1'' style=''width:100%''>";
   echo "<tr>";
   echo "<td align='center'></td>";
   echo "<td align='center'>Training Name</td>";
   echo "<td align='center'>Instruction</td>";
   echo "<td align='center'>Time(hr)</td>";
   echo "</tr>";


   while($row = mysqli_fetch_array($result)) 
   {
      session_start(); 

      $SelectedLoginID = $row[0];
      echo "<tr>";
      ?>  <!-- END PHP -->

      <!-- HTML CODE resumes again -->

      <td align='center'>
         <body>

            <form action="alter_training_functions.php" method="post">

               <input type="hidden" name="PASS" value="<?php echo $SelectedLoginID;?>">
               <input type="hidden" name="AcceptOption" value="declineOne">

               <p> 
                  <input type="submit" value="Delete"/>
               </p>
            </form>

            <form action="edit_particular_training.php" method="post">

               <input type="hidden" name="PASS" value="<?php echo $SelectedLoginID;?>">
               <!-- <input type="hidden" name="AcceptOption" value="declineOne"> -->

               <input type="submit" value="Modify"/>
            </form>

         </body>
      </td>

      <!-- html code ENDS -->      

      <?php   

      echo "<td align='center'>{$row[0]}</td>"; //LoginID
      echo "<td align='center'>{$row[1]}</td>"; //Password
      echo "<td align='center'>{$row[2]}</td>"; //Name

      echo "</tr>";
   }

   echo "</table>";
}


mysqli_close($link);

?>

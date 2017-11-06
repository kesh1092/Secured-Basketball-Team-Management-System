<html>

<?php
if(isset($_GET['deleteError'])) 
   echo 'Cant delete. That training is assigned to a player already.'; 
?>


<head>
   <title>Accept/Decline Player Pending Accounts</title>
</head>

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
      echo "<tr>";
      ?>

      <!-- HTML CODE resumes again -->
      <td align='center'>
         <body>
            <h2></h2>
            <form action="alter_training_functions.php" method="post">
               <?php
               $SelectedLoginID = $row[0];
               ?>

               <input type="hidden" name="PASS" value="<?php echo $SelectedLoginID;?>">
               <input type="hidden" name="AcceptOption" value="declineOne">

               <p> 
                  <input type="submit" value="Delete"/>
               </p>

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

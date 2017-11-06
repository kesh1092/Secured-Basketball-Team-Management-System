<html>

<?php

 
if(isset($_GET['deleteError'])) 
   echo 'Cant delete. That training is assigned to a player already.'; 
?>  

 
<head>
   <title>Accept/Decline Player Pending Accounts</title>
</head>


<h1><center>Games</center></h1>


<form action="view_trainings.php" method="post">
   <p> 
      <input type="submit" value="View Game Page" />
   </p>
</form>
<br>



<?php
include('../../SQLFunctions.php');
 

$link = ConnectDB();
$table = Game;
$SelectedLoginID = 'none';


$sql = "SELECT * from $table";

if($result = mysqli_query($link, $sql)){
   echo"<table border=''1'' style=''width:100%''>";
   echo "<tr>";
   echo "<td align='center'></td>";
   echo "<td align='center'>Game Name</td>";
   echo "<td align='center'>Result</td>";
   echo "<td align='center'>Playing Venue</td>";
   echo "<td align='center'>Opponent Team</td>";
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

            <form action="#" method="post">

               <input type="hidden" name="PASS" value="<?php echo $SelectedLoginID;?>">
               <input type="hidden" name="AcceptOption" value="declineOne">

               <p> 
                  <input type="submit" value="Delete"/>
               </p>
            </form>

            <form action="#" method="post">

               <input type="hidden" name="PASS" value="<?php echo $SelectedLoginID;?>">
               <!-- <input type="hidden" name="AcceptOption" value="declineOne"> -->

               <input type="submit" value="Modify"/>
            </form>

         </body>
      </td>

      <!-- html code ENDS -->      

      <?php   

      echo "<td align='center'>{$row[1]}</td>"; //LoginID
      echo "<td align='center'>{$row[2]}</td>"; //Password
      echo "<td align='center'>{$row[3]}</td>"; //Name
      echo "<td align='center'>{$row[4]}</td>"; //Name

      echo "</tr>";
   }

   echo "</table>";
}


mysqli_close($link);

?>

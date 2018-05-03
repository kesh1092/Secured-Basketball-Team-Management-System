<?php
include('../../SQLFunctions.php');

    $link = ConnectDB();
    
    //$table = Player;
    // echo '<br>Source Table ' . $table;
    
    // $SelectedLoginID = 'none';
    
    //if(!f_tableExists($link, $table, DB_NAME)){
    //    die('<br>Destination table does not exist: ' .$table);
    //}
    
    // $Name = filter_var($_POST['Name'], FILTER_SANITIZE_STRING);
    $Name=$_POST['Name'];


    $sql="SELECT * FROM Player WHERE Name='".$Name."'";
    
    // $sql='SELECT * FROM Player WHERE Name="'.$Name.'"';
    // $sql="SELECT * FROM Player WHERE Name LIKE '%".$Name."%'";


    // $sql='SELECT * FROM Player WHERE Name=""';

    echo '<br>sql :' .$sql;
    
    if($result = mysqli_query($link, $sql)){
         
         echo '<h1 align="center">All Players Named: "'.$Name.'"</h1>';
          
          echo '<table align="center" style="width:100%">
            <tr>
	            <th>Name</th>
            	<th>Login ID</th>
            	<th>Birthday</th>
            	<th>Address</th>
            	<th>Email</th>
            	<th>Phone Number</th>
            	<th>Player Position</th>
               <th>Request Status</th>
               <th>Request Details</th>
            </tr>';
         
        //Loop through all entries
        while($row = mysqli_fetch_array($result)) {
            echo '<tr><td align="center">' .
              $row['Name'] . '</td><td align="center">' .
              $row['LoginID'] . '</td><td align="center">' .
              $row['Birthday'] . '</td><td align="center">' .
              $row['Address'] . '</td><td align="center">' .
              $row['Email'] . '</td><td align="center">' .
              $row['PhoneNumber'] . '</td><td align="center">' .
              $row['PlayerPos'] . '</td><td align="center">' .
              $row['RequestStatus'] . '</td>';
               //here I will include a button that will update the table with another query
               //and bring the user back to this location
               
               echo '<td align="center">' .
                    '<form action="view_player_info.php" method="post">' .
                    '<input type="hidden" name="ID" value="'.$row['ID'].'"/>' . 
                    '<input type="submit" value="View Details"/>' .
                    '</form></td>';
                    
            echo '</tr>';
        }
        
        echo "</table>";
    }

    
    mysqli_close($link);

?>


<html>
<form action="request_player_info.php" method="post">
	<input type="submit" value="Return To Player Info Page"/>
</form>

</html>
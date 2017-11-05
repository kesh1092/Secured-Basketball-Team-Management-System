<?php
include('../../SQLFunctions.php');

    $link = ConnectDB();
    
    //$table = Player;
    // echo '<br>Source Table ' . $table;
    
    $SelectedLoginID = 'none';
    
    //if(!f_tableExists($link, $table, DB_NAME)){
    //    die('<br>Destination table does not exist: ' .$table);
    //}
    
    $ID=$_POST['ID'];

    //$sql = "SELECT * from $table WHERE RequestStatus = 'Pending'";
    $sql="SELECT * FROM Player WHERE ID=".$ID;
    $sqlB="SELECT * FROM Stats WHERE PlayerID=".$ID;
    // echo '<br>sql :' .$sql;
    
    echo '<form align="left" action="request_player_info.php" method="post"><input type="submit" value="Return To Player Info Page"/></form>';
    
    if($result = mysqli_query($link, $sql)){
         
         echo '<h1 align="left">Player Information</h1>';
          
          echo '<table align="left" border="0" width="300">';
          while($row=mysqli_fetch_array($result)){
             echo '<tr><td>ID:</td><td>'.$row['ID'].'</td></tr>'.
                  '<tr><td>LoginID:</td><td>'.$row['LoginID'].'</td></tr>'.
                  '<tr><td>Name:</td><td>'.$row['Name'].'</td></tr>'.
                  '<tr><td>Password:</td><td>'.$row['Password'].'</td></tr>'.
                  '<tr><td>Birthday:</td><td>'.$row['Birthday'].'</td></tr>'.
                  '<tr><td>Address:</td><td>'.$row['Address'].'</td></tr>'.
                  '<tr><td>Email:</td><td>'.$row['Email'].'</td></tr>'.
                  '<tr><td>Phone Number:</td><td>'.$row['PhoneNumber'].'</td></tr>'.
                  '<tr><td>Player Position:</td><td>'.$row['PlayerPos'].'</td></tr>'.
                  '<tr><td>Request Status:</td><td>'.$row['RequestStatus'].'</td></tr>';
          }
        
         echo '</table>';
        
        if($resultB=mysqli_query($link,$sqlB)){
           echo '<h1 align="center">Player Stats</h1>';
           echo '<table align="center" style="width:50%"><tr>' .
	             '<th>Year</th>' .
            	 '<th>Total Points</th>' .
            	 '<th>ASPG</th>' .
                '</tr>';
           while($rowB=mysqli_fetch_array($resultB)){
              echo '<tr><td align="center">' .
              $rowB['Year'] . '</td><td align="center">' .
              $rowB['TotalPoints'] . '</td><td align="center">' .
              $rowB['ASPG'] . '</td>';       
            echo '</tr>';
           }
           echo '</table>';
        }
    }
    mysqli_close($link);

?>

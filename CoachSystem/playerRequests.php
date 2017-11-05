<?php
include('../SQLFunctions.php');

    $link = ConnectDB();
    
    $table = Player;
    // echo '<br>Source Table ' . $table;
    
    $SelectedLoginID = 'none';
    
    if(!f_tableExists($link, $table, DB_NAME)){
        die('<br>Destination table does not exist: ' .$table);
    }

    $sql = "SELECT * from $table WHERE RequestStatus = 'Pending'";
    // echo '<br>sql :' .$sql;
    
    if($result = mysqli_query($link, $sql)){
        echo"<table border=''1'' style=''width:100%''>";
        //header
        echo "<tr>";
          echo "<td>ID</td>";
          echo "<td>LoginID</td>";
          echo "<td>Password</td>";
          echo "<td>Name</td>";
          echo "<td>Birthday</td>";
          echo "<td>Address</td>";
          echo "<td>Email</td>";
          echo "<td>PhoneNumber</td>";
          echo "<td>PlayPos</td>"; 
          echo "<td>RequestStatus</td>"; 
          //echo "<td>ACCEPT/DECLINE</td>"; 
        echo "</tr>";
        //Loop through all entries
        while($row = mysqli_fetch_array($result)) {
            echo "<tr>";
              echo "<td>{$row[0]}</td>"; //ID
              echo "<td>{$row[1]}</td>"; //LoginID
              echo "<td>{$row[3]}</td>"; //Password
              echo "<td>{$row[2]}</td>"; //Name
              echo "<td>{$row[4]}</td>"; //Birthday
              echo "<td>{$row[5]}</td>"; //Address
              echo "<td>{$row[6]}</td>"; //Email
              echo "<td>{$row[7]}</td>"; //PhoneNumber
              echo "<td>{$row[8]}</td>"; //PlayPos
              $SelectedLoginID = $row[1];
              echo "<td bgcolor=\"#d6ef15\">{$row[9]}</td>"; //RequestStatus
              
            echo "</tr>";
        }
        
        echo "</table>";
    }

    
    mysqli_close($link);

?>

<html>
<head>
  <title>Accept/Decline Player Pending Accounts</title>
</head>

<body>
<h2></h2>
<form action="playerRequestsSubmit.php" method="post">
  <fieldset>
    
    <select name="AcceptOption">
    <option value="">Select...</option>	  
    <option value="acceptOne">Accept bottom row player</option>
    <option value="declineOne">Decline bottom row player</option>
    <option value="acceptAll">Accept all</option>
    <option value="declineAll">Decline all</option>
    </select>
    

    <input type="hidden" name="PASS" value="<?php echo $SelectedLoginID;?>">

    
    <p> 
      <input type="submit" value="Submit" />
    </p>
    
  </fieldset>
</form>
</body>

<form action="manager_home.php" method="post">
   <input type="submit" value="Home"/>
</form>
</html>


<?php

include('SQLFunctions.php');

    $link = connectDB();
    
    $table = Player;
    echo '<br>Source Table ' . $table;
    
    if(!f_tableExists($link, $table, DB_NAME)){
        die('<br>Destination table does not exist: ' .$table);
    }

    $sql = "SELECT * from $table";
    echo '<br>sql :' .$sql;
    
    if($result = mysqli_query($link, $sql)){
        echo"<table border=''1'' style=''width:100%''>";
        //header
        echo "<tr>";
          echo "<td>Name</td>";
          echo "<td>Birthday</td>";
          echo "<td>Address</td>";
          echo "<td>Email</td>";
          echo "<td>Phone Number</td>";
          echo "<td>Player Position</td>";
        echo "</tr>";
        //Loop through all entries
        while($row = mysqli_fetch_array($result)) {
            echo "<tr>";
              echo "<td>{$row[3]}</td>";
              echo "<td>{$row[4]}</td>";
              echo "<td>{$row[5]}</td>";
              echo "<td>{$row[6]}</td>";
              echo "<td>{$row[7]}</td>";
              echo "<td>{$row[8]}</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    }
    
     mysqli_free_result($result);
    
    // if(mysql_error($link)){
    //     echo '<br>Error: '.mysqli_error($link);
    // }
    // else{
    //     echo '<br>Success';
    // }
    
    mysqli_close($link);

?>

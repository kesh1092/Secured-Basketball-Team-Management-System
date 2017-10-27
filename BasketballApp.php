<?php

// Connect to basketball Database  mysqli(Server,User,Password,Database)
$link = new mysqli('localhost','root','','Basketball');


// Write error if they exist, otherwise, write success
if ($link->connect_error) {
  die("Connection failed: " . $link->connect_error);
} 
else {
    echo "<br>Connected successfully";
}

?>

<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
table th {
    background-color: black;
    color: white;
}    
table tr:nth-child(even) {
    background-color: #eee;
}
table tr:nth-child(odd)  {
    background-color: #fff;
}
</style>


<body>
<?php

    $sql = "INSERT INTO Player (Address, Email) VALUES ('Test', 'Test2');";
    
    // Exectute the statement, and write the results
    if (mysqli_query($link, $sql)) {
        echo "<br>New record created successfully";
    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }
    
    if (mysqli_error($link)) {
        echo '<br>Error: ' . mysqli_error($link);
    }
    else {
        echo '<br>Success';
    }
    
    mysqli_close ( $link );
      
?>
</body>
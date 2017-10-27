<?php

include('config.php');

function connectDB() {
    $link = new mysqli(DB_HOST, DB_USER, DB_PWD, DB_NAME);
    if($link->connect_error) {
       die("Connection Failed" . $link->connect_error);
    }
    // echo "<br>Connected successfully to the database<br><br>";
    return $link;
}

?>
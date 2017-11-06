<?php

include("../SQLFunctions.php");
session_start();

$Player = $_POST['assignPlayer'];
$Training = $_POST['assignTraining'];
$link = connectDB();

echo "Assigned successful";

$getPlayerID = "SELECT * FROM Player Where Name='$Player';" ;
$result = mysqli_query($link, $getPlayerID);


while($row = mysqli_fetch_assoc($result)){
$playerID = $row['ID'];
}

$noice = $_SESSION['LoginID'];
$sql = "SELECT * FROM Manager Where LoginID='$noice';" ;
$result = mysqli_query($link, $sql);

//  $playerID = $row['ID'];

while($row = mysqli_fetch_assoc($result)){
    $ManagerID = $row['ID'];
}
$sql = "INSERT INTO Training VALUES ('".$playerID."','".$ManagerID."','".$Training."')";

mysqli_query($link,$sql);



?>

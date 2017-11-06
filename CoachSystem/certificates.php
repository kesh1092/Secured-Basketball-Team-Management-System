<?php

session_start();
include ("../SQLFunctions.php");

$link = connectDB();
$currentManager = $_SESSION['LoginID'];
$sql = "SELECT * FROM Manager Where LoginID = '$currentManager';" ;
$certificate = $_POST['blob'];
$result = mysqli_query($link, $sql);

while($row = mysqli_fetch_assoc($result)){
    $ManagerID = $row['ID'];
}//end while

?>

<html>

<form action="manager_home.php" method="post">
	<p> 
    	&nbsp;&nbsp;&nbsp;&nbsp;   
		<input type="submit" value="Manager Home" />
	</p>
</form>
    
<head>
  <title>Certificates</title>
</head>

<body style = "Color: #000000; background-color:#afbfff; border-color: #2645c1; border-width: 10px; border-style: solid;">
    
    <h1><br><center><u>Certificates</u></center></h1>
    
    <form name="myForm" action="" method="post" enctype="multipart/form-data">
        
        <h3>&nbsp;&nbsp;&nbsp;&nbsp;<u>Upload:</u></h3>
        
        &nbsp;&nbsp;&nbsp;&nbsp;
        Select File:
        <input type="file" name="f1">
        <br>
        <br>
        
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input placeholder = "Certificate ID" name = "upload"></input>
        <input type="submit" name="uploadNew" value="Upload New Certificate">
        
        <br>
        <br>
        
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input placeholder = "Certificate ID"  name = "changeUpload"></input>
        <input type="submit" name="uploadChange" value="Change Existing Certificate">
        
        <br>
        <br>
        <br>
        <br>
        <br>
        
        <h3>&nbsp;&nbsp;&nbsp;&nbsp;<u>Download:</u></h3>
        
        &nbsp;&nbsp;&nbsp;&nbsp;
        <select name="blob"><option disabled selected value>Choose certificate...</option>
        
        <?php  $sql = "SELECT * FROM ManagerCertificate WHERE ManagerID = '$ManagerID'" ;
        $result = mysqli_query($link, $sql);
        while($row = mysqli_fetch_assoc($result)){
            echo" <option value='".$row['CertificateID'] ."'> ". $row['CertificateID'] ."</option>"; 
        }   
        ?>
        
        </option></select>
        <button name="download">Download Selected Certificate</button>
    
    </form>
</body>
</html>

<?php

$link = connectDB();
$NewCertificateID = $_POST['upload'];
$ChangedCertificateID = $_POST['changeUpload'];

if(isset($_POST["uploadNew"])){
    
    if(is_uploaded_file($_FILES['f1']['tmp_name'])) {
        $image = addslashes(file_get_contents($_FILES['f1']['tmp_name']));
        $sql= "INSERT INTO ManagerCertificate  VALUES('".$ManagerID."','".$NewCertificateID."','{$image}') ";
        mysqli_query($link,$sql);
    }//end if
    
}//end if

if(isset($_POST["uploadChange"])){
    if(is_uploaded_file($_FILES['f1']['tmp_name'])) {
        $image1 = addslashes(file_get_contents($_FILES['f1']['tmp_name']));
        $sql2 = "UPDATE ManagerCertificate SET ManagerID = '".$ManagerID."', CertificateID = '".$ChangedCertificateID."', Certificate = '{$image1}' WHERE ManagerID = '$ManagerID' AND CertificateID ='$ChangedCertificateID'";
        mysqli_query($link,$sql2);
        mysqli_query($link,$sql);
    }//end if
}//end if

if(isset($_POST['download'])){
    
    $query ="SELECT * FROM ManagerCertificate WHERE ManagerID='$ManagerID' AND CertificateID = '$certificate'";
    echo $query;
    mysqli_query($link, $query) or die('Error querying database.');
    $result = mysqli_query($link, $query);
    
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $filename = $row['CertificateID'];
        $filedata = $row['Certificate'];
        header('Content-Disposition: attachment; filename="'. $filename .'.jpg";');
        ob_clean();
        flush();
        echo $filedata;
        exit;
    }//end while

}//end if

?>

<?php
$server = "localhost";
$username = "root";
$pass = "";
$db = "ls_helpdesk";
$conn = new PDO("mysql:host=$server;dbname=$db;","$username","$pass");
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$targetDir = "images/";
$allowTypes = array('jpg','png','jpeg','gif'); 
$image = $_FILES['files']['name'];
$fileName = implode(",", $image);

// echo $fileName;
if(!empty($image)){
foreach ($image as $key => $val) {
    $targetfilepath = $targetDir . $val;
    move_uploaded_file($_FILES['files']['tmp_name'][$key], 
    $targetfilepath);
}
$query = "INSERT INTO images(images) VALUES('$fileName')";
$statement = $conn->prepare($query);
$statement->execute();
echo "Image uploaded Successfully";
}
?>
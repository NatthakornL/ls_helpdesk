<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.min.css">
    <title>Lerdsin Helpdesk</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.all.min.js"></script>

    <?php

$server = "localhost";
$username = "root";
$pass = "";
$db = "ls_helpdesk";
$conn = new PDO("mysql:host=$server;dbname=$db;","$username","$pass");
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$targetDir = "images/uploadPic/";
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

if($query){
    echo "<script>
    $(function() {

        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'บันทึกข้อมูลเรียบร้อยเเล้ว!!!',
            showConfirmButton: false,
            timer: 2000,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft()
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
        }).then(function() {
            window.location = 'insert_hd1.php';
        })
    });
    </script>";
}else {
    echo "<script>
    $(function() {

        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'ไม่สามารถบันทึกข้อมูลได้สำเร็จ!!!',
            showConfirmButton: false,
            timer: 2000,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft()
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
        }).then(function() {
            window.location = 'image.php';
        })
    });
    </script>";
}

}


?>
</body>

</html>

/*
// Include the database configuration file
include_once 'connect.php';

if(isset($_POST['submit'])){
// File upload configuration
$targetDir = "images/";
$allowTypes = array('jpg','png','jpeg','gif');

$statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
$fileNames = array_filter($_FILES['files']['name']);
if(!empty($fileNames)){
foreach($_FILES['files']['name'] as $key=>$val){
// File upload path
$fileName = basename($_FILES['files']['name'][$key]);
$targetFilePath = $targetDir . $fileName;

// Check whether file type is valid
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
if(in_array($fileType, $allowTypes)){
// Upload file to server
if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
// Image db insert sql
$insertValuesSQL .= "('".$fileName."', NOW()),";
}else{
$errorUpload .= $_FILES['files']['name'][$key].' | ';
}
}else{
$errorUploadType .= $_FILES['files']['name'][$key].' | ';
}
}

// Error message
$errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):'';
$errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):'';
$errorMsg = !empty($errorUpload)?'<br />'.$errorUpload.'<br />'.$errorUploadType:'<br />'.$errorUploadType;

if(!empty($insertValuesSQL)){
$insertValuesSQL = trim($insertValuesSQL, ',');
// Insert image file name into database
$insert = $connect->query("INSERT INTO images (file_name, uploaded_on) VALUES $insertValuesSQL");
if($insert){
$statusMsg = "Files are uploaded successfully.".$errorMsg;
}else{
$statusMsg = "Sorry, there was an error uploading your file.";
}
}else{
$statusMsg = "Upload failed! ".$errorMsg;
}
}else{
$statusMsg = 'Please select a file to upload.';
}
}
*/
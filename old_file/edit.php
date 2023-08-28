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
/*
                $status = "";
                if(isset($_POST['new']) && $_POST['new']==1){
                    $id = $_REQUEST['id'];
                    $hd_depart = $_REQUEST['hd_depart'];
                    $hd_prob = $_REQUEST['hd_prob'];
                    $hd_fixs = $_REQUEST['hd_fixs'];

                    $update = "UPDATE tb_helpdesk SET 
                    hd_depart='".$hd_depart."',
                    hd_prob='".$hd_prob."',
                    hd_fixs='".$hd_fixs."' WHERE id='".$id."' ";

                    mysqli_query($connect, $update) or die (mysqli_error($connect));

                    $status = "เเก้ไขข้อมูลเสร็จสิ้น. </br></br>
                    <a href='index.php'>กลับสู่หน้าหลัก</a>";
                    echo '<p style="color:#FF0000;">'.$status.'</p>';
                }else{
                ?>
    <?php }?>
    */

    session_id();
    session_start();
    include 'connect.php';
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $id = $_GET['id'];

    //UPDATE
    $status = "";
    if(isset($_POST['submit'])){
    //$id = $_SESSION['id'];
    $hd_depart = $_POST['hd_depart'];
    $hd_prob = $_POST['hd_prob'];
    $hd_fixs = $_POST['hd_fixs'];
    $images = $_FILES['images'];

    $select = "SELECT * FROM tb_helpdesk WHERE id = '$id' ";
    $sql = mysqli_query($connect, $select) or die(mysqli_error($connect));
    $row = mysqli_fetch_assoc($sql);

    $output_dir = "images/"; //folder
    $allowTypes = array('jpg','png','jpeg','gif');
    $image = $_FILES["files"]["name"];
    $fileName = explode(",", $image);
    // echo $fileName;
    if(!empty($image)){
    foreach ($image as $key => $val) {
    $targetfilepath = $output_dir . $val;
    move_uploaded_file($_FILES["files"]["tmp_name"][$key],
    $targetfilepath);
    }

    if($_FILES["image"]["name"] != ""){
    if(move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$fileName)){
    @unlink("images/".$_POST["old_file"]);

    $strSQL = "UPDATE tb_helpdesk";
    $strSQL .= "SET images = '".$fileName."' WHERE id = '".$_GET["id"]."' ";
    $objQuery = mysqli_query($connect, $strSQL);

    echo "Copy / Upload Complete<br>";

    }
    }

    $update = "UPDATE tb_helpdesk SET hd_depart='$hd_depart', hd_prob='$hd_prob', hd_fixs='$hd_fixs',dayup=now() WHERE
    id =
    {$_GET['id']} ";
    $up = mysqli_query($connect, $update) or die(mysqli_error($connect));
    unset($up);
    if($up){
    echo "<script>
    $(function() {

        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'เเก้ไขข้อมูลเรียบร้อยเเล้ว!!!',
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

        })
    });
    </script>";
    //window.location = 'index.php';
    }else{
    echo "<script>
    $(function() {

        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'ไม่สามารถเเก้ไขข้อมูลได้สำเร็จ!!!',
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
            window.location = 'edit_hd.php';
        })
    });
    </script>";
    }
    }
    }
    mysqli_close($connect);
    ?>
</body>

</html>
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
    ini_set('display_errors', 1);
    error_reporting(~0);
    include 'connect.php';


    $hd_depart = $_REQUEST['hd_depart'];
    $hd_prob = $_REQUEST['hd_prob'];
    $hd_fixs = $_REQUEST['hd_fixs'];


    $targetDir = "images/uploadPic/";
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    $image = $_FILES['files']['name'];
    $fileName = implode(",", $image);

    // echo $fileName;
    if (!empty($image)) {
        foreach ($image as $key => $val) {
            $targetfilepath = $targetDir . $val;
            move_uploaded_file(
                $_FILES['files']['tmp_name'][$key],
                $targetfilepath
            );
        }

        $sql = "INSERT INTO tb_helpdesk (hd_depart, hd_prob, hd_fixs, images, dayup) VALUES ('" . $_POST["hd_depart"] . "', '" . $_POST["hd_prob"] . "', '" . $_POST["hd_fixs"] . "', '$fileName', NOW()) ";
        $query = mysqli_query($connect, $sql) or die(mysqli_error($connect));

        if ($query) {
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
                window.location = 'index.php';
            })
        });
        </script>";
        } else {
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
                window.location = 'insert_hd.php';
            })
        });
        </script>";
        }
    }

    mysqli_close($connect);

    ?>
</body>

</html>
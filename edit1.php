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
include('connect.php');
ini_set('display_errors', 1);
error_reporting(~0);

if(isset($_POST['submit'])){
$id = $_GET['id'];
$hd_depart = $_POST['hd_depart'];
$hd_prob = $_POST['hd_prob'];
$hd_fixs = $_POST['hd_fixs'];

$targetDir = "images/uploadPic/";
$allowTypes = array('jpg','png','jpeg','gif'); 
$image = $_FILES['files']['name'];
$fileName = implode(",", $image);

unlink("images/uploadPic/$row[image]");

if(!empty($image)){
    foreach ($image as $key => $val) {
        $targetfilepath = $targetDir . $val;
        move_uploaded_file($_FILES['files']['tmp_name'][$key],$targetfilepath);
    }
}

$up = "UPDATE tb_helpdesk SET hd_depart = '$hd_depart', hd_prob = '$hd_prob', hd_fixs = '$hd_fixs', images = '$fileName', dayup = now() WHERE id = '$id' ";
$query = mysqli_query($connect, $up) or die(mysqli_error($connect));

if($query){
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
					window.location = 'index.php';
				})
			});
			</script>";

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
mysqli_close($connect);

?>

</body>

</html>
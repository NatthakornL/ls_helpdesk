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
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	include_once 'function.php';

	$hd_depart = $_POST['hd_depart'];
	$hd_prob = $_POST['hd_prob'];
	$hd_fixs = $_POST['hd_fixs'];
	

		//*** Update Record ***//
		//$objConnect = mysqli_connect("localhost","root","") or die("Error Connect to Database");
		//$objDB = mysqli_select_db("ls_helpdesk");

		//update data none image //DONE
		$strSQL = "UPDATE tb_helpdesk 
		SET hd_depart = '".$_POST["hd_depart"]."', hd_prob = '".$_POST["hd_prob"]."', hd_fixs = '".$_POST["hd_fixs"]."', dayup = now() WHERE id = '".$_GET["id"]."' ";
		$objQuery = mysqli_query($connect, $strSQL);		
	
		//if data have new image //update new image //Delete old image
	if($_FILES["filUpload"]["name"] != "")
	{
		$targetDir = "images/uploadPic/";
		$allowTypes = array('jpg','png','jpeg','gif');
		$image = $_FILES["filUpload"]["name"];
		$fileName = explode(",", $image);

		if(!empty($image)){
			foreach ($image as $key => $val) {
				$targetfilepath = $targetDir . $val;
				move_uploaded_file($_FILES['filUpload']['tmp_name'][$key], 
				$targetfilepath);
			}
		
		if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"images/uploadPic/".$_FILES["filUpload"]["name"]))
		{

			//*** Delete Old File ***//			
			@unlink("images/".$_POST["hdnOldFile"]);
			
			//*** Update New File ***//
			$strSQL = "UPDATE tb_helpdesk ";
			$strSQL .=" SET images = '".$_FILES["filUpload"]["name"]."' WHERE id = '".$_GET["id"]."' ";
			$objQuery = mysqli_query($connect, $strSQL);		

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
}

	mysqli_close($connect);
?>

</body>

</html>
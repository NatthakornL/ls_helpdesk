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

$select = "SELECT * FROM tb_helpdesk WHERE id = '$id' ";
$sql = mysqli_query($connect, $select) or die(mysqli_error($connect));
$row = mysqli_fetch_assoc($sql);

$update = "UPDATE tb_helpdesk SET hd_depart='$hd_depart', hd_prob='$hd_prob', hd_fixs='$hd_fixs',dayup=now() WHERE id =
{$_GET['id']} ";
$up = mysqli_query($connect, $update) or die(mysqli_error($connect));
if($up){
echo "<script>
alert('เเก้ไขข้อมูลเรียบร้อยเเล้ว!!!');
window.location = 'index.php';
</script>";
}else{
echo "<script>
alert('เเก้ไขข้อมูลไม่สำเร็จ!!!');
window.location = 'edit_hd.php';
</script>";
}
}

?>
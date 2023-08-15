<?php 

session_start();
//create database 
$connect = mysqli_connect('localhost', 'root', '' , 'ls_helpdesk');

$id = $_GET['id'];
$sql = "SELECT * FROM images WHERE id = $id";
$result = mysqli_query($connect, $sql);

error_reporting(E_ALL ^ E_WARNING); 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lerdsin Helpdesk</title>
    <!--stylesheet-->
    <link rel="stylesheet" href="./style.css" />
    <link href="https://emoji-css.afeld.me/emoji.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./images/avatar_solid_icon_235512.ico">


    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        var btn = $('#backToTop');
        $(window).on('scroll', function() {
            if ($(window).scrollTop() > 300) {
                btn.addClass('show');
            } else {
                btn.removeClass('show');
            }
        });
        btn.on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: 0
            }, '300');
        });
    });
    </script>
    <!--================================================================-->

</head>


<div class="background">
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w960">
            <div class="card card-4">
                <div class="card-body">
                    <!--card body-->
                    <div
                        style="display: flex; width: 100%; text-align: left; padding: 1%; width: 100%; height: auto; background-color: #CCFFF7; border: 1px solid #004EC1; border-radius: 10px;">
                        <!-- BackToTop Button -->
                        <a href="javascript:void(0);" id="backToTop" class="back-to-top">
                            <i class="arrow"></i><i class="arrow"></i>
                        </a>
                        <div class="logo" onclick="document.location='index.php'" style="cursor: pointer;">
                            <img src="./images/logo.png" style="max-width: 100%; height: auto; " />
                            <h2 style="padding: 5%; font-size: 30px; width: 95%; font-weight: 600; ">
                                Lerdsin <span class="danger">Helpdesk</span>
                            </h2>
                        </div>
                    </div>
                    <div
                        style="margin-top: 10px; padding: 3%; width: 100%; height: auto; background-color: #EDFFFC; border: 1px solid #004EC1; border-radius: 10px;">
                        <li
                            style="font-size: 24px; font-weight: 600; text-align: center; color: #FFA200; margin-top: 2%;">
                            <i class="em em-wrench" aria-role="presentation" aria-label="WRENCH"
                                style="margin-right: 15px;"></i>
                            ตารางเเสดงข้อมูลปัญหาที่พบ<i class="em em-wrench" aria-role="presentation"
                                aria-label="WRENCH" style="margin-right: 15px;"></i>
                        </li><br>
                        <?php 
                if(isset($_GET['id'])) {
                    $result = $connect->query("SELECT * FROM tb_helpdesk WHERE id = '".$_GET['id']."'");
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <li
                            style="font-size: 24px; font-weight: 600; text-align: left; color: #FFA200; margin-top: 2%;">
                            <i class="em em-heavy_minus_sign" aria-role="presentation" aria-label="HEAVY MINUS SIGN"
                                style="margin-right: 10px;"></i>
                            ลำดับที่ :<span style="padding: 10px; color: #FF5F41;"><?php echo $row['id']  ?></span>
                        </li><br>
                        <li
                            style="font-size: 24px; font-weight: 600; text-align: left; color: #FFA200; margin-top: 1%;">
                            <i class="em em-heavy_minus_sign" aria-role="presentation" aria-label="HEAVY MINUS SIGN"
                                style="margin-right: 10px;"></i>
                            เเผนก / หน่วยงาน :<span
                                style="padding: 10px; color: #FF5F41;"><?php echo $row['hd_depart']  ?></span>
                        </li><br>
                        <li
                            style="font-size: 24px; font-weight: 600; text-align: left; color: #FFA200; margin-top: 1%;">
                            <i class="em em-heavy_minus_sign" aria-role="presentation" aria-label="HEAVY MINUS SIGN"
                                style="margin-right: 10px;"></i>
                            ปัญหาที่พบ :<span
                                style="padding: 10px; color: #FF5F41;"><?php echo $row['hd_prob']  ?></span>
                        </li><br>
                        <li
                            style="font-size: 24px; font-weight: 600; text-align: left; color: #FFA200; margin-top: 1%;">
                            <i class="em em-heavy_minus_sign" aria-role="presentation" aria-label="HEAVY MINUS SIGN"
                                style="margin-right: 10px;"></i>
                            วิธีเเก้ปัญหา :<span
                                style="padding: 10px; color: #FF5F41; word-wrap: break-word;"><?php echo $row['hd_fixs']  ?></span>
                        </li><br>
                        <?php } 
                    mysqli_close($connect);
                } ?>
                        <div
                            style="margin-top: 10px; padding: 3%; width: 100%; height: auto; background-color: #EDFFFC; border: 1px solid #004EC1; border-radius: 10px;">

                            <li
                                style="font-size: 24px; font-weight: 600; text-align: center; color: #FFA200; margin-top: 2%;">
                                <i class="em em-pager" aria-role="presentation" aria-label="PAGER"
                                    style="margin-right: 15px;"></i>
                                รูปภาพเเสดงขั้นตอนการเเก้ปัญหา<i class="em em-pager" aria-role="presentation"
                                    aria-label="PAGER" style="margin-right: 15px;"></i>
                            </li><br>
                            <div class="piczone">
                                <?php 
                    $id = $_GET['id'];
                    $connect = mysqli_connect('localhost', 'root', '' , 'ls_helpdesk'); ?>

                                <?php if(isset($_GET['id'])) { 
                    $sql = $connect->query("SELECT images FROM tb_helpdesk WHERE id = '".$_GET['id']."'"); 
                    $result = mysqli_fetch_array($sql);
                    $images = $result['images'];
                    $remove_last_comma = substr($images,0);
                    $temp = explode(',',$remove_last_comma);
                    for ($i = 0;$i<count($temp);$i++) { echo '<center><img src="images/' .trim($temp[$i]).'" height="auto"
                        width="100%"></center>';
                        echo "<br />";
                        echo "<br />";
                        } ?>
                                <?php }else{ ?>
                                <h3>ไม่พบไฟล์รูปภาพ</h3>
                                <?php }
                        ?>

                            </div>

                        </div>
                        <div class="add_hd" style="margin-top: 2%;">
                            <input type="button" class="btn btn--radius-2 btn--orange"
                                onclick="document.location='index.php'" value="กลับสู่หน้าหลัก">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</html>

<!--<img src=""
                        style="max-width: 100%; height: auto; border-radius: var(--card-border-radius); margin: auto;"> -->

<!-- 

                        <div class="piczone">
                    <?php /*
                    $id = $_GET['id'];
                    $connect = mysqli_connect('localhost', 'root', '' , 'ls_helpdesk');

                    $result = mysqli_query($connect, $sql); 
                    
                    ?>
                    <?php if(isset($_GET['id'])) { 
                    $result = $connect->query("SELECT images FROM images WHERE id = '".$_GET['id']."'"); ?>
                    <?php
                    if ($result->num_rows > 0) { 
                    while ($row = $result->fetch_assoc()) {
                        $imageURL = 'images/'.$row["images"] ; ?>
                    <img src="images/<?php echo strtr($images[0],'[]',''); ?>" alt=""
                        style="max-width: 100%; height: 100%; border-radius: var(--card-border-radius); margin: auto;" />
                    <?php 
                    }
                    }else { ?>
                    <h3>ไม่พบไฟล์รูปภาพ</h3>
                    <?php }
                } ?>
                </div>*/
                        
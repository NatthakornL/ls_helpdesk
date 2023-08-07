<?php 
session_start();
require "connect.php";
error_reporting(E_ALL ^ E_WARNING); 
$id = $_REQUEST['id'];
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
<style>
.btnspace {
    display: flex;
    margin-left: 50px;
    margin-right: 50px;
    padding-left: 90px;
    padding-right: 90px;
}

.txtdepart {
    padding: 5px;
    width: 56%;
    height: 30px;
    border: 1px solid;
    border-radius: 5px;
    font-size: 16px;
}

.txtprob {
    padding: 5px;
    width: 56%;
    height: 35px;
    border: 1px solid;
    border-radius: 5px;
    font-size: 18px;
}

.txtfixs {
    padding: 5px;
    width: 56%;
    height: 70px;
    border: 1px solid;
    border-radius: 5px;
    font-size: 18px;
    resize: none;
    vertical-align: top;
}
</style>

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
                            เเก้ไขข้อมูล<i class="em em-wrench" aria-role="presentation" aria-label="WRENCH"
                                style="margin-right: 15px;"></i>
                        </li><br>

                        <form name="form" method="post" action="edit.php?id=<?php echo $id ?>">
                            <input type="hidden" name="submit" value="1" />
                            <input name="id" type="hidden" value="<?php echo $row['id']; ?>" />

                            <?php 
                            if(isset($_GET['id'])){
                                $id = mysqli_real_escape_string($connect, $_GET['id']);

                                $query = "SELECT * FROM tb_helpdesk WHERE id = '".$_GET['id']."' ";
                                $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
                                $row = mysqli_fetch_assoc($result);
                            
                            ?>

                            <div style="width: 100%; text-align: center;">
                                <li
                                    style="font-size: 16px; font-weight: 600; text-align: left; padding-left: 20%; padding-right: 14%;">
                                    เเผนก / หน่วยงาน : <span style="padding-left: 19px;"><input class="txtdepart"
                                            type="text" name="hd_depart" required title="กรุณาใส่ชื่อเเผนกหรือหน่วยงาน"
                                            value="<?php echo $row['hd_depart']; ?>" /></span>
                                </li><br>
                                <li
                                    style="font-size: 16px; font-weight: 600; text-align: left; padding-left: 20%; padding-right: 14%;">
                                    ปัญหาที่พบ : <span style="padding-left: 19px;"><input class="txtprob" type="text"
                                            name="hd_prob" required title="กรุณาใส่ปัญหาที่พบ"
                                            value="<?php echo $row['hd_prob']; ?>" /></span>
                                </li><br>
                                <li
                                    style="font-size: 16px; font-weight: 600; text-align: left; padding-left: 20%; padding-right: 14%;">
                                    วิธีเเก้ปัญหา : <span style="padding-left: 19px; word-wrap: break-word;"><textarea
                                            class="txtfixs" name="hd_fixs"
                                            title="กรุณาใส่วิธีเเก้ปัญหา"><?php echo $row['hd_fixs']; ?></textarea></span>
                                </li><br>
                                <?php 
                                 
                                 mysqli_close($connect);
                             }
                                ?>
                            </div>
                            <div style="width: 100%; text-align: center;">
                                <li><input class="btnaddata" type="submit" name="" onclick="//update()"
                                        value="เเก้ไขข้อมูล"
                                        style="cursor: pointer; border: 1px solid #000; background-color: #68DD00; border-radius: 5px; width: 100px; height: 30px; margin: auto;  align-items: center; justify-content: center; overflow-x: hidden; color: #fff; font-size: 16px;">
                                    <span style="margin-left: 3%;"><input class="btnaddata" type="button" name=""
                                            id="butcancel" value="กลับสู่หน้าหลัก"
                                            onclick="document.location='index.php'"
                                            style="cursor: pointer; border: 1px solid #000; background-color: #FFBA35; border-radius: 5px; width: 100px; height: 30px; margin: auto;  align-items: center; justify-content: center; overflow-x: hidden; color: #fff; font-size: 16px;">
                                    </span>

                                </li><br>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</html>
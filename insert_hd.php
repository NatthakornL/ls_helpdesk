<?php 
session_start();
require "connect.php";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
    <script>
    function funClear() {
        document.getElementById("form1").reset();
    }
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
    height: 35px;
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

/*===========================================*/
input[type=submit] {
    width: 20%;
    padding: 4px 4px;
    margin: 4px 2px;
    background-color: #baff95;
    border: 1px solid #000;
    color: #00B127;
    border-radius: 5px;
    cursor: pointer;
}

input[type=submit1] {
    width: 20%;
    padding: 4px 4px;
    margin: 4px 2px;
    background-color: #E75100;
    border: 1px solid #000;
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
    text-align: center;
}

input[type=file] {
    width: 50%;
    padding: 4px 4px;
    margin: 4px 2px;
    background-color: #EDEDED;
    border: 1px solid #000;
    color: #BABABA;
    border-radius: 5px;
    cursor: pointer;
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
                            เพิ่มข้อมูลการเเก้ปัญหา<i class="em em-wrench" aria-role="presentation" aria-label="WRENCH"
                                style="margin-left: 15px;"></i>
                        </li><br><br>
                        <div style="width: 100%; text-align: center;">
                            <form name="form" id="form1" method="post" enctype="multipart/form-data"
                                action="insert.php">
                                <input type="hidden" name="new" value="1" />
                                <li
                                    style="margin-left: 15%; font-size: 16px; display: flex; width: 100%; height: auto;">
                                    <span
                                        style="font-weight: 600; padding: 0.4%; width: 20%; text-align: right; font-size: 18px;">เเผนก
                                        / หน่วยงาน
                                        : </span>
                                    <span
                                        style="width: 75%; text-align: left; padding-left: 2%; padding-right: 3%;"><input
                                            class="txtdepart" type="text" name="hd_depart" required
                                            title="กรุณาใส่ชื่อเเผนกหรือหน่วยงาน" /></span>
                                </li><br>
                                <li
                                    style="margin-left: 15%; font-size: 16px; display: flex; width: 100%; height: auto;">
                                    <span
                                        style="font-weight: 600; padding: 0.4%; width: 20%; text-align: right; font-size: 18px;">ปัญหาที่พบ
                                        : </span><span
                                        style="width: 75%; text-align: left; padding-left: 2%; padding-right: 3%;"><input
                                            class="txtprob" type="text" name="hd_prob" required
                                            title="กรุณาใส่ปัญหาที่พบ" /></span>
                                </li><br>
                                <li
                                    style="margin-left: 15%; font-size: 16px; display: flex; width: 100%; height: auto; ">
                                    <span
                                        style="font-weight: 600; padding: 0.4%; width: 20%; text-align: right; font-size: 18px;">วิธีเเก้ปัญหา
                                        : </span><span
                                        style="width: 75%; text-align: left; padding-left: 2%; padding-right: 3%; word-wrap: break-word;"><textarea
                                            class="txtfixs" name="hd_fixs"
                                            title="กรุณาใส่วิธีเเก้ปัญหา"></textarea></span>
                                </li><br>


                                <div
                                    style="margin-top: 10px; padding: 3%; width: 100%; height: auto; background-color: #EDFFFC; border: 1px solid #004EC1; border-radius: 10px;">
                                    <li
                                        style="font-size: 24px; font-weight: 600; text-align: center; color: #FFA200; margin-top: 1%;">
                                        <i class="em em-wrench" aria-role="presentation" aria-label="WRENCH"
                                            style="margin-right: 15px;"></i>
                                        บันทึกข้อมูลการเเก้ปัญหา<i class="em em-wrench" aria-role="presentation"
                                            aria-label="WRENCH" style="margin-left: 15px;"></i>
                                    </li><br>
                                    <div style="width: 100%; display: flex;">
                                        <li
                                            style="font-size: 20px; font-weight: 600; text-align: left; width: 100%; margin: 1%; text-align: center;">
                                            สามารถเลือกรูปภาพได้มากกว่า 1 รูปภาพต่อการอัพโหลด 1 ครั้ง
                                            <span style="margin: 0.4%;"><input type="file" name="files[]" id=""
                                                    multiple><input type="submit" name="submit" value="บันทึกข้อมูล"
                                                    onclick="//document.location='image.php'"
                                                    data-loading-text="Loading..." />
                                                <input type="submit1" onclick="funClear()" value="เคลียร์ข้อมูล" />
                                            </span>
                                        </li>
                            </form>
                            <script>
                            $('#form').submit(function(event) {
                                var formdata = new FormData(this);
                                $.ajax({
                                    url: 'image_upload.php',
                                    data: formdata,
                                    contentType: false,
                                    cache: false,
                                    processData: false,
                                    type: "POST",
                                    success: function(response) {
                                        alert(response);
                                    },
                                    error: function() {
                                        alert("Something went wrong!")
                                    }
                                });
                                event.preventDefault();
                            });
                            </script>
                        </div>

                    </div><br>
                    <div class="add_hd" style="margin-top: 1%; display: flex;">
                        <input class="btn btn--radius-2 btn--green" type="hidden" name="submit" onclick="//update()"
                            value="เพิ่มข้อมูล" />
                        <input class="btn btn--radius-2 btn--orange" type="button" name="" id="butcancel"
                            value="กลับสู่หน้าหลัก" onclick="document.location='index.php'">


                        <br>
                    </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

</html>
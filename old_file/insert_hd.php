<?php

session_id();
session_start();
require("connect.php");

$status = "";
if(isset($_POST['new']) && $_POST['new'] == 1){
    $hd_depart = $_POST['hd_depart'];
    $hd_prob = $_POST['hd_prob'];
    $hd_fixs = $_POST['hd_fixs'];

    $ins_query = "INSERT INTO tb_helpdesk ('hd_depart','hd_prob','hd_fixs')VALUES('$hd_depart','$hd_prob','$hd_fixs)";
    mysqli_query($connect,$ins_query) or die(mysqli_error($connect));
    if(mysqli_query($connect,$ins_query)){
        echo json_encode(array("statusCode"=>200));
    }else{
        echo json_encode(array("statusCode"=>201));
    }
    
    
    $status = "เพิ่มข้อมูลเสร็จสิ้น.</br> <br> <a href='index.php'>กลับสู่หน้าหลัก</a>";
}

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
    width: 100%;
    height: auto;
}

.txtdepart {
    padding: 5px;
    width: 56%;
    height: 35px;
    border: 1px solid;
    border-radius: 5px;
    font-size: 18px;
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

.form {
    text-align: left;
    margin: auto;
    max-width: 100%;
    width: 100%;
    height: auto;
}
</style>

<body>

    <!-- BackToTop Button -->
    <a href="javascript:void(0);" id="backToTop" class="back-to-top">
        <i class="arrow"></i><i class="arrow"></i>
    </a>
    <div class="top">
        <div class="logo" onclick="document.location='index.php'" style="cursor: pointer;">
            <img src="./images/logo.png" style="max-width: 100%; height: auto;" />
            <h2 style="padding-left: 20px; font-size: 30px;">
                Lerdsin <span class="danger">Helpdesk</span>
            </h2>
        </div>
    </div>
    <div class="container">
        <main>
            <div class="col"
                style="padding-bottom: 30px; padding-left: 1px; padding-top: 20px; margin: auto; overflow-x: hidden;">
                <!-------------- Space-------------------->
                <li class="space" style="width: 1200px"></li>
                <!----------------------------------------->
                <h2 style="text-align: center; margin-top: 40px; color: #216FFF;"><i class="em em-spiral_note_pad"
                        aria-role="presentation" aria-label=""
                        style="margin-right: 10px;"></i>เพิ่มข้อมูลปัญหาที่พบเเละวิธีเเก้ไข <i
                        class="em em-spiral_note_pad" aria-role="presentation" aria-label=""
                        style="margin-left: 10px;"></i></h2>


                <!---------------------------------------------->
                <form class="form" id="fupForm" name="form" method="post" action="insert.php">
                    <input type="hidden" name="new" value="1" />
                    <h3 style="color: #006516; margin-left: 80px; margin-top: 20px;"><i class="em em-heavy_minus_sign"
                            aria-role="presentation" aria-label="HEAVY MINUS SIGN" style="margin-right: 10px;"></i>เเผนก
                        /
                        หน่วยงาน
                        : <span style="padding: 10px; margin-left: 1%;"><input class="txtdepart" type="text"
                                name="hd_depart" required /></span>
                    </h3>

                    <!---------------------------------------------->

                    <!---------------------------------------------->
                    <h3 style="color: #006516; margin-left: 80px; margin-top: 20px;"><i class="em em-heavy_minus_sign"
                            aria-role="presentation" aria-label="HEAVY MINUS SIGN"
                            style="margin-right: 10px;"></i>ปัญหาที่พบ
                        : <span style="padding: 10px;  word-wrap: break-word; margin-left: 10%;"><input
                                class="txtdepart" type="text" name="hd_prob" required /></span>
                    </h3>
                    <!---------------------------------------------->
                    <!-------------- Space-------------------->
                    <li class="space" style="width: 1200px"></li>
                    <!----------------------------------------->
                    <!---------------------------------------------->
                    <h3 style="color: #006516; margin-left: 80px; margin-top: 20px;"><i class="em em-heavy_minus_sign"
                            aria-role="presentation" aria-label="HEAVY MINUS SIGN"
                            style="margin-right: 10px;"></i>วิธีเเก้ปัญหา
                        : <span style="padding: 10px;  word-wrap: break-word; margin-left: 9.5%;"><textarea
                                class="txtfixs" name="hd_fixs" required></textarea></span>
                    </h3>
                    <!---------------------------------------------->

                    <!-------------- Space-------------------->
                    <li class="space" style="width: 1200px; padding-top: 20px;"></li>
                    <!----------------------------------------->


                    <p style="height: 5px; width: 100%; background-color: #FF0000;"></p>

                    <h2 style="text-align: center; margin-top: 20px; color: #FFAC00;"><i class="em em-spiral_note_pad"
                            aria-role="presentation" aria-label=""
                            style="margin-right: 10px;"></i>กดเพิ่มรูปภาพก่อนเเล้วค่อยกดเพิ่มข้อมูล <i
                            class="em em-spiral_note_pad" aria-role="presentation" aria-label=""
                            style="margin-left: 10px;"></i></h2>

                    <span class="btnspace">
                        <input class="btnadpic" type="button" value="เพิ่มรูปภาพ"
                            onclick="document.location='image.php'"
                            style="cursor: pointer; background-color: #FFBF07; border-radius: 10px; width: 200px; height: 50px; margin: auto; margin-top: 35px;  display: flex; align-items: center; justify-content: center; overflow-x: hidden; color: #fff; font-size: 20px;">
                        <!-------------- Space-------------------->
                        <li class="space" style="width: 5%;"></li>
                        <!----------------------------------------->
                        <input class="btnaddata" type="submit" name="submit" id="butsave" value="เพิ่มข้อมูล"
                            style="cursor: pointer; background-color: #11b053; border-radius: 10px; width: 200px; height: 50px; margin: auto; margin-top: 35px;  display: flex; align-items: center; justify-content: center; overflow-x: hidden; color: #fff; font-size: 20px;">
                    </span>
                </form>
                <p style="color: #FF0000;"><?php echo $status; ?></p>
                <input class="btnadpic" type="button" value="กลับหน้าหลัก" onclick="document.location='index.php'"
                    style="cursor: pointer; background-color: #9ED200; border-radius: 10px; width: 200px; height: 50px; margin: auto; margin-top: 25px;  display: flex; align-items: center; justify-content: center; overflow-x: hidden; color: #fff; font-size: 20px;">

            </div>
            <script>
            $(document).ready(function() {
                $('#butsave').on('click', function() {
                    $("#butsave").attr("disabled", "disabled");
                    var hd_depart = $('#hd_depart').val();
                    var hd_prob = $('#hd_prob').val();
                    var hd_fixs = $('#hd_fixs').val();

                    if (hd_depart != "" && hd_prob != "" && hd_fixs != "") {
                        $.ajax({
                            url: "insert.php",
                            type: "POST",
                            data: {
                                hd_depart: hd_depart,
                                hd_prob: hd_prob,
                                hd_fixs: hd_fixs
                            },
                            cache: false,
                            success: function(dataResult) {
                                var dataResult = JSON.parse(dataResult);
                                if (dataResult.statusCode == 200) {
                                    $("#butsave").removeAttr("disabled");
                                    $('#fupForm').find('input:text').val('');
                                    $("#success").show();
                                    $('#success').html('Data added successfully !');
                                } else if (dataResult.statusCode == 201) {
                                    alert("ERROR!!!");
                                }
                            }
                        });
                    } else {
                        alert("กรุณากรอกในช่องว่างให้ครบ!");
                    }
                });
            });
            </script>
        </main>
    </div>

</body>

</html>
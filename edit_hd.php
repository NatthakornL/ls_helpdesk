<?php 

session_start();
require('connect.php');

$id = $_REQUEST['id'];
$query = "SELECT * FROM `tb_helpdesk` WHERE id='".$id."'";
$result = mysqli_query($connect, $query) or die (mysqli_error($connect));
$row = mysqli_fetch_assoc($result);
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
</style>

<body>

    <!-- BackToTop Button -->
    <a href="javascript:void(0);" id="backToTop" class="back-to-top">
        <i class="arrow"></i><i class="arrow"></i>
    </a>
    <div class="top">
        <div class="logo" onclick="document.location='index.php'" style="cursor: pointer;">
            <img src="./images/logo.png" style="max-width: 100%; height: auto;" />
            <h2 style="padding-left: 20px; font-size: 35px;">
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
                        aria-role="presentation" aria-label="" style="margin-right: 10px;"></i>เเก้ไขข้อมูล <i
                        class="em em-spiral_note_pad" aria-role="presentation" aria-label=""
                        style="margin-left: 10px;"></i></h2>


                <!---------------------------------------------->
                <form name="form" method="post" action="" style="text-align: left; margin: auto; ">
                    <input type="hidden" name="new" value="1" />
                    <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
                    <h3 style="color: #006516; margin-left: 80px; margin-top: 50px;"><i class="em em-heavy_minus_sign"
                            aria-role="presentation" aria-label="HEAVY MINUS SIGN" style="margin-right: 10px;"></i>เเผนก
                        /
                        หน่วยงาน
                        : <span style="padding: 10px; margin-left: 4%;"><input class="txtdepart" type="text"
                                name="hd_depart" required value="<?php echo $row['hd_depart']; ?>" /></span>
                    </h3>

                    <!---------------------------------------------->

                    <!---------------------------------------------->
                    <h3 style="color: #006516; margin-left: 80px; margin-top: 20px;"><i class="em em-heavy_minus_sign"
                            aria-role="presentation" aria-label="HEAVY MINUS SIGN"
                            style="margin-right: 10px;"></i>ปัญหาที่พบ
                        : <span style="padding: 10px;  word-wrap: break-word; margin-left: 10%;"><input
                                class="txtdepart" type="text" name="hd_prob" required
                                value="<?php echo $row['hd_prob']; ?>" /></span>
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
                                class="txtfixs" name="hd_fixs"><?php echo $row['hd_fixs']; ?></textarea></span>
                    </h3>
                    <!---------------------------------------------->
                </form>
                <!-------------- Space-------------------->
                <li class="space" style="width: 1200px; padding-top: 20px;"></li>
                <!----------------------------------------->

                <span class="btnspace">

                    <input class="btnaddata" type="submit" name="submit" value="เเก้ไขข้อมูล"
                        style="cursor: pointer; background-color: #11b053; border-radius: 10px; width: 200px; height: 50px; margin: auto; margin-top: 35px;  display: flex; align-items: center; justify-content: center; overflow-x: hidden; color: #fff; font-size: 20px;">
                </span>

                <input class="btnadpic" type="button" value="กลับหน้าหลัก" onclick="document.location='index.php'"
                    style="cursor: pointer; background-color: #9ED200; border-radius: 10px; width: 200px; height: 50px; margin: auto; margin-top: 25px;  display: flex; align-items: center; justify-content: center; overflow-x: hidden; color: #fff; font-size: 20px;">

            </div>

        </main>
    </div>

</body>

</html>
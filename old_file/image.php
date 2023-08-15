<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Upload Images</title>
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
    <!--================================================================-->
    <style>
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
</head>

<body>
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
                                style="font-size: 24px; font-weight: 600; text-align: center; color: #FFA200; margin-top: 1%;">
                                <i class="em em-wrench" aria-role="presentation" aria-label="WRENCH"
                                    style="margin-right: 15px;"></i>
                                เพิ่มรูปภาพขั้นตอนการเเก้ปัญหา<i class="em em-wrench" aria-role="presentation"
                                    aria-label="WRENCH" style="margin-left: 15px;"></i>
                            </li><br>
                            <div style="width: 100%; display: flex;">
                                <form action="image_upload.php" method="post" id="form">
                                    <li
                                        style="font-size: 20px; font-weight: 600; text-align: left; width: 100%; margin: 1%; text-align: center;">
                                        สามารถเลือกรูปภาพได้มากกว่า 1 รูปภาพต่อการอัพโหลด 1 ครั้ง
                                        <span style="margin: 0.4%;"><input type="file" name="files[]" id=""
                                                multiple><input type="submit" name="submit" value="อัพรูปภาพ"
                                                data-loading-text="Loading..."></span>
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
                            <div class="add_hd" style="margin-top: 1%; display: flex;">
                                <input class="btn btn--radius-2 btn--green" type="hidden" id="submit"
                                    onclick="//update()" value="เพิ่มข้อมูล" />
                                <input class="btn btn--radius-2 btn--orange" type="button" name="" id="butcancel"
                                    value="กลับสู่หน้าเพิ่มข้อมูล" onclick="document.location='insert_hd.php'">


                                <br>
                            </div>

                        </div><br>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
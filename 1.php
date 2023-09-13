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
    <link rel="stylesheet" type="text/css" href="css/zoom.css">
    <link href="https://emoji-css.afeld.me/emoji.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./images/avatar_solid_icon_235512.ico">

    <script type="text/javascript" src="scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="style.css" />
    <link href="https://emoji-css.afeld.me/emoji.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./images/avatar_solid_icon_235512.ico">
    <script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.all.min.js
"></script>
    <link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.min.css
" rel="stylesheet">



    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="js/zoom.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>

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
    $('.thumbnails img').click(function() {

        var thumbSrc = $('.thumb').attr('src');
        var largeSrc = $('#largeImage').attr('src');
        $('#largeImage').attr('src', $(this).attr('src').replace(thumbSrc, largeSrc));
        $('#description').html($(this).attr('alt'));

    });
    </script>

    <script src="script.js"></script>

    <script>
    const $dropdown = $(".dropdown");
    const $dropdownToggle = $(".dropdown-toggle");
    const $dropdownMenu = $(".dropdown-menu");
    const showClass = "show";

    $(window).on("load resize", function() {
        if (this.matchMedia("(min-width: 768px)").matches) {
            $dropdown.hover(
                function() {
                    const $this = $(this);
                    $this.addClass(showClass);
                    $this.find($dropdownToggle).attr("aria-expanded", "true");
                    $this.find($dropdownMenu).addClass(showClass);
                },
                function() {
                    const $this = $(this);
                    $this.removeClass(showClass);
                    $this.find($dropdownToggle).attr("aria-expanded", "false");
                    $this.find($dropdownMenu).removeClass(showClass);
                }
            );
        } else {
            $dropdown.off("mouseenter mouseleave");
        }
    });
    </script>
    <script>
    function popupText() {
        Swal.fire({
            icon: 'error',
            title: 'เมื่อเจอข้อผิดพลาด',
            text: 'กรุณาติดต่อที่ศูนย์คอมพิวเตอร์ครับ',
            footer: '<a href="">Why do I have this issue?</a>'
        })
    }
    </script>


    <!--================================================================-->
    <style>
    .click-zoom input[type=checkbox] {
        display: none
    }

    .click-zoom img {
        margin: 100px;
        transition: transform 0.25s ease;
        cursor: zoom-in
    }

    .click-zoom input[type=checkbox]:checked~img {
        transform: scale(2);
        cursor: zoom-out
    }
    </style>
</head>


<div class="background">
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w960">
            <div class="card card-4">
                <div class="card-body">
                    <!--card body-->
                    <!-- BackToTop Button -->
                    <a href="javascript:void(0);" id="backToTop" class="back-to-top">
                        <i class="arrow"></i><i class="arrow"></i>
                    </a>
                    <!-----------nav zone----------->
                    <nav class="navbar navbar-expand-md navbar-dark "
                        style="border-radius: 10px; border: 1px solid #00FFFB; background-color: #555555;">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="index.php">
                                <h2 style="padding: 5%; font-size: 25px; width: 80%; font-weight: 600; display: flex;">
                                    Lerdsin <span class="danger">Helpdesk</span>
                                </h2>
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php"><i class="fas fa-home"
                                                style="color: #2470f5; padding-right: 5px;"></i>หน้าหลัก</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            เพิ่มเติม
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                            <a class="dropdown-item" href="insert_hd.php"><i class="fas fa-plus"
                                                    style="color: #2470f5; padding-right: 5px;"></i>เพิ่มข้อมูล</a>

                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#" onclick="popupText()"><i
                                                    class="fas fa-exclamation"
                                                    style="color: #2470f5; padding-right: 5px;"></i>พบเจอปัญหา?</a>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </nav>
                    <!-------------------------------------->
                    <div
                        style="margin-top: 10px; padding: 3%; width: 100%; height: auto; border: 1px solid #004EC1; border-radius: 10px;">
                        <li
                            style="font-size: 20px; font-weight: 600; text-align: center; color: #FFA200; margin-top: 2%;">
                            <i class="em em-wrench" aria-role="presentation" aria-label="WRENCH"
                                style="margin-right: 5px;"></i>
                            หน้าเเสดงข้อมูลปัญหาที่พบ<i class="em em-wrench" aria-role="presentation"
                                aria-label="WRENCH" style="margin-left: 5px;"></i>
                        </li><br>
                        <?php 
                if(isset($_GET['id'])) {
                    $result = $connect->query("SELECT * FROM tb_helpdesk WHERE id = '".$_GET['id']."'");
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <li
                            style="font-size: 20px; font-weight: 600; text-align: left; color: #FFA200; margin-top: 2%;">
                            <i class="em em-heavy_minus_sign" aria-role="presentation" aria-label="HEAVY MINUS SIGN"
                                style="margin-right: 10px;"></i>
                            ลำดับที่ :<span style="padding: 10px; color: #FF5F41;"><?php echo $row['id']  ?></span>
                        </li><br>
                        <li
                            style="font-size: 20px; font-weight: 600; text-align: left; color: #FFA200; margin-top: 1%;">
                            <i class="em em-heavy_minus_sign" aria-role="presentation" aria-label="HEAVY MINUS SIGN"
                                style="margin-right: 10px;"></i>
                            เเผนก / หน่วยงาน :<span
                                style="padding: 10px; color: #FF5F41;"><?php echo $row['hd_depart']  ?></span>
                        </li><br>
                        <li
                            style="font-size: 20px; font-weight: 600; text-align: left; color: #FFA200; margin-top: 1%;">
                            <i class="em em-heavy_minus_sign" aria-role="presentation" aria-label="HEAVY MINUS SIGN"
                                style="margin-right: 10px;"></i>
                            ปัญหาที่พบ :<span
                                style="padding: 10px; color: #FF5F41;"><?php echo $row['hd_prob']  ?></span>
                        </li><br>
                        <li
                            style="font-size: 20px; font-weight: 600; text-align: left; color: #FFA200; margin-top: 1%;">
                            <i class="em em-heavy_minus_sign" aria-role="presentation" aria-label="HEAVY MINUS SIGN"
                                style="margin-right: 10px;"></i>
                            วิธีเเก้ปัญหา :<span
                                style="padding: 10px; color: #FF5F41; word-wrap: break-word;"><?php echo $row['hd_fixs']  ?></span>
                        </li><br>
                        <?php } 
                    mysqli_close($connect);
                } ?>
                        <div
                            style="margin-top: 10px; padding: 3%; width: 100%; height: auto; border: 1px solid #004EC1; border-radius: 10px;">

                            <li
                                style="font-size: 20px; font-weight: 600; text-align: center; color: #FFA200; margin-top: 2%;">
                                <i class="em em-pager" aria-role="presentation" aria-label="PAGER"
                                    style="margin-right: 5px;"></i>
                                รูปภาพเเสดงขั้นตอนการเเก้ปัญหา<i class="em em-pager" aria-role="presentation"
                                    aria-label="PAGER" style="margin-left: 5px;"></i>
                            </li><br>
                            <div class="piczone">

                                <?php 
                    $id = $_GET['id'];
                    $connect = mysqli_connect('localhost', 'root', '' , 'ls_helpdesk'); ?>

                                <?php 
                                if(isset($_GET['id'])) { 
                    $sql = $connect->query("SELECT images FROM tb_helpdesk WHERE id = '".$_GET['id']."'"); 
                    $result = mysqli_fetch_array($sql);
                    $images = $result['images'];
                    $remove_last_comma = substr($images,0);
                    $temp = explode(',',$remove_last_comma);
                    for ($i = 0;$i<count($temp);$i++) { 
                        echo '<a target="_blank" href="images/uploadPic/' .trim($temp[$i]).'"><img
                                        src="images/uploadPic/' .trim($temp[$i]).'" alt="" data-action="zoom"
                                        height="auto" width="100%"></a><div class="dropdown-divider" style="color: #FFA200;"></div>';
                                    

                                    } ?>
                                <?php }else{ ?>
                                <img src="./images/noimg.png" id="image_preview" width="20%" height="20%"
                                    style="align-items: center;" />
                                <?php } ?>

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
                        
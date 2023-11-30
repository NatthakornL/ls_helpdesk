<?php 
session_start();
include ("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lerdsin Helpdesk</title>
    <!--stylesheet-->

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

    <style>
    table {
        border: 1px solid #bdc3c7;
        border-collapse: collapse;
        text-align: center;
        width: 100%;
        border-color: #000;
        border-spacing: 0;
    }

    /* Striped Tables: ทำไฮไล์ในการแบ่ง row  */
    tr:nth-child(even) {
        background-color: #e1e1e1;
    }

    tr:nth-child(odd) {
        background-color: #F7F7F7;
    }

    th {
        text-align: center;
        font-size: 17px;
        background-color: #269600;
        border: 1px solid #000;
        color: #fff;
    }

    td {
        text-align: center;
        font-size: 15px;
        height: 30px;
        border: 1px solid #000;
    }

    .inputSearch[type=text] {
        width: 600px;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 6px;
        font-size: 25px;
        background-color: white;
        background-position: 10px 10px;
        background-repeat: no-repeat;
        padding: 12px 20px 12px 40px;
        transition: width 0.4s ease-in-out;
    }

    /*===================================================*/

    @import url("https://fonts.googleapis.com/css?family=Dosis");

    :root {
        /* generic */
        --gutterSm: 0.4rem;
        --gutterMd: 0.8rem;
        --gutterLg: 1.6rem;
        --gutterXl: 2.4rem;
        --gutterXx: 7.2rem;
        --colorPrimary400: #baff95;
        --colorPrimary600: #baff95;
        --colorPrimary800: #00B127;
        --fontFamily: "Dosis", sans-serif;
        --fontSizeSm: 1.2rem;
        --fontSizeMd: 1.6rem;
        --fontSizeLg: 1.0rem;
        --fontSizeXl: 2.8rem;
        --fontSizeXx: 3.6rem;
        --lineHeightSm: 1.1;
        --lineHeightMd: 1.5;
        --transitionDuration: 300ms;
        --transitionTF: cubic-bezier(0.645, 0.045, 0.355, 1);

        /* floated labels */
        --inputPaddingV: var(--gutterMd);
        --inputPaddingH: var(--gutterLg);
        --inputFontSize: var(--fontSizeLg);
        --inputLineHeight: var(--lineHeightMd);
        --labelScaleFactor: 0.8;
        --labelDefaultPosY: 50%;
        --labelTransformedPosY: calc((var(--labelDefaultPosY)) - (var(--inputPaddingV) * var(--labelScaleFactor)) - (var(--inputFontSize) * var(--inputLineHeight)));
        --inputTransitionDuration: var(--transitionDuration);
        --inputTransitionTF: var(--transitionTF);
    }


    .Title {
        margin: 0 0 var(--gutterXx) 0;
        padding: 0;
        color: #fff;
        font-size: var(--fontSizeXx);
        font-weight: 400;
        line-height: var(--lineHeightSm);
        text-align: center;
        text-shadow: -0.1rem 0.1rem 0.2rem var(--colorPrimary800);
    }

    .Input {
        position: relative;
        margin: auto;
        width: 100%;
        min-width: 600px;
    }

    .Input-text {
        display: block;
        margin: 0;
        padding: var(--inputPaddingV) var(--inputPaddingH);
        color: inherit;
        width: 60%;
        font-family: inherit;
        font-size: var(--inputFontSize);
        font-weight: inherit;
        line-height: var(--inputLineHeight);
        border: none;
        border-radius: 0.4rem;
        transition: box-shadow var(--transitionDuration);
    }

    .Input-text::placeholder {
        color: #b0bec5;
    }

    .Input-text:focus {
        outline: none;
        box-shadow: 0.2rem 0.8rem 1.6rem var(--colorPrimary600);
    }

    .Input-label {
        display: block;
        position: absolute;
        bottom: 50%;
        left: 1rem;
        color: #000;
        font-family: inherit;
        font-size: var(--inputFontSize);
        font-weight: inherit;
        line-height: var(--inputLineHeight);
        opacity: 0;
        transform: translate3d(0, var(--labelDefaultPosY), 0) scale(1);
        transform-origin: 0 0;
        transition: opacity var(--inputTransitionDuration) var(--inputTransitionTF),
            transform var(--inputTransitionDuration) var(--inputTransitionTF),
            visibility 0ms var(--inputTransitionDuration) var(--inputTransitionTF),
            z-index 0ms var(--inputTransitionDuration) var(--inputTransitionTF);
    }

    .Input-text:placeholder-shown+.Input-label {
        visibility: hidden;
        z-index: -1;
    }

    .Input-text:not(:placeholder-shown)+.Input-label,
    .Input-text:focus:not(:placeholder-shown)+.Input-label {
        visibility: visible;
        z-index: 1;
        opacity: 1;
        transform: translate3d(0, var(--labelTransformedPosY), 0) scale(var(--labelScaleFactor));
        transition: transform var(--inputTransitionDuration), visibility 0ms,
            z-index 0ms;
    }

    /*===================================================*/

    a:link {
        color: rgb(12, 0, 146);
        background-color: transparent;
        text-decoration: none;
    }

    a:visited {
        color: rgb(12, 0, 146);
        background-color: transparent;
        text-decoration: none;
    }

    a:hover {
        color: rgb(70, 142, 249);
        background-color: transparent;
        text-decoration: none;
    }

    a:active {
        color: rgb(154, 200, 254);
        background-color: transparent;
        text-decoration: none;
    }

    /*===================================================*/
    .btn_addhd {
        height: 50px;
        width: 50px;
        text-align: center;
        justify-content: center;
        justify-items: center;
        background-color: red;
        border-radius: 50px;
        margin-right: 20px;
        font-size: 40px;
        color: #fff;
        cursor: pointer;
    }

    .btnmore {
        width: 90%;
        padding: 4px 4px;
        margin: 4px 2px;
        background-color: #00E865;
        border: 1px solid #000;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
        text-align: center;
        font-size: 11px;
    }

    .btnedit {
        width: 90%;
        padding: 4px 4px;
        margin: 4px 2px;
        background-color: #FFB634;
        border: 1px solid #000;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
        text-align: center;
        font-size: 11px;
    }
    </style>
    <!--======================= jQuery library ===========================-->
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
    function searchTable() {
        var input, filter, found, table, tr, td, i, j;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td");
            for (j = 0; j < td.length; j++) {
                if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    found = true;
                }
            }
            if (found) {
                tr[i].style.display = "";
                found = false;
            } else {
                tr[i].style.display = "none";
            }
        }
    }
    </script>

    <script>
    $(document).ready(function() {
        $(document).on('click', '.view-data', function(e) {
            e.preventDefault();
            var id = $(this).prop('id');

            $.ajax({
                url: '1.php',
                type: 'get',
                data: {
                    'id': id
                }
            }).then(function(response) {
                if (response) {
                    $('#helpdesk').html(response);
                }
            });
        });
    })
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
            footer: '<a href="https://www.google.co.th/search?q=" target="_blank">ลองค้นหาในอินเทอร์เน็ตเพิ่มเติม?</a>'
        })
    }
    </script>

    <script>
    function futureText() {
        Swal.fire({
            position: 'center',
            icon: 'info',
            title: 'Wait to Update!',
            text: 'กำลังอยู่ในช่วงพัฒนาเพิ่มเติม',
            showConfirmButton: false,
            timer: 2000
        })
    }
    </script>


    <!--================================================================-->

</head>

<body>
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
                                <a class="navbar-brand" href="<?php $_SERVER['PHP_SELF']; ?>">
                                    <h2
                                        style="padding: 5%; font-size: 25px; width: 80%; font-weight: 600; display: flex;">
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
                                            <a class="nav-link" href="<?php $_SERVER['PHP_SELF']; ?>"><i
                                                    class="fas fa-home"
                                                    style="color: #2470f5; padding-right: 5px;"></i>หน้าหลัก</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2"
                                                role="button" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                เพิ่มเติม
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                                <a class="dropdown-item" href="insert_hd.php"><i class="fas fa-plus"
                                                        style="color: #2470f5; padding-right: 5px;"></i>เพิ่มข้อมูล</a>
                                                <a class="dropdown-item" href="#" onclick="futureText()"><i
                                                        class="fas fa-wrench"
                                                        style="color: #2470f5; padding-right: 5px;"></i>การตั้งค่า</a>

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

                        <!--
                        <div class="add_hd" style="align-items: flex-end;">
                            <input type="button" class="btn btn--radius-2 btn--green"
                                onclick="document.location='insert_hd.php'" value="เพิ่มข้อมูล">
                        </div>
-->



                        <div
                            style="margin-top: 10px; padding: 1%; width: 100%; height: auto; border: 1px solid #004EC1; border-radius: 10px;">
                            <li
                                style="font-size: 20px; font-weight: 600; text-align: center; color: #FFA200; margin-top: 2%;">
                                <i class="em em-page_facing_up" aria-role="presentation"
                                    aria-label="PAGE FACING UP"></i>
                                ตารางเเสดงข้อมูลปัญหาที่พบ<i class="em em-page_facing_up" aria-role="presentation"
                                    aria-label="PAGE FACING UP"></i>
                            </li><br>
                            <span class="Input" style="width: 90%;">
                                <input type="text" id="myInput" onkeyup="searchTable()" class="Input-text"
                                    placeholder="ค้นหา" style="margin-left: 20%; border: 1px solid; margin-top: 2%;">
                            </span><br><br>
                            <table border="1" bordercolor="#000" align="center" width="100%" border-collapse: collapse;
                                style="margin: auto; overflow-x: hidden; padding-top: 20px; ">
                                <thead>
                                    <tr style="background-color: #F7F7F7; height: 35px;">
                                        <th>ลำดับ</th>
                                        <th>เเผนก / หน่วยงาน</th>
                                        <th>ปัญหาที่พบ</th>
                                        <th>เพิ่มเติม</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                    <tr>
                                        <td><?php echo $row['id'] ?></td>
                                        <td><?php echo $row['hd_depart'] ?></td>
                                        <td><?php echo $row['hd_prob'] ?></td>
                                        
                                        <td>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2"
                                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    ส่วนเพิ่มเติม
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                                    <a class="dropdown-item" href="1.php?id=<?php echo $row['id'];?>"><i
                                                            class="fas fa-clipboard"
                                                            style="color: #2470f5; padding-right: 5px;"></i>ดูเนื้อหาเพิ่มเติม</a>

                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item"
                                                        href="edit_hd1.php?id=<?php echo $row['id'];?>"><i
                                                            class="fas fa-wrench"
                                                            style="color: #2470f5; padding-right: 5px;"></i>เเก้ไขข้อมูล</a>
                                                </div>
                                            </li>
                                        </td>
                                    </tr>
                                    <?php endwhile ?>
                                </tbody>
                            </table><br>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--<div class="container">
    <main>
        <div class="col"
            style="padding-bottom: 30px; padding-left: 1px; padding-top: 20px; margin: auto; overflow-x: hidden;">
            
            <li class="space" style="width: 800px; height: 50px;"></li>
            
            <span class="Input">
                <input type="text" id="myInput" onkeyup="searchTable()" class="Input-text" placeholder="ค้นหา"
                    style="margin-left: 20%; border: 1px solid;">
            </span>

            
            <li class="space" style="width: 800px; height: 50px;"></li>
            

            <table border="1" bordercolor="#000" align="center" width="100%" border-collapse: collapse;
                style="margin: auto; overflow-x: hidden; padding-top: 30px; ">
                <thead>
                    <tr style="background-color: #F7F7F7; height: 40px;">
                        <th>ลำดับ</th>
                        <th>เเผนก / หน่วยงาน</th>
                        <th>ปัญหาที่พบ</th>
                        <th>วิธีเเก้ไข</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php //while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td><?php //echo $row['id'] ?></td>
                        <td><?php //echo $row['hd_depart'] ?></td>
                        <td><?php //echo $row['hd_prob'] ?></td>
                        <td><a class="links" href='1.php?id=<?php //echo $row['id'];?>#helpdesk' data-toggle="tab"
                                id="<?php // echo $row['id']; ?>" <?php //echo $row['hd_depart'] ?> class="view-data"
                                data-id="1">คลิ๊กเพื่อดูเพิ่มเติม</a>
                        </td>
                        <td><a class="links" href='edit_hd.php?id=<?php // echo $row['id'];?>#EditData' data-toggle="tab"
                                id="<?php //echo $row['id']; ?>" <?php // echo $row['hd_depart'] ?> class="view-data"
                                data-id="1">เเก้ไขข้อมูล</a>
                        </td>
                    </tr>
                    <?php // endwhile ?>
                </tbody>
            </table>
        </div>

    </main>
</div>-->
    </div>
</body>

</html>
<!--<td>
                                            <a class="view-data" href="1.php?id=<?php //echo $row['id'];?>#helpdesk"
                                                data-toggle="tab" id="<?php //echo $row['id']; ?>"
                                                <?php //echo $row['hd_depart'] ?> class="view-data"
                                                data-id="1">คลิ๊กเพื่อดูเพิ่มเติม</a>
                                            <button class="btnmore" type="button"><a
                                                    href="1.php?id=<?php echo $row["id"] ?>" style="color: #fff;"
                                                    onclick="//return confirm('ต้องการไปยังหน้าเปลี่ยนรูปภาพใช่หรือไม่?');">ดูเพิ่มเติม</a></button>
                                        </td>
                                        <td>
                                            <a class="view-data"
                                                href="edit_hd1.php?id=<?php //echo $row['id'];?>#EditData"
                                                data-toggle="tab" id="<?php //echo $row['id']; ?>"
                                                <?php //echo $row['hd_depart'] ?> class="view-data"
                                                data-id="1">เเก้ไขข้อมูล</a>
                                            <button class="btnedit" type="button"><a
                                                    href="edit_hd1.php?id=<?php echo $row["id"] ?>" style="color: #fff;"
                                                    onclick="//return confirm('ต้องการไปยังหน้าเปลี่ยนรูปภาพใช่หรือไม่?');">เเก้ไขข้อมูล</a></button>-->
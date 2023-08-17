<?php 
session_start();
include ("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lerdsin Helpdesk</title>
    <!--stylesheet-->
    <script type="text/javascript" src="scripts.js"></script>
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
        $('.view-data').on('click', '.links', function() {
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
                        <div class="logo wrapper wrapper--w680">
                            <img src="./images/logo.png" style="max-width: 100%; height: auto;" />
                            <h2 style="padding: 5%; font-size: 30px; width: 95%; font-weight: 600; ">
                                Lerdsin <span class="danger">Helpdesk</span>
                            </h2>
                        </div>
                        <div class="add_hd" style="padding: 4%;">
                            <input type="button" class="btn btn--radius-2 btn--green"
                                onclick="document.location='insert_hd.php'" value="เพิ่มข้อมูล">
                        </div>
                    </div>
                    <div
                        style="margin-top: 10px; padding: 1%; width: 100%; height: auto; background-color: #EDFFFC; border: 1px solid #004EC1; border-radius: 10px;">
                        <li
                            style="font-size: 20px; font-weight: 600; text-align: center; color: #FFA200; margin-top: 2%;">
                            <i class="em em-page_facing_up" aria-role="presentation" aria-label="PAGE FACING UP"></i>
                            ตารางเเสดงข้อมูลปัญหาที่พบ<i class="em em-page_facing_up" aria-role="presentation"
                                aria-label="PAGE FACING UP"></i>
                        </li><br>
                        <span class="Input" style="width: 90%;">
                            <input type="text" id="myInput" onkeyup="searchTable()" class="Input-text"
                                placeholder="ค้นหา" style="margin-left: 20%; border: 1px solid; margin-top: 2%;">
                        </span><br><br>
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
                                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                <tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['hd_depart'] ?></td>
                                    <td><?php echo $row['hd_prob'] ?></td>
                                    <td><a class="links" href='1.php?id=<?php echo $row['id'];?>#helpdesk'
                                            data-toggle="tab" id="<?php echo $row['id']; ?>"
                                            <?php echo $row['hd_depart'] ?> class="view-data"
                                            data-id="1">คลิ๊กเพื่อดูเพิ่มเติม</a>
                                    </td>
                                    <td><a class="links" href='edit_hd.php?id=<?php echo $row['id'];?>#EditData'
                                            data-toggle="tab" id="<?php echo $row['id']; ?>"
                                            <?php echo $row['hd_depart'] ?> class="view-data"
                                            data-id="1">เเก้ไขข้อมูล</a>
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

</html>
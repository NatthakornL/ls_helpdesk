<?php 
error_reporting(E_ALL ^ E_WARNING); 

include_once('./function.php');

$connect = connectDatabase();


$sql = "SELECT * FROM tb_helpdesk WHERE id = '".$_GET["id"]."' ";
$query = mysqli_query($connect, $sql) or die("Error Query [".$sql."] ");
$rs = mysqli_fetch_array($query);
if($rs == null){
    //echo '<script>alert("ไม่พบข้อมูล!!");window.location="index.php";</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lerdsin Helpdesk</title>
    <!--stylesheet-->
    <link rel="stylesheet" href="./style.css" />
    <link href="https://emoji-css.afeld.me/emoji.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./images/avatar_solid_icon_235512.ico">

    <!----------------------------------------------------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!----------------------------------------------------->

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
    <script>
    $('#form').submit(function(event) {
        var formdata = new FormData(this);
        $.ajax({
            url: 'image_update.php',
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
    <!--================================================================-->

    <script>
    $(document).ready(function() {
        var fileArr = [];
        $("#images").change(function() {
            // check if fileArr length is greater than 0
            if (fileArr.length > 0) fileArr = [];

            $('#image_preview').html("");
            var total_file = document.getElementById("images").files;
            if (!total_file.length) return;
            for (var i = 0; i < total_file.length; i++) {
                if (total_file[i].size > 1048576) {
                    return false;
                } else {
                    fileArr.push(total_file[i]);
                    $('#image_preview').append("<div class='img-div' id='img-div" + i + "'><img src='" +
                        URL.createObjectURL(event.target.files[i]) +
                        "' class='img-responsive image img-thumbnail' title='" + total_file[i]
                        .name + "'><div class='middle'><button id='action-icon' value='img-div" +
                        i + "' class='btn btn-danger' role='" + total_file[i].name +
                        "'><i class='fa fa-trash' style='color: red; font-size: 2.5em;'></i></button></div></div>"
                    );
                }
            }
        });

        $('body').on('click', '#action-icon', function(evt) {
            var divName = this.value;
            var fileName = $(this).attr('role');
            $(`#${divName}`).remove();

            for (var i = 0; i < fileArr.length; i++) {
                if (fileArr[i].name === fileName) {
                    fileArr.splice(i, 1);
                }
            }
            document.getElementById('images').files = FileListItem(fileArr);
            evt.preventDefault();
        });

        function FileListItem(file) {
            file = [].slice.call(Array.isArray(file) ? file : arguments)
            for (var c, b = c = file.length, d = !0; b-- && d;) d = file[b] instanceof File
            if (!d) throw new TypeError("expected argument to FileList is File or array of File objects")
            for (b = (new ClipboardEvent("")).clipboardData || new DataTransfer; c--;) b.items.add(file[c])
            return b.files
        }
    });
    </script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/script.js"></script>
    <script>
    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('c_image_preview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
    </script>

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

.delete {
    background-image: url('delete.png');
    width: 20px;
    height: 20px;
    border: 0;
    cursor: pointer;
}

.btnred {
    width: 20%;
    height: 33.5px;
    font-size: 16px;
    padding: 4px 4px;
    margin: 4px 2px;
    background-color: #E75100;
    border: 1px solid #000;
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
    text-align: center;
}

/*=======================================================*/
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

/*=======================================================*/

.img-div {
    position: relative;
    width: 48%;
    float: left;
    margin-right: 5px;
    margin-left: 5px;
    margin-bottom: 10px;
    margin-top: 10px;
}

.image {
    opacity: 1;
    display: block;
    width: 100%;
    max-width: auto;
    transition: .5s ease;
    backface-visibility: hidden;
}

.middle {
    transition: .5s ease;
    opacity: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    text-align: center;
}

.img-div:hover .image {
    opacity: 0.3;
}

.img-div:hover .middle {
    opacity: 1;
}

.album {
    display: flex;
    align-items: center;
    justify-content: center;
    justify-items: center;

}

.imgContainer {
    max-width: 100%;
    max-height: 100%;
    overflow: hidden;
}

/*=======================================================*/
</style>

<div class="background">
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w960">
            <div class="card card-4">
                <div class="card-body">
                    <!--card body-->
                    <div class="container-fluid"
                        style="display: flex; width: 100%; text-align: left; padding: 1%; width: 100%; height: auto; border: 1px solid #004EC1; border-radius: 10px;">
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
                        style="margin-top: 10px; padding: 3%; width: 100%; height: auto; border: 1px solid #004EC1; border-radius: 10px;">
                        <li
                            style="font-size: 24px; font-weight: 600; text-align: center; color: #FFA200; margin-top: 2%;">
                            <i class="em em-wrench" aria-role="presentation" aria-label="WRENCH"
                                style="margin-right: 15px;"></i>
                            เเก้ไขข้อมูล<i class="em em-wrench" aria-role="presentation" aria-label="WRENCH"
                                style="margin-left: 15px;"></i>
                        </li><br>

                        <form name="form" method="post" action="edit.php?id=<?php echo $_GET["id"] ?>"
                            enctype="multipart/form-data">
                            <input type="hidden" name="submit" value="1" />
                            <input name="id" type="hidden" value="<?php echo $rs['id']; ?>" />



                            <div style="width: 100%; text-align: center;">
                                <li
                                    style="margin-left: 15%; font-size: 16px; display: flex; width: 100%; height: auto;">
                                    <span
                                        style="font-weight: 600; padding: 0.4%; width: 20%; text-align: right; font-size: 18px;">เเผนก
                                        / หน่วยงาน : </span><span
                                        style="width: 75%; text-align: left; padding-left: 2%; padding-right: 3%;"><input
                                            class="txtdepart" type="text" name="hd_depart" required
                                            title="กรุณาใส่ชื่อเเผนกหรือหน่วยงาน"
                                            value="<?php echo $rs['hd_depart']; ?>" /></span>
                                </li><br>
                                <li
                                    style="margin-left: 15%; font-size: 16px; display: flex; width: 100%; height: auto;">
                                    <span
                                        style="font-weight: 600; padding: 0.4%; width: 20%; text-align: right; font-size: 18px;">ปัญหาที่พบ
                                        : </span><span
                                        style="width: 75%; text-align: left; padding-left: 2%; padding-right: 3%;"><input
                                            class="txtprob" type="text" name="hd_prob" required
                                            title="กรุณาใส่ปัญหาที่พบ" value="<?php echo $rs['hd_prob']; ?>" /></span>
                                </li><br>
                                <li
                                    style="margin-left: 15%; font-size: 16px; display: flex; width: 100%; height: auto;">
                                    <span
                                        style="font-weight: 600; padding: 0.4%; width: 20%; text-align: right; font-size: 18px;">วิธีเเก้ปัญหา
                                        : </span><span
                                        style="width: 75%; text-align: left; padding-left: 2%; padding-right: 3%; word-wrap: break-word;"><textarea
                                            class="txtfixs" name="hd_fixs"
                                            title="กรุณาใส่วิธีเเก้ปัญหา"><?php echo $rs['hd_fixs']; ?></textarea></span>
                                </li><br>

                            </div>
                            <div
                                style="margin-top: 10px; padding: 3%; width: 100%; height: auto; border: 1px solid #004EC1; border-radius: 10px;">


                                <li
                                    style="font-size: 24px; font-weight: 600; text-align: center; color: #FFA200; margin-top: 1%;">
                                    <i class="em em-wrench" aria-role="presentation" aria-label="WRENCH"
                                        style="margin-right: 15px;"></i>
                                    เเก้ไขรูปภาพ<i class="em em-wrench" aria-role="presentation" aria-label="WRENCH"
                                        style="margin-left: 15px;"></i>
                                </li><br>
                                <div style="width: 100%; display: list-item;">
                                    <li
                                        style="font-size: 20px; font-weight: 600; text-align: left; width: 100%; margin: 1%; text-align: center; ">
                                        สามารถเลือกรูปภาพได้มากกว่า 1 รูปภาพต่อการอัพโหลด 1 ครั้ง
                                        <input type="file" class="form-control" name="filUpload" id="images" multiple>
                                        <input type="submit" name="submit" value="เเก้ไขข้อมูล"
                                            onclick="//document.location='image.php'" data-loading-text="Loading..." />
                                        <button class="btnred" type="button"><a
                                                href="delete.php?id=<?php echo $rs["id"] ?>" style="color: #fff;"
                                                onclick="return confirm('ต้องการลบข้อมูลนี้ใช่หรือไม่?');">ลบข้อมูล</a></button>
                                    </li>
                                    <div class="album">
                                        <div class="imgContainer">
                                            <div id="image_preview" style="width:100%; height: 100%;">
                                                <!--<img src="images/<?php //echo $rs["images"];?>" width="100%"
                                                    height="100%"><br>-->
                                                <!--<input type="hidden" id="image_preview" name="hdnOldFile"
                                                    value="<?php //$rs["images"]; ?>">-->
                                                <?php
// Include the database configuration file
include_once 'connect.php';

// Get images from the database
$query = $connect->query("SELECT * FROM images ORDER BY id DESC");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'images/'.$row["images"];
?>
                                                <img src="<?php echo $imageURL; ?>" alt="" width="100%" height="100%" />
                                                <?php }
}else{ ?>
                                                <p>[ ไม่พบไฟล์รูปภาพ ]</p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                        </form>
                    </div>
                </div>
                <div class="add_hd" style="margin-top: 1%; display: flex;">

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


</html>

<!-------------------------COMMENT Zone----------------------------->

<!--
<input type="submit1" onclick="return confirm('ต้องการลบข้อมูลนี้ใช่หรือไม่?');"
                                            value="ลบข้อมูล" data-loading-text="Loading..." />



                                            <?php // if($rs['images'] != ''){ ?>
                                                <img src="./images/<?php echo $rs['images']; ?>" id="image_preview"
                                                    width="100%" height="100%" />
                                                <?php // } else { ?>
                                                <img src="./images/noimg.png" id="image_preview" width="20%"
                                                    height="20%" style="align-items: center;" />
                                                <?php // } ?>
                            -->
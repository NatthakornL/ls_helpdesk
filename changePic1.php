<!DOCTYPE html>
<html lang="en">
<?php 
    include 'connect.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ?>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.min.css">
    <title>Lerdsin Helpdesk</title>

    <!--stylesheet-->
    <link rel="stylesheet" href="./style.css" />
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
    <script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.all.min.js
"></script>
    <link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.min.css
" rel="stylesheet">

    <!----------------------------------------------------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!----------------------------------------------------->

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.all.min.js"></script>

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

.btnedit {
    width: 20%;
    height: 33.5px;
    font-size: 16px;
    padding: 4px 4px;
    margin: 4px 2px;
    background-color: #FF9E00;
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

.btn_back {
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    background-color: #e69d00;
    width: 100%;
    padding: 10px 10px;
    margin: 4px 2px;
    border: 1px solid #000;
    color: #fff;
    cursor: pointer;
    text-align: center;
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

.album,
.imgContainer {
    display: list-item;
    align-items: center;
    justify-content: center;
    justify-items: center;
    max-width: 100%;
    max-height: 100%;
    overflow: hidden;
}

/*=======================================================*/
</style>


<?php

include('connect.php');
if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    $image = $_FILES["filUpload"]["name"];
    $images = $_POST['images'];
    $oldimage = "images" . "/" . "uploadPic" . $images;

    // Generate a unique filename for the new image
    $imgnewfile = uniqid() . "_" . $image;

    // get the image extension
} else {
    // Code for move image into directory
    move_uploaded_file($_FILES["filUpload"]["tmp_name"], "images/uploadPic/" . $imgnewfile);
    // Query for data insertion
    $upQuery = "UPDATE tb_helpdesk SET images = ? WHERE id = ?";
    $stmt = mysqli_prepare($connect, $upQuery);

    mysqli_stmt_bind_param($stmt, "si", $imgnewfile, $id);

    if (mysqli_stmt_execute($stmt)) {
        // old pic deletion
        unlink($oldimage);
        echo "<script>
            $(function() {

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'เเก้ไขรูปภาพเรียบร้อยเเล้ว!!!',
                    showConfirmButton: false,
                    timer: 2000,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                }).then(function() {
                    
                })
            });
            </script>";
            //window.location = 'edit_hd1.php';
    } else {
        echo "<script>
    $(function() {

        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'ไม่สามารถเเก้ไขข้อมูลได้สำเร็จ!!!',
            showConfirmButton: false,
            timer: 2000,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft()
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
        }).then(function() {
            
        })
    });
    </script>";
    }
}

?>


<div class="background">
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w960">
            <div class="card card-4">
                <div class="card-body">
                    <!--card body-->
                    <!-----------nav zone----------->
                    <nav class="navbar navbar-expand-md navbar-dark "
                        style="border-radius: 10px; border: 1px solid #004EC1; background-color: #555555;">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="index.php">
                                <h2 style=" padding: 3%; font-size: 25px; width: 80%; font-weight: 600; display: flex;">
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
                    <form method="post" enctype="multipart/form-data">
                        <?php 
                        
                        $id = $_GET['id'];
                        $result = mysqli_query($connect, "SELECT * FROM tb_helpdesk WHERE id = '$id' ");
                        while ($row = mysqli_fetch_array($result)) { 
                            
                        ?>
                        <div
                            style="margin-top: 10px; padding: 3%; width: 100%; height: auto; border: 1px solid #004EC1; border-radius: 10px;">
                            <li
                                style="font-size: 20px; font-weight: 600; text-align: center; color: #FFA200; margin-top: 2%;">
                                <i class="em em-wrench" aria-role="presentation" aria-label="WRENCH"
                                    style="margin-right: 15px;"></i>
                                เเก้ไขรูปภาพ<i class="em em-wrench" aria-role="presentation" aria-label="WRENCH"
                                    style="margin-left: 15px;"></i>
                            </li><br>
                            <li
                                style="font-size: 20px; font-weight: 600; text-align: left; color: #FFA200; margin-top: 2%;">
                                <i class="em em-heavy_minus_sign" aria-role="presentation" aria-label="HEAVY MINUS SIGN"
                                    style="margin-right: 10px;"></i>
                                ลำดับที่ :<span
                                    style="font-size: 18px; padding: 10px; color: #FF5F41;"><?php echo $row['id']  ?></span>
                            </li><br>
                            <input type="hidden" name="oldimage" value="<?php echo $row['images']; ?>" />
                            <div class="album">
                                <div class="imgContainer">
                                    <input type="file" class="form-control" name="filUpload[]" id="images"
                                        multiple="true" onchange="loadFile(event)">
                                    <input type="submit" name="submit" value="เเก้ไขรูปภาพ"
                                        onclick="//document.location='image.php'" data-loading-text="Loading..." />

                                    <div id="image_preview" style="width:100%; height: 100%; margin-top: 2%;">
                                        <?php
                                                    if(isset($_GET['id'])) { 
                                                        $sql = $connect->query("SELECT images FROM tb_helpdesk WHERE id = '".$_GET['id']."'"); 
                                                        $result = mysqli_fetch_array($sql);
                                                        $images = $result['images'];
                                                        $remove_last_comma = substr($images,0);
                                                        $temp = explode(',',$remove_last_comma);
                                                        for ($i = 0;$i<count($temp);$i++) { 
                                                            echo '<center><input type="checkbox"><img src="images/uploadPic/' .trim($temp[$i]).'" data-action="zoom" height="auto"
                                                            width="100%" ></center>';
                                                            echo "<br />";
                                                            
                                                            } ?> <?php } else{ ?>

                                        <p style="color: #BABABA; margin-top: 1%;">[ ไม่พบไฟล์รูปภาพ ]</p>
                                        <?php  
                                        } 
                                        }

                                                ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid" style="margin-top: 1%; display: flex;">
                            <!--
                            <input class="btn btn--radius-2 btn--orange" type="button" name="" id="butcancel"
                                value="กลับสู่หน้าหลัก" onclick="document.location='index.php'">-->
                            <input class="btn_back" type="button" name="" value="กลับสู่หน้าหลัก"
                                onclick="document.location='index.php'" data-loading-text="Loading..." />

                        </div>




                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</html>
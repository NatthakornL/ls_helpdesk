<html lang="en">
<style>
.body {
    background: rgb(204, 204, 204);
    margin: auto;
}

page {
    background: white;
    display: block;
    margin: 0 auto;
    margin-bottom: 0.5ch;
    /*box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);*/
}

page[size="Qpage"] {
    width: 6cm;
    height: 3cm;
}

@media print {

    body,
    page {
        margin: 0;
        box-shadow: 0;
    }
}

.top {
    background-color: white;
    width: auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin: auto;
}
</style>

<?php 
date_default_timezone_set("Asia/Bangkok");
?>

<title>ระบบคิว (Queue)</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://emoji-css.afeld.me/emoji.css" rel="stylesheet">
<link rel="icon" type="image/x-icon" href="./images/people_queue_regular_icon_203405.ico">

<body class="body">
    <page size="Qpage" onclick="window.print()" style="cursor: pointer;" id="add">
        <div style="text-align: left; display: flex;">
            <img src="./images/logo1.png" style="height: 4ch; width: 4ch;">
            <h4 style="font-size: 16; font-weight: bold; padding-right: 1ch; padding-left: 0.7ch;">
                ห้องตรวจออโธปิดิกส์ <p style="font-size: 13; font-weight: 300; text-align: center;">
                    คิวห้องตรวจกระดูก
                </p>
            </h4>
        </div>
        <h5 style="font-size: 14; font-weight: 400; text-align: left;">
            คิวของคุณคือ
            <span style="text-align: center; font-size: 30; font-weight: bold; padding-left: 1.8ch; padding-right: 2ch;"
                id="val">1
            </span>
        </h5>
        <h3 id="todaysDate"
            style="font-size: 10; font-weight: 300; text-align: left; padding-left: 0.5ch; text-align: center;"></h3>


        <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('add').addEventListener('click', function() {
                document.getElementById('val').innerHTML++;
            });
        });

        function doDate() {
            var str = "";

            var days = new Array("อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัสบดี", "ศุกร์", "เสาร์");
            var months = new Array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม",
                "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");

            var now = new Date();

            str += "วัน " + days[now.getDay()] + " ที่ " + now.getDate() + " " + months[now.getMonth()] + " " + now
                .getFullYear() + " | " + now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds() + " น.";
            document.getElementById("todaysDate").innerHTML = str;
        }

        setInterval(doDate, 1000);
        </script>

    </page>
</body>

</html>

<!--
<?php /*
session_start();
if (!isset($_POST['add'])) {
    $_SESSION['attnum'] = 0;
}*/
?>
-->
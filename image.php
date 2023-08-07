<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiple Images in Single Row</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
    </script>
</head>

<body>
    <form action="" method="post" id="form">
        <h3>สามารถเลือกรูปภาพได้มากกว่า 1 รูปภาพต่อการอัพโหลด 1 ครั้ง</h3>
        <input type="file" name="files[]" id="" multiple>
        <input type="submit" value="submit">
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
</body>

</html>
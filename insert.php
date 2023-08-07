<html>

<body>
    <?php

	include 'connect.php';
	
	
	$sql = "INSERT INTO tb_helpdesk( 'hd_depart','hd_prob', 'hd_fixs') 
	VALUES ('$hd_depart','$hd_prob','$hd_fixs')";
	if (mysqli_query($connect, $sql)) {
		echo json_encode(array("statusCode"=>200));
        echo "Insert data Complete!!";
	} 
	else {
		echo json_encode(array("statusCode"=>201));
        echo "ERROR : Insert data Failed!!";
	}
	mysqli_close($connect);
	
?>
</body>

</html>
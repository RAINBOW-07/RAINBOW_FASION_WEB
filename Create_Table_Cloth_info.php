<?php
$mysqli = mysqli_connect("localhost","team07","team07","team07");
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} else {
	$sql = "create table Cloth_info (idx INT NOT NULL PRIMARY KEY AUTO_INCREMENT, large_category VARCHAR(20), small_category VARCHAR(20), name VARCHAR(100), price INT, purchase_num VARCHAR(20), site VARCHAR(20), image VARCHAR(100), link VARCHAR(100))";
	$res = mysqli_query($mysqli,$sql);
	if ($res === TRUE) {
		echo "Table testTable successfully created.";
	} else {
	printf("Could not create table: %s\n", mysqli_error($mysqli));
	}
mysqli_close($mysqli);
}
?>
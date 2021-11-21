<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
$mysqli = mysqli_connect("localhost","team07","team07","team07");
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} else {
	$sql = "create table site (site_name VARCHAR(20) PRIMARY KEY, site_link VARCHAR(100), site_image VARCHAR(100), site_introduce VARCHAR(100))";
	$res = mysqli_query($mysqli,$sql);
	if ($res === TRUE) {
		echo "site category successfully created.";
	} else {
	printf("Could not site table: %s\n", mysqli_error($mysqli));
	}
mysqli_close($mysqli);
}
?>
</body>
</html>
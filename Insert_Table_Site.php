<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
<?php
$mysqli = mysqli_connect("127.0.0.1","team07","team07","team07");
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} else {
	$sql = "INSERT INTO site(site_name, site_link, site_image, site_introduce) VALUES ('HOTPING', 'https://hotping.co.kr/', 'img/HOTPING.png', '핫핑은 자체 제작 및 생산을 통한 가격/품질 경쟁력으로 빅사이즈 여성의류 1위의 자리를 고수하고 있는 쇼핑몰입니다.')";
	$res = mysqli_query($mysqli,$sql);

	if ($res === TRUE) {
		echo "site HOTPING information successfully insert.";
	} else {
	printf("Could not import data: %s\n", mysqli_error($mysqli));
	}
	
mysqli_close($mysqli);
}
?>

<?php
$mysqli = mysqli_connect("127.0.0.1","team07","team07","team07");
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} else {
	$sql = "INSERT INTO site(site_name, site_link, site_image, site_introduce) VALUES ('Attrangs', 'https://attrangs.co.kr/', 'img/ATTRANGS.png', '아뜨랑스는 20대 30대 고객들을 대상으로 트렌디함과 과하지 않은 로맨틱함을 더하여 언제 어디서든 응용하기 좋은 패션아이템, 악세사리를 제공하는 쇼핑몰입니다.')";
	$res = mysqli_query($mysqli,$sql);
	if ($res === TRUE) {
		echo "site Attrangs information successfully insert.";
	} else {
	printf("Could not import data: %s\n", mysqli_error($mysqli));
	}
mysqli_close($mysqli);
}
?>
</body>
</html>
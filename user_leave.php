<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header('Location: ./login.html');
    }
?>

<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body>
<?php
    $userid = $_SESSION['user_id'];
    $mysqli = mysqli_connect("127.0.0.1","team07","team07","team07");
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    } else {
        mysqli_autocommit($mysqli, FALSE);
        $sql = "delete from search_record where id='$userid'"; //id를 참조하고 있는 key 삭제
        $res = mysqli_query($mysqli, $sql);
        $sql = "delete from user_info where id='$userid'";
        $res = mysqli_query($mysqli, $sql);
        mysqli_commit($mysqli);
        mysqli_close($mysqli);
    }
?>
<?php
    header('Location: ./logout.php');
?>

</body>
</html>
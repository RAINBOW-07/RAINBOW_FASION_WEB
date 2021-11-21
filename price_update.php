<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header('Location: ./login.html');
    }
?>

<?php
    $goods_name=$_POST['goods_name'];
    $true_price = $_POST['true_price'];

    $mysqli = mysqli_connect("127.0.0.1","team07","team07","team07");
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    } else {
        $sql = "UPDATE cloth_info SET price='$true_price' WHERE name LIKE '%$goods_name%'"; // 데이터 삽입에 공백 등의 문제가 있을 수 있으므로
        $res = mysqli_query($mysqli, $sql);
        mysqli_close($mysqli);
    }
?>

<script>alert("Thank you for your help!");</script>
<meta http-equiv="refresh" content="0 url=/direct_search_user.php">
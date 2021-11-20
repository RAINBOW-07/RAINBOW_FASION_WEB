<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header('Location: ./login.html');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="css/search_result.css">

    <title>RAINBOW</title>
</head>
<!-- 반응형 사이드바 -->
<body id="body-pd">
    <div class="l-navbar" id="navbar">
        <nav class="nav">
            <div>
                <div class="nav__brand">
                    <ion-icon name="menu-outline" class="nav__toggle" id="nav-toggle"></ion-icon>
                    <a href="home_user.php" class="nav__logo">RAINBOW</a>
                </div>

                <div class="nav__list">
                    <a href="home_user.php" class="nav__link">
                        <ion-icon name="home-outline" class="nav__icon"></ion-icon>
                        <span class="nav_name">HOME</span>
                    </a>

                    <a href="week_hot_user.php" class="nav__link">
                        <ion-icon name="flame-outline" class="nav__icon"></ion-icon>
                        <span class="nav_name">이 주의 HOT Fashion!</span>
                    </a>

                    <a href="direct_search_user.php" class="nav__link">
                        <ion-icon name="search-outline" class="nav__icon"></ion-icon>
                        <span class="nav_name">검색</span>
                    </a>

                    <a href="User_custom.php" class="nav__link active">
                        <ion-icon name="thumbs-up-outline" class="nav__icon"></ion-icon>
                        <span class="nav_name">맞춤 추천</span>
                    </a>

                    <a href="user_info.php" class="nav__link">
                        <ion-icon name="person-outline" class="nav__icon"></ion-icon>
                        <span class="nav_name">내 정보</span>
                    </a>

                </div>
                <a href="logout.php" class="nav__link">
                    <ion-icon name="log-out-outline" class="nav__icon"></ion-icon>
                    <span class="nav_name">Log out</span>
                </a>
            </div>
        </nav>
    </div>

    <!-- 로그인 줄 -->
    <div style="font-size:15px;float:right;">

            <?php echo $_SESSION['user_id'];?>님
        </div>
    <p style="clear:both;">&nbsp;</p>

    <div>
        <center><h1><?php echo $_SESSION['user_id'];?>님을 위한 오늘의 추천♥</center>
    </div>

    <br><br>

    <div>
        <?php
            $mysqli = mysqli_connect("127.0.0.1","team07","team07","team07");
            if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
            } else {
                $userid = $_SESSION['user_id'];
                $sql = "SELECT DISTINCT id, large_category, small_category, COUNT(small_category) OVER (PARTITION BY small_category) AS user_rank FROM (SELECT * FROM search_record HAVING id = '$userid') a ORDER BY user_rank";
                $res = mysqli_query($mysqli, $sql);

                $rank = 1;
                $row = mysqli_fetch_array($res);

                if(!$row){
                    echo "<center>아직 " . $_SESSION['user_id'] . "님을 잘 알지 못해요.</center>";
                    $_SESSION['check'] = 0;
                }

                while($row = mysqli_fetch_array($res))
                {
                    if($rank==1 && $row['id']==$_SESSION['user_id']){
                        $_SESSION['User_best_L'] = $row['large_category'];
                        $_SESSION['User_best_S'] = $row['small_category'];
                        $_SESSION['check'] = 1;
                    }
                }
                mysqli_close($mysqli);
            }
        ?>
    </div>

    <div>
        <?php
            $mysqli = mysqli_connect("127.0.0.1","team07","team07","team07");
            if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        } else {
            $sql = "SELECT * FROM Cloth_info";
                $res = mysqli_query($mysqli, $sql);
                if($_SESSION['check']==0){
                    echo "<center>다음에 다시 만나요.</center>";
                }
                else{
                    $row_num = 0;
                    while($row = mysqli_fetch_array($res))
                    {
                        if($_SESSION['User_best_L'] == $row['large_category']){
                            if($row_num % 4 ==0){
                                echo "<div class=\"one_row\">";
                            }
                            echo "<div class=\"one_goods\">";

                            echo "<h3>". $row['name'] . "</h3>";
                            echo "<div>" . $row['large_category'] . "</div>";
                            echo "<div>" . $row['small_category'] . "</div>";
                            echo "<a href=\"" .$row['link'] . "\">";
                            echo "<img src=\"" . $row['image'] . "\"/>";
                            echo "</a>";
                            echo "<div>" . $row['price'] . "원</div>";
                            echo "<div>" . $row['purchase_num'] . "명이 구매했습니다.</div>";
                            echo" </div>";

                            if($row_num % 4 ==3){
                                echo "</div>";
                            }
                            $row_num++;
                        } 
                    }
                }
            }
            mysqli_close($mysqli);
        ?>
    </div>

    <!-- IONICONS -->
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <!-- JS -->
    <script src="js/main.js"></script>
</body>
</html>
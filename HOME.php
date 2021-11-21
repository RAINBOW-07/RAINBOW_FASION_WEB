<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="css/home.css">
    <script>document.cookie="large_category=Set";</script>
    <title>RAINBOW</title>
</head>
<body id="body-pd">
    <div class="l-navbar" id="navbar">
        <nav class="nav">
            <div>
                <div class="nav__brand">
                    <ion-icon name="menu-outline" class="nav__toggle" id="nav-toggle"></ion-icon>
                    <a href="home.php" class="nav__logo">RAINBOW</a>
                </div>

                <div class="nav__list">
                    <a href="home.php" class="nav__link active">
                        <ion-icon name="home-outline" class="nav__icon"></ion-icon>
                        <span class="nav_name">HOME</span>
                    </a>

                    <a href="week_hot.php" class="nav__link">
                        <ion-icon name="flame-outline" class="nav__icon"></ion-icon>
                        <span class="nav_name">이 주의 HOT Fashion!</span>
                    </a>

                    <a href="direct_search.php" class="nav__link">
                        <ion-icon name="search-outline" class="nav__icon"></ion-icon>
                        <span class="nav_name">검색</span>
                    </a>

                    <a href="User_custom.php" class="nav__link">
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

    <!-- 로그인/회원가입 줄 -->
    <div style="font-size:20px; float:right; margin-right: 30px;">
        <form style="flex-direction: row; align-items: center;" method="post" action="login.php">
            <input style="background-color: #E5DDC4; font-weight: bold; padding: 6px 10px; border: 1px solid black; border-radius: 10px;" type="button" value="로그인" onclick="location.href = 'login.html'">
            <input style="background-color: #E5DDC4; font-weight: bold; padding: 6px 10px; border: 1px solid black; border-radius: 10px;" type="button" value="회원가입" style="font-size:11.4px;" onclick="location.href = 'member_join.html'">
        </form>
    </div>
    <p style="clear:both;">&nbsp;</p>


    <h1>RAINBOW</h1> <!--사이트 이름-->
    <!--사이트 소개-->
    <div class="site_introduce">
        RAINBOW는 패션 정보를 다루는 사이트입니다. </br> RAINBOW에서는 금주에 사람들이 가장 많이 검색한 의류 정보를 볼 수 있고, 직접 의류 정보를 검색해 볼 수 있습니다. 또한, 사용자의 검색 기록에 따라 맞춤 추천 정보를 제공합니다. </br>
        <p>원하는 옷이 있으신가요? RAINBOW를 통해 패션 정보를 찾아보세요!</p>
    </div>
    <!--현재 비교하는 사이트 설명-->
    <h2>다음의 두 사이트 분석 정보를 제공합니다.</h2>
    <div class="site_sort">
            <?php            
                $mysqli = mysqli_connect("127.0.0.1","team07","team07","team07");
                if (mysqli_connect_errno()) {
                    printf("Connect failed: %s\n", mysqli_connect_error());
                    exit();
                } else {
                    $sql = "select * from site";
                    $res = mysqli_query($mysqli, $sql);

                    while($row = mysqli_fetch_array($res))
                    {
                        echo "<div class=\"". $row['site_name']. "\">";
                        echo "<h1>".$row['site_name']."</h1>";
                        echo "<a href=\"".$row['site_link']."\"/><img src=\"".$row['site_image']."\"/></a>";
                        echo "<div>".$row['site_introduce']."</div>";
                        echo "</div>";
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
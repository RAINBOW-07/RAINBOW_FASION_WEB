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
    <link rel="stylesheet" href="css/direct_search.css">

    <title>RAINBOW</title>
</head>
<body id="body-pd">
    <div class="l-navbar" id="navbar">
        <nav class="nav">
            <div>
                <div class="nav__brand">
                    <ion-icon name="menu-outline" class="nav__toggle" id="nav-toggle"></ion-icon>
                    <a href="HOME_user.php" class="nav__logo">RAINBOW</a>
                </div>

                <div class="nav__list">
                    <a href="HOME_user.php" class="nav__link">
                        <ion-icon name="home-outline" class="nav__icon"></ion-icon>
                        <span class="nav_name">HOME</span>
                    </a>

                    <a href="week_hot_user.php" class="nav__link">
                        <ion-icon name="flame-outline" class="nav__icon"></ion-icon>
                        <span class="nav_name">이 주의 HOT Fashion!</span>
                    </a>

                    <a href="direct_search_user.php" class="nav__link active">
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

    <!-- 로그인 줄 -->
    <div style="font-size:20px; float:right; margin-right: 30px;">
        <?php echo $_SESSION['user_id'];?>님
    </div>
    <p style="clear:both;">&nbsp;</p>

    <h1>패션 상품 정보 검색</h1>
    <div>
    <?php
            $mysqli = mysqli_connect("127.0.0.1","team07","team07","team07");
            if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
            } else {
            $sql = "SELECT large_category, count(large_category) FROM cloth_info GROUP BY large_category";
            $res = mysqli_query($mysqli, $sql);
            while($row = mysqli_fetch_array($res))
            {
                echo "".$row['large_category'] .": " .$row['count(large_category)']. "개  | ";
            }
        }
    ?>
    </div>
    <div class="search">
        <form style="font-weight: 600;" method="post" action="search_result_user.php">
            대분류: 
            <?php
                echo "<select style=\"border-radius: 10px; padding: 2px 15px;\" name=\"cloth_large\" onchange=\"setCookie(this.value);\">";

                $sql = "SELECT DISTINCT large_category FROM category ORDER BY large_category";
                $res = mysqli_query($mysqli, $sql);

                while($row = mysqli_fetch_array($res))
                {
                    if($row['large_category']==$_COOKIE['large_category']){
                        echo "<option selected value=" .$row['large_category']. ">" . $row['large_category'] . "</option>";                             
                    }else{
                        echo "<option value=" .$row['large_category']. ">" . $row['large_category'] . "</option>";                             
                    }
                }
                echo "</select>";
            ?>
            <script>
                function setCookie(value){
                    document.cookie=`large_category=${value}`;
                    window.location.assign('direct_search_user.php');
                }
            </script>
            소분류:
            <?php
                echo "<select style=\"border-radius: 10px; padding: 2px 15px;\" name=\"cloth_small\">";
                
                $compare = $_COOKIE["large_category"];
    
                $sql = "SELECT DISTINCT small_category FROM category WHERE large_category=\"". $compare. "\"";
                echo $sql;
                $res = mysqli_query($mysqli, $sql);

                while($row = mysqli_fetch_array($res))
                {
                    echo "<option value=" .$row['small_category']. ">" . $row['small_category'] . "</option>";                             
                }
                mysqli_close($mysqli);

                echo "</select>"
            ?>
            이름: <input style="border-radius: 10px; padding: 2px 15px;" type="text" name="cloth_name"/>
            <button type="submit" style="border-radius: 10px; background-color: #E5DDC4; padding: 2px 15px;">검색</button>
      </form>
    </div>
    <!-- IONICONS -->
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <!-- JS -->
    <script src="js/main.js"></script>
</body>
</html>
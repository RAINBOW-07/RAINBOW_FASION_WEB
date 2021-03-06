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

    <div style="font-size:20px; float:right; margin-right: 30px;">
        <?php echo $_SESSION['user_id'];?>님
    </div>
    <p style="clear:both;">&nbsp;</p>
    
    <h1 style="padding-bottom: 10px;">검색 결과</h1>

    <div class="ranking_top3"> 
        <div class="ranking_oneBox">
        <?php
            $mysqli = mysqli_connect("127.0.0.1","team07","team07","team07");
            if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
            } else {
                echo "<h2>가격 낮은순 TOP3</h2>";
                $sql = "SELECT name, price, Rank() over (order by price) ranking FROM cloth_info WHERE large_category =\"". $_POST['cloth_large'] ."\" AND small_category = \"". $_POST['cloth_small'] ."\" AND name LIKE \"%". $_POST['cloth_name']."%\" LIMIT 3";
                $res = mysqli_query($mysqli, $sql);
                while($row = mysqli_fetch_array($res)){
                    echo "<div>" .$row['name']. "</div>";
                }
            }
            ?>
        </div>
        <div class="ranking_oneBox">
            <?php
                echo "<h2>구매수 높은순 TOP3</h2>";
                $sql = "SELECT name, purchase_num, Rank() over (order by purchase_num DESC) ranking FROM cloth_info WHERE large_category =\"". $_POST['cloth_large'] ."\" AND small_category = \"". $_POST['cloth_small'] ."\" AND name LIKE \"%". $_POST['cloth_name']."%\" LIMIT 3";
                $res = mysqli_query($mysqli, $sql);
                while($row = mysqli_fetch_array($res)){
                    echo "<div>" .$row['name']. "</div>";
                }
            ?>
        </div>
    </div>
    <?php
        $sql = "SELECT TRUNCATE(AVG(PRICE),0) FROM cloth_info WHERE large_category =\"". $_POST['cloth_large'] ."\" AND small_category = \"". $_POST['cloth_small'] ."\" AND name LIKE \"%". $_POST['cloth_name']."%\"";
        $res = mysqli_query($mysqli, $sql);
        
        if(mysqli_num_rows($res)!=0){
            $row = mysqli_fetch_row($res)[0];
            echo "</br><div style=\"padding-left: 20px; padding-top: 40px;\">찾으시는 상품의 평균 가격은 <b>" .$row. "</b>원 입니다.</div>";    
        }
    ?>
    <?php
        $sql = "SELECT * FROM cloth_info WHERE large_category =\"". $_POST['cloth_large'] ."\" AND small_category = \"". $_POST['cloth_small'] ."\" AND name LIKE \"%". $_POST['cloth_name']."%\"";
        $res = mysqli_query($mysqli, $sql);
        $num_rows = mysqli_num_rows($res);
        if($num_rows==0){
            echo "<p>찾으시는 상품이 없습니다.</p>";
        }else{
            $row_num = 0;
            echo "<div style=\"padding-left: 20px; padding-bottom: 40px; border-bottom: 1px solid rgba(1, 1, 1, 0.2);\"> 총 <b>" .$num_rows . "</b>건의 상품이 검색되었습니다.</div>";
            
            while($row = mysqli_fetch_array($res))
            {
                if($row_num % 4 ==0){
                    echo "<div class=\"one_row\">";
                }
                echo "<div class=\"one_goods\">";

                echo "<h3>". $row['name'] . "</h3>";
                echo "<div>" . $row['large_category'] . " > " . $row['small_category'] . "</div>";
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
            $row_num = 0;
        }
    ?>
    <?php
        //search_record table에 user id, 검색어 넣기  
        $sql = "INSERT INTO search_record(id, large_category, small_category) VALUES ('". $_SESSION['user_id']. "', '". $_POST['cloth_large']. "', '". $_POST['cloth_small'] . "')";
        $res = mysqli_query($mysqli, $sql);
        
        mysqli_close($mysqli);
    ?>

    <!--update사용, login시에만 정보 수정-->
    </br>
    <div><ion-icon name="help-circle"></ion-icon>가격 정보가 잘못되었나요?</footer></br>
    더 좋은 정보를 제공할 수 있게 도움을 주세요!
    <form action="price_update.php" method="post">
        <input style="padding: 2px 15px;" type="text" name = "goods_name" placeholder="상품명을 정확히 입력해주세요."/>
        <input style="padding: 2px 15px;" type="text" name = "true_price" placeholder="올바른 가격을 입력해주세요."/>
        <button type="submit">제출</button>
    </form></div>
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>

    <!--</div> IONICONS -->
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <!-- JS -->
    <script src="main.js"></script>
</body>
</html>
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
                    <a href="home.php" class="nav__logo">RAINBOW</a>
                </div>

                <div class="nav__list">
                    <a href="home.php" class="nav__link">
                        <ion-icon name="home-outline" class="nav__icon"></ion-icon>
                        <span class="nav_name">HOME</span>
                    </a>

                    <a href="week_hot.php" class="nav__link">
                        <ion-icon name="flame-outline" class="nav__icon"></ion-icon>
                        <span class="nav_name">이 주의 HOT Fashion!</span>
                    </a>

                    <a href="direct_search.php" class="nav__link active">
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
    <h1 style="padding: 30px 0px;">검색 결과</h1>
   <!-- <div class="one_row">-->
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
    <!--</div> IONICONS -->
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <!-- JS -->
    <script src="main.js"></script>
</body>
</html>
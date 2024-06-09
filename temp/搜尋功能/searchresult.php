<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>搜尋功能</title>
    <link rel="stylesheet" href="../美食展示物件/Food Show Obj.css">
</head>
<body>
    <?php
        $link = @mysqli_connect(
            'localhost',  // MySQL主機名稱 
            'root',       // 使用者名稱 
            '',  // 密碼
            'show-food-func'
        );

        // 檢查連接
        if (!$link) {
            die("無法開啟資料庫!<br/>");
        }

        // 檢查是否有搜尋關鍵字
        if (isset($_GET['keyword'])) {
            $keyword = mysqli_real_escape_string($link, $_GET['keyword']);
            $store = mysqli_real_escape_string($link, $_GET['store']);

            // 基本的 SQL 查詢語句
            $sql = "SELECT imageSrc, logoSrc, foodName, store, satietyScore, preferScore, priceScore, price FROM showfood WHERE foodName LIKE '%$keyword%'";

            // 如果有選擇店家種類，則加入篩選條件
            if (!empty($store)) {
                $sql .= " AND store = '$store'";
            }

            $result = mysqli_query($link, $sql);

            $food_list = [];
            if (mysqli_num_rows($result) > 0) {
                echo "<h2>您的搜尋結果:</h2>"."<h2>$keyword</h2>";
                while ($row = mysqli_fetch_assoc($result)) {
                    $food_item = [$row['imageSrc'], $row['logoSrc'], $row['foodName'], $row['satietyScore'], $row['preferScore'], $row['priceScore'], $row['price']];
                    $food_list[] = $food_item;
                }
            } else {
                echo "未搜尋到相關結果.";
            }
        }
        echo "<br/>"."<a href = 'search.php'>返回至搜尋頁面</a>";
        mysqli_close($link);
    ?>

    <?php
        function createFoodItem($imageSrc, $logoSrc, $foodName, $satietyScore, $preferScore, $priceScore, $price) {
            return "
            <div class='container'>
                <div class='food-container'>
                    <img class='food-image' src='{$imageSrc}' alt='Food image'>
                </div>
                <div class='header'>
                    <div class='logo-container'>
                        <img class='food-logo' src='{$logoSrc}' alt='Food Logo'>
                    </div>
                    <div class='food-name'>{$foodName}</div>
                </div>
                <div class='review-container'>
                    <div class='review-item'>
                        <img class='review-icon' src='./FSO_image/SatietyrReview.svg' alt='Satiety Review Icon'>
                        <div class='review-line'></div>
                        <div class='review-score'>{$satietyScore}</div>
                    </div>
                    <div class='review-item'>
                        <img class='review-icon' src='./FSO_image/PreferReview.svg' alt='Preference Review Icon'>
                        <div class='review-line'></div>
                        <div class='review-score'>{$preferScore}</div>
                    </div>
                    <div class='review-item'>
                        <img class='review-icon' src='./FSO_image/PriceRevier.svg' alt='Price Review Icon'>
                        <div class='review-line'></div>
                        <div class='review-score'>{$priceScore}</div>
                    </div>
                </div>
                <div class='price-button-container'>
                    <div class='price'>\${$price}</div>
                    <div class='button-container'>
                        <div class='button'></div>
                        <div class='button-text'>查看美食</div>
                    </div>
                </div>
            </div>
            ";
        }

        foreach ($food_list as $food) {
            echo createFoodItem(...$food);
        }
    ?>
</body>
</html>

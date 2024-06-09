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
            'localhost',  
            'root',       
            'kaivei30098',  
            'phpfinalproject'
        );

        
        if (!$link) {
            die("無法開啟資料庫!<br/>");
        }

        if (isset($_GET['keyword'])) {
            $keyword = mysqli_real_escape_string($link, $_GET['keyword']);
            $store = isset($_GET['store']) ? mysqli_real_escape_string($link, $_GET['store']) : '';
            $category = isset($_GET['category']) ? mysqli_real_escape_string($link, $_GET['category']) : '';

            $sql = "SELECT food.foodImage, food.foodName, AVG(review.satietyReview) AS satietyAvg, AVG(review.preferReview) AS preferAvg, AVG(review.priceReview) AS priceAvg, food.foodPrice 
                    FROM food 
                    LEFT JOIN review ON food.foodName = review.foodName 
                    WHERE food.foodName LIKE '%$keyword%'";

            // 如果有選擇店家種類，則加入篩選條件
            if (!empty($store)) {
                $sql .= " AND food.store = '$store'";
            }

            // 如果有選擇食品分類，則加入篩選條件
            if (!empty($category)) {
                $sql .= " AND food.categoty = '$category'";
            }

            $sql .= " GROUP BY food.foodName";

            $result = mysqli_query($link, $sql);

            $food_list = [];
            if (mysqli_num_rows($result) > 0) {
                echo "<h2>您的搜尋結果:</h2>"."<h2>$keyword</h2>";
                while ($row = mysqli_fetch_assoc($result)) {
                    $food_item = [$row['foodImage'], $row['foodName'], $row['satietyAvg'], $row['preferAvg'], $row['priceAvg'], $row['foodPrice']];
                    $food_list[] = $food_item;
                }
            } else {
                echo "未搜尋到相關結果.";
            }
        }
        echo "<br/>"."<a href='search.php'>返回至搜尋頁面</a>";
        mysqli_close($link);
    ?>

    <?php
        function createFoodItem($foodImage, $foodName, $satietyAvg, $preferAvg, $priceAvg, $foodPrice) {
            return "
            <div class='container'>
                <div class='food-container'>
                    <img class='food-image' src='{$foodImage}' alt='Food image'>
                </div>
                <div class='header'>
                    <div class='food-name'>{$foodName}</div>
                </div>
                <div class='review-container'>
                    <div class='review-item'>
                        <img class='review-icon' src='./FSO_image/SatietyrReview.svg' alt='Satiety Review Icon'>
                        <div class='review-line'></div>
                        <div class='review-score'>{$satietyAvg}</div>
                    </div>
                    <div class='review-item'>
                        <img class='review-icon' src='./FSO_image/PreferReview.svg' alt='Preference Review Icon'>
                        <div class='review-line'></div>
                        <div class='review-score'>{$preferAvg}</div>
                    </div>
                    <div class='review-item'>
                        <img class='review-icon' src='./FSO_image/PriceRevier.svg' alt='Price Review Icon'>
                        <div class='review-line'></div>
                        <div class='review-score'>{$priceAvg}</div>
                    </div>
                </div>
                <div class='price-button-container'>
                    <div class='price'>\${$foodPrice}</div>
                    <div class='button-container'>
                        <div class='button'></div>
                        <div class='button-text'>查看美食</div>
                    </div>
                </div>
            </div>
            ";
        }

        if (!empty($food_list)) {
            foreach ($food_list as $food) {
                echo createFoodItem(...$food);
            }
        }
    ?>
</body>
</html>

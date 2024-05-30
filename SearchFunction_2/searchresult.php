<?php
$link = @mysqli_connect(
    'localhost',  // MySQL主機名稱 
    'root',       // 使用者名稱 
    'kaivei30098',  // 密碼
    'PHPFinalProject'
);

// 檢查是否有搜尋關鍵字
if (isset($_GET['keyword'])) {
    $keyword = mysqli_real_escape_string($link, $_GET['keyword']);

    // 處理店家種類篩選條件
    $stores = isset($_GET['store']) ? $_GET['store'] : [];

    // 處理食物種類篩選條件
    $categories = isset($_GET['category']) ? $_GET['category'] : [];

    // 基本的 SQL 查詢語句
    $sql = "SELECT foodImage, storeLogo, foodName, store, categoty, nutritionLabel, ingredientList, foodPrice 
            FROM food 
            WHERE foodName LIKE '%$keyword%'";

    // 如果有選擇店家種類，則加入篩選條件
    if (!empty($stores)) {
        $storeConditions = array_map(function ($store) use ($link) {
            return "'" . mysqli_real_escape_string($link, $store) . "'";
        }, $stores);
        $storeConditionsStr = implode(",", $storeConditions);
        $sql .= " AND store IN ($storeConditionsStr)";
    }

    // 如果有選擇食物種類，則加入篩選條件
    if (!empty($categories)) {
        $categoryConditions = array_map(function ($category) use ($link) {
            return "'" . mysqli_real_escape_string($link, $category) . "'";
        }, $categories);
        $categoryConditionsStr = implode(",", $categoryConditions);
        $sql .= " AND categoty IN ($categoryConditionsStr)";
    }

    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<h2>您的搜尋結果:$keyword</h2>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div>";
            echo "<img src='{$row['foodImage']}' alt='Product Image' style='width:100px;height:100px;'><br>";
            echo "店家：<img src='{$row['storeLogo']}' alt='Store Logo' style='width:50px;height:50px;'><br>";
            echo "美食名稱: " . $row['foodName'] . "<br>";
            echo "價格: " . $row['foodPrice'] . "<br>";
            echo "店家: " . $row['store'] . "<br>";
            echo "種類: " . $row['categoty'] . "<br>";
            echo "營養標籤: " . $row['nutritionLabel'] . "<br>";
            echo "成分表: " . $row['ingredientList'] . "<br>";
            echo "</div><br>";
        }
    } else {
        echo "未搜尋到相關結果<br>";
    }
    echo "<a href = search.php>返回搜尋首頁</a>";
}

mysqli_close($link);

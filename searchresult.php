<?php
$link = @mysqli_connect(
    'localhost',  // MySQL主機名稱 
    'root',       // 使用者名稱 
    'kaivei30098',  // 密碼
    'web1'
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

    if (mysqli_num_rows($result) > 0) {
        echo "<h2>您的搜尋結果:</h2>"."<h2>$keyword</h2>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div>";
            echo "<img src='{$row['imageSrc']}' alt='Product Image' style='width:100px;height:100px;'><br><br>";
            echo "店家:"."<img src='{$row['logoSrc']}' alt='Logo Image' style='width:50px;height:50px;'><br><br>";
            echo "產品名稱: " . $row['foodName'] . "<br>";
            echo "飽足感: " . $row['satietyScore'] . "<br>";
            echo "偏好度: " . $row['preferScore'] . "<br>";
            echo "CP值: " . $row['priceScore'] . "<br>";
            echo "價格: " . $row['price'] . "<br>";
            echo "</div><br>";
        }
    } else {
        echo "未搜尋到相關結果.";
    }
}
echo "<br/>"."<a href = 'search.php'>返回至搜尋頁面</a>";
mysqli_close($link);
?>

<meta charset="utf-8">

<?php

$link = @mysqli_connect(
    'localhost',
    'root',
    'kaivei30098',
    'search'
);

$keyword = $_POST["uSearch"];   //設置關鍵詞
echo "您所輸入的關鍵字：" . $keyword."<br/>";

if (isset($_POST["store"])) {   //設置店家的篩選值，如果空值則設NULL
    $stores = $_POST["store"];
} else {
    $stores = NULL;
}
if (isset($_POST["genre"])) {   //設置商品種類的篩選值，如果空值則設NULL
    $genres = $_POST["genre"];
} else {
    $genres = NULL;
}

$SQL = "SELECT * FROM post1 WHERE ";

if (!empty($keyword)) {
    $SQL .= "(Title LIKE '%$keyword%' OR Store LIKE '%$keyword%' OR Genre LIKE '%$keyword%')"; //關鍵字中檢查是否有符合資料庫中的字詞
}

// 店家及食品種類一起篩選
if (!empty($stores) && !empty($genres)) {
    $SQL .= " AND (";
    $storeConditions = NULL;
    $genreConditions = NULL;

    foreach ($stores as $store) {
        $storeConditions[] = "Store LIKE '%$store%'";
    }
    $SQL .= implode(" OR ", $storeConditions);

    $SQL .= ") AND (";

    foreach ($genres as $genre) {
        $genreConditions[] = "Genre LIKE '%$genre%'";
    }
    $SQL .= implode(" OR ", $genreConditions);

    $SQL .= ")";
}
// 如果只有店家被篩選的話
elseif (!empty($stores)) {
    $SQL .= " AND (";
    $storeConditions = NULL;

    foreach ($stores as $store) {
        $storeConditions[] = "Store LIKE '%$store%'";
    }
    $SQL .= implode(" OR ", $storeConditions);
    $SQL .= ")";
}
// 如果只有食品種類被篩選的話
elseif (!empty($genres)) {
    $SQL .= " AND (";
    $genreConditions = NULL;

    foreach ($genres as $genre) {
        $genreConditions[] = "Genre LIKE '%$genre%'";
    }
    $SQL .= implode(" OR ", $genreConditions);
    $SQL .= ")";
}

$result = mysqli_query($link, $SQL);

if (mysqli_num_rows($result) > 0) {    //此程式碼用來檢查有沒有符合的項目(也就是檢查資料是否結束)
    while ($row = mysqli_fetch_assoc($result)) {
        echo "----------------------------------"."<br/>";
        echo "標題：" . $row["Title"] . "<br/>";
        echo "敘述：" . $row["Description"] . "<br/>";
        echo "販售店家：" . $row["Store"] . "<br/>";
        echo "標註：" . $row["Tag"] . "<br/>";
        echo "種類：" . $row["Genre"] . "<br/>";
        echo "----------------------------------"."<br/>";
    }
}else{
    echo "找不到符合關鍵字的搜尋結果<br/>";
}

echo "<a href = search.php>返回搜索頁面";
mysqli_close($link);

?>

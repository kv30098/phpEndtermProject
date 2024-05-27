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
} else {
    echo "資料庫: 開啟成功!<br/>";
}

// 檢查是否有文件上傳
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $foodName = $_POST['foodName'];
    $store = $_POST['store'];
    $satietyScore = $_POST['satietyScore'];
    $preferScore = $_POST['preferScore'];
    $priceScore = $_POST['priceScore'];
    $price = $_POST['price'];

    // 處理產品圖片上傳
    $productImagePath = 'uploads/' . basename($_FILES['productImage']['name']);
    if (move_uploaded_file($_FILES['productImage']['tmp_name'], $productImagePath)) {
        // 成功上傳
    } else {
        echo "產品圖片上傳失敗";
        exit;
    }

    // 處理LOGO圖片上傳
    $logoImagePath = 'uploads/' . basename($_FILES['logoImage']['name']);
    if (move_uploaded_file($_FILES['logoImage']['tmp_name'], $logoImagePath)) {
        // 成功上傳
    } else {
        echo "LOGO圖片上傳失敗";
        exit;
    }

    // 插入到資料庫
    $sql = "INSERT INTO product (ProductName, ProductPrice) VALUES ('$foodName', $price)";
    if (mysqli_query($link, $sql) === TRUE) {
        $productID = mysqli_insert_id($link);  // 獲取插入的 product ID
        $sql = "INSERT INTO showfood (ProductID, imageSrc, logoSrc, foodName, store, satietyScore, preferScore, priceScore, price) 
                VALUES ($productID, '$productImagePath', '$logoImagePath', '$foodName', '$store', $satietyScore, $preferScore, $priceScore, $price)";
        if (mysqli_query($link, $sql) === TRUE) {
            echo "數據插入成功";
        } else {
            echo "數據插入失敗: " . mysqli_error($link);
        }
    } else {
        echo "數據插入失敗: " . mysqli_error($link);
    }

    echo "<br/>"."<a href = 'uploadimage.php'>返回上傳頁面</a>";
    mysqli_close($link);
}
?>


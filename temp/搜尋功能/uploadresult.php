<?php
$link = @mysqli_connect(
    'localhost',
    'root',
    'kaivei30098',
    'phpfinalproject'
);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $foodName = $_POST['foodName'];
    $store = $_POST['store'];
    $category = $_POST['category'];
    $foodPrice = $_POST['foodPrice'];
    $nutritionLabel = $_POST['nutritionLabel'];
    $ingredientList = $_POST['ingredientList'];

    $foodImagePath = 'uploads/' . basename($_FILES['foodImage']['name']);
    if (move_uploaded_file($_FILES['foodImage']['tmp_name'], $foodImagePath)) {
    } else {
        echo "產品圖片上傳失敗";
        exit;
    }

    $storeLogoPath = 'uploads/' . basename($_FILES['storeLogo']['name']);
    if (move_uploaded_file($_FILES['storeLogo']['tmp_name'], $storeLogoPath)) {
    } else {
        echo "LOGO圖片上傳失敗";
        exit;
    }

    $sql = "INSERT INTO food (foodName, store, categoty, foodImage, foodPrice, storeLogo, nutritionLabel, ingredientList) 
            VALUES ('$foodName', '$store', '$category', '$foodImagePath', $foodPrice, '$storeLogoPath', '$nutritionLabel', '$ingredientList')";

    if (mysqli_query($link, $sql) === TRUE) {
        echo "數據插入成功";
    } else {
        echo "數據插入失敗: " . mysqli_error($link);
    }

    echo "<br/>" . "<a href='uploadImage.php'>返回上傳頁面</a>";
    mysqli_close($link);
}

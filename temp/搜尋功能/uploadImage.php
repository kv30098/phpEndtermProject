<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>上傳食物商品</title>
</head>

<body>
    <h1>上傳食物商品</h1>
    <form action="uploadresult.php" method="post" enctype="multipart/form-data">
        食品名稱: <input type="text" name="foodName" required><br><br>
        商店: <input type="text" name="store" required><br><br>
        分類: <input type="text" name="category" required><br><br>
        價格: <input type="number" name="foodPrice" required><br><br>
        營養標籤: <input type="text" name="nutritionLabel" ><br><br>
        成分表: <input type="text" name="ingredientList" ><br><br>
        產品圖片: <input type="file" name="foodImage" required><br><br>
        商店LOGO: <input type="file" name="storeLogo" required><br><br>
        <input type="submit" value="上傳">
    </form>
</body>

</html>
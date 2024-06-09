<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>上傳產品圖片</title>
</head>
<body>
    <h2>上傳產品資料</h2>
    <form action="uploadresult.php" method="post" enctype="multipart/form-data">
        食物名稱:
        <input type="text" id="foodName" name="foodName" required><br><br>

        店家：
        <input type="text" id="store" name="store" required><br><br>

        飽足感:
        <input type="number" step="0.1" id="satietyScore" name="satietyScore" required><br><br>

        偏好度:
        <input type="number" step="0.1" id="preferScore" name="preferScore" required><br><br>

        CP值:
        <input type="number" step="0.1" id="priceScore" name="priceScore" required><br><br>

        價格:
        <input type="number" id="price" name="price" required><br><br>

        產品圖片:
        <input type="file" id="productImage" name="productImage" required><br><br>

        店家LOGO:
        <input type="file" id="logoImage" name="logoImage" required><br><br>

        <input type="submit" value="上傳">
    </form>
</body>
</html>

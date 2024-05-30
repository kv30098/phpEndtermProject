<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>搜尋產品</title>
</head>

<body>
    <center>
        <h1>Yehoo!奇摩子2.0</h1>
    </center>
    <form method="GET" action="searchresult.php">
        請輸入關鍵字:
        <input type="text" id="keyword" name="keyword" required><br><br>

        店家種類：
        <select id="store" name="store[]" multiple>
            <option value="">All</option>
            <option value="全家">全家</option>
            <option value="7-11">7-11</option>
            <option value="萊爾富">萊爾富</option>
            <option value="OK-Mart">OK-Mart</option>
            
        </select><br><br>

        食品種類：
        <select id="category" name="category[]" multiple>
            <option value="">All</option>
            <option value="甜品">甜品</option>
            <option value="主食">主食</option>
            <option value="飯糰">飯糰</option>
            <option value="三明治">三明治</option>
            <option value="蔬果">蔬果</option>
            <option value="麵包">麵包</option>
        </select><br><br>

        <input type="submit" value="送出搜尋">
    </form>
</body>

</html>
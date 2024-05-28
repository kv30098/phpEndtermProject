<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>搜尋產品</title>
</head>
<body>
    <center><h1>Yehoo!奇摩子</h1></center>
    <hr class="divider">
    <form action="searchresult.php" method="GET">
        請輸入關鍵字:
        <input type="text" id="keyword" name="keyword" required><br><br>

        <label for="store">店家種類:</label>
        <select id="store" name="store">
            <option value="">All</option>
            <option value="全家">全家</option>
            <option value="7-11">7-11</option>
            <option value="萊爾富">萊爾富</option>
            <option value="OK Mart">OK Mart</option>
        </select><br><br>

        <input type="submit" value="送出搜尋">
    </form>
</body>
</html>

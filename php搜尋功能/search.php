<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>產品搜尋</title>
</head>

<body>
    <form action="test.php" method="post">
        <center>
            <h1>超商美食+<br />
                <input type="text" name="uSearch" value="" placeholder="輸入關鍵字" required>
                <input type="submit" value="搜尋">
                <br /><br />
                篩選：
                <select name="store[]" multiple>
                    <option value="全家">全家</option>
                    <option value="711">711</option>
                </select>
                <select name="genre[]" multiple>
                    <option value="genre1">飲料</option>
                    <option value="genre2">甜點</option>
                    <option value="genre3">主食</option>
                    <option value="genre4">飯糰</option>
                    <option value="genre5">三明治</option>
                    <option value="genre6">蔬果</option>
                    <option value="genre7">麵包</option>
                </select>
            </h1>
        </center>
    </form>
    <br />
</body>

</html>
<?php
// 连接数据库
$link = @mysqli_connect(
    'localhost',  // MySQL主機名稱 
    'root',       // 使用者名稱 
    'kaivei30098',           // 密碼
    'phpfinalproject' // 資料庫名稱
);

// 檢查連接
if (!$link) {
    die("無法開啟資料庫!<br/>");
}

// 處理表單提交
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 檢查並接收表單數據
    $uEmail = isset($_POST['email']) ? mysqli_real_escape_string($link, $_POST['email']) : '';
    $uName = isset($_POST['nickname']) ? mysqli_real_escape_string($link, $_POST['nickname']) : '';
    $uPass = isset($_POST['password']) ? mysqli_real_escape_string($link, $_POST['password']) : '';

    // 檢查電子郵件格式
    if (empty($uEmail) || empty($uName) || empty($uPass)) {
        echo "請填寫所有必填欄位。";


        // 檢查電子郵件是否已經存在
        $checkEmailQuery = "SELECT * FROM users WHERE uEmail = '$uEmail'";
        $result = mysqli_query($link, $checkEmailQuery);

        if (mysqli_num_rows($result) > 0) {
            // 電子郵件已存在
            echo "該電子郵件已被註冊，請使用其他電子郵件。";
        } else {
            // 插入新用戶資料
            $insertQuery = "INSERT INTO users (uEmail, uName, uPass) 
                            VALUES ('$uEmail', '$uName', '$uPass')";

            if (mysqli_query($link, $insertQuery)) {
                echo "註冊成功！";
                // 重定向到登入頁面或其他頁面
                header("Refresh:3;Location:login.html");
                exit();
            } else {
                echo "註冊失敗，請稍後再試。";
            }
        }
    }
}
mysqli_close($link);
?>

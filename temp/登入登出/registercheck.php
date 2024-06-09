<?php
session_start();

$link = @mysqli_connect(
    'localhost',  
    'root',      
    'kaivei30098',         
    'phpfinalproject' 
);

if (!$link) {
    die("無法開啟資料庫!<br/>");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uEmail = $_POST["email"];
    $uName = $_POST["nickname"];
    $uPass = $_POST["password"];

    // 檢查是否有重複的電子郵件
    $sql = "SELECT uEmail FROM users WHERE uEmail = ?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "s", $uEmail);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        echo "<script>alert('電子郵件已經存在'); window.location.href='register.php';</script>";
    } else {
        mysqli_stmt_close($stmt);
        // 插入新使用者數據
        $sql = "INSERT INTO users (uEmail, uName, uPass) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $uEmail, $uName, $uPass);

        if (mysqli_stmt_execute($stmt)) {
            // 設置會話變量
            $_SESSION['uEmail'] = $uEmail;
            $_SESSION['uName'] = $uName;
            setcookie("Name",$uName,$date);
            echo "<script>alert('註冊成功'); window.location.href='../問卷/questionare.php';</script>";
        }
        else {
            echo "錯誤: " . $sql . "<br>" . mysqli_error($link);
        }
        mysqli_stmt_close($stmt);
    }
}

mysqli_close($link);
?>

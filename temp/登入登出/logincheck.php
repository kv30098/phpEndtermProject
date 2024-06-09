<?php
session_start();

$link = @mysqli_connect(
    'localhost',
    'root',
    'kaivei30098',
    'phpfinalproject'
);

$date = strtotime("+7day",time());

if (!$link) {
    die("無法開啟資料庫!<br/>");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Sanitize inputs
    $email = mysqli_real_escape_string($link, $email);
    $password = mysqli_real_escape_string($link, $password);

    // Query to check the email and password
    $query = "SELECT * FROM users WHERE uEmail='$email' AND uPass='$password'";
    $result = mysqli_query($link, $query);
    $row= mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        $uName = $row['uName'];
        $_SESSION['check']="Yes";
        setcookie("Name",$uName,$date);
        echo "<script>alert('登入成功!'); window.location.href='../搜尋功能/search.php';</script>";
    } else {
        $_SESSION['check']="No";
        setcookie("Name","錯誤",$date);
        echo "<script>alert('電子郵件或密碼錯誤，請重試!'); window.location.href='login.html';</script>";
    }
}

mysqli_close($link);
?>

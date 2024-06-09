<?php
session_start();
setcookie("name", time()-604800);
$_SESSION["check"]="No";
header("location:../搜尋功能/search.php")
?>
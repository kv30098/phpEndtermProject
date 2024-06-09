<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>編輯個人檔案</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Navigation bar1.css">
    <link rel="stylesheet" type="text/css" href="edit_profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navBar">
        <div class="bergerMenu-placeholder">
            <img class="bergerMenu" src="./NavBar_image/menu.png">
            <div class="sidebar-placeholder">
            <?php
            if(!isset($_SESSION["check"])){
                $_SESSION["check"] = "No";
            }
            if($_SESSION["check"] == "Yes"){
                    //以登入部分顯示
            ?>
                <div class="sidebar">
                    <div class="header">個人設定</div>
                    <div class="profile">
                        <img class="profile-icon" src="./SB_image/userPhoto.jpg" alt="User Icon" />
                        <div class="user-id">User_ID</div>
                    </div>
                    <div class="menu">
                        <div class="menu-item">  
                            <img class="icon" src="./SB_image/settings.png" alt="Edit Profile Icon" />
                            <div class="menu-text">
                                <a href="../編輯個人檔案/edit_profile.php">
                                    編輯個人檔案
                                </a>
                            </div>
                        </div>
                        <div class="menu-item">
                            <img class="icon" src="./SB_image/bookmark.png" alt="Favorites Icon" />
                            <div class="menu-text">
                                <a href="../我的蒐藏/collections.php">
                                    我的收藏
                                </a>
                            </div>
                        </div>
                        <div class="menu-item">
                            <img class="icon" src="./SB_image/bell.png" alt="Notifications Icon" />
                            <div class="menu-text">
                                <a href="../通知/notification.php">
                                    通知 
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }else{
                //未登入部份顯示 
            ?>
                <div class="sidebar">
                    <div class="header">個人設定</div>
                    <div class="profile">
                        <div class="profile">
                            <img class="profile-icon" src="./SB_image/userPhoto.jpg" alt="User Icon" />
                            <div class="user-id">User_ID</div>
                        </div>
                        <div class="user-id">
                            <a href="../登入登出/login.php">您還未登入！</a>
                        </div>
                    </div>
                    <div class="menu">
                        <div class="menu-item">
                            <img class="icon" src="./SB_image/settings.png" alt="Edit Profile Icon" />
                            <div class="menu-text">編輯個人檔案</div>
                        </div>
                        <div class="menu-item">
                            <img class="icon" src="./SB_image/bookmark.png" alt="Favorites Icon" />
                            <div class="menu-text">我的收藏</div>
                        </div>
                        <div class="menu-item">
                            <img class="icon" src="./SB_image/bell.png" alt="Notifications Icon" />
                            <div class="menu-text">通知</div>
                        </div>
                    </div>
                </div>
            <?php
            }
            
            ?>
                
            </div>
        </div>

        <div class="logo-placeholder">
            <a href="../搜尋功能/search.php">
                <img class="logo" src="./NavBar_image/logo.png">
            </a>
        </div>

        <?php
        if(!isset($_SESSION["check"])){
            $_SESSION["check"] = "No";
        }
            
        if($_SESSION["check"] == "Yes"){
               //以登入部分顯示
        
        ?>
        <div class="User-placeholder">
            <div class="hello-text">
                <div>（使用者）您好</div>
            </div>
            <div class="photo-placeholder">
                <img class="user-photo" src="./NavBar_Logged_image/userPhoto.jpg">
                <div class="hover-windows-placeholder">
                    <div class="hover-windows">
                        <div class="windows-placeholder">
                            <div class="setting">
                                <img class="setting-icon" src="./NavBar_Logged_image/setting.svg" />
                                <div class="setting-text"><a href="../編輯個人檔案/edit_profile.php">個人設定</a></div>
                            </div>
                            <div class="windows-line"></div>
                            <div class="log-out">
                                <img class="log-out-icon" src="./NavBar_Logged_image/log-out.svg" />
                                <div class="log-out-text"><a href="../登出/logout.php">登出</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }else{
                //未登入部份顯示 

        ?>
        <div class="button-placeholder">
            <a class="logIn-btn" href="../登入登出/login.php">登入</a>
            <a class="signUp-btn" href="../登入登出/register.php">註冊</a>
        </div>
        <?php
        }
        ?>
    </nav>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="main-content">
                    <div class="title">
                        <span>編輯個人檔案</span>
                    </div>
                    <div class="profile-icon-title">
                        <span>照片</span>
                    </div>
                    <div class="profile-f">
                        <img class="profile-f-icon" src="./SB_image/userPhoto.jpg" alt="User Icon">
                        <button type="button" class="change" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            變更
                        </button>
                    </div>
                    <div class="profile-icon-title">
                        <span>暱稱</span>
                    </div>
                    <div class="fgroup">
                        <div class="input">
                            <input type="text" class="form-control">
                        </div>
                        <div class="btn">
                            <button type="button" class="change" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                變更
                            </button>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <button class="reset" type="reset">重新填寫問卷</button>
                    </div>
                        
                </div>
            </div>
        </div>
     </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"></script>
    <script src="search.js"></script>
</body>
</html>

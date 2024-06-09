<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>使用者評論</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Navigation bar3.css">
    <link rel="stylesheet" type="text/css" href="user_comment1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navBar">
        <div class="bergerMenu-placeholder">
            <img class="bergerMenu" src="./NavBar_image/menu.png">
            <div class="sidebar-placeholder">
            <?php
            $_SESSION["check"] = "No";
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
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="main-content">
                    <div class="title col-12">
                        <span>正在為 美食美撰寫評價</span>
                    </div>
                    <form class="row" action="searchresult.php" method="GET">
                        <div class="big-container">
                            <!--左邊-->
                            <div class="left">
                                <div class="text col-12">
                                    <label class="label" for="textareal">評價文章</label>
                                    <textarea id="textareal" name="textcomment" rows="7" cols="50" placeholder="拜偷, 留個言吧..."></textarea>
                                </div>

                            
                                <div class="rating col-12">
                                    <label class="label">飽足評分</label>
                                    <div class="rating-container">
                                        <div class="slider-container">
                                            <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
                                        </div>
                                    </div>
                                    <span class="value"></span>
                                </div>
                            

                                <div class="rating col-12">
                                    <label class="label">喜好評分</label>
                                    <div class="rating-container" >
                                        <div class="slider-container">
                                            <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
                                        </div>
                                    </div>
                                    <span class="value"></span>   
                                </div>
                            

                        
                                <div class="rating col-12">
                                    <label class="label">價格評分</label>
                                    <div class="rating-container">
                                        <div class="slider-container">
                                            <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
                                        </div>
                                    </div>
                                    <span class="value"></span>  
                                </div>
                            </div>

                            <div class="divider">

                            </div>

                            <!--右邊-->
                            <div class="right">
                                <div class="pic-upload">
                                    

                                    <div class="pic">
                                        <img src="./SB_image/default.jpg" id="img1">
                                    </div>
                                    <label class="choosePic" for="file1">上傳圖片</label>
                                    <input type="file" id="file1" accept="image/*" hidden>
                                    
                                    <div class="pic">
                                        <img src="./SB_image/default.jpg" id="img2">
                                    </div>
                                    <label class="choosePic" for="file2">上傳圖片</label>
                                    <input type="file" id="file2" accept="image/*" hidden>
                                </div>
                            </div>
                        </div>
                        
                        

                        <!--一些按鈕-->
                        <div class="control-group col-8">
                            <button class="submit" type="submit">提交</button>
    
                            <button class="reset" type="reset">重填</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
     </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"></script>
    <script src="user_comment.js"></script>
        
        
        
        
</body>
</html>

<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的收藏</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Navigation bar1.css">
    <link rel="stylesheet" type="text/css" href="Food Show Obj.css">
    <link rel="stylesheet" type="text/css" href="collections2.css">
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
                                <div class="setting-text">
                                    <a href="../編輯個人檔案/edit_profile.php">個人設定</a></div>
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
                    <!--左邊-->
                    <div class="left col-3">
                        <div class="title">
                            <span>我的收藏</span>
                        </div>
                        
                        <!--分類區-->
                        <div class="select-option"> 
                            <form class="filter-form">
                                <!--依超商-->
                                <div class="base-container">
                                    <button class="filter-btn" type="button" data-bs-toggle="collapse" data-bs-target="#cv-store-filter" aria-expanded="false" aria-controls="cv-store-filter">
                                        <span class="arror-right">
                                            <i class="fa-solid fa-chevron-right"></i>
                                        </span>
                                        <span class="filter-text">依超商</span>
                                    </button>
                                    <div class="collapse" id="cv-store-filter">   
                                    
                                        <div class="options-container">
                                            <a>
                                                <img class="option-pic" src="FSO_image/FM_Logo.png">
                                            </a>
                                            <label class="form-check-label" for="fm">全家</label>
                                            <input class="form-check-input" type="checkbox" value="fm" id="fm">
                                            <span>
                                                <i class="fa-solid fa-check"></i>
                                            </span>
                                        </div>
                                        <div class="options-container">
                                            <a>
                                                <img class="option-pic" src="FSO_image/FM_Logo.png" >
                                            </a>
                                            <label class="form-check-label" for="711">7-11</label>
                                            <input class="form-check-input" type="checkbox" value="711" id="711">
                                            <span>
                                                <i class="fa-solid fa-check"></i>
                                            </span>
                                        </div>
                                        <div class="options-container">
                                            <a>
                                                <img class="option-pic" src="FSO_image/FM_Logo.png">
                                            </a>
                                            <label class="form-check-label" for="life"></label>
                                            <input class="form-check-input" type="checkbox" value="life" id="life">
                                            <span>
                                                <i class="fa-solid fa-check"></i>
                                            </span>
                                        </div>
                                        <div class="options-container">
                                            <a>
                                                <img class="option-pic" src="FSO_image/FM_Logo.png">
                                            </a>
                                            <label class="form-check-label" for="OKmart">OK超商</label>
                                            <input class="form-check-input" type="checkbox" value="OKmart" id="OKmart">
                                            <span>
                                                <i class="fa-solid fa-check"></i>
                                            </span>
                                        </div> 
                                    </div>
                                </div>

                                <!--依種類-->
                                <div class="base-container">
                                    <button class="filter-btn" type="button" data-bs-toggle="collapse" data-bs-target="#cate-filter" aria-expanded="false" aria-controls="cate-filter">
                                        <span class="arror-right">
                                            <i class="fa-solid fa-chevron-right"></i>
                                        </span>
                                        <span class="filter-text">依種類</span>
                                    </button>
                                    <div class="collapse" id="cate-filter">
                                        <div class="options-container">
                                            <a>
                                                <img class="option-pic" src="./foodTypeIcon/mainMeal.png">
                                            </a>
                                            <label class="form-check-label" for="md">主食</label>
                                            <input class="form-check-input" type="checkbox" value="md" id="md">
                                            <span>
                                                <i class="fa-solid fa-check"></i>
                                            </span>
                                        </div>
                                        <div class="options-container">
                                            <a>
                                                <img class="option-pic" src="./foodTypeIcon/riceball.png" >
                                            </a>
                                            <label class="form-check-label" for="onigiri">飯糰</label>
                                            <input class="form-check-input" type="checkbox" value="onigiri" id="onigiri">
                                            <span>
                                                <i class="fa-solid fa-check"></i>
                                            </span>
                                        </div>
                                        <div class="options-container">
                                            <a>
                                                <img class="option-pic" src="./foodTypeIcon/sandwich.png">
                                            </a>
                                            <label class="form-check-label" for="sd">三明治</label>
                                            <input class="form-check-input" type="checkbox" value="sd" id="sd">
                                            <span>
                                                <i class="fa-solid fa-check"></i>
                                            </span>
                                        </div>
                                        <div class="options-container">
                                            <a>
                                                <img class="option-pic" src="./foodTypeIcon/veg.png">
                                            </a>
                                            <label class="form-check-label" for="vt">蔬果</label>
                                            <input class="form-check-input" type="checkbox" value="vt" id="vt">
                                            <span>
                                                <i class="fa-solid fa-check"></i>
                                            </span>
                                        </div>
                                        <div class="options-container">
                                            <a>
                                                <img class="option-pic" src="./foodTypeIcon/bread.png">
                                            </a>
                                            <label class="form-check-label" for="bd">麵包</label>
                                            <input class="form-check-input" type="checkbox" value="bd" id="bd">
                                            <span>
                                                <i class="fa-solid fa-check"></i>
                                            </span>
                                        </div>
                                        <div class="options-container">
                                            <a>
                                                <img class="option-pic" src="./foodTypeIcon/dessert.png">
                                            </a>
                                            <label class="form-check-label" for="ds">甜點</label>
                                            <input class="form-check-input" type="checkbox" value="ds" id="ds">
                                            <span>
                                                <i class="fa-solid fa-check"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <!--依美食資訊-->
                                <div class="base-container">
                                    <button class="filter-btn" type="button" data-bs-toggle="collapse" data-bs-target="#food-info-filter" aria-expanded="false" aria-controls="food-info-filter">
                                        <span class="arror-right">
                                            <i class="fa-solid fa-chevron-right"></i>
                                        </span>
                                        <span class="filter-text">啟用排序</span>
                                    </button>
                                    <div class="collapse" id="food-info-filter">                                                
                                        <div class="options-container">
                                            <a>
                                                <i class="fa-solid fa-angles-down"></i>
                                            </a>
                                            <label class="form-check-label" for="hl">由高到低</label>
                                            <input class="form-check-input" type="checkbox" value="hl" id="hl">
                                            <span>
                                                <i class="fa-solid fa-check"></i>
                                            </span>
                                        </div>
                                        <div class="options-container">
                                            <a>
                                                <i class="fa-solid fa-angles-up"></i>
                                            </a>
                                            <label class="form-check-label" for="lh">由低到高</label>
                                            <input class="form-check-input" type="checkbox" value="lh" id="lh">
                                            <span>
                                                <i class="fa-solid fa-check"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        

                    </div>

                    <!--右邊-->
                    <div class="right col-19">
                        <!--食物展示區-->
                        <div class="food-list">
                            <?php
                            function createFoodItem($imageSrc, $logoSrc, $foodName, $satietyScore, $preferScore, $priceScore, $price) {
                                return "
                                <div class='cv'>
                                    <div class='food-container'>
                                        <img class='food-image' src='{$imageSrc}' alt='Food image'>
                                    </div>
                                    <div class='header-food'>
                                        <div class='logo-container'>
                                            <img class='food-logo' src='{$logoSrc}' alt='Food Logo'>
                                        </div>
                                        <div class='food-name'>{$foodName}</div>
                                    </div>
                                    <div class='review-container'>
                                        <div class='review-item'>
                                            <img class='review-icon' src='./FSO_image/SatietyrReview.svg' alt='Satiety Review Icon'>
                                            <div class='review-line'></div>
                                            <div class='review-score'>{$satietyScore}</div>
                                        </div>
                                        <div class='review-item'>
                                            <img class='review-icon' src='./FSO_image/PreferReview.svg' alt='Preference Review Icon'>
                                            <div class='review-line'></div>
                                            <div class='review-score'>{$preferScore}</div>
                                        </div>
                                        <div class='review-item'>
                                            <img class='review-icon' src='./FSO_image/PriceRevier.svg' alt='Price Review Icon'>
                                            <div class='review-line'></div>
                                            <div class='review-score'>{$priceScore}</div>
                                        </div>
                                    </div>
                                    <div class='price-button-container'>
                                        <div class='price'>\${$price}</div>
                                        <div class='button-container'>
                                            <div class='button'></div>
                                            <div class='button-text'>查看美食</div>
                                        </div>
                                    </div>
                                </div>
                                ";
                            }
                    
                            $food_list = [
                                ['./FSO_image/烤蔬菜番茄筆尖麵.jpg', './FSO_image/FM_Logo.png', '烤蔬菜番茄筆尖麵', 9.6, 7.6, 6.8, 70],
                                ['./FSO_image/鐵觀音黑岩泡芙.jpg', './FSO_image/FM_Logo.png', '鐵觀音黑岩泡芙', 8.5, 6.7, 5.5, 80],
                                ['./FSO_image/鐵觀音黑岩泡芙.jpg', './FSO_image/FM_Logo.png', '鐵觀音黑岩泡芙', 8.5, 6.7, 5.5, 80],
                                ['./FSO_image/鐵觀音黑岩泡芙.jpg', './FSO_image/FM_Logo.png', '鐵觀音黑岩泡芙', 8.5, 6.7, 5.5, 80]
                            ];
                    
                            foreach ($food_list as $food) {
                                echo createFoodItem(...$food);
                            }
                            ?>
                        </div>
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

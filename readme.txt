# NFC-add-value-and-member-system
一個簡單的NFC卡片記名以及儲值紀錄的會員系統
###########開發環境
vscode 1.67.1
xampp 3.3.0
phpmyadmin 5.1.1
php 7.4.27
資料庫伺服器類型:MariaDB
資料庫:mySQL
###########目錄結構描述
|---README.md    使用者手冊
|---網頁部分
|      |---index.php   //登入首頁
|      |---user.php    //使用者介面，包含了導覽頁各個分頁
|      |---register.php   //註冊頁面
|      |---card.php   //卡片交易紀錄的頁面
|      |---logout.php   //登出跳轉的處理頁面，處理了帳戶SESSION資料
|      |---gg.js   //處理了sidebar動態收放的功能
|      |---dbtools.inc.php   //使用PHP mysqli語法連線資料庫方式
|      |---ggg.css   //主要是整個頁面的背面模板以及sidebar的顏色
|---資料庫部分 userdata.sql
|      |---user   //紀錄帳號密碼的部分，每個帳戶都會有獨立的UID來區隔帳戶(priamry key)
|      |---user_data   //紀錄該帳戶的基本資料部分
|      |---cardlog   //紀錄帳戶的餘額以及卡片ID的部分
|      |---sensordata3   //交易紀錄的部分，每一筆交易紀錄都會有一個單獨部會重複的交易編號來區分(primary key)
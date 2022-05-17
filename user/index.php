<?php
$page = "index";

if(isset($_GET['page'])){
    $page = $_GET['page'];
}

if(isset($_POST["account"])){
    require_once("dbtools.inc.php");

    $account = $_POST["account"];
    $password = $_POST["password"];

    $link = create_connection();

    $sql = "SELECT *FROM user WHERE m_account='$account' AND m_password = '$password'";
    $result = execute_sql($link, "userdata", $sql);
    
    if (mysqli_num_rows($result) == 0)
    {
      //釋放 $result 佔用的記憶體
      mysqli_free_result($result);
		
      //關閉資料連接	
      mysqli_close($link);
			
      //顯示訊息要求使用者輸入正確的帳號密碼
      echo "<script type='text/javascript'>alert('帳號密碼錯誤，請查明後再登入')</script>";
    }
    else     //如果帳號密碼正確
    {
      //將使用者資料加入 Session
      session_start();
      $row = mysqli_fetch_object($result);
      $_SESSION["login_uid"] = $row->m_uid;
      $_SESSION["login_account"] = $row->m_account;
      $_SESSION["login_name"] = $row->m_name;
      $_SESSION["cardid"] = $row->m_carduid;
      $account = $row->account;
      
      //釋放 $result 佔用的記憶體	
      mysqli_free_result($result);
			
      //關閉資料連接	
      mysqli_close($link);
	        
      header("location:user.php?page=index");
    }
    
}
?>
<!-- 登入頁面 -->

<?php if($page == "index"):?>

<html>
    <head>
        <meat charset="utf-8">
        <title>登入頁面</title>
        <link rel="stylesheet" href="style.css">   
    </head>
    <body>
        <div class="center">
            <h1>歡迎光臨</h1>
            <form method="post">
                <div class="txt_field">
                    <input type="text" name="account" size="15" >
                    <span></span>
                        <label>帳號</label>
                </div>
                <div class="txt_field">
                    <input type="password" name="password" size="15" >
                    <span></span>
                        <label>密碼</label>
                </div>
                <div class="pass">忘記密碼?</div>

                <input type="submit" value="按此登入">

                <div class="signup_link">
                    沒有帳號?<a href=/user/register.php>點擊註冊</a>
                </div>

            </form>
    </body>


</html>

<?php endif;?>


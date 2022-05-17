<?php

if(isset($_POST["account"]) AND isset($_POST["password"]) AND isset($_POST["name"])){
    $uid=substr(md5(microtime()),0,8);
    $account = $_POST["account"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    // echo $account;
    // echo $password;
    // echo $name;
    require_once("dbtools.inc.php");
    $link = create_connection();
    
    $sql = "INSERT INTO user (m_uid,m_account ,m_password ,m_name) 
            VALUE('$uid','$account','$password','$name')";
    

    $result = execute_sql($link, "userdata", $sql);

    $m_uid = "INSERT INTO user_data (m_dataid,m_name)
    VALUE('$uid','$name')";

    $result = execute_sql($link, "userdata", $m_uid);



    header("location:index.php");

}


?>


<html>
        <head>
            <meat charset="utf-8">
            <title>註冊頁面</title>
            <link rel="stylesheet" href="style.css">   


        </head>

        <body>
        <div class="center">
            <h1>註冊頁面</h1>
            <form method="post">
            <div class="txt_field">
                    <input type="text" name="name" size="30" >
                    <span></span>
                        <label>使用者名稱</label>
                </div>
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
                <!-- <div class="txt_field">
                    <input type="password" name="password" size="15" >
                    <span></span>
                        <label>密碼確認</label>
                </div> -->

                <div>
                <input type="submit" value="按此註冊">
                </div>
              

            </form>
    </body>


    </html>
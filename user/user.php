<?php
$page = "index";
if (isset($_GET['page'])) {
    $page = $_GET['page'];

}
session_start();
$m_uid = $_SESSION['login_uid'];
$cardid = $_SESSION['cardid'];
$total = 0;
// echo $cardid;
/// 基本資料顯示
if ($page == "index") {
    require_once "dbtools.inc.php";
    $link = create_connection();
    $sql = "SELECT *FROM user_data WHERE m_dataid = '$m_uid'";
    $result = execute_sql($link, "userdata", $sql);

    if (mysqli_num_rows($result) == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            $address = $row['m_address'];
            $phone = $row['m_phone'];
            $name = $row['m_name'];
        }
    }

    $sql = "SELECT *FROM cardlog WHERE m_uid = '$m_uid'";
    $result = execute_sql($link,"userdata",$sql);
    if(mysqli_num_rows($result) == 1){
        while($row = mysqli_fetch_assoc($result)){
            $cardid = $row['m_carduid'];
            $total = $row['m_total'];
        }
    }

}
// 修改基本資料
if ($page == "personaldata") {
    if (isset($_POST["address"]) && isset($_POST["phone"]) && isset($_POST["identity"])) {
        require_once "dbtools.inc.php";
        $m_uid = $_SESSION['login_uid'];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $identity = $_POST["identity"];
        $link = create_connection();
        $sql = "UPDATE user_data
                    SET m_address = '$address',
                        m_phone = '$phone',
                        m_identity = '$identity'

                    WHERE m_dataid = '$m_uid'";

        $result = execute_sql($link, "userdata", $sql);

        echo "<script type='text/javascript'>alert('完成資料修改')</script>";

    }
}

// 記名卡片
if ($page == "name"){
    if(isset($_POST["cardid"]) && isset($_POST["cardname"])){
        $cardid = $_POST["cardid"];
        require_once "dbtools.inc.php";
        $link = create_connection();
        $sql = "SELECT *FROM user_data  WHERE m_carduid = '$cardid'";

        $result = execute_sql($link,"userdata",$sql);

            if(mysqli_num_rows($result) == 1){
                echo "<script type='text/javascript'>alert('此卡片已註冊過，請聯絡供應商!')</script>";
            }
            else{
                $sql = "UPDATE user_data
                        SET m_carduid = '$cardid'
                        WHERE m_dataid = '$m_uid'";
                $request = execute_sql($link,"userdata",$sql);
                $sql = "INSERT INTO cardlog (m_carduid,m_uid)
                        VALUE ('$cardid','$m_uid')";
                $request = execute_sql($link,"userdata",$sql);
                $sql = "UPDATE user
                        SET m_carduid = '$cardid'
                        WHERE m_uid = '$m_uid'";
                $request = execute_sql($link,"userdata",$sql);
                echo "<script type='text/javascript'>alert('新增卡片成功!')</script>";
            }
    }

}


?>


<html>
    <head>
        <meta charsset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>使用者介面</title>
        <link href="ggg.css" rel="stylesheet">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
        <script src="gg.js"></script>
        <!-- <script src="personaldata.js"></script> -->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
        <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
        <link rel="stylesheet" href="assets/css/app.css">
        <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    </head>


    <body>
    <div class="container-all">
        <!-- left -->
        <div class="container-left">
            <!-- menu -->
            <nav id="sidebar">
            <!-- button -->
            <button type="button" id="collapse" class="collapse-btn">
            <i class="fa-solid fa-align-left"></i>
            </button>
            <!-- List  -->
            <ul class="list-unstyled">
                <p>瀏覽頁表</p>


                <li>
                <a href="?page=index">首頁HOME <i class="fa-solid fa-house"></i></a>
                </li>
                <li>
                <a href="?page=personaldata">修改基本資料 <i class="fa-solid fa-book-medical"></i></a>
                </li>
                <li>
                <a href="?page=name">卡片記名 <i class="fa-solid fa-address-card"></i></a>
                </li>
                <li>
                <a href="?page=log">消費紀錄 <i class="fa-solid fa-book-medical"></i></a>
                </li>
                <li>
                <a href=/user/logout.php>登出 <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                </li>


            </ul>

        </nav>

    </div>

         <!-- right -->

    <div class="container-right">
        <div class="container-fluid">
        <div class="row align-items-center">
            <!-- HOME -->
            <?php if ($page == "index"): ?>
                <div class="container">
                    <div class="row">
                    <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">個人資料</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <p>以下為您的基本資料</p>
                            <div class="list-group">
                                <span class="list-group-item">
                                    <?php echo "姓名: ".$name; ?>
                                </span>
                                <span class="list-group-item">
                                    <?php echo "地址: ".$address; ?>
                                </span>
                                <span class="list-group-item disabled">
                                    <?php echo "電話: ".$phone; ?>
                                </span>
                                <span class="list-group-item">
                                    <?php echo "卡片1: ".$cardid; ?>
                                </span>
                                <span class="list-group-item">
                                    <?php echo "餘額: ".$total; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- </div> -->
            </div>
        </div>
                    </div>
                </div>
            <?php endif;?>

            <!-- 修改基本資料 -->
                <?php if ($page == "personaldata"): ?>
                    <div class="card col-md-6 col-6">
                    <div class="card-header">
                        <h4 class="card-title">基本資料修改</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" name="form1" id="form1"  method="post"onclick="return false" >
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">地址</label>
                                            <input type="text" id="address" class="form-control"
                                                placeholder="請輸入地址" name="address" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">手機號碼</label>
                                            <input type="text" id="phone" class="form-control"
                                                placeholder="請輸入十位數手機號碼" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">身分證</label>
                                            <input type="text" id="identity" class="form-control"
                                                placeholder="請輸入十位數身分證" name="identity">
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1" onclick="checktxt()" name="button" >Submit</button>
                                        <!-- <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button> -->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
                <?php endif;?>

            <!-- 記名 -->
            <?php if ($page == "name"): ?>
                <div class="card col-md-6 col-6">
                    <div class="card-header">
                        <h4 class="card-title">卡片記名</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" id="form1"  method="post">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">卡片ID</label>
                                            <input type="text" id="cardid" class="form-control"
                                                placeholder="請輸入卡片ID" name="cardid" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">名字</label>
                                            <input type="text" id="cardname" class="form-control"
                                                placeholder="請替卡片取個名字" name="cardname">
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary me-1 mb-1" value="submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <?php endif;?>
            <!-- log -->
            <?php if ($page == "log"): ?>
                <section class="bootstrap-select">
                    <div class="row">
                        <div class="card col-md-6 col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">消費紀錄</h4>
                                </div>
                                <div class="card-content">
                                <!-- <div class="row align-items-center"> -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 = mb-12">
                                                <h6>選擇您的卡片</h6>
                                                    <form action="/user/card.php" method="post">
                                                        <select name="value" class = "form-select" id="basicSelect">
                                                            <option value = "$cardid"><?php echo $cardid?></option>
                                                            <option value = "Blade Runner">--</option>
                                                            <option value = "Thor Ragnarok">--</option>
                                                        </select>
                                                        <input type="submit" class="btn btn-primary me-1 mb-1" value="submit">
                                                    </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif;?>




    </div>


    <script>
        function checktxt(){
            if($('#address').val() == ''){
                alert('請輸入地址');
                eval("document.form1['address'].focus()");
            }else if($('#phone').val() == ''){
                alert('請輸入電話號碼');
                eval("document.form1['phone'].focus()");
            }else if($('#identity').val() == ''){
                alert('請輸入身份證字號');
                eval("document.form1['identity'].focus()");
            }
            // else if($('#phone').length <=9){
            //     alert('電話數字過少，手機號碼應為10碼!'+$('#phone').length);
            //     eval("document.form1['phone'].focus()");
            // }
            else {
                document.form1.submit();
            }
        }

    </script>




    </div>

</body>


</html>
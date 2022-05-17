<?php
    session_start();
    require_once("dbtools.inc.php");
    $link = create_connection();
    $cardid = $_SESSION['cardid']; 
    $sql = "SELECT m_cardid,addmoney,reading_time FROM SensorData3 WHERE m_cardid = '$cardid'";

    $result = execute_sql($link,'userdata',$sql);


    // if(isset($_POST['value'])){

    // }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>

<body>

    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>卡片ID</th>
                <th>儲值金額</th>
                <th>日期</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>" . $row["m_cardid"] . "</td>";
                    echo "<td>" . $row["addmoney"] . "</td>";
                    echo "<td>" . $row["reading_time"] . "</td>";
                    echo "</tr>";
                }
            }
            ?>
            </tbody>
            </table>

</body>
<script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
</html>
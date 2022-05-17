<?php

unset($_SESSION['login_user']);
unset($_SESSION['login_name']);
session_destroy();


header("location:index.php");


?>
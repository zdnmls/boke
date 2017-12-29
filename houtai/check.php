<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/12/19
 * Time: 11:16
 */
session_start();
unset($_SESSION['user']);
//$mess='退出成功';
//$url="page-login.html";
//include_once 'mess.html';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>
<script>
    location.href="page-login.html";
</script>
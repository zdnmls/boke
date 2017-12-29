<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/12/20
 * Time: 10:58
 */
$id=$_GET['id'];
include_once "public.php";
$db->query('set names utf8');
$sql="delete from categroy where id='$id'";
$result=$db->query($sql);



$mess='';
$url='type.php';

include_once 'mess.html';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<style>
    .table{
        width: 30%;
        margin: 50px auto;
        border: 1px solid #dadada;
    }
</style>
<body>
<!--<table class="table">-->
<!--    <thead>-->
<!--    <tr>-->
<!--        <th>id</th>-->
<!--        <th>type</th>-->
<!--        <th>del</th>-->
<!--    </tr>-->
<!--    </thead>-->
<!--    <tbody>-->
<!--    <tr>-->
<!--        <td>1</td>-->
<!--        <td>Steve</td>-->
<!--        <td>Jobs</td>-->
<!---->
<!--    </tr>-->
<!--    <tr>-->
<!--        <td>2</td>-->
<!--        <td>Simon</td>-->
<!--        <td>Philips</td>-->
<!---->
<!--    </tr>-->
<!--    </tbody>-->
<!--</table>-->
</body>
</html>


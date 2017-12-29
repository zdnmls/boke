<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/12/19
 * Time: 11:01
 */
session_start();
$user=$_POST['user'];
$pass=$_POST['pass'];
$code=$_POST['code'];


if(strtoupper($code)!=strtoupper($_SESSION['code'])) {

    $mess = '验证码错误';
    $url = "page-login.html";include_once "mess.html";
    exit;
}





include_once "public.php";
$sql="select * from user where email='$user'";
$result=$db->query($sql);
$row=$result->fetch_assoc();
//echo $pass;
if($row){
    if($row['pass']===$pass){
        $_SESSION['user']=$user;
        $mess="登录成功";
        $url="main.php";
    }else{
        $mess="密码错误";
        $url="page-login.html";
    }
}else{
    $mess="账号不存在";
    $url="page-login.html";
}

include_once "mess.html";


















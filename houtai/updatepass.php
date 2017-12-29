<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/12/19
 * Time: 19:40
 */
$user=$_POST['user'];
$pass=$_POST['pass'];

include_once "public.php";
$db->query('set names utf8');
$sql="update user set pass='$pass' where zhanghao='$user'";
$result=$db->query($sql);


if($result){
    echo '成功';
}else{
    echo '失败';
}
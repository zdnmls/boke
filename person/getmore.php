<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/12/25
 * Time: 17:41
 */
header("content-type:text/html;charset=utf8");
include_once '../houtai/public.php';

$id=$_GET['id'];
$db->query("set names utf8");
$sql="select * from content where pid=$id order by count desc limit 6";
$result=$db->query($sql);
$row=$result->fetch_all(MYSQLI_ASSOC);
$arr=json_encode($row);
echo $arr;
?>
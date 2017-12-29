<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/12/25
 * Time: 19:49
 */
$id=$_GET['id'];
$len=$_GET['len'];
header("content-type:text/html;charset=utf8");
include_once '../houtai/public.php';

$db->query("set names utf8");
$sql="select * from content where pid=$id order by count desc limit $len,1";
$result=$db->query($sql);
$arr=$result->fetch_assoc();
echo json_encode($arr);

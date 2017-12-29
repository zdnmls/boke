<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/12/25
 * Time: 19:47
 */

header("content-type:text/html;charset=utf8");
include_once '../houtai/public.php';

$id=$_GET['id'];
$db->query("set names utf8");
$sql="select * from content where pid=$id order by count desc limit 4";
$result=$db->query($sql);
$arr=$result->fetch_all(MYSQLI_ASSOC);
echo json_encode($arr);
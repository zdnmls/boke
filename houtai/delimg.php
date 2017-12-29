<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/12/21
 * Time: 22:48
 */
$id=$_GET['id'];
include_once "public.php";
$db->query("set names utf8");
$sql="delete from img where id=$id";
$result=$db->query($sql);
if($result )
$mess="删除成功";
$url="img4.php";


include_once 'mess.html';

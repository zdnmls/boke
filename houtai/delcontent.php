<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/12/22
 * Time: 11:45
 */
$id=$_GET['id'];
include_once "public.php";
$db->query("set names utf8");
$sql="delete from content where id='$id'";
$result=$db->query($sql);
$mess="删成功";
$url="contenttable.php";

include_once "mess.html";
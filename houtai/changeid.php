<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/12/21
 * Time: 15:36
 */
$id=$_GET['id'];
$values=$_GET['values'];


include_once "public.php";
$db->query("set names utf8");
$sql="update categroy set id= '$values' where id='$id'";
$result=$db->query($sql);
echo $db->affected_rows;
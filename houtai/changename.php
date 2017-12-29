<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/12/21
 * Time: 15:15
 */
$id=$_GET['id'];
$values=$_GET['values'];
echo  json_encode($id,$values);
include_once "public.php";
$db->query("set names utf8");
$sql="update categroy set name='$values' where id='$id'";
$result=$db->query($sql);
echo $db->affected_rows;
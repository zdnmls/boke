<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/12/21
 * Time: 11:29
 */
header("content-type:text/html;charset=utf8");
$values=$_GET['values'];
include_once "public.php";
$db->query("set names utf8");
$sql="insert into `categroy`(name) values ('$values')";
$result=$db->query($sql);
//$row=$result->fetch_assoc();
if($result){
    echo $db->insert_id;
} else{
    echo 'no';
}
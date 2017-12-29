<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/12/27
 * Time: 16:08
 */
header("content-type:text/html;charset=utf8");
$host='localhost';
$username="root";
$passwd="";
$dbname="wui1708";
$port=3306;
$db=new mysqli($host,$username,$passwd,$dbname,$port);
//$db->query("set user utf8");
$db->query("set names utf8");
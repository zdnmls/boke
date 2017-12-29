<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/20 0020
 * Time: 下午 5:56
 */

header("content-type:text/html;charset=utf8");
include_once "public.php";
$db->query("set names utf8");
$sql="select * from img";
$result=$db->query($sql);
$arr=$result->fetch_all(MYSQLI_ASSOC);

?>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<style>
    #form{
        width: 40%;
        padding: 40px;
    }
</style>
<body>
<form id="form" action="addimgsql.php" method="post"; enctype="multipart/form-data" >
    <div class="form-group">
        <label for="des">添加标题</label>
        <input type="text" name="des" class="form-control" placeholder="请添加标题" required>
    </div>
    <div class="form-group">
        <label for="name">添加内容</label>
        <textarea class="form-control" name="content"  placeholder="添加内容"></textarea>
    </div>
    <div class="form-group">
        <label for="name">个数</label>
        <input type="text" name="count" class="form-control" placeholder="请添加个数" required>
    </div>
    <div class="form-group">
        <label for="img">添加图片</label>
        <input type="file" name="faa[]" multiple id="img">
    </div>
    <button type="submit" class="btn btn-primary">提交</button>
</form>

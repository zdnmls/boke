<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/12/21
 * Time: 18:11
 */

header("content-type:text/html;charset=utf8");
include_once "public.php";
$db->query("set names utf8");
$sql="select * from webset";
$result=$db->query($sql);
$row=$result->fetch_assoc();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<style>
    #form{
        width: 40%;
        padding: 40px;
    }
</style>
<body>
    <form action="changewebset.php" method="post" enctype='multipart/form-data' id="form">
        <div class="form-group">
            <label for="title">网站标题</label>
            <input type="text" name="title" class="form-control" id="title" value="<?php echo $row['title']?>" required>
        </div>
        <div class="form-group">
            <label for="author">网站作者</label>
            <input type="text" name="author" class="form-control" value="<?php echo $row['author']?>" id="author"
                   required>
        </div>
        <div class="form-group">
            <label for="img">logo</label>
            <input type="file" id="img" name="fa[]" multiple>
        </div>
        <div class="form-group">
            <label for="content">作者简介</label>
            <textarea class="form-control" type="content" name="authordes"><?php echo $row['authordes']?>"</textarea>
        </div>
        <button type="submit" class="btn btn-default">提交</button>
    </form>
</body>
</html>

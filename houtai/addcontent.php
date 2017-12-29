<?php
header('content-type:text/html;charset=utf8');
include_once "public.php";
$db->query("set names utf8");
$sql="select * from categroy";
$result=$db->query($sql);
$arr=$result->fetch_all(MYSQLI_ASSOC);

//遍历arr并str打印
$str="";
foreach ($arr as $item){
    $str.="<option value='{$item['id']}'>{$item['name']}</option>";
//    echo $str;
}
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
<form action="addcontent11.php" method="post" enctype='multipart/form-data' id="form">
    <div class="form-group">
        <label for="sel">请选择类别</label>
        <select class="form-control" id="sel" name="pid">
        <?php echo $str?>
        </select>
    </div>
    <div class="form-group">
        <label for="title">请输入标题</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="请输入文章标题" required>
    </div>
    <div class="form-group">
        <label for="file">上传图片</label>
        <input type="file" id="file" name="faa[]" multiple>
    </div>
    <div class="form-group">
        <label for="content">文章内容</label>
<!--        <input type="content" name="content" class="form-control" id="content"placeholder="请输入文章内容">-->
        <textarea class="form-control" rows="3" type="content" name="content" class="form-control" id="content"></textarea>
    </div>
    <button type="submit" class="btn btn-default">提交</button>
</form>



</body>
</html>
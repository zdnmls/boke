<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/12/22
 * Time: 12:04
 */


header("content-type:text/html;charset=utf8");
$id=$_GET['id'];
include_once "public.php";
$db->query("set names utf8");
$sql="select * from content where id=$id";
$row=$db->query($sql)->fetch_assoc();



$sql2="select * from categroy";
$result=$db->query($sql2);
$arr=$result->fetch_all(MYSQLI_ASSOC);

$str='';
foreach ($arr as $item){

    if($item['id']==$row['pid']){
        $str.="<option value='{$item['id']}' selected>{$item['name']}</option>" ;
//
    }else{
        $str.="<option value='{$item['id']}'>{$item['name']}</option>";
    }
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
    form {
        width: 60%;
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        margin: 0 auto;
        margin-top: 120px;
    }

    .btn {
        padding: 8px 35px;
    }
</style>
<body>

<form action="addcontent11.php" method="post"; enctype="multipart/form-data" >
    <div class="form-group">
        <label for="name">更改类别</label>
        <select class="form-control" name="pad">
            <?php echo $str?>

        </select>
    </div>

    <div class="form-group">
        <label for="name">ID</label>
        <input type="text" name="id" value="<?php echo $row['id']?>" class="form-control" id="name" readonly required>
    </div>
    <div class="form-group">
        <label for="name">更改标题</label>
        <input type="text" name="title" value="<?php echo $row['title']?>" class="form-control" id="name" placeholder="请输入类别名称" required>
    </div>

    <div class="form-group">
        <label for="name">更改内容</label>
        <textarea class="form-control" name="content" value=""><?php echo $row['content'];?></textarea>
    </div>
    <div class="form-group">
        <label for="img">更改图片</label>
        <input type="file" name="faa[]" multiple id="img">
    </div>
    <button type="submit" class="btn btn-primary">提交</button>
</form>

</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/12/21
 * Time: 23:17
 */
$id=$_GET['id'];
include_once "public.php";
$db->query("set names utf8");
$sql="select * from img where id=$id";
$result=$db->query($sql);
$row=$result->fetch_assoc();
//echo json_encode($row)
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
<form id="form" action="addimg.php" method="post"; enctype="multipart/form-data" >

    <div class="form-group">
        <label for="name">ID</label>
        <input type="text" name="id" value="<?php echo $row['id']?>" class="form-control" id="name" readonly required>
    </div>
    <div class="form-group">
        <label for="name">更改标题</label>
        <input type="text" name="title" value="<?php echo $row['des']?>" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="count">更改count</label>
        <input type="text" name="count" value="<?php echo $row['count']?>" class="form-control" required>
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





















<?php
include_once '../houtai/public.php';
$db->query("set names utf8");
$sql="select * from content ORDER by count desc limit 5";
$result=$db->query($sql);
$row=$result->fetch_assoc();
//echo json_encode($arr);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>详情1</title>
    <script src="js/jquery.js"></script>
    <script src="js/rem.js"></script>
    <link rel="stylesheet" href="demo.css">
</head>
<style>
    .box{
        position: fixed;
        top: 0;
        left: 0;
    }
    .title{
        margin-top: .7rem;
        white-space: nowrap;
        text-overflow:ellipsis;
        -o-text-overflow:ellipsis;
        padding-left:0rem;
        overflow: hidden;
    }
    .img {
        margin-bottom: .3rem;
    }
</style>
<body>
<div class="box">
    <p><a href="index.php">博客</a></p>
    <p>图片</p>
</div>
<!---->
<h3 class="title"><?php echo $row['title']?></h3>
<div>
    <?php
        $arr=explode('--',$row['img']);
        foreach ($arr as $item){
        echo "<div class='img'><img src='$item'></div>";
    }
    ?>
</div>
<div class="word1"><?php echo $row['content']?></div>
</body>
</html>
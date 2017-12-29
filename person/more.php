<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/12/26
 * Time: 15:03
 */
$id=$_GET['id'];
//echo $id;
$count=$_GET['count'];
include_once '../houtai/public.php';

$db->query("set names utf8");
$sql="select * from content where id=$id";
$sql1="update content set count=count+1 where id=$id";
$row1=$db->query($sql1);
$result=$db->query($sql);
$row=$result->fetch_assoc();
//var_dump($row);
//exit();
//echo $sql;
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="js/jquery.min.js"></script>
    <script src="js/rem.js"></script>
    <style>
        *{
            margin: 0;
            padding: 0;
            list-style: none;
            font-size: 16px;
            text-decoration: none;
        }
        a{
            color: #0c1312;
        }
        header{
            background: #fff;
            height: 1rem;
            display: flex;
            justify-content: space-between;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
        }
        header a{
            font-size:.8rem;
        }
        header span{
            text-align: center;
            line-height: 1rem;

        }
        .wenzhang {
            font-size: 0.3rem;
            color: #fff;
            line-height: 1rem;
            padding-left: 0.2rem;
            text-align: center;

        }
        .gengduo{
            font-size: 0.5rem;
            font-weight: bold;
            color: #0c1312;
            line-height: 0.7rem;
            float: right;
            padding-right: 0.2rem;
        }
        .title{
            margin-top: 0.1rem;
            display: flex;
            justify-content: center;
            font-size: 0.3rem;
            color: #000;
            padding: .2rem;
            margin-top: 1.2rem;
        }
        .time{
            display: flex;
            justify-content: space-between;
            padding: 0.2rem 0.2rem;
            color: #999999;

        }
        .time span:nth-child(2){
            color: red;
        }
        .content{
            padding: 0.2rem 0.2rem;
            color: #666666;
            line-height: 0.4rem;
        }
        .img{
            box-sizing: border-box;
            padding: .1rem .1rem;
            width: 100%;
            margin: 0 auto;
        }
        .img img{
            width: 100%;
        }
        p{
            line-height: .6rem;
            height: auto;
            margin-bottom: 1rem;
        }
        .com{
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 1rem;
            background-color: #e9e9e9;
        }
        .com input{
            width: 50%;
            height: 70%;
            border-radius:.5rem;
            border: 0;
            text-indent: .5rem;
            margin: .15rem;
            font-size: .3rem;
            color: #0c1312;
        }
    </style>
</head>
<body>

<header>
    <div class="wenzhang"><a href="index.php">&lt;</a></div>
    <span>我的博客</span>
    <div class="gengduo">. . .</div>
</header>

<article>
    <div class="title">
        <?php echo $row['title']?>

    </div>
    <div class="time">
        <span><?php echo $row['time']?></span>&nbsp;<span>浏览量：<?php echo $row['count']?>次</span>
    </div>

</article>
<div class="content">
    <?php
    $arr=explode('--',$row['img']);
    foreach ($arr as $item){
        echo "<div class='img'><img src='$item'></div>";
    }

    ?>
    <p>
        <?php echo $row['content']?>
    </p><br>
</div>
<form class="com" action="" name="com" maxlenght="100" autocomplete="on">
    <input type="text" placeholder="写评论...">
</form>

</body>
</html>


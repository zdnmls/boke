<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/12/21
 * Time: 19:22
 */
header('content-type:text/html;charset=utf8');
include_once "public.php";
$db->query("set names utf8");
$sql="select * from img";
$result=$db->query($sql);
$row=$result->fetch_all(MYSQLI_ASSOC);
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
    tr{
        width: auto;
    }
    tr td{
        width: auto;
    }
</style>
<body>
<div class="col-md-12">
    <!-- BASIC TABLE -->
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">img Table</h3>
        </div>
        <div class="panel-body">
            <table class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>描述</th>
                    <th>个数</th>
                    <th>时间</th>
                    <th>内容</th>
                    <th>图片</th>
                    <th><pid></pid></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($row as $item)  : ?>
                    <tr>
                        <td class="id"><?php echo $item['id']   ?></td>
                        <td class="name"><?php echo $item['des']   ?></td>
                        <td class="name"><?php echo $item['count']   ?></td>
                        <td class="name"><?php echo $item['time']   ?></td>
                        <td class="name"><?php echo $item['content']   ?></td>
                        <td class="name"><?php
                            $brr=explode('--',$item['img']);
                            foreach ($brr as $i){
                                echo "<img width='40'  src='$i'>";
                            }
                            ?>
                        </td>
                        <td>
                            <a href="delimg.php?id=<?php echo $item['id']?>"><span class='text-danger'>删除</span></a>
                            <a href="changeimg.php? id=<?php echo $item['id']?>"><span
                                        class='text-info'>修改</span></a>
                        </td>

                    </tr>
                <?php endforeach;?>

                </tbody>

            </table>
<!--            <a href="" style="width: 60px ;margin:0 auto;display: block; text-align: center;padding: 8px ;" class="btn btn-info add">增加</a>-->
        </div>
    </div>
    <!-- END BASIC TABLE -->
</div>


</body>
</html>

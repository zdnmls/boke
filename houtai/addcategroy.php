<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/12/20
 * Time: 8:43
 */
$values=$_GET['values'];
header("content-type=text/html;charset=utf8");
include_once "public.php";
$db->query("set names utf8");
$sql="insert into `categroy` (name) values ('$values');";
$result=$db->query($sql);
//$row=$result->fetch_assoc();
if($result){
    echo $db->insert_id;
} else{
    echo 'NONONO';
}
//$id=$_GET['id'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/vendor/jquery/jquery.validate.min.js"></script>
    <script src="assets/vendor/jquery/messages_zh.js"></script>

</head>
<style>
    .form-horizontal{
        width: 60%;
        padding: 20px;
    }
    button{
        padding: 0;
        margin: 0;
    }
    .col-sm-offset-2{
        margin-left: 0;
    }
    .myhidden{
        width: 200px;
        height: 100px;
        background: rgba(165, 169, 160, 0.8);
        border-radius: 5%;
        border: 1px solid #333333;
        position: fixed;
        left: 50%;
        margin-left: -100px;
        top:200px;
        z-index: 111;
        overflow: hidden;
        text-align: center;
        line-height: 100px;
        display: none;
        text-shadow: 2px 2px #EFEFEF, 1px 0px #AEE2D9
    }
</style>
<body>
<div class="myhidden">添加成功！</div>
<form class="form-horizontal" id="myfrom";>
    <div class="form-group">
        <label for="uesr" class="col-sm-2 control-label">用户:</label>
        <div class="col-sm-5">
            <input type="email" class="form-control" id="user" name="user"; value="<?php echo $id?>" readonly>
        </div>
    </div>
    <div class="form-group">
        <label for="uesr" class="col-sm-2 control-label">name：</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="name" name="user";  required >
            <button type="button" style="width: 60px ;margin:20px auto;display: block; text-align: center;" class="btn btn-info add">提交</button>
        </div>
    </div>

</form>
</html>
<script>
    $('.add').click(function () {
        let id=$('#user').val();
        let values=$('#name').val()
        console.log(id,values);
        $.ajax({
            url:"changename.php",
            dataType:"json",
            data:{id,values},
            success:function (res) {
                if(res==1){
                    $('.hidden').slideDown(300).delay(1000).slideUp(300,function () {
                        location.href='type.php';
                    });
                }
                else{
                    alert("失败");
                }
            }
        })
    })
</script>

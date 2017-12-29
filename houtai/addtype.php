<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/12/20
 * Time: 13:06
 */
header("content-type:text/html;charset=utf8");
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
    <script src="assets/vendor/jquery/jquery.js"></script>
    <script src="assets/vendor/jquery/jquery.validate.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendor/jquery/messages_zh.js"></script>
</head>
<style>
    *{
        margin:0;
        padding: 0;
    }
    .form-horizontal{
        overflow: hidden;
        height: 100%;
    }
    form{
        margin-top: 60px;
        position: relative;
    }
    #passtwo-error,#pass-error{
        color:red;opacity: 0.8;
    }
    .myhidden{
        position:absolute;
        left:0;right: 0;
        top:-40%;bottom: 0px;
        margin:auto;
        z-index: 1000;
        color:#fff;
        font-size: 26px;
        border-radius: 10px;
        text-align: center;
        line-height: 80px;
        width: 200px;height: 80px;
        background: rgba(35,195,170,0.8);
        display: none;
        text-shadow: 1px 1px #EFEFEF, 1px 0px #AEE2D9
    }
    body{
        position: relative;
    }


</style>
<body>
<div class="myhidden">添加成功！</div>
<form class="form-horizontal" id="myfrom";>

    <div class="form-group">
        <label for="uesr" class="col-sm-2 control-label">name：</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="user" name="user";  required >
            <button type="button" style="width: 60px ;margin:20px auto;display: block; text-align: center;" class="btn btn-info add">增加</button>
        </div>
    </div>

</form>
</body>
</html>
<script>
    $('.add').click(function () {
        let values = $('.form-control').val()
        console.log(values);
        $.ajax({
            url: 'add.php',
            dataType: 'json',
            method: 'get',
            data: {values},
            success: function (res) {
                if (res != NaN) {
                    $('.myhidden').slideDown(400).delay(1000).slideUp(400, function () {
                        location.href = 'type.php';
                    });
                }
                else {
                    alert('添加失败');
                }


            }
        });
});
</script>

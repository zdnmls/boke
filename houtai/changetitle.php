<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/12/20
 * Time: 8:43
 */

$id=$_GET['id'];
header('content-type:text/html;charset=utf8');
//echo json_encode($id)
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
    body{
        position: relative;
    }
    .myhidden{
        position:absolute;
        left:0;right: 0;
        bottom: 0px;
        margin:auto;
        z-index: 1000;
        color:#000;
        font-size: 20px;
        border-radius: 10px;
        text-align: center;
        line-height: 80px;
        width: 200px;height: 80px;
        background: skyblue;
        display: none;
    }
</style>
<body>
<div class="myhidden">添加成功！</div>
<form class="form-horizontal" id="myfrom";>
    <div class="form-group">
        <label for="uesr" class="col-sm-2 control-label">id:</label>
        <div class="col-sm-5">
            <input type="email" class="form-control" id="user" name="user" value="<?php echo $id?>" readonly>
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
        $.ajax({
            url:"changename.php",
            dataType:"json",
            data:{id,values},
            success:function (res) {
                if(res==1){
                    $('.myhidden').slideDown(400).delay(500).slideUp(400,function () {
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

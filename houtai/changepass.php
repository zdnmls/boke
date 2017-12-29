<?php
header("content-type:text/html;charset=utf8");
//    include_once "";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/jquery/jquery.validate.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/vendor/jquery/messages_zh.js"></script>
</head>
<style>
    form{
        padding: 50px 50px;
    }
    .form-group{
        width: 80%;
        margin-top: 20px;
        padding-bottom: 40px;
    }
    label.error{
        color: #0AA6E8;
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
<form id="myform" class="form-horizontal">
<div class="myhidden">修改成功</div>
        <div class="form-group">
            <label for="user" class="col-sm-2 control-label">user:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="user" name="user" value="<?php echo $_SESSION['user']?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="pass" class="col-sm-2 control-label">Pass:</label>
            <div class="col-sm-10">
                <input type="password" name="pass" class="form-control" id="pass" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <label for="passtwo" class="col-sm-2 control-label">Passtwo:</label>
            <div class="col-sm-10">
                <input type="password" name="passtwo" class="form-control" id="passtwo" placeholder="Passwordtwo">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">提交</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>
<script>
    $('#myform').validate({
        rules:{
            pass:{
                required:true,
                minlength:6,
                maxlength:10
            },
            passtwo:{
                // required:true,
                equalTo:'#passtwo'
            }
        },
        messages:{
            pass:{
                required:"请输入密码",
                minlength:"请输入最少6位数",
                maxlength:"请输入最多10位数"

            },
            passtwo:{
                required:"请输入密码",
                equalTo:"两次密码不一致"
            }
        },
        submitHandler() {
            // console.log($('#myform').serialize());
            $.ajax({
            url:'updatepass.php',
            data:$('#myform').serialize(),
            type:'post',
            success:function () {
                $('.myhidden').slideDown(400).delay(1000).slideUp(410);
                $('.myhidden').click(function (e) {
                    e.preventDefault();
                    $('.myhidden').toggle();
                })
            }
        })
        }
    })
</script>

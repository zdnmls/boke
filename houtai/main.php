<?php
header("content-type:text/html;charset=utf8");
session_start();
if(!isset($_SESSION['user'])){
    $mess='请先登录';
    $url='page-login.html';
    include_once 'mess.html';
    exit;
}
?>
session_start();



<!doctype html>
<html lang="en">
<head>
    <title>Dashboard | Klorofil - Free Bootstrap Dashboard Template</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/vendor/linearicons/style.css">
    <link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>


    <script src="assets/scripts/klorofil-common.js"></script>

</head>
<body>
<style>
    iframe{
        width: 100%;
        height: 100%;
    }
    .main{

    }

</style>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="brand">
            <a href="index.html"><img src="assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
        </div>
        <div class="container-fluid">
            <div class="navbar-btn">
                <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
            </div>

            <div class="navbar-btn navbar-btn-right">
                <span style="padding-right: 15px;letter-spacing: 1px">admin</span>
                <a class="btn btn-success update-pro" href="main.php" title="Upgrade to Pro" ><i class="fa
                fa-rocket"></i> <span>个人博客的世界</span></a>
            </div>
            <div id="navbar-menu">

            </div>
        </div>
    </nav>
    <div id="sidebar-nav" class="sidebar">
        <div class="sidebar-scroll">
            <nav>
                <ul class="nav">
                    <li><a href="" class="" ><i class="lnr lnr-home"></i> <span>主页 </span></a></li>
                    <li><a href="changepass.php" target="content"><i class="lnr lnr-code"></i> <span>修改密码</span></a></li>
                    <li><a href="type.php" target="content"><i class="lnr lnr-chart-bars"></i> <span>分类管理</span></a></li>
                    <li><a href="addtype.php" target="content"><i class="lnr lnr-cog"></i> <span>增加分类</span></a></li>
                    <li>
                        <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>博客管理</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                        <div id="subPages" class="collapse ">
                            <ul class="nav">

                                <li><a href="contenttable.php" target="content" class="">查看</a></li>
                                <li><a href="addcontent.php" target="content" class="">添加</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="contenttable.php" target="content"><i class="lnr lnr-alarm"></i> <span>内容展示</span></a></li>

                    <li><a href="webset.php" target="content"><i class="lnr lnr-dice"></i>
                            <span>网站管理</span></a></li>
<!--                    <li><a href="typography.html" class=""><i class="lnr lnr-text-format"></i> -->
<!--                            <span>图片管理</span></a></li>-->
                    <li>
                        <a href="#subPages1" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>图片管理</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                        <div id="subPages1" class="collapse ">
                            <ul class="nav">
                                <li><a href="img4.php" target="content" class="">图片列表</a></li>
                                <li><a href="addimg.php" target="content" class="">添加图片</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="" class=""><i class="lnr lnr-linearicons"></i> <span>Icons</span></a></li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="main" style=" padding-top: 60px;height: 100%;">
        <!-- MAIN CONTENT -->
        <iframe src="" frameborder="0" name="content"></iframe>

        <!-- END MAIN CONTENT -->
    </div>
</div>
</body>
<script>

</script>
</html>


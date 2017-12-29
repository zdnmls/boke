<?php


include_once "public.php";
$db->query('set names utf8');
$sql="select * from categroy ORDER by id";
$result=$db->query($sql);
$arr=$result->fetch_all(MYSQLI_ASSOC);
//echo json_encode($arr);
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/12/20
 * Time: 11:27
 */
?>


<!doctype html>
<html lang="en">
<head>
    <title>Typography | Klorofil - Free Bootstrap Dashboard Template</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <script src="assets/vendor/jquery/jquery.js"></script>
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendor/linearicons/style.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="assets/css/demo.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
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
<div class="myhidden">vfeuihUINFVJSUIwj</div>

<div class="col-md-6">
    <!-- BASIC TABLE -->
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">分类</h3>
        </div>
        <div class="panel-body">
            <table class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>操作</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($arr as $item)  : ?>
                    <tr>
                        <td class="id"><?php echo $item['id']   ?></td>
                        <td class="name"><?php echo $item['name']   ?></td>
                        <td>
                            <a href="delate.php? id=<?php echo $item['id']?>"><span class='text-danger'>删除&nbsp; </span></a>
                            <a href="changetitle.php? id=<?php echo $item['id']?>"><span class='text-info'> &nbsp;修改</span></a>
                        </td>

                    </tr>
                <?php endforeach;?>

                </tbody>

            </table>
            <a href="addtype.php" style="width: 80px ;margin:0 auto;display: block; text-align: center;" class="btn btn-info add">增加</a>
        </div>
    </div>
    <!-- END BASIC TABLE -->
</div>
</body>
</html>

<script>
    $('tbody').on('click','.id',function (e) {
        let vals=$(this).text();
        $(this).html("");


        $('<input>').val(vals).appendTo($(this)).focus().blur(function () {
            let par=$(this).parent();
            if( $("<input>").val==vals){

                par.html(vals);
            }
            else {
                let values=$(this).val();

                let id=vals;

                console.log(values,par);
                $.ajax({
                    url:"changeid.php",
                    dataType:'json',

                    data:{id,values},
                    success:function (res) {
                        console.log(res);
                        if(res==1){
                            // par.html(values);
                            location.href='types.php';


                        }
                        else{
                            par.html(vals);
                            // location.href='changeid.php';

                        }
                    }
                });
            }

        }).click(function (e) {
            e.stopPropagation();
        })


    }).on('click','.name',function () {
        let vals=$(this).text();

        $(this).html("");


        $('<input>').val(vals).appendTo($(this)).focus().blur(function () {
            let par=$(this).parent();
            if( $("<input>").val==vals){

                par.html(vals);
            }
            else {
                let values=$(this).val();

                let id=par.prev().text();


                $.ajax({
                    url:"changename.php",
                    dataType:'json',

                    data:{id,values},
                    success:function (res) {
                        console.log(res);
                        if(res==1){
                            // par.html(values);

                            location.href='type.php';


                        }
                        else{
                            par.html(vals);
                            // location.href='changeid.php';

                        }
                    }
                });
            }

        }).click(function (e) {
            e.stopPropagation();
        })
    })



</script>

<?php

include_once '../houtai/public.php';
$db->query("set names utf8");
$sql="select * from categroy";
$result=$db->query($sql);
$row=$result->fetch_all(MYSQLI_ASSOC);
//echo json_encode($row);


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
    <script src="js/iscroll.js"></script>
    <script src="js/ft-carousel.min.js"></script>
    <script src="js/swiper.min.js"></script>
    <script src="js/demo.js"></script>
    <script src="js/rem.js"></script>
    <script src="js/navbarscroll.js"></script>
    <script src="js/demoUtils.js"></script>

    <link rel="stylesheet" href="css/swiper.min.css">
    <link rel="stylesheet" href="demo.css">
    <link rel="stylesheet" href="css/ft-carousel.css">
    <style>
        html, body {
            position: relative;
            height: 100%;
            margin: 0;
            padding: 0;
            list-style: none;
        }
        a{
            list-style: none;
            color: #fff;
        }
        body {
            background: #eee;
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 14px;
            color:#000;
            margin: 0;
            padding: 0;
        }
        .swiper-container {
            width: 100%;
            height:80%;
        }
        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            height:100px;
            /*line-height:100px;*/
            /* Center slide text vertically */
            /*display: -webkit-box;*/
            /*display: -ms-flexbox;*/
            /*display: -webkit-flex;*/
            /*display: flex;*/
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            /*justify-content: space-between;*/
        }
        .swiper-slide-active{
            height: 200px;
        }
        .refresh{
            position:absolute;
            line-height:100px;
            bottom:100%;
            text-align:center;
            width:100%;
        }
        .loadmore{
            position:absolute;
            line-height:50px;
            top:100%;
            text-align:center;
            width:100%;
        }
        .active{
            color: #0AA6E8;
        }
        .slideimg{
            width:100%;
            height:1.2rem;
        }
        .slidecount{
            width:40% ;
            height: .2rem;
            padding: .2rem;
            color: red;
            font-size: .3rem;

        }
        .slidetime{
            width:60% ;
            height: .2rem;
            padding: .2rem;
            /*background-color: #4bba4a;*/
            font-size: .3rem;
        }
        .slidetitle{
            width: 100%;
            height: .8rem;
            font-size: .3rem;
            color: #0c1312;
            line-height: .4rem;
            overflow: hidden;
            padding: .2rem;
            white-space: nowrap;
            text-overflow:ellipsis;
            -o-text-overflow:ellipsis;
        }
        .aa{
            display: flex;
            justify-content: space-between;
            height:.5rem;
        }
        .zhao{
            position:fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.5);
            display: none;
        }
        .zhao img{
            margin:auto;
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
        }
    </style>
</head>
<body onload=loaded()>
<div class="box">
    <p><a href="index.php">博客</a></p>
    <p><a href="banner.php">图片</a></p>
</div>
<div class="zhao">
    <img src="img/01878e59dc76dba8012044638a49aa.gif" alt="">
</div>
<div id="wrapper">
    <div id="scroller">
        <ul>
            <?php
            foreach ($row as $item){
                ?>
                <li class="nav" id="<?php echo $item['id']?>"><?php echo $item['name']?></li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>
<div class="swiper-scrollbar" style=""><div class="swiper-scrollbar-drag"></div></div>
</div>
</body>


<!--js   部分-->


<script type="text/javascript">
    $('.nav').eq(0).addClass('active');//添加默认样式active
    localStorage.indexs=0;
    $('#scroller').on('click','.nav',function () {
    $(this).addClass('active').siblings().removeClass('active');
    localStorage.indexs=$(this).index;
    $('.swiper-container').remove();
    data();
})
    data();
function data() {
    let id = $('.active').attr('id');
    console.log(id);
    $.ajax({
        url: "getmore.php",
        data: {id: id},
        dataType: "json",
        beforeSend:function () {
            $('.zhao').show();
        },
        success: function (res) {
            $('.zhao').hide();
            console.log(res);
            $.ajax({
                url: "getbanner.php",
                data: {id: id},
                dataType: "json",
                success: function (ban) {
                    let str = '';
                    let body = $('<div class="swiper-container swiper-container-vertical swiper-container-free-mode swiper-container-android">').appendTo(document.body);
                    str += `<div class="swiper-wrapper" style="height: 2000px; transition-duration: 300ms; transform: translate3d(0px, 0px, 0px);">
                           <div class="refresh">刷新完成</div>
                  `;
//                  let btr='';
                    str += `<div class="swiper-slide swiper-slide-active aaa" style="height: 180px; overflow: hidden;">
                      <div class="example" style="margin: 0; width: 7.8rem;">
                        <div class="ft-carousel" id="carousel_1">
                        <ul class="carousel-inner">`;
                    ban.forEach(function (val) {
                        let imgs = val.img;
                        let imgs1 = imgs.split('--');
                        str += ` <li class="carousel-item" style="width: 100%;height: 100%;"><img src="${imgs1[0]}"
                               style="width:
                               100%"
                               ></li>`;
                    })
                    str += `</ul>
                </div>
            </div>

        </div>`;
                    res.forEach(function (res1) {    //首页列表样式
                    // console.log(res1)
                        let imgs = res1.img;
                        let imgs1 = imgs.split('--');
                        str += `<div class="swiper-slide" style="height: 3rem">
                            <a href="more.php?id=${res1.id}&count=${res1.count}"><div
                            class="slidetitle">${res1
                            .title}</div></a>

                                    <div class="slideimg" style="display: flex;justify-content: space-around">
                                        <img src="${imgs1[0]}" style="height: 1.3rem;width: 2.2rem;
                                        overflow:
                                        hidden;display: block;padding-left: .1rem;">
                                        <img src="${imgs1[1]}" style="height: 1.3rem;width: 2.2rem;
                                        overflow:
                                        hidden;display: block;padding-left: .1rem;">
                                        <img src="${imgs1[2]}" style="height: 1.3rem;width: 2.2rem;
                                        overflow:
                                        hidden;display: block;padding-left: .1rem;">
                                    </div>
                                    <div class="aa">
                                        <div class="slidetime">时间：${res1.time}</div>
                                        <div class="slidecount">浏览数：${res1.count}次</div>
                                    </div>

                        </div>`;
                    })
                    str += `<div class="loadmore">加载更多</div>`;
                    str += `</div>
    <div class="swiper-scrollbar" style="height: 3rem">
    <div class="swiper-scrollbar-drag" style="transform: translate3d(0px, 0px, 0px); transition-duration: 300ms; height: 86.944px;"></div>
    </div>`;
                    body.html(str);
                    $("#carousel_1").FtCarousel();

                    refreshEnd = false;
                    times = 0;//加载次数
                    oriSpeed = 300;
                    var swiper = new Swiper('.swiper-container', {
                        speed: oriSpeed,
                        slidesPerView: 'auto',
                        freeMode: true,
                        direction: 'vertical',
                        setWrapperSize: true,
                        scrollbar: {
                            el: '.swiper-scrollbar',
                        },
                        on: {
                            //下拉释放刷新
                            touchEnd: function () {
                                swiper = this;
                                refreshText = swiper.$el.find('.refresh');
                                if (this.translate > 50) {
                                    swiper.setTransition(this.params.speed);
                                    swiper.setTranslate(50);
                                    swiper.touchEventsData.isTouched = false;//跳过touchEnd事件后面的跳转(4.0.5)
                                    refreshText.html('刷新中')
                                    swiper.allowTouchMove = false;

                                    // location.reload();
                                    $('.swiper-container').remove();
                                    data();
                                    refreshText.html('刷新完成');
                                    refreshEnd = true;
                                    swiper.allowTouchMove = true;
                                }
                                loadmore = swiper.$el.find('.loadmore');
                                slideHeight = 0;
                                for (let h = 0; h < swiper.slides.length; h++) {
                                    slideHeight += swiper.slides[h].offsetHeight;
                                }
                                endTranslate = this.height - slideHeight - 50;
                                if (this.translate < endTranslate) {
                                    swiper.setTranslate(endTranslate);
                                    swiper.allowTouchMove = false;
                                    swiper.params.virtualTranslate = true;
                                    loadmore.html('正在加载');
                                    let len = $('.swiper-wrapper > .swiper-slide').size() - 1;
                                       console.log(len);
                                    $.ajax({
                                        url: "loadmore.php",
                                        data: {id: id, len: len},
                                        dataType: "json",
                                        success: function (aaa) {
                                            if (!aaa) {
                                                loadmore.html("没有更多了");
                                                setTimeout(function () {
                                                    swiper.params.virtualTranslate = false;
                                                    swiper.allowTouchMove = true;
                                                }, 1000)
                                            }
                                            else {   //如果还有内容
                                                let imgs = aaa.img;
                                                let imgs1 = imgs.split('--');
                                                swiper.appendSlide(
                                                    `<div class="swiper-slide" style="font-size:
                                                        .3rem;height:3rem;"><a href="more.php?id=${aaa.id}&count=${aaa.count}"><div         class="slidetitle">${aaa.title}</div></a>
                                                        <div class="slideimg" style="display: flex;justify-content: space-around">
                                                            <img src="${imgs1[0]}" style="height: 1.3rem;width: 2.2rem;
                                                            overflow:
                                                            hidden;display: block;padding-left: .1rem;">
                                                            <img src="${imgs1[1]}" style="height: 1.3rem;width: 2.2rem;
                                                            overflow:
                                                            hidden;display: block;padding-left: .1rem;">
                                                            <img src="${imgs1[2]}" style="height: 1.3rem;width: 2.2rem;
                                                            overflow:
                                                            hidden;display: block;padding-left: .1rem;">
                                                        </div>
                                                        <div class="aa">
                                                            <div class="slidetime">时间：${aaa.time}</div>
                                                            <div class="slidecount">浏览数：${aaa.count}</div>
                                                        </div>
                                                    </div>`);
                                                swiper.params.virtualTranslate = false;
                                                swiper.allowTouchMove = true;
                                            }

                                        }
                                    })
                                }
                            },
                            touchStart: function () {
                                if (refreshEnd == true) {
                                    this.$el.find('.refresh').html('释放刷新');
                                    refreshEnd = false;
                                }
                                if (swiper.params.virtualTranslate == false) {
                                    swiper.allowTouchMove = true;
                                    this.$el.find('.loadmore').html('释放加载');
                                }
                            },
                        }
                    });

                }
            })
        }
    })
}
    var swiper = new Swiper('.swiper-container1', {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
    //banner
        $("#carousel_1").FtCarousel();
    // title  js

        var myScroll;
        function loaded () {
            myScroll = new IScroll('#wrapper', { eventPassthrough: true, scrollX: true, scrollY: false, preventDefault: false });
        }
</script>
</html>























<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/12/20
 * Time: 17:30
 */

//上传图片
//date_default_timezone_set('Asia/shanghai');
$url=$_SERVER["REQUEST_URI"];
//echo $url;
$arr=$_FILES['fa'];
$type=['image/png','image/gif','image/jpeg'];//规定图片格式
$size=1024*1024*1;
$t=$arr['type'];//arr的type属性数组赋值给$t；
$s=$arr['size'];//规定图片大小
$path='upload';
foreach ($t as $item){
//    判断在不在数组 in_array
//   var_dump(in_array($item,$type));
    if(!in_array($item,$type)){
        echo "图片类型不符合";
        exit;
    }
}
foreach ($s as $item){
    if($item>$size){
        echo "图片大小不符合";
        exit;
    }
}
//var_dump($_FILES);
if(!is_dir($path)){
// 判断是否存在文件夹path  没有则创建目录文件
    mkdir($path);
};
$n=$arr['name'];
$img="";
foreach ($n as $key=>$item){
    $d=explode('.',$item)[1];  //把name值按照.分割为数组;取到文件类型，jpg；
    $name=microtime(true).'.'.$d;
    if(is_uploaded_file($arr['tmp_name'][$key])){
        move_uploaded_file($arr['tmp_name'][$key],$path.'/'.$name);
        //        echo $result;   $path.'/'.$name(保存的图片路径)
        //        echo $path.'/'.$name;
        $img.=substr($url,0,strrpos($url,'/')).'/'.$path.'/'.$name.'--';
    }
}
//      去除后面的'--'
$img=rtrim($img,'--');



//插入内容
//header('content-type:text/html;charset=utf8');
include_once "public.php";
$db->query("set names utf8");
$title=$_POST['title'];
$author=$_POST['author'];
$authordes=$_POST['authordes'];
//echo $author;
//echo $title;
//echo $authordes;
$sql="update webset set title='$title',author='$author',img='$img',authordes='$authordes'";


$r=$db->query($sql);

if($r==1){
    $mess='修改成功';
    $url='webset.php';
}else{
    $mess='修改失败';
    $url="webset.php";
}
include_once 'mess.html';













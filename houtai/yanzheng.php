<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/12/28
 * Time: 14:08
 */

class code{
    private $width=120;
    private $height=40;
    private $count=30;
    private $color="";
    private $line=5;
    private $img="";
    private $code="";
    private $filepath="";
    private $letter="123456789qwertyuiopasdfghjklxcvbnm";

    private function getcolor($type="b"){
//        暗色0--120；
//        亮色120--240；
        if ($type==="b"){
            $r=mt_rand(0,120);
            $g=mt_rand(0,120);
            $b=mt_rand(0,120);
        }else if ($type==='l'){
            $r=mt_rand(120,240);
            $g=mt_rand(120,240);
            $b=mt_rand(120,240);
        }
        $this->color=imagecolorallocate($this->img,$r,$g,$b);
        return $this->color;
    }
    function __construct($filepath){
        $this->filepath=$filepath;
        $this->img=imagecreate($this->width,$this->height);
        session_start();
    }
    private function bg(){
        imagefill($this->img,0,0,$this->getcolor());
    }

    private function paintdian(){    //点
        for($i=0;$i<$this->count;$i++){
            $x=mt_rand(0,$this->width);   /////随机数
            $y=mt_rand(0,$this->height);
            imagesetpixel($this->img,$x,$y,$this->getcolor());
        }
    }
    private function paintline(){    //线
        for($i=0;$i<$this->line;$i++){
            imageline($this->img,mt_rand(0,120),mt_rand(0,40),mt_rand(0,120),mt_rand(0,
                120),$this->getcolor());
        }
    }
    private function paintword(){   ///字
        for($i=0;$i<4;$i++){
            $index=mt_rand(0,strlen($this->letter)-1);
            $w=mb_substr($this->letter,$index,1,"utf8");
            $w=mt_rand(0,1)?strtolower($w):strtoupper($w);
            imagettftext($this->img,mt_rand(18,20),mt_rand(-10,10),mt_rand($i*30,$i*30+10),mt_rand(25,35),$this->getcolor('l'),$this->filepath,$w);
            $this->code.=$w;
        }
        $_SESSION['code']=$this->code;

    }

    public function output(){
        header("content-type:image/png");
        $this->bg();
        $this->paintword();
        $this->paintline();
        $this->paintdian();
        imagepng($this->img);

        imagedestroy($this->img);

    }
}
$obj=new code("nasaliza.ttf");
$obj->output();

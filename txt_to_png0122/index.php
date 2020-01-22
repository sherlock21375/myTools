<?php
header("Content-type: text/html; charset=utf-8"); 
// bgcolor:#FDC800
// ftcolor:#9C0002
// $text = "wangjun";
// $img=imagecreate(680,300);//创建一个长为500高为16的空白图片
// imagecolorallocate($img,253,200,0xff);//设置图片背景颜色
// $font = "./font/hanyi.ttf";
// $fontSize = 15;//磅值字体  
// $fontColor = imagecolorallocate($img, 0, 0, 0 );//字的RGB颜色  
// imagettftext($img,$fontSize,0,0,16,$fontColor,$font,$text);
// imagepng($img);//输出图片，输出png使用imagepng方法，输出gif使用imagegif方法


// $text="wangjun";//显示的文字
// $width = 300;
// $size=12;//字体大小
// $font="./font/hanyi.ttf";//字体类型，这里为黑体，具体请在windows/fonts文件夹中，找相应的font文件
// $img=imagecreate(680,$width);//创建一个长为500高为16的空白图片
// imagecolorallocate($img,253,200,0);//设置图片背景颜色，这里背景颜色为#ffffff，也就是白色
// $black=imagecolorallocate($img,156,0,2);//设置字体颜色，这里为#000000，也就是黑色
// $a = imagettfbbox($size, 0, $font, $text);   //得到字符串虚拟方框四个点的坐标
// $len = $a[2] - $a[0];
// $x = ($width-$len)/2;
// $y = $a[3]-$a[5];
// imagettftext($img,$size,0,$x,$y,$black,$font,$text);//将ttf文字写到图片中

// header('Content-Type: image/png');//发送头信息

// imagepng($img);//输出图片，输出png使用imagepng方法，输出gif使用imagegif方法

$width  = 680;
$height = 300;
$size1 = 50;
$size2 = 35;
$size3 = 15;
$file = "./font/hanyi.ttf";
$content1 = "python学习教程";
$content2 = "python基础";
$content3 = "Supported By blog.juneday.site -- Sherlock June";
$path = './1.png';

do {
    $size1 -=1;    
    $a1 = imagettfbbox($size1, 0, $file, $content1);   //得到字符串虚拟方框四个点的坐标
    // var_dump($a1);
    $len1 = $a1[2] - $a1[0];
    $x1 = ($width-$len1)/2;
    $y1 = ($height-$a1[3]-$a1[5])/2-($a1[3]-$a1[5])/2;
    // echo "x1:".$x1."y1:".$y1;
} while ($x1<0);

do {
    $size2 -=1;
    $a2 = imagettfbbox($size2, 0, $file, $content2);   //得到字符串虚拟方框四个点的坐标
    // var_dump($a2);
    $len2 = $a2[2] - $a2[0];
    // echo "<br>len2:".$len2."<br>";
    $x2 = ($width-$len2)/2;
    $y2 = ($height-$a2[3]-$a2[5])/2+($a2[3]-$a2[5])/2;
    // echo "x2:".$x2."y2:".$y2;
} while ($x2<0);

$dst = imagecreatetruecolor($width,$height);
$ftcolor = imagecolorallocate($dst, 253,200,0);
$bgcolor = imagecolorallocate($dst, 156,0,2);
imagefill($dst,0,0,$ftcolor);
imagettftext($dst,$size1,0,$x1,$y1,$bgcolor, $file, $content1);
imagettftext($dst,$size2,0,$x2,$y2,$bgcolor, $file, $content2);
imagettftext($dst,$size3,0,280,290,$bgcolor, $file, $content3);
// header('Content-Type: image/png');//发送头信息
// imagepng($dst);
imagepng($dst,$path,9);
imagedestroy($dst);

?>
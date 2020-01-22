<?php
header("Content-type: text/html; charset=utf-8"); 
$width  = 680;
$height = 300;
$size1 = 50;
$size2 = 35;
$size3 = 15;
$file = "./font/hanyi.ttf";
$content1 = $_POST["content1"];
$content2 = $_POST["content2"];
$content3 = "Supported By blog.juneday.site -- Sherlock June";
$picName = date("Ymd").md5(uniqid());
$path = './images/'.$picName.'.png';
echo "https://www.juneday.site/github/myTools/txt_to_png0122/images/".$picName.".png";
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
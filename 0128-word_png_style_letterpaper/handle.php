<?php
header("Content-type: text/html; charset=utf-8"); 
$width  = 1080;
$height = 1417;
$size1 = 40;
$file = "./font/DFPXingShu.woff.ttf";
$content1 = "天漸暗,鳥獸散，";
$content2 = "又道誰家長短？";
$content3 = "任其將手中書翻爛。";
$contentLast = "王俊";
$length1 = mb_strlen($content1, 'utf-8');
$titlearray1 = [];
for ($i=0; $i<$length1; $i++)  
{
    $titlearray1[] = mb_substr($content1, $i, 1, 'utf-8')."\n";    
}
$content1 =implode($titlearray1);
$length2 = mb_strlen($content2, 'utf-8');
$titlearray2 = [];
for ($i=0; $i<$length2; $i++)  
{
    $titlearray2[] = mb_substr($content2, $i, 1, 'utf-8')."\n";    
}
$content2 =implode($titlearray2);
$length3 = mb_strlen($content3, 'utf-8');
$titlearray3 = [];
for ($i=0; $i<$length3; $i++)  
{
    $titlearray3[] = mb_substr($content3, $i, 1, 'utf-8')."\n";    
}
$content3 =implode($titlearray3);
$lengthLast = mb_strlen($contentLast, 'utf-8');
$titlearrayLast = [];
for ($i=0; $i<$lengthLast; $i++)  
{
    $titlearrayLast[] = mb_substr($contentLast, $i, 1, 'utf-8')."\n";    
}
$contentLast =implode($titlearrayLast);
// var_dump($content1);


$picName = date("Ymd").md5(uniqid());
$path = './images/'.$picName.'.png';
echo "https://www.juneday.site/github/myTools/txt_to_png0122/images/".$picName.".png";
// $dst = imagecreatetruecolor($width,$height);
$dst = imagecreatefrompng('./images/bg.png');
$bgcolor = imagecolorallocate($dst, 250,244,230);
$ftcolor = imagecolorallocate($dst, 0,0,0);
imagefill($dst,0,0,$bgcolor);
imagettftext($dst,$size1,0,920,180,$ftcolor, $file, $content1);
imagettftext($dst,$size1,0,820,180,$ftcolor, $file, $content2);
imagettftext($dst,$size1,0,720,180,$ftcolor, $file, $content3);
imagettftext($dst,$size1,0,110,180,$ftcolor, $file, $contentLast);
// header('Content-Type: image/png');//发送头信息
// imagepng($dst);
imagepng($dst,$path,9);
imagedestroy($dst);
?>
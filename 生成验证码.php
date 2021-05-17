<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>                              <!-- 注意！以上HTML代码和PHP代码需分开 -->
</head>
<body>
    <img src="index.php" id="refresh" onclick="this.src='index.php?'+Math.random()">
    <a href="javacript:;" onclick="document.getElementById('refresh').src='index.php?'+Math.random();">看不起，换一张</a>
</body>
</html>
<?php
      function rand_str($length) {
        // 验证码中所需要的字符
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $str = '';
        for($i = 0; $i < $length; $i++)
        {
            // 随机截取 $chars 中的任意一位字符；
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }
        return $str;
    }
    function rand_color($image){
        // 生成随机颜色
        return imagecolorallocate($image, rand(127, 255), rand(127, 255), rand(127, 255));
    }
    $image = imagecreate(200, 100);
    imagecolorallocate($image, 0, 0, 0);
    for ($i=0; $i <= 9; $i++) {
        // 绘制随机的干扰线条
        imageline($image, rand(0, 200), rand(0, 100), rand(0, 200), rand(0, 100), rand_color($image));
    }
    for ($i=0; $i <= 100; $i++) {
        // 绘制随机的干扰点
        imagesetpixel($image, rand(0, 200), rand(0, 100), rand_color($image));
    }
    $length = 4;//验证码长度
    $str = rand_str($length);//获取验证码
    $font = 'C:\Windows\Fonts\simhei.ttf';
    for ($i=0; $i < $length; $i++) {
        // 逐个绘制验证码中的字符
        imagettftext($image, rand(20, 38), rand(0, 60), $i*50+25, rand(30,70), rand_color($image), $font, $str[$i]);
    }
    header('Content-type:image/jpeg');
    imagejpeg($image);
    imagedestroy($image);   
?>	
    


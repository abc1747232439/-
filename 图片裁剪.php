<?php
    /**
     * @param  $file    需要裁剪的原图
     * @param  $x       裁剪的起始位置的X坐标
     * @param  $y       裁剪的起始位置的Y坐标
     * @param  $width   裁剪的区域的宽度
     * @param  $height  裁剪的区域的高度
     * @return [type]
     */
    function compress($file,$x,$y,$width,$height){
        $image = imagecreatefrompng($file);
        $com_image = imagecreatetruecolor($width, $height);
        imagecopyresampled($com_image, $image, 0, 0, $x, $y, $width, $height, $width, $height);
        header('Content-type:image/jpeg');
        imagejpeg($com_image);
        imagedestroy($com_image);
    }
    $file = 'http://c.biancheng.net/templets/new/images/logo.png';
    compress($file,0,0,125,60);
?>  


<?php
    function watermark($img,$water){
        $img_info = getimagesize($img);
        list($water_w,$water_h) = getimagesize($water);
        /* 创建图片实例 */
        $bg = imagecreatetruecolor(400,400);
        $im = imagecreatefromstring(file_get_contents($img));                              /* 此处若不设置画布，那么无法控制原图大小。 */
        $wate = imagecreatefromstring(file_get_contents($water));
        
        imagecopyresampled($bg,$im,0,0,0,0,400,400,$img_info[0],$img_info[1]);
        imagecopymerge($bg,$wate,0,0,0,0,$water_w,$water_h,50);
        
        header('Content-Type: image/png');
        imagegif($bg);
        
        imagedestroy($im);
        imagedestroy($wate);
    }
    $file = "./upload/2021/5/Snipaste_2021-01-18_17-09-56.png";    /* 原图 */
    $water = "./upload/2021/5/4560529f7758d4f2c2fc25e430d3829f.jpeg";                            /* 水印图片位置 */
    
    watermark($file,$water);

?>  


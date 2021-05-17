<!DOCTYPE html>
<html lang="en">
<body>
    <form action="文件上传.php" method="POST" enctype="multipart/form-data">
        请选择上传文件:<input type="file" name="file">
        <input type="submit">;
    </form>  
</body>
</html>
<?php
    $file_tmpname = $_FILES["file"]["tmp_name"];
    $file_suff = $_FILES["file"]["type"];
    $suff = ltrim($file_suff,"image/");
    $tim = time();
    $path = "./upload/2021/5/$tim.$suff";
    
    
    if($suff === "jpeg"||$suff === "png"||$suff === "gif")
        move_uploaded_file($file_tmpname,$path);
    else
        echo "?你丫传错了"; 
?>	
    


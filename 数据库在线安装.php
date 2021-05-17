<?php
    /* 在线安装程序 */
    $servername = "localhost";
    $username = "root";
    $password = "wzj123456"; 
    $conn = mysqli_connect($servername, $username, $password);
    $panduan=mysqli_select_db($conn,"aaa"); //判断数据库是否存在
    if ($panduan){
	    echo "该数据库已经存在";
	    exit();
    }
//写出SQL语句
    $sql="create database aaa";
//执行SQL语句
    $str=mysqli_query($conn,$sql);
    mysqli_select_db($conn,"aaa");
    $sq = "CREATE TABLE MyGuests (                                       
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP
        )";
    if (mysqli_query($conn, $sq)) {
        echo "数据表 MyGuests 创建成功";
    } else {
        echo "创建数据表错误: " . mysqli_error($conn);
    }
?>	
    


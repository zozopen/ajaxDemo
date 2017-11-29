<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $depass = '123456';
    //连接数据库
    $conn = mysqli_connect($dbhost, $dbuser, $depass);
    if(! $conn )
	{
	  die('连接错误: ' . mysqli_error($conn));
	}
	echo '连接成功<br />';
    //数据库名字
    $sql = 'CREATE DATABASE DEMO';
    //连接$conn创建$sql数据库
    $retval = mysqli_query($conn, $sql);
    if(! $retval )
	{
	    die('创建数据库失败: ' . mysqli_error($conn));
	}
	echo "数据库 RUNOOB 创建成功\n";
    //创建数据库表
    $sqll = 'CREATE TABLE DEMO_TB(
    	
    	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    	user VARCHAR(100) NOT NULL,
    	email VARCHAR(100) NOT NULL
    )DEFAULT CHARSET=utf8';
    //选择数据库
    mysqli_select_db( $conn, 'DEMO' );
    //插入数据库表
    $retval = mysqli_query( $conn, $sqll );
    if(! $retval )
	{
	    die('创建数据库表失败: ' . mysqli_error($conn));
	}
	echo "数据库表 RUNOOB 创建成功\n";
	mysqli_close($conn);
?>
<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "123456";
	
	//连接数据库
	$conn = mysqli_connect( $dbhost, $dbuser, $dbpass, 'DEMO' );
	
	//设置编码，防止中文乱码
	mysqli_query($conn, "set names utf8");
	
	//寻找数据库
//	mysqli_select_db($conn, 'DEMO' );
	
	//获取前端的变量
//	$id = $_POST['id'];
	$user = $_POST['user'];
	$email = $_POST['eml'];
	
	//进行数据判断
	if( empty($user) || empty($email) ) {
		echo "<script>alert('请填写数据')</script>";
		echo "<script>window.history.back()</script>";
//		die();
		
	} else {
		//选取user进行判断
		$sql1 = "SELECT * FROM DEMO_TB WHERE user='$user'";
		$result = mysqli_query($conn,$sql1);
		$row = mysqli_num_rows($result);
		
		if ( $row > 0 ) {
			echo "<script>alert('用户名已存在')</script>";
			echo "<script>window.location.href = './index.html'</script>";
		} else {
			
			//选择数据库插入数据
			$sql = "INSERT INTO DEMO_TB".
			"(user, email)". 
			"VALUES".
			"('$user', '$email')";
		
			$retval = mysqli_query($conn, $sql);
			if ( !$retval ) {
				die ('无法插入数据:' . mysqli_error($conn));
			} else {
				echo "插入数据成功";
			}
		}
	}
	
	
	
	mysqli_close($conn);
?>
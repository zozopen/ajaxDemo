<?php
	header("Content-Type: text/plain; charser=utf-8");
	
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "123456";
	//连接数据库
	$conn = mysqli_connect( $dbhost, $dbuser, $dbpass, 'DEMO');	
	//设置编码，防止中文乱码
	mysqli_query($conn, "set names utf8");
	//判断如果是get请求，则进行搜索；如果是POST请求，则进行新建
	//$_SERVER是一个超全局变量，在一个脚本的全部作用域中都可用，不用使用global关键字
	//$_SERVER["REQUEST_METHOD"]返回访问页面使用的请求方法
	if ( $_SERVER["REQUEST_METHOD"] == "GET" ) {
		search();
	} else if ( $_SERVER["REQUEST_METHOD"] =="POST" ) {
		create();
	}
	//查询数据库
	function search () {
		global $conn;
		global $sql1;
		//获取前端的变量
		$user = $_GET['user'];
		//选取user进行判断
		$sql1 = "SELECT * FROM DEMO_TB WHERE user='$user'";
		
		if ( !isset($_GET["user"]) || empty($_GET["user"]) ) {
			echo "参数错误";
			return;
		}
		$result = mysqli_query($conn,$sql1);
		$nes = mysqli_num_rows($result);
		if ( $nes == 0 ) {
			echo "查无此账号";
		} else {
			while($row = mysqli_fetch_array($result)){
    			echo "用户名:".$row["user"] ."   "  ."邮箱:".$row["email"];  
    		}  
		}
	}
	//创建新的
	function create() {
		global $conn;
		
		$user = $_POST['name'];
		$email = $_POST['email'];
		
		if ( empty($user) || empty($email) ) {
			echo "请填写完整";
			return;
		} else {
			
			$sql = "insert into demo_tb"
			."(user, email)"
			."VALUES"
			."('$user', '$email')";
			
			$retval = mysqli_query($conn, $sql);
			if ( !$retval ) {
				die ('无法插入数据:' .mysqli_error($conn));
			} else {
				echo "插入数据成功";
			}
		}
	}
	
?>
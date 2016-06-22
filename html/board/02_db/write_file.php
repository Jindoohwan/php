<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<style type="text/css">
.wrap {
	margin:0 auto;
	width:50%;
	margin-top:50px;
	}
table {
	width:100%;
	border:5px solid #EAEAEA;
	border-collapse:collapse;
	}
th {
	background:#EAEAEA;
	}
.num {
	width:10%;
	}
td, th {
	border:1px solid #EAEAEA;
	padding:10px;text-align:center;
	}
.w_btn {
	float:right;
	text-decoration:none;
	padding:10px;
	margin-top:10px;
	background:#EAEAEA;
	color:#000;
	}
</style>
<body>
<div class="wrap">
<center><h1> 게시판 </h1></center>
<?php
	require_once 'login.php';
	$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
		if (!$db_server) {
			die('Mysql connection failed: '.mysqli_connect_error());
		}
		
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$title = $_POST['title'];
		$name = $_POST['name'];
		$content = $_POST['content'];
	}
	
	if($title || $name || $content === false){
		echo "작성 실패...<br><br>";
		echo "<a class = 'w_btn' href='main.php'>메인으로</a><br>";
	}
	
	$insert_query = "INSERT INTO board(post_title, post_name, post_content) values('" . $title . "','" . $name . "','" . $content . "') ";		
	if (mysqli_query($db_server, $insert_query) === false) {
		echo mysqli_error($db_server);
	}
	echo "작성 성공..! <br><br>";
	echo "<a class = 'w_btn' href='main.php'>메인으로</a><br>";
	
	mysqli_close($db_server);
?>
	
</div>
</body>
</html>
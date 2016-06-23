<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<style type="text/css">
.wrap {
	margin:0 auto;
	width:30%;
	margin-top:50px;
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
<center><h1> 게시판작성 </h1></center>
<?php
	require_once 'login.php';
	$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
	mysqli_query($db_server, "SET NAMES 'utf8'");
		if (!$db_server) {
			die('Mysql connection failed: '.mysqli_connect_error());
		}
		
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$title = $_POST['title'];
		$writer = $_POST['name'];
		$content = $_POST['content'];
	}
	
	if($title && $writer && $content === false){
		echo "작성 실패...<br><br>";
		echo "<a class = 'w_btn' href='main.php'>메인으로</a><br>";
	}
	$num = 2; //board_id 가 2 이면 자유게시판
	$insert_query = "INSERT INTO post(post_title, post_writer, post_content, board_id) values('" . $title . "','" . $writer . "','" . $content . "','" .$num. "') ";
	if (mysqli_query($db_server, $insert_query) === false) {
		echo mysqli_error($db_server);
	} else {
	echo "작성 성공..! <br><br>";
	echo "<a class = 'w_btn' href='main.php'>메인으로</a><br>";
	}
	mysqli_close($db_server);
?>
</div>
</body>
</html>
<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<style type="text/css">
.wrap {
	margin:0 auto;
	width:50%;
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
<center><h1> 게시판수정 </h1></center>
<?php
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$num = $_POST['num'];
		$writer = $_POST['writer'];
		$title = $_POST['title'];
		$content = $_POST['content'];
	}
	
	require_once 'login.php';
	$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
	mysqli_query($db_server, "SET NAMES 'utf8'");
	if (!$db_server) {
		die('Mysql connection failed: '.mysqli_connect_error());
	}
	$select_query = 'SELECT * FROM Jindoohwan.post';
	$result_set = mysqli_query($db_server, $select_query);
	
	//$update_query = "UPDATE post SET post_title =".$title.", post_content =".$content." WHERE post_id = ".$number."";
	if(mysqli_query($db_server, $update_query) === false){
		echo mysqli_error($db_server);
	}
	echo "게시판 수정 성공..! <br><br>";
	echo "<a class = 'w_btn' href='view_post.php'>글목록으로</a><br>";
	
	
	mysqli_close($db_server);
?>
</div>
</body>
</html>
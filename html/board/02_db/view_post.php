<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
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
</head>
<body>
<div class="wrap">
<center><h1> 게시판 </h1></center>

<table>
<tr><th>번호</th><th>이름</th><th>제목</th><th>내용</th></tr>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$number = $_GET['number'];	
	}
	require_once 'login.php';
	$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
	if (!$db_server) {
		die('Mysql connection failed: '.mysqli_connect_error());
	}
	
	$select_query = 'SELECT post_id, post_title, post_name, post_content FROM jindoohwan.board';
	$result_set = mysqli_query ($db_server, $select_query);
	while ($row = mysqli_fetch_assoc($result_set)) {
		if($number === $row['post_id']) {
			echo '<td>'.$row['post_id'].'</td>';
			echo '<td>'.$row['post_name'].'</td>';
			echo '<td>'.$row['post_title'].'</td>';
			echo '<td>'.$row['post_content'].'</td>';
		}
	}
?>
</table>
<br>
<a href = "delete.php"><button>삭제</button></a>
<a class="w_btn" href = "main.php">메인으로</a><br>
</div>
</body>
</html>

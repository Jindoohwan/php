<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
<style type="text/css">
.wrap {
	margin:0 auto;
	width:30%;
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
.top {
		background:#FFFF48;
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
<center><h1> 게시판보기 </h1></center>

<table>
<tr class = "top"><th>번호</th><th>이름</th><th>제목</th><th>내용</th></tr>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$number = $_GET['number'];	
	}
	require_once 'login.php';
	$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
	mysqli_query($db_server, "SET NAMES 'utf8'");
	if (!$db_server) {
		die('Mysql connection failed: '.mysqli_connect_error());
	}
	
	$select_query = 'SELECT * FROM Jindoohwan.post';
	$result_set = mysqli_query ($db_server, $select_query);
	while ($row = mysqli_fetch_assoc($result_set)) {
		if($number === $row['post_id']) {
			echo '<td>'.$row['post_id'].'</td>';
			echo '<td>'.$row['writer'].'</td>';
			echo '<td>'.$row['title'].'</td>';
			echo '<td>'.$row['content'].'</td>';
		}
	}
	mysqli_close($db_server);
?>
</table>
<br>
<a href = "delete.php?number=<?php echo $number;?>"><button>삭제</button></a>
<a href = "change.php?number=<?php echo $number;?>"><button>수정</button></a>
<a class="w_btn" href = "main.php">메인으로</a><br>
</div>
</body>
</html>

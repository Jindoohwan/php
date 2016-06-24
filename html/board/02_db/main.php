<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
<style type="text/css">
.wrap {
		margin:0 
		auto;
		width:30%;
		margin-top:50px;
		}
table {
		width:100%;
		border:5px solid #EAEAEA;
		border-collapse:collapse;
		}
td, th {
		border:3px solid #EAEAEA;
		padding:10px;
		text-align:center;
		}
.top {
		background:#FFFF48;
	}			
.w_btn {
		float:right;text-decoration:none;
		padding:10px;
		margin-top:10px;
		background:#EAEAEA;
		color:#000;
		}
</style>
</head>
<body>
<div class="wrap">
<table>
<tr><th colspan = "3" class = "top"><h2>자유게시판</h2></th></tr>
<tr><th>번호</th> <th>제목</th> <th>이름</th></tr>
<?php
	require_once 'login.php';
	$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
	mysqli_query($db_server, "SET NAMES 'utf8'");
		if (!$db_server) {
			die('Mysql connection failed: '.mysqli_connect_error());
		}
	$select_query = "SELECT * FROM Jindoohwan.post WHERE board_id = 1";
	$result_set = mysqli_query($db_server, $select_query);
	while ($row = mysqli_fetch_assoc($result_set)) {
			echo "<tr>";
			echo "<td>".$row['post_id']."</td>";
			printf("<td><a href = \"view_post.php?number=%d\">%s </a></td>", $row['post_id'], $row['title']);
			echo "<td>".$row['writer']."</td>";
			echo "</tr>";
	}
	mysqli_close($db_server);
?>
</table>
<a class="w_btn" href = "write_post.php">글쓰기</a><br>
<br><br>

<table>
<tr><th colspan = "3" class = "top"><h2>Q&A게시판</h2></th></tr>
<tr><th>번호</th> <th>제목</th> <th>이름</th></tr>
<?php
	require_once 'login.php';
	$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
	mysqli_query($db_server, "SET NAMES 'utf8'");
		if (!$db_server) {
			die('Mysql connection failed: '.mysqli_connect_error());
		}
	$select_query = "SELECT * FROM Jindoohwan.post WHERE board_id = 2";
	$result_set = mysqli_query($db_server, $select_query);
	while ($row = mysqli_fetch_assoc($result_set)) {
			echo "<tr>";
			echo "<td>".$row['post_id']."</td>";
			printf("<td><a href = \"view_post.php?number=%d\">%s </a></td>", $row['post_id'], $row['title']);
			echo "<td>".$row['writer']."</td>";
			echo "</tr>";
	}
	mysqli_close($db_server);
?>
</table>
<a class="w_btn" href = "write_post2.php">글쓰기</a><br><br><br>
<a class="w_btn" href = "../../index.php">홈으로</a><br>
</div>
</body>
</html>

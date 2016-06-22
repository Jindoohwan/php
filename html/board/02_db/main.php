<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
<style type="text/css">
.wrap {
		margin:0 
		auto;width:50%;
		margin-top:50px;}
table {
		width:100%;
		border:5px solid #EAEAEA;
		border-collapse:collapse;
		}
.num {
		width:10%;
		}
td, th {
		border:3px solid #EAEAEA;
		padding:10px;
		text-align:center;
		}
.w_btn {
		float:right;text-decoration:none;
		padding:10px;
		margin-top:10px;
		background:#EAEAEA;
		color:#000;
		}
#img {
		margin:0 auto;
		width:100%;
		} <!-- id 사용하여 css 구현 -->
</style>
</head>
<body>
<div class="wrap">
<table>
<tr><th><h2>게시판</h2></th></tr>
<tr><th>번호</th> <th>제목</th> <th>이름</th></tr>

<?php
	require_once 'login.php';
	$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
		if (!$db_server) {
			die('Mysql connection failed: '.mysqli_connect_error());
		}
	
	$select_query = 'SELECT post_id, post_title, post_name FROM jindoohwan.board';
	$result_set = mysql_query($db_server, $select_query);
	while ($row = mysqli_fetch_assoc($result_set)) {
			echo "<tr>";
			echo "<td>".$row['post_id']."</td>";
			echo "<td><a href = \"view_post.php?number = $row['post_id']\">$row['post_title'] </a></td>";
			echo "<td>".$row['post_name']."</td>";
			echo "</tr>";
		}
	
?>

</table>
<a class="w_btn" href = "write_post.php">글쓰기</a><br>
<br>
<br>
<a class="w_btn" href = "../../index.php">홈으로</a><br>
</div>
</body>
</html>

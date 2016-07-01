<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
<div class="wrap">
<?php 
	require_once 'login/session.php';
	start_session();
	if (check_login()) {
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$id = $_GET['id'];	
		}
		echo '['.$id.']님';
?>	
	<a class = "r_btn" href = "login/logout.php"><button>로그아웃</button></a><br><br>

<?php
	} else {
?>
	<a class = "r_btn" href = "login/index.php"><button>로그인하기</button></a><br><br>
<?php
	}
?>
<table>
<tr><th colspan = "3" class = "top"><h2>자유게시판</h2></th></tr>
<tr><th>번호</th> <th>제목</th> <th>이름</th></tr>
<?php
	require_once '../../../includes/mylib.php';
	$db_server = get_connection();
	$select_query = "SELECT * FROM Jindoohwan.post WHERE board_id = 1";
	$result_set = mysqli_query($db_server, $select_query);
	while ($row = mysqli_fetch_assoc($result_set)) {
		echo "<tr>";
		echo "<td>".$row['post_id']."</td>";
		if (check_login()) {
			printf("<td><a href = \"view_post.php?number=%d&id=%s\">%s </a></td>", $row['post_id'], $id, $row['title']);
		} else {
			printf("<td><a href = \"view_post.php?number=%d\">%s </a></td>", $row['post_id'], $row['title']);
		}
		echo "<td>".get_user_name($row['user_id'])."</td>"; 
		echo "</tr>";
	}
	mysqli_close($db_server);
?>
</table>
<?php 
	if (check_login()) {
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$id = $_GET['id'];	
		}
		echo "<a class=\"w_btn\" href = \"login/write_post.php?id=".$id."\">글쓰기</a><br>";
		echo "<br><br>";
	} else {
		echo "<a class=\"w_btn\" href = \"write.php\">글쓰기</a><br>";
		echo "<br><br>";
	}
?>
<table>
<tr><th colspan = "3" class = "top"><h2>Q&A게시판</h2></th></tr>
<tr><th>번호</th> <th>제목</th> <th>이름</th></tr>
<?php
	require_once '../../../includes/mylib.php';
	$db_server = get_connection();
	$select_query = "SELECT * FROM Jindoohwan.post WHERE board_id = 2";
	$result_set = mysqli_query($db_server, $select_query);
	while ($row = mysqli_fetch_assoc($result_set)) {
		echo "<tr>";
		echo "<td>".$row['post_id']."</td>";
		if (check_login()) {
			printf("<td><a href = \"view_post.php?number=%d&id=%s\">%s </a></td>", $row['post_id'], $id, $row['title']);
		} else {
			printf("<td><a href = \"view_post.php?number=%d\">%s </a></td>", $row['post_id'], $row['title']);
		}
		echo "<td>".get_user_name($row['user_id'])."</td>"; 
		echo "</tr>";
	}
	mysqli_close($db_server);
?>
</table>
<?php 
	if (check_login()) {
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$id = $_GET['id'];	
		}
		echo "<a class=\"w_btn\" href = \"login/write_post2.php?id=".$id."\">글쓰기</a><br>";
		echo "<br><br>";
	} else {
		echo "<a class=\"w_btn\" href = \"write.php\">글쓰기</a><br>";
		echo "<br><br>";
	}
?>
</div>
</body>
</html>

<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
<div class="wrap">
<center><h1> 댓글수정 </h1></center>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$id = $_GET['id'];
		$content = $_GET['content'];
		$number = $_GET['number'];
		$number2 = $_GET['number2'];
	}

	require_once '../../../../includes/mylib.php';
	$db_server = get_connection();
	$select_query = 'SELECT * FROM Jindoohwan.comment';
	$result_set = mysqli_query($db_server, $select_query);
	while ($row = mysqli_fetch_assoc($result_set)) {
		if($number2 === $row['comment_id']) {
			$update_query = 'UPDATE comment SET writer=?, content=? WHERE comment_id=?';
			$stmt = mysqli_prepare($db_server, $update_query);
			mysqli_stmt_bind_param($stmt, 'ssd', $id, $content, $row['comment_id']);
			if (mysqli_stmt_execute($stmt) === false) {
				die('INSERT query failure');
			}
			echo "댓글 수정 성공..! <br><br>";
			printf("<a class=\"w_btn\" href = \"../view_post.php?number=%d&id=%s\"> 게시물로 </a>", $number, $id);
		}
	}
	mysqli_close($db_server);
?>
</div>
</body>
</html>
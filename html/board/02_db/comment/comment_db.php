<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<link rel="stylesheet" type="text/css" href="/css/style.css">
<body>
<div class="wrap">
<center><h2> 댓글쓰기 </h2></center>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$id = $_GET['id'];
		$num = $_GET['num'];
		$content = $_GET['content'];
	}
	
	require_once '../../../../includes/mylib.php';
	$db_server = get_connection();
	
	$insert_query = "INSERT INTO comment(writer, content, post_id) values('" . $id . "','" . $content . "','" .$num. "') ";
	if (mysqli_query($db_server, $insert_query) === false) {
		echo "댓글쓰기 실패..! 다시입력해주세요!<br>";
	} else {
	echo "댓글쓰기 성공..! <br><br>";
	printf("<a class=\"w_btn\" href = \"../view_post.php?number=%d&id=%s\"> 게시물로 </a>", $num, $id);
	}
	mysqli_close($db_server);
?>
</div>
</body>
</html>
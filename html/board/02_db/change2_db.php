<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id = $_POST['id'];
		$content = $_POST['content'];
		$post_id = $_POST['post_id'];
		$comment_id = $_POST['comment_id'];
	}
	require_once '../../../includes/mylib.php';
	$db_server = get_connection();
	$update_query = 'UPDATE comment SET content=? WHERE comment_id=?';
	$stmt = mysqli_prepare($db_server, $update_query);
	mysqli_stmt_bind_param($stmt, 'sd', $content, $comment_id);
	if (mysqli_stmt_execute($stmt) === false) {
		die('INSERT query failure');
	}
	echo "댓글 수정 성공..! <br><br>";
	header("Location:view_post.php?number=$post_id&id=$id");
	mysqli_close($db_server);


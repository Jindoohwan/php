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
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$writer = $_POST['writer'];
		$content = $_POST['content'];
		$number = $_POST['number'];
	}

	require_once '../../../../includes/mylib.php';
	$db_server = get_connection();
	$select_query = 'SELECT * FROM Jindoohwan.comment';
	$result_set = mysqli_query($db_server, $select_query);
	while ($row = mysqli_fetch_assoc($result_set)) {
		if($number === $row['comment_id']) {
			$update_query = "UPDATE Jindoohwan.comment SET writer ='".$writer."', content ='".$content."' WHERE comment_id =".$row['comment_id']."";
			//" "컬럼명으로봄 ' '컬럼안의 문자열로봄
			if(mysqli_query($db_server, $update_query) === false){
				echo mysqli_error($db_server);
			}
			echo "댓글 수정 성공..! <br><br>";
			printf("<a class=\"w_btn\" href = \"../view_post.php?number=%d\"> 게시물로 </a>", $row['post_id']);
		}
	}
	mysqli_close($db_server);
?>
</div>
</body>
</html>
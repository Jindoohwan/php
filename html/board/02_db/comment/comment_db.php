<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<link rel="stylesheet" type="text/css" href="/css/style.css">
<body>
<div class="wrap">
<center><h2> 댓글쓰기 </h2></center>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$number = $_POST['number'];
		$writer = $_POST['name'];
		$content = $_POST['content'];
	}
	
	require_once '../../../../includes/mylib.php';
	$db_server = get_connection();
	
	if($writer && $content === false){
		echo "댓글쓰기 실패...<br><br>";
		echo "<a class = 'w_btn' href='comment.php'>댓글쓰기로</a><br>";
	}
	$num = $number; //게시물번호로 post_id 넣는다
	$insert_query = "INSERT INTO comment(writer, content, post_id) values('" . $writer . "','" . $content . "','" .$num. "') ";
	if (mysqli_query($db_server, $insert_query) === false) {
		echo "댓글쓰기 실패..! 다시입력해주세요!<br>";
		echo "<a class = 'w_btn' href='comment.php'>댓글쓰기로</a><br>";
	} else {
	echo "댓글쓰기 성공..! <br><br>";
	echo "<a class = 'w_btn' href='../main.php'>메인으로</a><br>";
	}
	mysqli_close($db_server);
?>
</div>
</body>
</html>
<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<link rel="stylesheet" type="text/css" href="/css/style.css">
<body>
<div class="wrap">
<center><h1> 게시판작성 </h1></center>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$title = $_POST['title'];
		$writer = $_POST['name'];
		$content = $_POST['content'];
	}
	
	require_once '../../../includes/mylib.php';
	$db_server = get_connection();
	
	if($title && $writer && $content === false){
		echo "작성 실패...<br><br>";
		echo "<a class = 'w_btn' href='main.php'>메인으로</a><br>";
	}
	$num = 2; //board_id 가 2 이면 자유게시판
	$insert_query = "INSERT INTO post(title, writer, content, board_id) values('" . $title . "','" . $writer . "','" . $content . "','" .$num. "') ";
	if (mysqli_query($db_server, $insert_query) === false) {
		echo mysqli_error($db_server);
	} else {
	echo "작성 성공..! <br><br>";
	echo "<a class = 'w_btn' href='main.php'>메인으로</a><br>";
	}
	mysqli_close($db_server);
?>
</div>
</body>
</html>
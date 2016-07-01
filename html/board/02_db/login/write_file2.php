<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<link rel="stylesheet" type="text/css" href="/css/style.css">
<body>
<div class="wrap">
<center><h1> 게시판작성 </h1></center>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$id = $_GET['id'];
		$title = $_GET['title'];
		$content = $_GET['content'];
	}
	
	require_once '../../../../includes/mylib.php';
	$db_server = get_connection();
	$select_query = "SELECT * FROM user";
	$result_set = mysqli_query($db_server, $select_query);
	while ($row = mysqli_fetch_assoc($result_set)) {
		if ($id === $row['username']) {
			$num = 2; //board_id 가 2 이면 Q&A게시판
			$insert_query = "INSERT INTO post(user_id, title, content, board_id) values('" . $row['user_id'] . "','" . $title . "','" . $content . "','" .$num. "') ";
			if (mysqli_query($db_server, $insert_query) === false) {
				echo mysqli_error($db_server);
			} else {
				echo "작성 성공..! <br><br>";
				echo "<a class = 'w_btn' href='../main.php?id=".$id."'>메인으로</a><br>";
			}			
		}
	}		
	mysqli_close($db_server);
?>
</div>
</body>
</html>
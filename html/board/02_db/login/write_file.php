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
	$db_server = get_connection(); //DB접속
	$select_query = "SELECT * FROM user";
	$result_set = mysqli_query($db_server, $select_query);
	while ($row = mysqli_fetch_assoc($result_set)) {
		if ($id === $row['username']) {
			$num = 1; //board_id 가 1 이면 자유게시판
			$insert_query = 'INSERT INTO post(user_id, title, content, board_id) values(?,?,?,?)';
			$stmt = mysqli_prepare($db_server, $insert_query);
			mysqli_stmt_bind_param($stmt, 'sssd', $row['user_id'], $title, $content, $num);
			if (mysqli_stmt_execute($stmt) === false) {
				die('INSERT query failure');
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

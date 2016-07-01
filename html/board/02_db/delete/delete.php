<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<link rel="stylesheet" type="text/css" href="/css/style.css">
<body>
<div class="wrap">
<center><h1> 게시판삭제 </h1></center>
<?php
	require_once '../login/session.php';
	start_session();
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$number = $_GET['number'];
		$id = $_GET['id'];
	}
	require_once '../../../../includes/mylib.php';
	$db_server = get_connection();
	$select_query = 'SELECT post_id FROM Jindoohwan.post';
	$result_set = mysqli_query($db_server, $select_query);
	while ($row = mysqli_fetch_assoc($result_set)) {
		if($number === $row['post_id']) {
			$delete_query = "DELETE FROM post WHERE post_id = ".$row['post_id']."";
			$delete_query2 = "DELETE FROM comment WHERE post_id = ".$row['post_id']."";
			mysqli_query($db_server, $delete_query2); //있는 댓글 삭제하고 게시물삭제
			if (mysqli_query($db_server, $delete_query) === false){
				echo mysqli_error($db_server);
			}
			echo "삭제 성공..! <br><br>";
			echo "<a class = 'w_btn' href='../main.php?id=".$id."'>메인으로</a><br>";
		}
	}	
	mysqli_close($db_server);
?>
</div>
</body>
</html>
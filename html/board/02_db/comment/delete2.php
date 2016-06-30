<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<link rel="stylesheet" type="text/css" href="/css/style.css">
<body>
<div class="wrap">
<center><h1> 게시판삭제 </h1></center>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$number = $_GET['num'];	
	}
	
	require_once '../../../../includes/mylib.php';
	$db_server = get_connection();
	$select_query = 'SELECT * FROM Jindoohwan.comment';
	$result_set = mysqli_query($db_server, $select_query);
	while ($row = mysqli_fetch_assoc($result_set)) {
		if($number === $row['comment_id']) {
			$delete_query = "DELETE FROM comment WHERE comment_id = ".$row['comment_id']."";
			mysqli_query($db_server, $delete_query); 
			if (mysqli_query($db_server, $delete_query) === false){
				echo mysqli_error($db_server);
			}
			echo "댓글삭제 성공..! <br><br>";
			printf("<a class=\"w_btn\" href = \"../view_post.php?number=%d\"> 게시물로 </a>", $row['post_id']);
		}
	}	
	mysqli_close($db_server);
?>
</div>
</body>
</html>
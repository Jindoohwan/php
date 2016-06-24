<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<style type="text/css">
.wrap {
	margin:0 auto;
	width:30%;
	margin-top:50px;
	}
.w_btn {
	float:right;
	text-decoration:none;
	padding:10px;
	margin-top:10px;
	background:#EAEAEA;
	color:#000;
	}
</style>
<body>
<div class="wrap">
<center><h1> 게시판수정 </h1></center>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$number = $_POST['number'];
		$title = $_POST['title'];
		$content = $_POST['content'];
	}
	
	require_once 'C:/git/php/includes/mylib.php';
	$db_server = get_connection();
	$select_query = 'SELECT * FROM Jindoohwan.post';
	$result_set = mysqli_query($db_server, $select_query);
	while ($row = mysqli_fetch_assoc($result_set)) {
		if($number === $row['post_id']) {
			$update_query = "UPDATE post SET title=".$title.", content =".$content." WHERE post_id =" .$number."";
			if(mysqli_query($db_server, $update_query) === false){
				echo mysqli_error($db_server);
			}
			echo "게시판 수정 성공..! <br><br>";
			echo "<a class = 'w_btn' href='main.php'>메인으로</a><br>";
		}
	}
	mysqli_close($db_server);
?>
</div>
</body>
</html>
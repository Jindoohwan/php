<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
<div class="wrap">
<center><h1> 게시판수정 </h1></center>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$title = $_GET['title'];
		$content = $_GET['content'];
		$number = $_GET['number'];
		$id = $_GET['id'];
	}
	if ($title == "") {
			echo "제목 입력하세요..!<br>";
			printf("<a class=\"w_btn\" href = \"../view_post.php?number=%d&id=%s\"> 게시물로 </a>", $number, $id);
	} else {
		require_once '../../../../includes/mylib.php';
		$db_server = get_connection();
		$select_query = 'SELECT * FROM Jindoohwan.post';
		$result_set = mysqli_query($db_server, $select_query);
		while ($row = mysqli_fetch_assoc($result_set)) {
			if($number === $row['post_id']) {
				$update_query = "UPDATE Jindoohwan.post SET title ='".$title."', content ='".$content."' WHERE post_id =".$row['post_id']."";
				//" "컬럼명으로봄 ' '컬럼안의 문자열로봄
				if(mysqli_query($db_server, $update_query) === false){
					echo mysqli_error($db_server);
				}
				echo "게시판 수정 성공..! <br><br>";
				printf("<a class=\"w_btn\" href = \"../view_post.php?number=%d&id=%s\"> 게시물로 </a>", $number, $id);
			}
		}
		mysqli_close($db_server);	
	}
?>
</div>
</body>
</html>
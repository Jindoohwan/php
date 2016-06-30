<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
<div class="wrap">
<center><h1> 게시판보기 </h1></center>

<table>
<tr class = "top"><th>번호</th><th>이름</th><th>제목</th><th>내용</th></tr>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$number = $_GET['number'];	
	}
	require_once '../../../includes/mylib.php';
	$db_server = get_connection();
	$select_query = 'SELECT * FROM Jindoohwan.post';
	$result_set = mysqli_query ($db_server, $select_query);
	while ($row = mysqli_fetch_assoc($result_set)) {
		if($number === $row['post_id']) {
			echo '<td>'.$row['post_id'].'</td>';
			echo '<td>'.$row['writer'].'</td>';
			echo '<td>'.$row['title'].'</td>';
			echo '<td>'.$row['content'].'</td>';
		}
	}
	mysqli_close($db_server);
?>
</table><br>
<a href = "delete/delete.php?number=<?php echo $number;?>"><button>게시물삭제</button></a>
<a href = "change/change.php?number=<?php echo $number;?>"><button>게시물수정</button></a><br><br><br><br>

<h3>댓글</h3>
<!--<tr><th>이름</th><th>내용</th></tr>-->
<?php
	require_once '../../../includes/mylib.php';
	$db_server = get_connection();
	$select_query = 'SELECT * FROM Jindoohwan.comment';
	$result_set = mysqli_query ($db_server, $select_query);
	while ($row = mysqli_fetch_assoc($result_set)) {
		if ($number === $row['post_id']) {
			echo $row['writer'].' : '.$row['content']."";
			printf("<a class=\"r_btn\" href = \"comment/delete2.php?num=%d\">/삭제</a>",$row['comment_id']);
			printf("<a class=\"r_btn\" href = \"comment/change2.php?num=%d\">수정/</a>",$row['comment_id']);
			echo '<br>';
		}
	}
	mysqli_close($db_server);
?>
<br><br>
<a href = "comment/comment.php"><button>댓글쓰기</button></a>
<br><a class="w_btn" href = "main.php">메인으로</a><br>
</div>
</body>
</html>

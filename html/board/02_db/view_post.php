<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
<div class="wrap">
<center><h1> 게시물보기 </h1></center>
<table>
<tr class = "top"><th>번호</th><th>이름</th><th>제목</th><th>내용</th></tr>
<?php
	require_once 'login/session.php';
	start_session();
	if (check_login()) {
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$number = $_GET['number'];
			$id = $_GET['id'];
		} 
	} else {
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$number = $_GET['number'];
		}
	}
	require_once '../../../includes/mylib.php';
	$db_server = get_connection();
	$select_query = 'SELECT * FROM Jindoohwan.post';
	$result_set = mysqli_query ($db_server, $select_query);
	while ($row = mysqli_fetch_assoc($result_set)) {
		if($number === $row['post_id']) {
			echo '<td>'.$row['post_id'].'</td>';
			$userid = get_user_name($row['user_id']);
			echo '<td>'.$userid.'</td>';
			echo '<td>'.$row['title'].'</td>';
			echo '<td>'.$row['content'].'</td>';
		}
	}
	mysqli_close($db_server);
?>
</table><br>
<?php 
	if (check_login()) {
		if($id == $userid) {
			echo "<a href = \"delete/delete.php?id=".$id."&number=".$number."\"><button>게시판삭제</button></a> "; 
			echo "<a href = \"change/change.php?id=".$id."&number=".$number."\"><button>게시판수정</button></a><br>";
			echo "<br><br>";
		}
	}  
?>

<h3>댓글</h3>
<!--<tr><th>이름</th><th>내용</th></tr>-->
<?php
	require_once '../../../includes/mylib.php';
	$db_server = get_connection();
	$select_query = 'SELECT * FROM Jindoohwan.comment';
	$result_set = mysqli_query ($db_server, $select_query);
	if (check_login()) {
		while ($row = mysqli_fetch_assoc($result_set)) {
			if ($number === $row['post_id']) {
				echo $row['writer'].' : '.$row['content']."";
				if($id == $row['writer']) {
					printf("<a class=\"r_btn\" href = \"comment/delete2.php?num=%d&id=%s\">/삭제</a>",$row['comment_id'], $id);
					printf("<a class=\"r_btn\" href = \"comment/change2.php?num=%d&num2=%d&id=%s\">수정/</a>", $number, $row['comment_id'], $id);
				}
				echo '<br>';
			}
		}
	}
	mysqli_close($db_server);
?>
<br><br>
<?php
	if (check_login()) {
		echo "<a href = \"comment/comment.php?id=".$id."&number=".$number."\"><button>댓글쓰기</button></a> "; 
		echo "<br><br>";
	} else {
		echo "<a href = \"comment/nocomment.php\"><button>댓글쓰기</button></a> ";
	}
?>
<br><a class="w_btn" href = "main.php?id=<?php echo $id; ?>">메인으로</a><br>
</div>
</body>
</html>

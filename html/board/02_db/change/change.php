<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<link rel="stylesheet" type="text/css" href="/css/style.css">
<body>
<div class="wrap">
<center><h1> 게시판 수정</h1></center><br><br>
<?php
	require_once '../login/session.php';
	start_session();
	if (check_login()) {
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$number = $_GET['number'];
			$id = $_GET['id'];
		}
	echo "이름: ".$id."<br><br>";
?>
	<form action="change_db.php" method="GET">
	<input type="hidden" name="number" value="<?php echo $number; ?>">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
	제목: <input type="text" name="title"><br><br>
	내용: <br><textarea rows = "10" cols = "50%" input type="text" name="content"></textarea><br>
	<input class = "l_btn" type="submit">
	</form>
<?php
	}
	echo "<a class=\"w_btn\" href = \"../main.php?id=".$id."\">메인으로</a><br>";
?>
</div>
</body>
</html>
<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<link rel="stylesheet" type="text/css" href="/css/style.css">
<body>
<div class="wrap">
<center><h1> 게시판 수정</h1></center><br><br>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$number = $_GET['number'];	
	}
?>
<form action="change_db.php" method="POST">
<input type="hidden" name="number" value="<?php echo $number; ?>">
제목: <input type="text" name="title"><br><br>
내용: <br><textarea rows = "10" cols = "50%" input type="text" name="content"></textarea><br><br>
<input class = "r_btn" type="submit">
</form>
<a class="w_btn" href = "../main.php">메인으로</a><br>
</div>
</body>
</html>
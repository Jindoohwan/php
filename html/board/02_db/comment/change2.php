<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<link rel="stylesheet" type="text/css" href="/css/style.css">
<body>
<div class="wrap">
<center><h1> 댓글 수정</h1></center><br><br>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$number = $_GET['num'];
		$number2 = $_GET['num2'];
		$id = $_GET['id'];
	}
?>
<form action="change2_db.php" method="GET">
	<input type="hidden" name="number" value="<?php echo $number; ?>">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<input type="hidden" name="number2" value="<?php echo $number2; ?>">
이름: <?php echo $id."<br><br>"; ?>
댓글내용: <br><textarea rows = "10" cols = "50%" input type="text" name="content"></textarea><br><br>
<input class = "l_btn" type="submit">
</form>
<a class="w_btn" href = "../main.php">메인으로</a><br>
</div>
</body>
</html>
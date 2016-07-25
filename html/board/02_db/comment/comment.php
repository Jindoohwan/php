<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<link rel="stylesheet" type="text/css" href="/css/style.css">
<body>
<div class="wrap">
<center><h2> 댓글쓰기 </h2></center><br><br>
<form action="comment_db.php" method="GET">
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$id = $_GET['id'];
		$num = $_GET['number'];
	}
?>
	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<input type="hidden" name="num" value="<?php echo $num; ?>">
이름 : <?php echo $id.'<br><br>'; ?>
댓글내용: <br><textarea rows = "10" cols = "50%" input type="text" name="content"></textarea><br><br>
<input class = "l_btn" type="submit">
</form>
<a class="w_btn" href = "../main.php">메인으로</a><br>
</div>
</body>
</html>
<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<link rel="stylesheet" type="text/css" href="/css/style.css">
<body>
<div class="wrap">
<center><h1> 자유게시판작성 </h1></center><br><br>
<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$id = $_GET['id'];	
	}
	echo "이름: ".$id."<br><br>";
?>
<form action="write_file.php" method="get">
<input type="hidden" name="id" value="<?php echo $id; ?>">
제목: <input type="text" name="title"><br><br>
내용: <br><textarea rows = "10" cols = "50%" input type="text" name="content"></textarea><br><br>
<input class = "l_btn" type="submit">
</form>
<a class="w_btn" href = "../main.php?id=<?php echo $id; ?>">메인으로</a><br>
</div>
</body>
</html>
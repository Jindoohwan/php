<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<link rel="stylesheet" type="text/css" href="/css/style.css">
<body>
<div class="wrap">
<center><h2> 댓글쓰기 </h2></center><br><br>
<form action="comment_db.php" method="post">
게시물번호 : <input type="text" name="number"><br><br>
이름 : <input type="text" name="name"><br><br>
내용: <br><textarea rows = "10" cols = "50%" input type="text" name="content"></textarea><br><br>
<input class = "r_btn" type="submit">
</form>
<a class="w_btn" href = "../main.php">메인으로</a><br>
</div>
</body>
</html>
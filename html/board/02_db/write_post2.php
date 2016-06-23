<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<style type="text/css">
.wrap {
	margin:0 auto;
	width:50%;
	margin-top:50px;
	}
.r_btn {
	float:left;
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
<center><h1> 게시판작성 </h1></center>
<form action="write_file2.php" method="post">
제목: <input type="text" name="title"><br><br>
이름: <input type="text" name="name"><br><br>
내용: <textarea rows = "15" cols = "60" input type="text" name="content"></textarea>
<input class = "r_btn" type="submit">
</form>
<a class="w_btn" href = "main.php">메인으로</a><br>
</div>
</body>
</html>
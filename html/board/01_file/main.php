<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
<style type="text/css">
.wrap{margin:0 auto;width:50%;margin-top:50px;}
table{width:100%;border:5px solid #EAEAEA;border-collapse:collapse;}
.num{width:10%;}
td, th{border:3px solid #EAEAEA;padding:10px;text-align:center;}
.w_btn{float:right;text-decoration:none;padding:10px;
	margin-top:10px;background:#EAEAEA;color:#000;}
#img{margin:0 auto;width:100%;} <!-- id 사용하여 css 구현 -->
</style>
</head>
<body>
<div class="wrap">
<table>
<tr><th colspan = "3"><h2>게시판</h2></th></tr>
<tr><th>번호</th> <th>제목</th> <th>이름</th></tr>

<?php

	$file_name = 'author.txt';
	$file_handle = fopen($file_name,'r');
	$arr = array();
	$num = 0;
	if (!$file_handle) {
			die('file could not be opened!');
	}
		
	while (($line = fgets($file_handle)) !== false) {
		
		$arr = explode("\t", $line);
		if(count($arr) === 3) {
			$title = $arr[0];
			$name = $arr[1];
		} else {
			die('count was'.count($arr).' Error occured!');
		}
		
		echo "<tr>";
		echo '<td class = "num">'.$num."</td>";
		echo "<td><a href = 'view_post.php?number=$num'> $title </a></td>";
		echo "<td>".$name."</td></tr>";
		
		$num++;
	}
	
	fclose($file_handle);
	
?>
</table>
<a class="w_btn" href = "write_post.php">글쓰기</a><br>
<br><br>
<img src = "pt.jpg" id = "img">
<br>
<a class="w_btn" href = "../../index.php">홈으로</a><br>
</div>
</body>
</html>

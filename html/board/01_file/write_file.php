<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<style type="text/css">
.wrap{margin:0 auto;width:50%;margin-top:50px;}
table{width:100%;border:5px solid #EAEAEA;border-collapse:collapse;}
th{background:#EAEAEA;}
.num{width:10%;}
td, th{border:1px solid #EAEAEA;padding:10px;text-align:center;}
.w_btn{float:right;text-decoration:none;padding:10px;
	margin-top:10px;background:#EAEAEA;color:#000;}
</style>
<body>
<div class="wrap">
<center><h1> 게시판 </h1></center>
<?php
	
	$file_handle = fopen('author.txt','a');
	if (!$file_handle) {
		die('file could not be opened!');
	}

	if (fwrite($file_handle, $_POST["title"]."\t".$_POST["author"]."\t".$_POST["content"]."\n")) {
		echo '작성완료<br>';	
	} else {
		die ('실패<br>');
	}
	
	fclose($file_handle);

?>
	
<br><a class = "w_btn" href = "main.php">메인으로</a><br>
</div>
</body>
</html>
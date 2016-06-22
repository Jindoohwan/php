<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
<style type="text/css">
.wrap{margin:0 auto;width:50%;margin-top:50px;}
table{width:100%;border:5px solid #EAEAEA;border-collapse:collapse;}
td, th{border:1px solid #EAEAEA;padding:10px;text-align:center;}
.w_btn{float:right;text-decoration:none;padding:10px;
	margin-top:10px;background:#EAEAEA;color:#000;}
</style>
</head>
<body>
<div class="wrap">
<center><h1> 게시판 </h1></center>

<table>

<?php
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$num = $_GET['number'];	
	}
	
	$file_name = 'author.txt';
	$file_handle = fopen($file_name,'r');
	$arr = array();
	$number = 0;
	
	if (!$file_handle) {
			die('file could not be opened!');
	}
		
	while(($line = fgets($file_handle)) !== false){
		
		$arr = explode("\t", $line);
		if(count($arr) == 3) {
			if($num == $number) {
				$title = $arr[0];
				$name = $arr[1];
				$content = $arr[2];
				break;
			}
			$number++;
		} else {
			die('count was'.count($arr).' Error occured!');
		}
	}
	
	fclose($file_handle);
	
?>
		<tr><td>제목  </td><td><?php echo $title; ?></td></tr>
		<tr><td>이름  </td><td><?php echo $name; ?></td></tr>
		<tr><td>내용  </td><td><?php echo $content; ?></td></tr>
	</table>

<a class="w_btn" href = "main.php">메인으로</a><br>
</div>
</body>
</html>

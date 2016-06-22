<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<body>
<?php

	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$str = $_GET['string'];	
	}

	$file_name = '../dictionary.txt';
	$file_handle = fopen($file_name, 'r');
	if (!$file_handle) {
		die('file could not be opened!');
	}
	
	$arr = array();

	while (($line = fgets($file_handle)) !== false) {
		
		$wordAndRank = explode("\t", $line);
		if (count($wordAndRank) === 2) {
				$word = $wordAndRank[0];
				$rank = $wordAndRank[1];
				$arr[$word] = $rank;
		} else { 
				die('count was'.count($wordAndRank).' Error occured!');
			}
	}
	
	foreach ($arr as $key => $value) {
		//echo $key.'<br>';
		$pos = strpos($key, $str);
		if ($pos === false) {
			echo $key.'<br>';
		} else {
			echo $key.'<b> -> '.$_GET['string'].'</b><br>';
		}
	}
	
	fclose($file_handle);
?>

<br><a href = "main.php">메인으로</a><br>

</body>
</html>
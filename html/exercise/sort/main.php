<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<body>
<?php
	
	$file_name = '../dictionary.txt';
	
	$file_handle = fopen($file_name, 'r');
	if (!$file_handle) {
		die('file could not be opened!');
	}
	
	$arr = array();
	
	while(true) {
		
		$line = fgets($file_handle);
		if ($line === false) {
			break;
		}
		$wordAndRank = explode("\t", $line);
		if (count($wordAndRank) === 2) {
			$word = $wordAndRank[0];
			$rank = intval($wordAndRank[1]);
			
			$arr[$word] = $rank;
			
		} else { 
			die('count was'.count($wordAndRank).' Error occured!');
		}
		
	}
	
	ksort($arr);
	$file_handle2 = fopen('result.txt', 'w');
	foreach($arr as $key => $value){
		
		fwrite($file_handle2, $key.' => '.$value. "\n");
		echo $key.' => '.$value.'<br>';
	}
	
	fclose($file_handle);
	fclose($file_handle2);
	
?>
<br><a href = "../../index.php">홈으로</a><br>
</body>
</html>

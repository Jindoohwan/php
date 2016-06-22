<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<body>
<?php
	$file_name = 'dictionary.txt';
	
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
		if($word === $_GET["number"]) {
			echo '단어 '.$_GET["number"].'는 '.($rank+1),'번째 단어 입니다.<br>';
		}
		
	}
	
	fclose($file_handle);
?>

<br><a href = "../01_file/main.php">메인으로</a><br>

</body>
</html>
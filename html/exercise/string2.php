<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<body>
<?php
	$file_name = 'dictionary.txt';
	$number_of_total_lines = 5000;
	$file_handle = fopen($file_name, 'r');
	if (!$file_handle) {
		die('file could not be opened!');
	}
	for ($line_number = 1; $line_number <= $number_of_total_lines; $line_number += 1) {
		
		$line = fgets($file_handle);
		if ($line === false) {
			break;
		}
		$wordAndRank = explode("\t", $line);
		if (count($wordAndRank) === 2) {
			$word = $wordAndRank[0];
			$rank = intval($wordAndRank[1]);
		} else { // error
			die('count was'.count($wordAndRank).' Error occured!');
		}
		echo '단어: '.$word.'는 '.$rank,'번째 단어 입니다.<br>';
		
	}
	echo 'END';
	fclose($file_handle);
?>
</body>
</html>
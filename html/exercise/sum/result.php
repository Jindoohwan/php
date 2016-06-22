<!DOCTYPE html>
<html>
<body>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$word1 = $_GET["word1"];
		$word2 = $_GET["word2"];
	}

	function word_sum($word_1, $word_2) {
		$arr = array();
		$arr[0] = $word_1;
		$arr[1] = $word_2;
		
		return implode($arr);
	}
	
	$file_name = '../dictionary.txt';
	$file_handle = fopen($file_name, 'r');
	if (!$file_handle) {
		die('file could not be opened!');
	}

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
		$tmp[] = $key;
	}
	
	$str = word_sum($word1, $word2);
	$str1 = str_split($str);
	sort($str1);
		
	for ($i = 0; $i < count($tmp); $i++) {
		$str2 = str_split($tmp[$i]);
		sort($str2);
		if (count($str1) === count($str2)) {
			if($str1 === $str2) {
				echo $word1.'과 '.$word2.'로 만들수 있는 단어는 '.$tmp[$i].'입니다.<br>';
			} 
		}
	}
	
?>
<br>
<a href = "main.php">메인으로</a>
</body>
</html>
<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<body>
<?php 
	
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$word1 = $_GET["word1"];
		//$word2 = $_GET["word2"];
	}

/*	echo $_GET['word1'].'과 '.$_GET['word2'].'는? <br>';
	
	$arr1 = str_split($word1);
	$arr2 = str_split($word2);
	
	sort($arr1);
	sort($arr2);
	
	for ($i = 0; $i < count($arr1); $i++) {
		if ($arr1[$i] === $arr2[$i]) {
			$result[] = $arr2[$i];
		}
	}
	
	if($arr1 === $arr2) {
		echo 'aragram<br>';
	} else {
		echo 'different<br>';
	}
*/

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
	
	$str1 = str_split($word1); //문자열 한개씩 배열저장
	sort($str1);
	
	for ($i = 0; $i < count($tmp); $i++) {
		$str2 = str_split($tmp[$i]);
		sort($str2);
		if (count($str1) === count($str2)) {
			if($str1 === $str2) {
				echo $word1.'의 aragram은 '.$tmp[$i].'입니다.<br>';
			} 
		}
	}
	
?>
<br>
<a href = "main.php">메인으로</a>
</body>
</html>
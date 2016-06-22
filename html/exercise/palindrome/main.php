<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<body>
<h2>palindrome 결과</h3>

<?php

	$file_name = '../dictionary.txt';
	$file_handle = fopen($file_name, 'r');
	if (!$file_handle) {
		die('file could not be opened!');
	}
	
	$word = array();
	
	while (($line = fgets($file_handle)) !== false) {
		
		$wordAndRank = explode("\t", $line);
		if (count($wordAndRank) === 2) {
			$word[] = $wordAndRank[0];
		} else { 
				die('count was'.count($wordAndRank).' Error occured!');
			}
	}
	
	$result = array();
	for ($i=0; $i < count($word); $i++) {
		if($word[$i] === strrev($word[$i])) { //strrev 문자열 뒤집는 함수
			$result[] = $word[$i];
		}
	}
	
	foreach ($result as $value) {
		echo $value.'<br>';
	}

?>

<br><a href = "/index.php">메인으로</a><br>

</body>
</html>
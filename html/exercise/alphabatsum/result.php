<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<html>
<body>
<?php
// 1. a -> 1  string -> int
// 2. aaa -> 3 
	
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$word = $_GET["word"];
	}
	
	function get_number($a) {
		return (ord($a) - ord('a') + 1);
	}

	function get_number_sum($a) {
	
		$sum = 0;
		for($i = 0; $i < strlen($a); $i++){
			$sum += get_number(substr($a, $i));
		
		}
		return $sum;
	
	}
	
	function find_file($a) {
		
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
			
			$words = explode("\t", $line);
			if (count($words) === 2) {
				$word = $words[0];
				if($a == get_number_sum($word)) {
					$arr[] = $word;
				}
			} else { 
				die('count was'.count($words).' Error occured!');
			}
		
		}
		
		return $arr;
		
	}
	////////////////////////////////////////////////////////////////////////
	$value = get_number_sum($word);
	echo '알파벳의 합은 ? '.$value.'<br>';
	$value2 = find_file($value);
	echo $_GET['word'].'와 같은 수의 단어는?<br>';
	
	foreach($value2 as $value) {
		
		echo $value.'<br>';
		
	}
?>
<br>
<a href = "main.php">메인으로</a>
</body>
</html>

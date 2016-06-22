<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<body>
<?php

	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$number = $_GET["number"];
	}
	
	for ($i = 1; $i <= $number; $i++) {
		$num[$i-1] = $i;
	}
	
	function getPermutation($num) {
		perm($num, 0, count($num) - 1);
	}
	
	function perm($num, $i, $n)	{
		if($i === $n) {
			for($j = 0; $j <= $n; $j++) {
				echo $num[$j];
			}
			echo "<br>";
		} else {
			for($j = $i; $j <= $n; $j++) {
				swap($num[$i], $num[$j]);
				perm($num, $i+1, $n);
				swap($num[$i], $num[$j]);
			}
		}
	}
	
	function swap(&$a, &$b) {
	 $tmp = $a;
	 $a = $b;
	 $b = $tmp;
	}
	
	getPermutation($num);
	
?>
<br>
<a href = "main.php">메인으로</a>
</body>
</html>
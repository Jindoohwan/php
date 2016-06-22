<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<body>

<?php

	$word1 = $_GET["word1"];
	$word2 = $_GET["word2"];

	if(strcasecmp($word1, $word2) == 0) {
		if(strcmp($word1, $word2) < 0){
			echo $word1;
		}
	} 
	if(strcasecmp($word1, $word2) == 0) {
		if(strcmp($word1, $word2) > 0) {
			echo $word2;	
		}	
	}
	if(strcasecmp($word1, $word2) == 0) {
		if(strcmp($word1, $word2) == 0) {
			echo 'same';
		}
	}
	if(strcasecmp($word1, $word2) < 0) {
		echo $word1;
	}
	if(strcasecmp($word1, $word2) > 0) {
		echo $word2;
	}

?>
<br><br>
<a href = "main.php">메인으로</a>
</body>
</html>
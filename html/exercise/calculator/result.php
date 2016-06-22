<!DOCTYPE html>
<html>
<body>
<?php
	/*echo $_GET["number1"].$_GET["operation"].$_GET["number2"].'의 결과는?<br>';
	
	switch($_GET["operation"]) {
		case "+" :
			echo $_GET["number1"] + $_GET["number2"];
			break;
		case "-" :
			echo $_GET["number1"] - $_GET["number2"];
			break;
		case "*" :
			echo $_GET["number1"] * $_GET["number2"];
			break;
		case "/" :
			echo $_GET["number1"] / $_GET["number2"];
			break;
		default :
			echo '다시입력하세요';
	} 
	
	echo ' 입니다.';*/
	
	///////////////////////////////////////////////////////
	
	$operation = $_GET["number1"];
	$sum = 0;
	
	$val = explode ('+', $operation);
	
	for($i=0; $i<count($val); $i++) {
		
		$sum += $val[$i];
		
	}
	
	echo $_GET["number1"].'의 결과는?<br>';
	echo $sum;
	
	////////////////////////////////////////////////////////////
?>
<br><br>
<a href = "main.php">메인으로</a>
</body>
</html>